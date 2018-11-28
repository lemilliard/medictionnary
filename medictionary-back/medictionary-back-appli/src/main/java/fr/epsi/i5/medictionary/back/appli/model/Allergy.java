package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;
import com.thomaskint.minidao.annotation.MDOneToMany;
import com.thomaskint.minidao.enumeration.MDLoadPolicy;

import java.util.List;

@MDEntity(tableName = "allergy")
public class Allergy {

	@MDId
	@MDField(fieldName = "id_allergy")
	public Integer idAllergy;

	@MDField(fieldName = "id_user")
	public Integer idUser;

	@MDOneToMany(fieldName = "id_drug", targetFieldName = "id_drug", target = Drug.class, loadPolicy = MDLoadPolicy.HEAVY)
	public List<Drug> drugs;
}
