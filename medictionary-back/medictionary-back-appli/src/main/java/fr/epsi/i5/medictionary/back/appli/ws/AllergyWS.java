package fr.epsi.i5.medictionary.back.appli.ws;

import com.thomaskint.minidao.exception.MDException;
import fr.epsi.i5.medictionary.back.appli.Main;
import fr.epsi.i5.medictionary.back.appli.model.Allergy;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class AllergyWS {

	@GetMapping("/allergy")
	public List<Allergy> getAllergys() throws MDException {
		return Main.miniDAO.read().getEntities(Allergy.class);
	}

	@GetMapping("/allergy/{id}")
	public Allergy getAllergy(@PathVariable(name = "id") int id) throws MDException {
		return Main.miniDAO.read().getEntityById(Allergy.class, id);
	}

	@PostMapping("/allergy")
	public Allergy createAllergy(@RequestBody Allergy allergy) throws MDException {
		if (Main.miniDAO.create().createEntity(allergy)) {
			return allergy;
		}
		return null;
	}

	@PutMapping("/allergy")
	public Allergy updateAllergy(@RequestBody Allergy allergy) throws MDException {
		if (Main.miniDAO.update().updateEntity(allergy)) {
			return allergy;
		}
		return null;
	}

	@DeleteMapping("/allergy")
	public boolean deleteAllergy(@RequestBody Allergy allergy) throws MDException {
		return Main.miniDAO.delete().deleteEntity(allergy);
	}

	@DeleteMapping("/allergy/{id}")
	public boolean deleteAllergyById(@PathVariable("id") int id) throws MDException {
		return Main.miniDAO.delete().deleteEntityById(Allergy.class, id);
	}
}
