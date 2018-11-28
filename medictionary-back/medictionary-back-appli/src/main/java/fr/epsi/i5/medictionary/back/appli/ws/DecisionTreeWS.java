package fr.epsi.i5.medictionary.back.appli.ws;

import fr.epsi.i5.medictionary.back.appli.decisionTree.Decision;
import fr.epsi.i5.medictionary.back.appli.Main;
import fr.epsi.i5.medictionary.back.appli.model.Symptom;
import fr.epsi.i5.medictionary.back.appli.model.Allergy;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Stack;

@RestController
public class DecisionTreeWS {

	@PostMapping("/decision")
	public Stack<String> callDecisionTree(@RequestBody List<Symptom> symptoms, Allergy allergy) {
		return Decision.decide(allergy, symptoms);
	}
}
