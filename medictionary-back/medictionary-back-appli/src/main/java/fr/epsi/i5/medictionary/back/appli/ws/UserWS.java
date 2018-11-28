package fr.epsi.i5.medictionary.back.appli.ws;

import com.thomaskint.minidao.exception.MDException;
import fr.epsi.i5.medictionary.back.appli.Main;
import fr.epsi.i5.medictionary.back.appli.model.User;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class UserWS {

	@GetMapping("/user")
	public List<User> getUsers() throws MDException {
		return Main.miniDAO.read().getEntities(User.class);
	}

	@GetMapping("/user/{id}")
	public User getUser(@PathVariable(name = "id") int id) throws MDException {
		return Main.miniDAO.read().getEntityById(User.class, id);
	}

	@PostMapping("/user")
	public User createUser(@RequestBody User user) throws MDException {
		if (Main.miniDAO.create().createEntity(user)) {
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
}
