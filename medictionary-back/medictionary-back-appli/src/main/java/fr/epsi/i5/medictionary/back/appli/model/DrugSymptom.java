package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;
import com.thomaskint.minidao.annotation.MDOneToMany;

import java.util.List;

@MDEntity(tableName = "drug_symptom")
public class DrugSymptom {

	@MDId
	@MDField(fieldName = "id_drug_symptom")
	public Integer idDrugSymptom;

	@MDOneToMany(fieldName = "id_drug", targetFieldName = "id_drug", target = Drug.class)
	public List<Drug> drugs;

	@MDField(fieldName = "name_symptom")
	public String nameSymptom;
}
