package fr.epsi.i5.medictionary.back.appli.ws;

import com.thomaskint.minidao.exception.MDException;
import fr.epsi.i5.medictionary.back.appli.Main;
import fr.epsi.i5.medictionary.back.appli.model.Drug;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class DrugWS {

	@GetMapping("/drug")
	public List<Drug> getDrugs() throws MDException {
		return Main.miniDAO.read().getEntities(Drug.class);
	}

	@GetMapping("/drug/{id}")
	public Drug getDrug(@PathVariable(name = "id") int id) throws MDException {
		return Main.miniDAO.read().getEntityById(Drug.class, id);
	}

	@PostMapping("/drug")
	public Drug createDrug(@RequestBody Drug drug) throws MDException {
		if (Main.miniDAO.create().createEntity(drug)) {
			return drug;
		}
		return null;
	}

	@PutMapping("/drug")
	public Drug updateDrug(@RequestBody Drug drug) throws MDException {
		if (Main.miniDAO.update().updateEntity(drug)) {
			return drug;
		}
		return null;
	}

	@DeleteMapping("/drug")
	public boolean deleteDrug(@RequestBody Drug drug) throws MDException {
		return Main.miniDAO.delete().deleteEntity(drug);
	}

	@DeleteMapping("/drug/{id}")
	public boolean deleteDrugById(@PathVariable("id") int id) throws MDException {
		return Main.miniDAO.delete().deleteEntityById(Drug.class, id);
	}
}
