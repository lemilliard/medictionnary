package fr.epsi.i5.medictionary.back.appli.ws;

import com.thomaskint.minidao.exception.MDException;
import fr.epsi.i5.medictionary.back.appli.Main;
import fr.epsi.i5.medictionary.back.appli.model.Zone;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class ZoneWS {

	@GetMapping("/zone")
	public List<Zone> getZones() throws MDException {
		return Main.miniDAO.read().getEntities(Zone.class);
	}

	@GetMapping("/zone/{id}")
	public Zone getZone(@PathVariable(name = "id") int id) throws MDException {
		return Main.miniDAO.read().getEntityById(Zone.class, id);
	}

	@PostMapping("/zone")
	public Zone createZone(@RequestBody Zone zone) throws MDException {
		if (Main.miniDAO.create().createEntity(zone)) {
			return zone;
		}
		return null;
	}

	@PutMapping("/zone")
	public Zone updateZone(@RequestBody Zone zone) throws MDException {
		if (Main.miniDAO.update().updateEntity(zone)) {
			return zone;
		}
		return null;
	}

	@DeleteMapping("/zone")
	public boolean deleteZone(@RequestBody Zone zone) throws MDException {
		return Main.miniDAO.delete().deleteEntity(zone);
	}

	@DeleteMapping("/zone/{id}")
	public boolean deleteZoneById(@PathVariable("id") int id) throws MDException {
		return Main.miniDAO.delete().deleteEntityById(Zone.class, id);
	}
}
