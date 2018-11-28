/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package fr.epsi.i5.medictionary.back.appli.decisionTree;

import com.lemilliard.decisiontree.Attribut;
import com.lemilliard.decisiontree.Config;
import com.lemilliard.decisiontree.DecisionTree;
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
    
    private static void initConfig(){
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
    
    private static DecisionTree generateTree(List<Integer> listAllergies){
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
        if (!decision.getValue().equals("Aucun")){
            listMolecule.push(decision.getValue());
        } else {
            for(Symptom s : symptoms){
                Result decisionForOne;
                values.clear();
                values.put(s.name, "oui");
                for(Attribut a : config.getAttributs()){
                    if(!values.containsKey(a.getName())){
                        values.put(a.getName(), "non");
                    }
                }
                decisionForOne = decisionTree.decide(values);
                if(!decisionForOne.getValue().equals("Aucun")){
                    listMolecule.push(decision.getValue());
                }
            }
        }
        
        return listMolecule;
    }
    
    private static List<Integer> prepareDataAllergy(Allergy listAllergies){
        List<Integer> list = new ArrayList<Integer>();
        for(Drug d : listAllergies.drugs){
            list.add(config.getIndexOfDecision(d.molecule));
        }
        return list;
    }
    
    private static void prepareValueDecide(List<Symptom> symptoms, HashMap<String, String> values){
        for(Symptom s : symptoms){
            values.put(s.name, "oui");
        }
        for(Attribut a : config.getAttributs()){
            if(!values.containsKey(a.getName())){
                values.put(a.getName(), "non");
            }
        }
    }
}
