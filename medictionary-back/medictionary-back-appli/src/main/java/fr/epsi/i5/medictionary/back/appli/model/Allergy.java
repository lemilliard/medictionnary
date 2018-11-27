package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;

@MDEntity(tableName = "allergy")
public class Allergy {

	@MDId
	@MDField(fieldName = "id_allergy")
	public Integer idAllergy;

	@MDField(fieldName = "id_user")
	public Integer idUser;

	@MDField(fieldName = "id_drug")
	public Integer idDrug;
}
