package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;

import java.util.Date;

@MDEntity(tableName = "prescription")
public class Prescription {

    @MDId
    @MDField(fieldName = "id_prescription")
    public Integer idPrescription;

    @MDField(fieldName = "date")
    public Date date;

    @MDField(fieldName = "name")
    public String name;

    @MDField(fieldName = "id_user")
    public Integer idUser;
}
