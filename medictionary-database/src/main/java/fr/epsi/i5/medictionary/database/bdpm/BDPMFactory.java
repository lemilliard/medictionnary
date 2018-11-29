package fr.epsi.i5.medictionary.database.bdpm;

import com.lemilliard.filemapper.FMSeparation;
import com.lemilliard.filemapper.FileMapper;
import fr.epsi.i5.medictionary.database.bdpm.config.Key;
import fr.epsi.i5.medictionary.database.bdpm.object.*;
import fr.epsi.i5.medictionary.database.bdpm.config.Config;
import fr.epsi.i5.medictionary.database.bdpm.config.Retriever;

import java.io.IOException;
import java.util.List;

/**
 * Created by tkint on 12/01/2018.
 */
public class BDPMFactory {

	private static final FMSeparation separation = FMSeparation.TAB;

	public static List<Specialite> getSpecialites() throws Exception {
		return getEntities(Key.FILE_SPECIALITE, Specialite.class);
	}

	public static List<Presentation> getPresentations() throws Exception {
		return getEntities(Key.FILE_PRESENTATION, Presentation.class);
	}

	public static List<Composition> getCompositions() throws Exception {
		return getEntities(Key.FILE_COMPOSITION, Composition.class);
	}

	public static List<AvisSMR> getAvisSMRs() throws Exception {
		return getEntities(Key.FILE_AVIS_SMR, AvisSMR.class);
	}

	public static List<AvisASMR> getAvisASMRs() throws Exception {
		return getEntities(Key.FILE_AVIS_ASMR, AvisASMR.class);
	}

	public static List<AvisCommission> getAvisCommissions() throws Exception {
		return getEntities(Key.FILE_AVIS_COMMISSION, AvisCommission.class);
	}

	public static List<GroupeGenerique> getGroupeGeneriques() throws Exception {
		return getEntities(Key.FILE_GROUPE_GENERIQUE, GroupeGenerique.class);
	}

	public static List<ConditionPrescriptionDelivrance> getConditionPrescriptionDelivrances() throws Exception {
		return getEntities(Key.FILE_CONDITION_PRESCRIPTION_DELIVRANCE, ConditionPrescriptionDelivrance.class);
	}

	public static List<InformationImportante> getInformationImportantes() throws Exception {
		return getEntities(Key.FILE_INFORMATION_IMPORTANTE, InformationImportante.class);
	}

	private static <T> List<T> getEntities(Key key, Class<T> entityClass) throws Exception {
		Retriever.retrieveFile(key);

		return FileMapper.map(entityClass, Config.getFilePath(key), separation);
	}
}
