package fr.epsi.i5.medictionary.back.appli.model;

import com.thomaskint.minidao.annotation.MDEntity;
import com.thomaskint.minidao.annotation.MDField;
import com.thomaskint.minidao.annotation.MDId;

@MDEntity(tableName = "user")
public class User {

	@MDId
	@MDField(fieldName = "id_user")
	public Integer idUser;

	@MDField(fieldName = "login")
	public String login;

	@MDField(fieldName = "login")
	public String password;

	@Override
	public String toString() {
		return "User{" +
				"idUser=" + idUser +
				", login='" + login + '\'' +
				", password='" + password + '\'' +
				'}';
	}
}
