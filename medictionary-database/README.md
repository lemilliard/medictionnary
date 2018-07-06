# medictionary-database by LeMilliard

Ce repository sert d'espace de stockage pour les éléments concernant la base de données de l'application

## Sommaire

* [Liens](#liens)
  * [Base de données publique des médicaments](#base-de-donn%C3%A9es-publique-des-m%C3%A9dicaments)
  * [Kivi (Python)](#kivi-python)
  * [Buildozer (Kivi - Android)](#buildozer-kivi---android)
* [Config](#config)
  * [REFRESH_SCALE](#refresh_scale)
  * [REFRESH_DURATION](#refresh_duration)

## Liens

### Base de données publique des médicaments

* [Accueil](http://base-donnees-publique.medicaments.gouv.fr)
* [Téléchargement](http://base-donnees-publique.medicaments.gouv.fr/telechargement.php)

### Kivi (Python)

* [Site internet](https://kivy.org)
* [Documentation](https://kivy.org/docs)
* [Github](https://github.com/kivy/kivy)

### Buildozer (Kivi - Android)

* [Documentation](http://buildozer.readthedocs.io/en/latest)
* [Github](https://github.com/kivy/buildozer)

## Config

Le programme est configurable grâce au fichier de configuration. Celui-ci doit être nommé config.txt et doit se trouver à la racine du projet ou du jar.

Les clés doivent être impérativement renseignées dans l'enumération [model.config.Key](./src/fr/medictionary/database/model/config/Key.java).

### REFRESH_SCALE

### REFRESH_DURATION
