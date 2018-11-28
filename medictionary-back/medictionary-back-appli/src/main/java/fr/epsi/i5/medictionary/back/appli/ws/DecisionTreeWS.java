package fr.epsi.i5.medictionary.back.appli.ws;

import fr.epsi.i5.medictionary.back.appli.decisionTree.Decision;
import fr.epsi.i5.medictionary.back.appli.model.DecisionTreeParam;
import org.springframework.web.bind.annotation.*;

import java.util.Stack;

@RestController
public class DecisionTreeWS {

	@PostMapping("/decision")
	public Stack<String> callDecisionTree(@RequestBody DecisionTreeParam param) {
		return Decision.decide(param.allergy, param.symptoms);
	}
}
