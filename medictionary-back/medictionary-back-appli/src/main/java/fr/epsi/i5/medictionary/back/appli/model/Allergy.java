package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.*;
import com.thomaskint.minidao.enumeration.MDLoadPolicy;

import java.util.List;

@MDEntity(tableName = "allergy")
public class Allergy {

	@MDId
	@MDField(fieldName = "id_allergy")
	public Integer idAllergy;

	@MDField(fieldName = "id_user")
	public Integer idUser;

	@MDField(fieldName = "id_drug")
	public Integer idDrug;

	@MDManyToOne(fieldName = "id_drug", targetFieldName = "id_drug", target = Drug.class, loadPolicy = MDLoadPolicy.HEAVY)
	public Drug drug;

	public boolean valid;
}
