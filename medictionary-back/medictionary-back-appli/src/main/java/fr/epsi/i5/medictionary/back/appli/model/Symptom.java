package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;

@MDEntity(tableName = "symptom")
public class Symptom {

	@MDId
	@MDField(fieldName = "name_symptom")
	public String name;
}
