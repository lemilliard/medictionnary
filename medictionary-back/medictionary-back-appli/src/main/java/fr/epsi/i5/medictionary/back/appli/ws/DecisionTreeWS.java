package fr.epsi.i5.medictionary.back.appli.ws;

import com.thomaskint.minidao.enumeration.MDConditionOperator;
import com.thomaskint.minidao.exception.MDException;
import com.thomaskint.minidao.querybuilder.MDCondition;
import fr.epsi.i5.medictionary.back.appli.Main;
import fr.epsi.i5.medictionary.back.appli.decisionTree.Decision;
import fr.epsi.i5.medictionary.back.appli.model.Allergy;
import fr.epsi.i5.medictionary.back.appli.model.DecisionTreeParam;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Stack;

@RestController
public class DecisionTreeWS {

	@PostMapping("/decision")
	public Stack<String> callDecisionTree(@RequestBody DecisionTreeParam param) throws MDException {
		MDCondition allergyCondition = new MDCondition("id_user", MDConditionOperator.EQUAL, param.idUser);
		List<Allergy> allergies = Main.miniDAO.read().getEntities(Allergy.class, allergyCondition);

		return Decision.decide(allergies, param.symptoms);
	}
}
