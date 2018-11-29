package fr.epsi.i5.medictionary.back.appli.ws;

import com.thomaskint.minidao.enumeration.MDConditionOperator;
import com.thomaskint.minidao.exception.MDException;
import com.thomaskint.minidao.querybuilder.MDCondition;
import fr.epsi.i5.medictionary.back.appli.MedictionaryBackAppli;
import fr.epsi.i5.medictionary.back.appli.model.SymptomZone;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class SymptomZoneWS {

	@GetMapping("/symptomZone")
	public List<SymptomZone> getSymptomZones() throws MDException {
		return MedictionaryBackAppli.miniDAO.read().getEntities(SymptomZone.class);
	}

	@GetMapping("/symptomZone/{id}")
	public SymptomZone getSymptomZone(@PathVariable(name = "id") int id) throws MDException {
		return MedictionaryBackAppli.miniDAO.read().getEntityById(SymptomZone.class, id);
	}

	@GetMapping("/symptomZone/{zone}")
	public SymptomZone getSymptomZoneByName(@PathVariable(name = "zone") String zone) throws MDException {
                MDCondition zoneCondition = new MDCondition("zone", MDConditionOperator.EQUAL, zone);
		return MedictionaryBackAppli.miniDAO.read().getEntityByCondition(SymptomZone.class, zoneCondition);
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
