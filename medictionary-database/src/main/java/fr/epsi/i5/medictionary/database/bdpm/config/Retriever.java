package fr.epsi.i5.medictionary.database.bdpm.config;

import fr.epsi.i5.medictionary.database.utils.Util;

import java.io.BufferedReader;
import java.io.File;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.URL;
import java.nio.charset.StandardCharsets;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;

/**
 *
 */
public class Retriever {

	private static String tmpDirectory = Config.getPropertyValue(Key.FILE_DIRECTORY);

	private static String baseUrl = Config.getPropertyValue(Key.BASE_URL);

	public static void retrieveFiles() {
		Key[] keys = {Key.FILE_SPECIALITE, Key.FILE_PRESENTATION, Key.FILE_COMPOSITION, Key.FILE_CONDITION_PRESCRIPTION_DELIVRANCE, Key.FILE_GROUPE_GENERIQUE,
				Key.FILE_AVIS_ASMR, Key.FILE_AVIS_SMR, Key.FILE_INFORMATION_IMPORTANTE,
				Key.FILE_AVIS_COMMISSION};

		for (Key key : keys) {
			retrieveFile(key);
		}
	}

	/**
	 * Retrieve file from source if not present in the temp directory or if first day of month
	 *
	 * @param key Key
	 */
	public static void retrieveFile(Key key) {
		// Getting calendar instance
		Calendar calendar = Calendar.getInstance();
		// Preparing file
		File file = new File(Config.getFilePath(key));
		// If file does not exists or first day of month
		if (!file.exists() || calendar.get(Calendar.DAY_OF_MONTH) == 1) {
			// Getting filename without path
			String filename = Config.getPropertyValue(key);
			URL url;
			try {
				// Getting URL
				url = new URL(baseUrl + filename);

				// Creating directories to temp directory
				Files.createDirectories(Paths.get(tmpDirectory));

				// Getting filepath including tem directory and filename
				String filepath = Config.getFilePath(key);

				// Preparing buffered reader
				BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(url.openStream(), StandardCharsets.ISO_8859_1));

				// Preparing list of lines
				List<String> fileContent = new ArrayList<>();

				// For each not empty line, add it to the list of lines
				String line;
				while ((line = bufferedReader.readLine()) != null) {
					if (!line.equals("")) {
						fileContent.add(line);
					}
				}

				// Writing file based on its path and list of lines
				Files.write(Paths.get(filepath), fileContent, StandardCharsets.UTF_8);
			} catch (IOException e) {
				Util.exit(e);
			}
		}
	}
}
