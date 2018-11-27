package fr.epsi.i5.medictionary.database.bdpm.config;

import fr.epsi.i5.medictionary.database.mapper.Mapper;
import fr.epsi.i5.medictionary.database.utils.Util;
import fr.epsi.i5.medictionary.database.mapper.Separation;

import javax.management.InvalidAttributeValueException;
import javax.naming.directory.InvalidAttributeIdentifierException;
import java.io.File;
import java.nio.charset.StandardCharsets;
import java.nio.file.Files;
import java.util.List;

public class Config {

	private static boolean initialized = false;

	private static final String COMMENT_MARK = "//";

	private static String filename;

	private static Separation separation;

	private static List<Property> properties;

	/**
	 * Initialize Config class
	 *
	 * @param filename   {@link String}
	 * @param separation {@link Separation}
	 */
	public static void init(String filename, Separation separation) {
		Config.filename = filename;
		Config.separation = separation;

		properties = Mapper.map(Property.class, filename, separation);

		initialized = true;
	}

	public static boolean isInitialized() {
		return initialized;
	}

	private static void verifyInitialization() {
		if (!initialized) {
			Util.exit(new Exception("You must call initialize the Config object before getting any property"));
		}
	}

	/**
	 * Return every properties
	 * @return List
	 * @throws Exception Exception
	 */
	public static List<Property> getProperties() throws Exception {
		verifyInitialization();
		return properties;
	}

	/**
	 * Get property value by key
	 *
	 * @param key {@link Key}
	 * @return String
	 */
	public static String getPropertyValue(Key key) {
		verifyInitialization();
		Property property = getProperty(key);
		if (!key.isValueValid(property.getValue())) {
			Util.exit(new InvalidAttributeValueException("The key doesn't accept this value"));
		}
		return getProperty(key).getValue();
	}

	/**
	 * Get property by key
	 *
	 * @param key {@link Key}
	 * @return Property
	 */
	private static Property getProperty(Key key) {
		verifyInitialization();
		Property property = null;
		int i = 0;
		while (i < properties.size() && property == null) {
			if (properties.get(i).getKey().equals(key.toString())) {
				property = properties.get(i);
			}
			i++;
		}
		if (property == null) {
			Util.exit(new InvalidAttributeIdentifierException("The key " + key + " does not match any property"));
		}
		return property;
	}

	/**
	 * Update property by key
	 *
	 * @param key   {@link Key}
	 * @param value {@link String}
	 */
	public static void updateProperty(Key key, String value) {
		verifyInitialization();
		try {
			if (key.isValueValid(value)) {
				getProperty(key).setValue(value);
			}
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	/**
	 * Save properties in the config file
	 */
	public static void save() {
		File file = new File(filename);
		try {
			// Getting lines from config file
			List<String> fileContent = Mapper.getFileLines(filename, true);

			// For each property
			for (Property property : properties) {
				boolean saved = false;
				int i = 0;
				// For each line in file
				while (i < fileContent.size() && !saved) {
					// Getting line
					String line = fileContent.get(i);
					// If line is not empty nor comment
					if (!line.equals("") && !line.substring(0, 2).equals(COMMENT_MARK)) {
						// Split line
						String[] lineContent = line.split(separation.getValue());
						// If we are on  the current property and it has been changed
						if (lineContent[0].equals(property.getKey()) && !lineContent[1].equals(property.getValue())) {
							// Save it
							fileContent.set(i, property.getKey() + separation.getValue() + property.getValue());
							saved = true;
						}
					}
					i++;
				}
			}
			// Save changes on the config file
			Files.write(file.toPath(), fileContent, StandardCharsets.UTF_8);
		} catch (Exception e) {
			Util.exit(e);
		}
	}

	public static String getFilePath(Key key) {
		return getPropertyValue(Key.FILE_DIRECTORY) + "/" + getPropertyValue(key);
	}
}
