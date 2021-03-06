package fr.epsi.i5.medictionary.back.appli;

import com.thomaskint.minidao.MiniDAO;
import com.thomaskint.minidao.connection.MDConnectionConfig;
import com.thomaskint.minidao.connection.MDDriver;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;


@SpringBootApplication
public class MedictionaryBackAppli {

	private static final String url = "localhost";
	private static final String port = "3306";
	private static final String login = "medictionary";
	private static final String password = "password";
	private static final String instance = "medictionary_appli";

	private static final MDConnectionConfig mdConnectionConfig = new MDConnectionConfig(MDDriver.MYSQL, url, port, login, password, instance);

	public static final MiniDAO miniDAO = new MiniDAO(mdConnectionConfig);

	public static void main(String[] args) {
		SpringApplication.run(MedictionaryBackAppli.class, args);
	}
}