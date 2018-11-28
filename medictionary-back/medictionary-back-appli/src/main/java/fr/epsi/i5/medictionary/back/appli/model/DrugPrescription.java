package fr.epsi.i5.medictionary.back.appli.model;


import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;
import com.thomaskint.minidao.annotation.MDManyToOne;
import com.thomaskint.minidao.enumeration.MDLoadPolicy;

@MDEntity(tableName = "drug_prescription")
public class DrugPrescription {

    @MDId
    @MDField(fieldName = "id_drug_prescription")
    public Integer idDrugPrescription;

    @MDManyToOne(fieldName = "id_drug", targetFieldName = "id_drug", target = Drug.class, loadPolicy = MDLoadPolicy.HEAVY)
    public Symptom symptom;

    @MDManyToOne(fieldName = "id_prescription", targetFieldName = "id_prescription", target = Prescription.class, loadPolicy = MDLoadPolicy.HEAVY)
    public Zone zone;
}
