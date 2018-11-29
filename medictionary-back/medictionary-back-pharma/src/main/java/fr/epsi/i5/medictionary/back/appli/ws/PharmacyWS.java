package fr.epsi.i5.medictionary.back.appli.ws;


import com.thomaskint.minidao.exception.MDException;
import fr.epsi.i5.medictionary.back.appli.MedictionaryBackPharma;
import fr.epsi.i5.medictionary.back.appli.model.ParamPharma;
import fr.epsi.i5.medictionary.back.appli.model.Pharmacy;
import org.springframework.web.bind.annotation.*;

import java.sql.ResultSet;
import java.util.List;

@RestController
public class PharmacyWS {

	@GetMapping("/pharmacy")
	public List<Pharmacy> getPharmacy() throws MDException {
		return MedictionaryBackPharma.miniDAO.read().getEntities(Pharmacy.class);
	}

	@PostMapping("/pharmacies")
	public Pharmacy getPharmacyWithDrugs(@RequestBody ParamPharma param) throws MDException {

		List<Pharmacy> pharmacies;
		boolean isFirst = true;
		StringBuilder rqBuilder = new StringBuilder("select p.* from medictionary_pharma.pharmacy as p where p.id_pharmacy in(");
		for (String cas : param.casDrug) {
			if (isFirst) {
				rqBuilder.append("select s.id_pharmacy from medictionary_pharma.stock as s where (s.cas_drug = \'").append(cas).append("\' and s.quantity > 0) ");
				isFirst = false;
			} else {
				rqBuilder.append("and s.id_pharmacy in (select s.id_pharmacy from medictionary_pharma.stock as s where (s.cas_drug = \'").append(cas).append("\' and s.quantity > 0)) ");
			}
		}
		String rq = rqBuilder.toString();
		rq += ")";
		System.out.println(rq);
		ResultSet result = MedictionaryBackPharma.miniDAO.executeQuery(rq);
		pharmacies = MedictionaryBackPharma.miniDAO.mapResultSetToEntities(result, Pharmacy.class);

		Pharmacy closest = null;
		if (!pharmacies.isEmpty()) {
			closest = pharmacies.get(0);

			for (Pharmacy pharmacy : pharmacies) {

				double dist = distance(param.latitude, param.longitude, pharmacy.latitude, pharmacy.longitude);
				double currentDist = distance(param.latitude, param.longitude, closest.latitude, closest.longitude);

				if (dist < currentDist) {
					closest = pharmacy;
				}
			}
		}

		return closest;
	}

	@GetMapping("/test")
	public String getSalut() {
		return "yo";
	}

	private double distance(double lat1, double lng1, double lat2, double lng2) {

		double earthRadius = 3958.75; // in miles, change to 6371 for kilometer output

		double dLat = Math.toRadians(lat2 - lat1);
		double dLng = Math.toRadians(lng2 - lng1);

		double sindLat = Math.sin(dLat / 2);
		double sindLng = Math.sin(dLng / 2);

		double a = Math.pow(sindLat, 2) + Math.pow(sindLng, 2)
				* Math.cos(Math.toRadians(lat1)) * Math.cos(Math.toRadians(lat2));

		double c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

		double dist = earthRadius * c;

		return dist * 1609.34; // output distance, in meter
	}
}
