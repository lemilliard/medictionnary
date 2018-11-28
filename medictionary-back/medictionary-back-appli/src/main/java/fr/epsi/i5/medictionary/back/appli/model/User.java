package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;
import com.thomaskint.minidao.annotation.MDOneToMany;
import com.thomaskint.minidao.enumeration.MDLoadPolicy;

import java.util.List;

@MDEntity(tableName = "user")
public class User {

	@MDId
	@MDField(fieldName = "id_user")
	public Integer idUser;

	@MDField(fieldName = "login")
	public String login;

	@MDField(fieldName = "password")
	public String password;

	@MDField(fieldName = "firstname")
	public String firstname;

	@MDField(fieldName = "lastname")
	public String lastname;

	@MDField(fieldName = "social_security_number")
	public String socialSecurityNumber;

	@MDField(fieldName = "weight")
	public Float weight;

	@MDOneToMany(fieldName = "id_user", targetFieldName = "id_user", target = Allergy.class, loadPolicy = MDLoadPolicy.HEAVY)
	public List<Allergy> allergies;
}
