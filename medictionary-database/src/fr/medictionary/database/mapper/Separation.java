package fr.medictionary.database.mapper;

public enum Separation {
	SPACE(" "), //
	DOUBLE_SPACE("  "), //
	TAB("\\t");

	private String value;

	Separation(String value) {
		this.value = value;
	}

	public String getValue() {
		return value;
	}
}
