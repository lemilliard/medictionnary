/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package fr.epsi.i5.medictionary.back.appli.decisionTree;

import com.lemilliard.decisiontree.Attribut;
import com.lemilliard.decisiontree.Config;
import com.lemilliard.decisiontree.DecisionTree;
import com.thomaskint.minidao.enumeration.MDConditionOperator;
import com.thomaskint.minidao.exception.MDException;
import com.thomaskint.minidao.querybuilder.MDCondition;
import com.thomaskint.minidao.querybuilder.MDSelectBuilder;
import fr.epsi.i5.medictionary.back.appli.MedictionaryBackAppli;
import fr.epsi.i5.medictionary.back.appli.model.*;

import java.sql.ResultSet;

import com.lemilliard.decisiontree.model.Result;
import fr.epsi.i5.medictionary.back.appli.model.Allergy;
import fr.epsi.i5.medictionary.back.appli.model.Drug;
import fr.epsi.i5.medictionary.back.appli.model.Symptom;

import java.util.*;

/**
 * @author kbouzan
 */
public class Decision {

	private static Config config;

	private static void initConfig() {
		config = new Config("./exemples/exemple_medic");

		config.addAttribut("Fievre", "non", "oui");
		config.addAttribut("Maux de tête", "non", "oui");
		config.addAttribut("Douleur", "non", "oui");
		config.addAttribut("Insomnie", "non", "oui");
		config.addAttribut("Toux", "non", "oui");
		config.addAttribut("Trouble cardiaque", "non", "oui");

		config.addDecision("Aspirine");
		config.addDecision("Clopidogrel");
		config.addDecision("Ibuprofène");
		config.addDecision("Diclofenac");
		config.addDecision("Fenspiride");
		config.addDecision("Hydroxyzine");
		config.addDecision("Dextromethorphane");
		config.addDecision("Pholcodine");
		config.addDecision("Aucun");
	}

	private static DecisionTree generateTree(List<Integer> listAllergies) {
		Integer[] arrayAllergies = new Integer[listAllergies.size()];

		arrayAllergies = listAllergies.toArray(arrayAllergies);

		DecisionTree decisionTree = new DecisionTree(config, arrayAllergies);

		decisionTree.getTree().generateTree(config.getAttributIndexes());

		decisionTree.print();

		return decisionTree;
	}

	public static Stack<String> decide(List<Allergy> allergies, List<Symptom> symptoms) throws MDException {
		Stack<String> listMolecule = new Stack<>();
		HashMap<String, String> values = new HashMap<>();

		initConfig();

		List<Integer> listAllergies = prepareDataAllergy(allergies);

		DecisionTree decisionTree = generateTree(listAllergies);

		prepareValueDecide(symptoms, values);

//		Result decision = decisionTree.decide(values);
//		if (!decision.getValue().equals("Aucun")) {
//			listMolecule.push(decision.getValue());
//		} else {
		for (Symptom s : symptoms) {
			Result decisionForOne;
			values.clear();
			values.put(s.name, "oui");
			for (Attribut a : config.getAttributs()) {
				if (!values.containsKey(a.getName())) {
					values.put(a.getName(), "non");
				}
			}
			decisionForOne = decisionTree.decide(values);
			if (!decisionForOne.getValue().equals("Aucun")) {
				listMolecule.push(decisionForOne.getValue());
			}
//			}
		}

		listMolecule = getCompatibles(listMolecule, allergies);

		return listMolecule;
	}

	private static List<Integer> prepareDataAllergy(List<Allergy> allergies) {
		List<Integer> list = new ArrayList<>();
		for (Allergy allergy : allergies) {
			list.add(config.getIndexOfDecision(allergy.drug.molecule));
		}
		return list;
	}

	private static void prepareValueDecide(List<Symptom> symptoms, HashMap<String, String> values) {
		for (Symptom s : symptoms) {
			values.put(s.name, "oui");
		}
		for (Attribut a : config.getAttributs()) {
			if (!values.containsKey(a.getName())) {
				values.put(a.getName(), "non");
			}
		}
	}

	private static Stack<String> getCompatibles(Stack<String> molecules, List<Allergy> allergies) throws MDException {
		Stack<String> compatibles = new Stack<>();

		int i;
		String currentMolecule;
		List<Drug> equivalences;
		boolean addedEquivalence;
		while (!molecules.empty()) {
			currentMolecule = molecules.pop();
			if (isCompatible(currentMolecule, compatibles, allergies)) {
				compatibles.push(currentMolecule);
			} else {
				equivalences = getEquivalences(currentMolecule);
				if (equivalences.isEmpty()) {
					molecules.push(compatibles.pop());
				} else {
					i = 0;
					addedEquivalence = false;
					while (i < equivalences.size() && !addedEquivalence) {
						if (isCompatible(equivalences.get(i).molecule, compatibles, allergies)) {
							compatibles.push(equivalences.get(i).molecule);
							addedEquivalence = true;
							molecules.pop();
						}
					}
				}
			}
		}

		return compatibles;
	}

	private static boolean isCompatible(String molecule, Stack<String> compatibles, List<Allergy> allergies) throws MDException {
		MDCondition drugCondition = new MDCondition("molecule", MDConditionOperator.EQUAL, molecule);
		Drug drug = MedictionaryBackAppli.miniDAO.read().getEntityByCondition(Drug.class, drugCondition);

		MDSelectBuilder selectBuilder = new MDSelectBuilder();
		selectBuilder.from(Incompatibility.class);
		selectBuilder.where("id_drug_one", MDConditionOperator.EQUAL, drug.idDrug);
		selectBuilder.or("id_drug_two", MDConditionOperator.EQUAL, drug.idDrug);

		String query = selectBuilder.build();
		ResultSet resultSet = MedictionaryBackAppli.miniDAO.executeQuery(query);
		List<Incompatibility> incompatibilities = MedictionaryBackAppli.miniDAO.mapResultSetToEntities(resultSet, Incompatibility.class);

		int i = 0;
		int j;
		boolean compatible = true;
		while (i < incompatibilities.size() && compatible) {
			j = 0;
			while (j < compatibles.size() && compatible) {
				if ((incompatibilities.get(i).drugOne.idDrug.equals(drug.idDrug) && compatibles.get(j).equals(incompatibilities.get(i).drugTwo.molecule)) ||
						(incompatibilities.get(i).drugTwo.idDrug.equals(drug.idDrug) && compatibles.get(j).equals(incompatibilities.get(i).drugOne.molecule))) {
					compatible = false;
				}
				j++;
			}
			j = 0;
			while (j < allergies.size() && compatible) {
				if (allergies.get(j).drug.idDrug.equals(drug.idDrug)) {
					compatible = false;
				}
				j++;
			}
			i++;
		}
		return compatible;
	}

	private static List<Drug> getEquivalences(String molecule) throws MDException {
		MDSelectBuilder selectBuilder = new MDSelectBuilder();
		selectBuilder.from(DrugSymptom.class);
		selectBuilder.innerJoin(Drug.class);
		selectBuilder.where("molecule", MDConditionOperator.EQUAL, molecule);

		String query = selectBuilder.build();
		ResultSet resultSet = MedictionaryBackAppli.miniDAO.executeQuery(query);
		DrugSymptom drugSymptom = MedictionaryBackAppli.miniDAO.mapResultSetToEntity(resultSet, DrugSymptom.class);

		if (drugSymptom != null && drugSymptom.drugs != null) {
			return drugSymptom.drugs;
		}
		return Collections.emptyList();
	}
}
