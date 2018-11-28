package fr.epsi.i5.medictionary.back.appli.ws;

import com.thomaskint.minidao.exception.MDException;
import fr.epsi.i5.medictionary.back.appli.Main;
import fr.epsi.i5.medictionary.back.appli.model.SymptomZone;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class SymptomZoneWS {

	@GetMapping("/symptomZone")
	public List<SymptomZone> getSymptomZones() throws MDException {
		return Main.miniDAO.read().getEntities(SymptomZone.class);
	}

	@GetMapping("/symptomZone/{id}")
	public SymptomZone getSymptomZone(@PathVariable(name = "id") int id) throws MDException {
		return Main.miniDAO.read().getEntityById(SymptomZone.class, id);
	}

	@PostMapping("/symptomZone")
	public SymptomZone createSymptomZone(@RequestBody SymptomZone symptomZone) throws MDException {
		if (Main.miniDAO.create().createEntity(symptomZone)) {
			return symptomZone;
		}
		return null;
	}

	@PutMapping("/symptomZone")
	public SymptomZone updateSymptomZone(@RequestBody SymptomZone symptomZone) throws MDException {
		if (Main.miniDAO.update().updateEntity(symptomZone)) {
			return symptomZone;
		}
		return null;
	}

	@DeleteMapping("/symptomZone")
	public boolean deleteSymptomZone(@RequestBody SymptomZone symptomZone) throws MDException {
		return Main.miniDAO.delete().deleteEntity(symptomZone);
	}

	@DeleteMapping("/symptomZone/{id}")
	public boolean deleteSymptomZoneById(@PathVariable("id") int id) throws MDException {
		return Main.miniDAO.delete().deleteEntityById(SymptomZone.class, id);
	}
}
