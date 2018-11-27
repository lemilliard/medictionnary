package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;

@MDEntity(tableName = "symptom_zone")
public class SymptomZone {

	@MDId
	@MDField(fieldName = "id_symptom_zone")
	public Integer idSymptomZone;

	@MDField(fieldName = "id_symptom")
	public Integer idSymptom;

	@MDField(fieldName = "zone_name")
	public String zoneName;
}
