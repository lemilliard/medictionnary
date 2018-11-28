/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package fr.epsi.i5.medictionary.back.appli.decisionTree;

import com.lemilliard.decisiontree.Config;
import com.lemilliard.decisiontree.DecisionTree;

import java.util.List;
import java.util.Stack;

/**
 * @author kbouzan
 */
public class Decision {

	private static Config config;

	private static void setConfig() {
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
		config.addDecision("T'es con ! T'as rien !");
	}

	private static void generateTree(List<Integer> listAllergies) {
		Integer[] arrayAllergies = new Integer[listAllergies.size()];

		arrayAllergies = listAllergies.toArray(arrayAllergies);

		DecisionTree decisionTree = new DecisionTree(config, arrayAllergies);

		decisionTree.getTree().generateTree(config.getAttributIndexes());

		decisionTree.print();
	}

	public static void decide() {

	}

	private static Stack<String> getCompatibles(List<String> molecules) {
		Stack<String> compatibles = new Stack<>();

		return compatibles;
	}
}
