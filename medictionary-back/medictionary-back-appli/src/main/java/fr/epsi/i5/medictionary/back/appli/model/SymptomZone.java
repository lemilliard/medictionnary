package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;
import com.thomaskint.minidao.annotation.MDManyToOne;
import com.thomaskint.minidao.enumeration.MDLoadPolicy;

@MDEntity(tableName = "symptom_zone")
public class SymptomZone {

	@MDId
	@MDField(fieldName = "id_symptom_zone")
	public Integer idSymptomZone;

	@MDManyToOne(fieldName = "id_symptom", targetFieldName = "id_symptom", target = Symptom.class, loadPolicy = MDLoadPolicy.HEAVY)
	public Symptom symptom;

	@MDManyToOne(fieldName = "zone_name", targetFieldName = "name", target = Zone.class, loadPolicy = MDLoadPolicy.HEAVY)
	public Zone zone;
}
