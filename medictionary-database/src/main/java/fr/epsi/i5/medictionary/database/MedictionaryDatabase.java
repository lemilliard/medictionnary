package fr.epsi.i5.medictionary.database;

import com.lemilliard.filemapper.FMSeparation;
import fr.epsi.i5.medictionary.database.bdpm.BDPMFactory;
import fr.epsi.i5.medictionary.database.bdpm.config.Config;
import fr.epsi.i5.medictionary.database.bdpm.config.Key;
import fr.epsi.i5.medictionary.database.bdpm.object.Composition;
import fr.epsi.i5.medictionary.database.bdpm.object.Specialite;
import fr.epsi.i5.medictionary.database.utils.Util;

import java.util.Calendar;
import java.util.List;
import java.util.concurrent.TimeUnit;

public class MedictionaryDatabase {

	/**
	 * Run the program
	 *
	 * @param args String[]
	 */
	public static void main(String[] args) throws Exception {
		// Adding shutdownHook to program
		addShutdownHook();

		// Initialize Config
		initializeConfig();

		// Run the program
		while (true) {
			// Display time
			displayTime();

			// TODO: Penser à remettre en forme les lignes des fichiers reçus
//			List<Presentation> presentations = BDPMFactory.getPresentations();
//			System.out.println(presentations.size());

			List<Specialite> specialites = BDPMFactory.getSpecialites();
			System.out.println(specialites.size());

			List<Composition> compositions = BDPMFactory.getCompositions();
			System.out.println(compositions.size());

			// Sleep
			sleep();
		}
	}

	private static void initializeConfig() {
		try {
			Config.init("medictionary-database/config.txt", FMSeparation.SPACE);
		} catch (Exception e) {
			Util.exit(e);
		}
	}

	private static void addShutdownHook() {
		// Runtime.getRuntime().addShutdownHook(new Thread(Config::save));
	}

	/**
	 * Display current time
	 */
	private static void displayTime() {
		Calendar calendar = Calendar.getInstance();
		System.out.println(calendar.get(Calendar.HOUR_OF_DAY) + ":" + calendar.get(Calendar.MINUTE) + ":" + calendar
				.get(Calendar.SECOND));
	}

	/**
	 * Make the program sleep between two executions
	 */
	private static void sleep() {
		try {
			String refreshScale = Config.getPropertyValue(Key.REFRESH_SCALE);
			String refreshDuration = Config.getPropertyValue(Key.REFRESH_DURATION);

			TimeUnit.valueOf(refreshScale).sleep(Long.parseLong(refreshDuration));
		} catch (InterruptedException e) {
			Util.exit(e);
		}
	}
}
