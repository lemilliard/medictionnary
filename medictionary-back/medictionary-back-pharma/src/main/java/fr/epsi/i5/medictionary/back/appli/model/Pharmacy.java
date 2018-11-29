package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;

@MDEntity(tableName = "pharmacy")
public class Pharmacy {

    @MDId
    @MDField(fieldName = "id_pharmacy")
    public Integer idPharmacy;

    @MDField(fieldName = "name")
    public String name;

    @MDField(fieldName = "postal_code")
    public Integer postalCode;

    @MDField(fieldName = "longitude")
    public Double longitude;

    @MDField(fieldName = "latitude")
    public Double latitude;
    
    public Double distance;
}
