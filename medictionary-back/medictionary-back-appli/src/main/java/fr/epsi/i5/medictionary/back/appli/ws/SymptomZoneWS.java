package fr.epsi.i5.medictionary.back.appli.ws;

import com.thomaskint.minidao.enumeration.MDConditionOperator;
import com.thomaskint.minidao.exception.MDException;
import com.thomaskint.minidao.querybuilder.MDCondition;
import com.thomaskint.minidao.querybuilder.MDSelectBuilder;
import fr.epsi.i5.medictionary.back.appli.MedictionaryBackAppli;
import fr.epsi.i5.medictionary.back.appli.model.Symptom;
import fr.epsi.i5.medictionary.back.appli.model.SymptomZone;
import org.springframework.web.bind.annotation.*;

import java.sql.ResultSet;
import java.util.List;

@RestController
public class SymptomZoneWS {

	@GetMapping("/symptomZone")
	public List<SymptomZone> getSymptomZones() throws MDException {
		return MedictionaryBackAppli.miniDAO.read().getEntities(SymptomZone.class);
	}

	@GetMapping("/symptomZone/{zone}")
	public List<SymptomZone> getSymptomZoneByName(@PathVariable(name = "zone") String zone) throws MDException {
		MDSelectBuilder selectBuilder = new MDSelectBuilder();
		selectBuilder.from(SymptomZone.class);
		selectBuilder.where("name_zone", MDConditionOperator.EQUAL, zone);

		String query = selectBuilder.build();
		ResultSet resultSet = MedictionaryBackAppli.miniDAO.executeQuery(query);

		return MedictionaryBackAppli.miniDAO.mapResultSetToEntities(resultSet, SymptomZone.class);
	}

	@PostMapping("/symptomZone")
	public SymptomZone createSymptomZone(@RequestBody SymptomZone symptomZone) throws MDException {
		if (MedictionaryBackAppli.miniDAO.create().createEntity(symptomZone)) {
			return symptomZone;
		}
		return null;
	}

	@PutMapping("/symptomZone")
	public SymptomZone updateSymptomZone(@RequestBody SymptomZone symptomZone) throws MDException {
		if (MedictionaryBackAppli.miniDAO.update().updateEntity(symptomZone)) {
			return symptomZone;
		}
		return null;
	}

	@DeleteMapping("/symptomZone")
	public boolean deleteSymptomZone(@RequestBody SymptomZone symptomZone) throws MDException {
		return MedictionaryBackAppli.miniDAO.delete().deleteEntity(symptomZone);
	}

	@DeleteMapping("/symptomZone/{id}")
	public boolean deleteSymptomZoneById(@PathVariable("id") int id) throws MDException {
		return MedictionaryBackAppli.miniDAO.delete().deleteEntityById(SymptomZone.class, id);
	}
}
