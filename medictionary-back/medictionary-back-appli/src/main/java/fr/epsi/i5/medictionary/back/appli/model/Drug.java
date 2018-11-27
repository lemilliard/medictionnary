package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;

@MDEntity(tableName = "drug")
public class Drug {

	@MDId
	@MDField(fieldName = "id_drug")
	public Integer idDrug;

	@MDField(fieldName = "molecule")
	public String molecule;
}
