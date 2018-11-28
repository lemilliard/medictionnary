package fr.epsi.i5.medictionary.back.appli.ws;

import com.thomaskint.minidao.enumeration.MDConditionLink;
import com.thomaskint.minidao.enumeration.MDConditionOperator;
import com.thomaskint.minidao.exception.MDException;
import com.thomaskint.minidao.querybuilder.MDCondition;
import fr.epsi.i5.medictionary.back.appli.Main;
import fr.epsi.i5.medictionary.back.appli.model.User;
import org.springframework.web.bind.annotation.*;

import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServletResponse;
import java.util.List;

@RestController
public class UserWS {

	@GetMapping("/user")
	public List<User> getUsers(HttpServletResponse response) throws MDException {
		response.addCookie(new Cookie("test", "YO"));
		return Main.miniDAO.read().getEntities(User.class);
	}

	@GetMapping("/user/{id}")
	public User getUser(@PathVariable(name = "id") int id) throws MDException {
		return Main.miniDAO.read().getEntityById(User.class, id);
	}

	@PostMapping("/user")
	public User createUser(@RequestBody User user, HttpServletResponse response) throws MDException {
		if (Main.miniDAO.create().createEntity(user) && user.idUser != null) {
			Cookie cookie = new Cookie("idUser", user.idUser.toString());
			cookie.setDomain("eportfolio.cgonline.fr");
			cookie.setPath("Medictionary");
			cookie.setHttpOnly(false);
			cookie.setSecure(false);
			response.addCookie(cookie);
			return user;
		}
		return null;
	}

	@PutMapping("/user")
	public User updateUser(@RequestBody User user) throws MDException {
		if (Main.miniDAO.update().updateEntity(user)) {
			return user;
		}
		return null;
	}

	@DeleteMapping("/user")
	public boolean deleteUser(@RequestBody User user) throws MDException {
		return Main.miniDAO.delete().deleteEntity(user);
	}

	@DeleteMapping("/user/{id}")
	public boolean deleteUserById(@PathVariable("id") int id) throws MDException {
		return Main.miniDAO.delete().deleteEntityById(User.class, id);
	}

	@PostMapping("/user/login")
	public User loginUser(@RequestBody User user, HttpServletResponse response) throws MDException {
		User connectedUser = null;
		if (user != null) {
			MDCondition loginCondition = new MDCondition("login", MDConditionOperator.EQUAL, user.login);
			MDCondition condition = new MDCondition("password", MDConditionOperator.EQUAL, user.password, MDConditionLink.AND, loginCondition);
			connectedUser = Main.miniDAO.read().getEntityByCondition(User.class, condition);

			Cookie cookie = new Cookie("idUser", connectedUser.idUser.toString());
			cookie.setDomain("eportfolio.cgonline.fr");
			cookie.setPath("Medictionary");
			cookie.setHttpOnly(false);
			cookie.setSecure(false);
			response.addCookie(cookie);
		}
		return connectedUser;
	}
}
