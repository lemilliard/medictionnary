package fr.epsi.i5.medictionary.database.bdpm;

import fr.epsi.i5.medictionary.database.bdpm.config.Key;
import fr.epsi.i5.medictionary.database.bdpm.object.*;
import fr.epsi.i5.medictionary.database.bdpm.config.Config;
import fr.epsi.i5.medictionary.database.bdpm.config.Retriever;
import fr.epsi.i5.medictionary.database.mapper.Mapper;
import fr.epsi.i5.medictionary.database.mapper.Separation;

import java.util.List;

/**
 * Created by tkint on 12/01/2018.
 */
public class BDPMFactory {

	private static final Separation separation = Separation.TAB;

	public static List<Specialite> getSpecialites() {
		return getEntities(Key.FILE_SPECIALITE, Specialite.class);
	}

	public static List<Presentation> getPresentations() {
		return getEntities(Key.FILE_PRESENTATION, Presentation.class);
	}

	public static List<Composition> getCompositions() {
		return getEntities(Key.FILE_COMPOSITION, Composition.class);
	}

	public static List<AvisSMR> getAvisSMRs() {
		return getEntities(Key.FILE_AVIS_SMR, AvisSMR.class);
	}

	public static List<AvisASMR> getAvisASMRs() {
		return getEntities(Key.FILE_AVIS_ASMR, AvisASMR.class);
	}

	public static List<AvisCommission> getAvisCommissions() {
		return getEntities(Key.FILE_AVIS_COMMISSION, AvisCommission.class);
	}

	public static List<GroupeGenerique> getGroupeGeneriques() {
		return getEntities(Key.FILE_GROUPE_GENERIQUE, GroupeGenerique.class);
	}

	public static List<ConditionPrescriptionDelivrance> getConditionPrescriptionDelivrances() {
		return getEntities(Key.FILE_CONDITION_PRESCRIPTION_DELIVRANCE, ConditionPrescriptionDelivrance.class);
	}

	public static List<InformationImportante> getInformationImportantes() {
		return getEntities(Key.FILE_INFORMATION_IMPORTANTE, InformationImportante.class);
	}

	private static <T> List<T> getEntities(Key key, Class<T> entityClass) {
		Retriever.retrieveFile(key);

		return Mapper.map(entityClass, Config.getFilePath(key), separation);
	}
}
