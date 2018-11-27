package fr.epsi.i5.medictionary.mapper;

import fr.epsi.i5.medictionary.utils.Util;

import java.io.IOException;
import java.lang.reflect.Field;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.util.List;

/**
 * Mapper
 * Used to map a file into objects.
 * The objects must have enough public fields to retrieve the data coming from the file.
 * The Mapper is based on a {@link Separation}. It considers every String separated by the
 * Separation as a field.
 * If the fields are not public, they are going to be invisible for the Mapper and it will not
 * work properly considering its use of reflexivity
 */
public class Mapper {

	/**
	 * Map a file into objects of specified class
	 *
	 * @param entityClass {@link Class} Class to work with
	 * @param filename    {@link String} Filename from which data comes
	 * @param separation  {@link Separation} Fields separation
	 * @param <T>         Entity to work with
	 * @return List {@link List} List of the specified class
	 */
	public static <T> List<T> map(Class<T> entityClass, String filename, Separation separation) {
		// Preparing list
		List<T> list = new ArrayList<>();

		// For each line of file
		for (String[] stringArray : getFileContent(filename, separation)) {
			// Add parsed object to the list
			list.add(parseStringArrayToObject(entityClass, stringArray));
		}

		return list;
	}

	/**
	 * Parse string array into an object of the specified class
	 *
	 * @param entityClass {@link Class} Class to work with
	 * @param stringArray {@link String} String array to parse to object
	 * @param <T>         Entity to work with
	 * @return <T> Object of the specified class
	 */
	private static <T> T parseStringArrayToObject(Class<T> entityClass, String[] stringArray) {
		// Preparing object
		T object = null;
		try {
			// Instanciating object
			object = entityClass.newInstance();

			// Getting fields
			Field[] fields = entityClass.getFields();

			// If number of fields does not match the size of string array, stop the parser
			if (fields.length < stringArray.length) {
				StringBuilder stringBuilder = new StringBuilder("La taille des données (") //
						.append(stringArray.length) //
						.append(") ne correspond pas avec celle (") //
						.append(fields.length) //
						.append(") de l'objet de type ") //
						.append(entityClass.getCanonicalName()) //
						.append("\n") //
						.append("Ligne concernée: ");
				for (String s : stringArray) {
					stringBuilder.append("  ").append(s);
				}
				// Exit program
				Util.exit(new ArrayIndexOutOfBoundsException(stringBuilder.toString()));
			}

			// For each field
			for (int i = 0; i < stringArray.length; i++) {
				// Set field with string array value mapping same index
				fields[i].set(object, stringArray[i]);
			}
		} catch (Exception e) {
			e.printStackTrace();
		}

		return object;
	}

	/**
	 * Return file content as an array of string arrays.
	 * Each string array corresponding to a line
	 *
	 * @param fileName   {@link String} Filename from which data comes
	 * @param separation {@link Separation} Fields separation
	 * @return String[][] {@link String} String array of lines
	 */
	private static String[][] getFileContent(String fileName, Separation separation) {
		List<String[]> data = new ArrayList<>();

		for (String line : getFileLines(fileName, false)) {
			String[] lineValues = line.split(separation.getValue());

			data.add(lineValues);
		}

		return data.toArray(new String[data.size()][]);
	}

	/**
	 * Retrieve lines of the given filename
	 *
	 * @param fileName {@link String} Filename from which data comes
	 * @param complete boolean If true, get even empty lines
	 * @return fileLines {@link List} Lines of file
	 */
	public static List<String> getFileLines(String fileName, boolean complete) {
		List<String> fileLines = new ArrayList<>();
		try {
			for (String line : Files.readAllLines(Paths.get(fileName))) {
				if (complete || !line.equals("")) {
					fileLines.add(line);
				}
			}
		} catch (IOException e) {
			Util.exit(e);
		}
		return fileLines;
	}
}
