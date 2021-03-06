package fr.epsi.i5.medictionary.back.appli.ws;

import com.thomaskint.minidao.enumeration.MDConditionLink;
import com.thomaskint.minidao.enumeration.MDConditionOperator;
import com.thomaskint.minidao.exception.MDException;
import com.thomaskint.minidao.querybuilder.MDCondition;
import fr.epsi.i5.medictionary.back.appli.MedictionaryBackAppli;
import fr.epsi.i5.medictionary.back.appli.model.Allergy;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Objects;

@RestController
public class AllergyWS {

	@GetMapping("/allergy")
	public List<Allergy> getAllergys() throws MDException {
		return MedictionaryBackAppli.miniDAO.read().getEntities(Allergy.class);
	}

	@GetMapping("/allergy/{id}")
	public Allergy getAllergy(@PathVariable(name = "id") int id) throws MDException {
		return MedictionaryBackAppli.miniDAO.read().getEntityById(Allergy.class, id);
	}

	@GetMapping("/allergy/user/{id}")
	public List<Allergy> getAllergiesByUserId(@PathVariable(name = "id") int id) throws MDException {
		MDCondition condition = new MDCondition("id_user", MDConditionOperator.EQUAL, id);
		return MedictionaryBackAppli.miniDAO.read().getEntities(Allergy.class, condition);
	}

	@PutMapping("/allergy/user/{id}")
	public void updateAllergiesByUser(@RequestBody List<Allergy> updatingAllergies, @PathVariable(name = "id") int idUser) throws MDException {
		MDCondition idUserCondition;
		MDCondition condition;
		List<Allergy> allergies;
		for (Allergy allergy : updatingAllergies) {
			idUserCondition = new MDCondition("id_user", MDConditionOperator.EQUAL, idUser);
			condition = new MDCondition("id_drug", MDConditionOperator.EQUAL, allergy.idDrug, MDConditionLink.AND, idUserCondition);
			allergies = MedictionaryBackAppli.miniDAO.read().getEntities(Allergy.class, condition);
			if (allergies.isEmpty() && allergy.valid) {
				MedictionaryBackAppli.miniDAO.create().createEntity(allergy);
			} else {
				for (Allergy a : allergies) {
					if (Objects.equals(a.idUser, allergy.idUser) && a.idDrug.equals(allergy.idDrug) && !allergy.valid) {
						MedictionaryBackAppli.miniDAO.delete().deleteEntity(a);
					}
				}
			}
		}
	}

	@PostMapping("/allergy")
	public Allergy createAllergy(@RequestBody Allergy allergy) throws MDException {
		if (MedictionaryBackAppli.miniDAO.create().createEntity(allergy)) {
			return allergy;
		}
		return null;
	}

	@PutMapping("/allergy")
	public Allergy updateAllergy(@RequestBody Allergy allergy) throws MDException {
		if (MedictionaryBackAppli.miniDAO.update().updateEntity(allergy)) {
			return allergy;
		}
		return null;
	}

	@DeleteMapping("/allergy")
	public boolean deleteAllergy(@RequestBody Allergy allergy) throws MDException {
		return MedictionaryBackAppli.miniDAO.delete().deleteEntity(allergy);
	}

	@DeleteMapping("/allergy/{id}")
	public boolean deleteAllergyById(@PathVariable("id") int id) throws MDException {
		return MedictionaryBackAppli.miniDAO.delete().deleteEntityById(Allergy.class, id);
	}
}
