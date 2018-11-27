package fr.epsi.i5.medictionary.back.appli;

import com.thomaskint.minidao.MiniDAO;
import com.thomaskint.minidao.connection.MDConnectionConfig;
import com.thomaskint.minidao.connection.MDDriver;
import com.thomaskint.minidao.exception.MDException;
import fr.epsi.i5.medictionary.back.appli.dao.User;

public class Main {
	public static void main(String[] args) throws MDException {
		String url = "localhost";
		String port = "3306";
		String login = "medictionary";
		String password = "password";
		String instance = "medictionary_appli";

		MDConnectionConfig mdConnectionConfig = new MDConnectionConfig(MDDriver.MYSQL, url, port, login, password, instance);

		MiniDAO miniDAO = new MiniDAO(mdConnectionConfig);

		System.out.println(miniDAO.read().getEntities(User.class));
	}
}