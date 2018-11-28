package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;
import com.thomaskint.minidao.annotation.MDManyToOne;
import com.thomaskint.minidao.enumeration.MDLoadPolicy;

@MDEntity(tableName = "histo")
public class Histo

        @MDId
        @MDField(fieldName = "id_histo")
        public Integer idHisto;

        @MDField(fieldName = "id_user")
        public Integer idUser;

        @MDManyToOne(fieldName = "id_prescription", targetFieldName = "id_prescription", target = Prescription.class, loadPolicy = MDLoadPolicy.HEAVY)
        public Symptom symptom;
}
