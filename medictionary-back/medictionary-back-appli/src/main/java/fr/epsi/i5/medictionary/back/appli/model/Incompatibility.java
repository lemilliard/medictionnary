package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;
import com.thomaskint.minidao.annotation.MDManyToOne;
import com.thomaskint.minidao.enumeration.MDLoadPolicy;

@MDEntity(tableName = "incomptability")
public class Incompatibility {

    @MDId
    @MDField(fieldName = "id_incompatibility")
    public Integer idIncompatibility;

    @MDManyToOne(fieldName = "id_drug_one", targetFieldName = "id_drug", target = Drug.class, loadPolicy = MDLoadPolicy.HEAVY)
    public Drug drugOne;

    @MDManyToOne(fieldName = "id_drug_two", targetFieldName = "id_drug", target = Drug.class, loadPolicy = MDLoadPolicy.HEAVY)
    public Drug drugTwo;
}
