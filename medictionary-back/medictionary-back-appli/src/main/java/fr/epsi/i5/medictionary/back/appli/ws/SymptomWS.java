package fr.epsi.i5.medictionary.back.appli.ws;

import com.thomaskint.minidao.exception.MDException;
import fr.epsi.i5.medictionary.back.appli.Main;
import fr.epsi.i5.medictionary.back.appli.model.Symptom;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class SymptomWS {

	@GetMapping("/symptom")
	public List<Symptom> getSymptoms() throws MDException {
		return Main.miniDAO.read().getEntities(Symptom.class);
	}

	@GetMapping("/symptom/{id}")
	public Symptom getSymptom(@PathVariable(name = "id") int id) throws MDException {
		return Main.miniDAO.read().getEntityById(Symptom.class, id);
	}

	@PostMapping("/symptom")
	public Symptom createSymptom(@RequestBody Symptom symptom) throws MDException {
		if (Main.miniDAO.create().createEntity(symptom)) {
			return symptom;
		}
		return null;
	}

	@PutMapping("/symptom")
	public Symptom updateSymptom(@RequestBody Symptom symptom) throws MDException {
		if (Main.miniDAO.update().updateEntity(symptom)) {
			return symptom;
		}
		return null;
	}

	@DeleteMapping("/symptom")
	public boolean deleteSymptom(@RequestBody Symptom symptom) throws MDException {
		return Main.miniDAO.delete().deleteEntity(symptom);
	}

	@DeleteMapping("/symptom/{id}")
	public boolean deleteSymptomById(@PathVariable("id") int id) throws MDException {
		return Main.miniDAO.delete().deleteEntityById(Symptom.class, id);
	}
}
