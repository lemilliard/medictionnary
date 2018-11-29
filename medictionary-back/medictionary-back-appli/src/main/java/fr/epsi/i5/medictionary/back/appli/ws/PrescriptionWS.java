package fr.epsi.i5.medictionary.back.appli.ws;

import com.thomaskint.minidao.enumeration.MDConditionOperator;
import com.thomaskint.minidao.exception.MDException;
import com.thomaskint.minidao.querybuilder.MDCondition;
import fr.epsi.i5.medictionary.back.appli.MedictionaryBackAppli;
import fr.epsi.i5.medictionary.back.appli.model.Prescription;
import fr.epsi.i5.medictionary.back.appli.model.DrugPrescription;
import fr.epsi.i5.medictionary.back.appli.model.Drug;
import fr.epsi.i5.medictionary.back.appli.model.PrescriptionParam;

import java.util.ArrayList;

import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class PrescriptionWS {

	@GetMapping("/prescription/{id}")
	public Prescription getPrescription(@PathVariable(name = "id") int id) throws MDException {
		return MedictionaryBackAppli.miniDAO.read().getEntityById(Prescription.class, id);
	}

	@GetMapping("/prescriptionByUser/{id}")
	public List<Prescription> getPrescriptionByUser(@PathVariable(name = "id") int id) throws MDException {
		MDCondition mdCondition = new MDCondition("id_user", MDConditionOperator.EQUAL, id);
		return MedictionaryBackAppli.miniDAO.read().getEntities(Prescription.class, mdCondition);
	}

	@GetMapping("/drugPrescriptionsByUser/{id}")
	public List<DrugPrescription> getDrugPrescriptionsByUser(@PathVariable(name = "id") int id) throws MDException {
		MDCondition conditionPrescription = new MDCondition("id_user", MDConditionOperator.EQUAL, id);
		List<Prescription> prescriptions = MedictionaryBackAppli.miniDAO.read().getEntities(Prescription.class, conditionPrescription);
		List<DrugPrescription> drugPrescriptions = new ArrayList<>();
		for (Prescription p : prescriptions) {
			MDCondition conditionDrugP = new MDCondition("id_prescription", MDConditionOperator.EQUAL, p.idPrescription);
			drugPrescriptions.addAll(MedictionaryBackAppli.miniDAO.read().getEntities(DrugPrescription.class, conditionDrugP));
		}
		return drugPrescriptions;
	}

	@PostMapping("/prescription")
	public Prescription createPrescription(@RequestBody PrescriptionParam prescriptionParam) throws MDException {
		Prescription prescription = new Prescription();
		prescription.idUser = prescriptionParam.idUser;
		if (MedictionaryBackAppli.miniDAO.create().createEntity(prescription)) {
			for (Drug drug : prescriptionParam.drugs) {
				DrugPrescription drugPrescription = new DrugPrescription();
				drugPrescription.idDrug = drug.idDrug;
				drugPrescription.idPrescription = prescription.idPrescription;
				MedictionaryBackAppli.miniDAO.create().createEntity(drugPrescription);
			}
			return prescription;
		}
		return null;
	}
}
