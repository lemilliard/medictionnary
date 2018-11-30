package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.*;
import com.thomaskint.minidao.enumeration.MDLoadPolicy;

import java.util.Date;
import java.util.List;

@MDEntity(tableName = "prescription")
public class Prescription {

	@MDId
	@MDField(fieldName = "id_prescription")
	public Integer idPrescription;

	@MDField(fieldName = "date")
	public Date date;

	@MDField(fieldName = "id_user")
	public Integer idUser;

	@MDField(fieldName = "code_pharmacy")
	public Integer codePharmacy;

	@MDOneToMany(fieldName = "id_prescription", targetFieldName = "id_prescription", target = DrugPrescription.class, loadPolicy = MDLoadPolicy.HEAVY)
	public List<DrugPrescription> drugPrescriptions;
}
