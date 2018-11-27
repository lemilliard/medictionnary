package fr.epsi.i5.medictionary.database.bdpm.config;

import java.util.concurrent.TimeUnit;

/**
 * Enumerate every Keys in the Config file
 */
public enum Key {
	REFRESH_SCALE(TimeUnit.HOURS.toString(), TimeUnit.SECONDS.toString()), //
	REFRESH_DURATION,
	BASE_URL,
	FILE_DIRECTORY,
	FILE_SPECIALITE,
	FILE_PRESENTATION,
	FILE_COMPOSITION,
	FILE_AVIS_SMR,
	FILE_AVIS_ASMR,
	FILE_AVIS_COMMISSION,
	FILE_GROUPE_GENERIQUE,
	FILE_CONDITION_PRESCRIPTION_DELIVRANCE,
	FILE_INFORMATION_IMPORTANTE;

	private String[] values;

	Key(String... values) {
		this.values = values;
	}

	/**
	 * Verify if the given value is valid
	 *
	 * @param value String
	 * @return true if the value is valid
	 */
	public boolean isValueValid(String value) {
		boolean valid = (values.length == 0);
		int i = 0;
		while (i < values.length && !valid) {
			if (values[i].equals(value)) {
				valid = true;
			}
			i++;
		}
		return valid;
	}
}
