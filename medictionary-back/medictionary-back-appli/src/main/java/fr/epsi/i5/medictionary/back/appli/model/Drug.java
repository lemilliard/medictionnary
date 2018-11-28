package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;
import com.thomaskint.minidao.annotation.MDOneToMany;
import com.thomaskint.minidao.enumeration.MDLoadPolicy;

import java.util.List;

@MDEntity(tableName = "drug")
public class Drug {

	@MDId
	@MDField(fieldName = "id_drug")
	public Integer idDrug;

	@MDField(fieldName = "molecule")
	public String molecule;

	@MDField(fieldName = "name")
	public String name;

	@MDField(fieldName = "cas")
	public String cas;
}
