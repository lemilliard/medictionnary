package fr.epsi.i5.medictionary.utils;

public class Util {

	public static void exit(Exception exception) {
		exception.printStackTrace();
		System.exit(1);
	}
}
