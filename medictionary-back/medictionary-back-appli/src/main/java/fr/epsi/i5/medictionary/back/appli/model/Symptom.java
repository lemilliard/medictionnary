package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;

@MDEntity(tableName = "symptom")
public class Symptom {

	@MDId
	@MDField(fieldName = "id_symptom")
	public Integer idSymptom;

	@MDField(fieldName = "name")
	public String name;
}
