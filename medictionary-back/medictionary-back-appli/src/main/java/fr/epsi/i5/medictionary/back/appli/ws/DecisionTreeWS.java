package fr.epsi.i5.medictionary.back.appli.ws;

import com.thomaskint.minidao.enumeration.MDConditionOperator;
import com.thomaskint.minidao.exception.MDException;
import com.thomaskint.minidao.querybuilder.MDCondition;
import fr.epsi.i5.medictionary.back.appli.MedictionaryBackAppli;
import fr.epsi.i5.medictionary.back.appli.decisionTree.Decision;
import fr.epsi.i5.medictionary.back.appli.model.Allergy;
import fr.epsi.i5.medictionary.back.appli.model.DecisionTreeParam;
import fr.epsi.i5.medictionary.back.appli.model.Drug;
import org.springframework.web.bind.annotation.*;
import sun.applet.Main;

import java.util.*;

@RestController
public class DecisionTreeWS {

	@PostMapping("/decision")
	public Set<Drug> callDecisionTree(@RequestBody DecisionTreeParam param) throws MDException {
		MDCondition allergyCondition = new MDCondition("id_user", MDConditionOperator.EQUAL, param.idUser);
		List<Allergy> allergies = MedictionaryBackAppli.miniDAO.read().getEntities(Allergy.class, allergyCondition);

		Stack<String> molecules = Decision.decide(allergies, param.symptoms);

		MDCondition drugCondition;
		Set<Drug> drugs = new HashSet<>();
		for (String molecule : molecules) {
			drugCondition = new MDCondition("molecule", MDConditionOperator.EQUAL, molecule);
			drugs.add(MedictionaryBackAppli.miniDAO.read().getEntityByCondition(Drug.class, drugCondition));
		}
		return drugs;
	}
}
