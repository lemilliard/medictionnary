/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package fr.epsi.i5.medictionary.back.appli.model;

import java.util.List;

/**
 *
 * @author kbouzan
 */
public class DecisionTreeParam {
    
    public List<Symptom> symptoms;
    
    public Allergy allergy;

    public List<Symptom> getSymptoms() {
        return symptoms;
    }

    public void setSymptoms(List<Symptom> symptoms) {
        this.symptoms = symptoms;
    }

    public Allergy getAllergy() {
        return allergy;
    }

    public void setAllergy(Allergy allergy) {
        this.allergy = allergy;
    }
    
    
    
}
