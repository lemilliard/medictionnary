package fr.epsi.i5.medictionary.back.appli.model;


import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;
import com.thomaskint.minidao.annotation.MDManyToOne;
import com.thomaskint.minidao.enumeration.MDLoadPolicy;

import java.util.List;

@MDEntity(tableName = "drug_prescription")
public class DrugPrescription {

	@MDId
	@MDField(fieldName = "id_drug_prescription")
	public Integer idDrugPrescription;

	@MDField(fieldName = "id_drug")
	public Integer idDrug;

	@MDField(fieldName = "id_prescription")
	public Integer idPrescription;

	@MDManyToOne(fieldName = "id_drug", targetFieldName = "id_drug", target = Drug.class, loadPolicy = MDLoadPolicy.HEAVY)
	public Drug drug;
}
