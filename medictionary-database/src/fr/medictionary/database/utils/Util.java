package fr.medictionary.database.utils;

public class Util {

	public static void exit(Exception exception) {
		exception.printStackTrace();
		System.exit(1);
	}
}
