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
import fr.epsi.i5.medictionary.back.appli.Main;
import fr.epsi.i5.medictionary.back.appli.model.*;

import java.sql.ResultSet;

import com.lemilliard.decisiontree.model.Result;
import fr.epsi.i5.medictionary.back.appli.model.Allergy;
import fr.epsi.i5.medictionary.back.appli.model.Drug;
import fr.epsi.i5.medictionary.back.appli.model.Symptom;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Stack;

/**
 * @author kbouzan
 */
public class Decision {

	private static Config config;

	private static void initConfig() {
		config = new Config("./exemples/exemple_medic");

		config.addAttribut("fievre", "non", "oui");
		config.addAttribut("maux de tête", "non", "oui");
		config.addAttribut("douleur", "non", "oui");
		config.addAttribut("insomnie", "non", "oui");
		config.addAttribut("toux", "non", "oui");
		config.addAttribut("trouble cardiaque", "non", "oui");

		config.addDecision("Aspirine");
		config.addDecision("Clopidogrel");
		config.addDecision("Ibuprofene");
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

	public static Stack<String> decide(Allergy allergy, List<Symptom> symptoms) {
		Stack<String> listMolecule = new Stack<String>();
		HashMap<String, String> values = new HashMap<String, String>();

		List<Integer> listAllergies = prepareDataAllergy(allergy);

		initConfig();

		DecisionTree decisionTree = generateTree(listAllergies);

		prepareValueDecide(symptoms, values);

		Result decision = decisionTree.decide(values);
		if (!decision.getValue().equals("Aucun")) {
			listMolecule.push(decision.getValue());
		} else {
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
					listMolecule.push(decision.getValue());
				}
			}
		}

		return listMolecule;
	}

	private static List<Integer> prepareDataAllergy(Allergy listAllergies) {
		List<Integer> list = new ArrayList<Integer>();
		for (Drug d : listAllergies.drugs) {
			list.add(config.getIndexOfDecision(d.molecule));
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

	private static Stack<String> getCompatibles(Stack<String> molecules, Allergy allergy) throws MDException {
		Stack<String> compatibles = new Stack<>();

		int i;
		String currentMolecule;
		List<Drug> equivalences;
		boolean addedEquivalence;
		while (!molecules.empty()) {
			currentMolecule = molecules.pop();
			if (isCompatible(currentMolecule, compatibles, allergy)) {
				compatibles.push(currentMolecule);
			} else {
				equivalences = getEquivalences(currentMolecule);
				if (equivalences.isEmpty()) {
					molecules.push(compatibles.pop());
				} else {
					i = 0;
					addedEquivalence = false;
					while (i < equivalences.size() && !addedEquivalence) {
						if (isCompatible(equivalences.get(i).molecule, compatibles, allergy)) {
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

	private static boolean isCompatible(String molecule, Stack<String> compatibles, Allergy allergy) throws MDException {
		MDCondition drugCondition = new MDCondition("molecule", MDConditionOperator.EQUAL, molecule);
		Drug drug = Main.miniDAO.read().getEntityByCondition(Drug.class, drugCondition);

		MDSelectBuilder selectBuilder = new MDSelectBuilder();
		selectBuilder.from(Incompatibility.class);
		selectBuilder.where("id_drug_one", MDConditionOperator.EQUAL, drug.idDrug);
		selectBuilder.or("id_drug_two", MDConditionOperator.EQUAL, drug.idDrug);

		String query = selectBuilder.build();
		ResultSet resultSet = Main.miniDAO.executeQuery(query);
		List<Incompatibility> incompatibilities = Main.miniDAO.mapResultSetToEntities(resultSet, Incompatibility.class, 0, 1000);

		int i = 0;
		int j;
		boolean compatible = true;
		List<Drug> allergies = allergy.drugs;
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
				if (allergies.get(j).idDrug.equals(drug.idDrug)) {
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
		ResultSet resultSet = Main.miniDAO.executeQuery(query);
		DrugSymptom drugSymptom = Main.miniDAO.mapResultSetToEntity(resultSet, DrugSymptom.class);

		return drugSymptom.drugs;
	}
}
