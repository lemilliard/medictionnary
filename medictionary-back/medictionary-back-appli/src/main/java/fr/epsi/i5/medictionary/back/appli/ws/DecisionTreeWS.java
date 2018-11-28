package fr.epsi.i5.medictionary.back.appli.ws;

import fr.epsi.i5.medictionary.back.appli.decisionTree.Decision;
import fr.epsi.i5.medictionary.back.appli.Main;
import fr.epsi.i5.medictionary.back.appli.model.Symptom;
import fr.epsi.i5.medictionary.back.appli.model.Allergy;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class DecisionTreeWS {

	@PostMapping("/decision")
	public Symptom callDecisionTree(@RequestBody List<Allergy> symptom) {
		return Decision.decide();
	}
}
