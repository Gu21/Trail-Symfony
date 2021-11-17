![projet-trail](https://user-images.githubusercontent.com/79690181/142174993-346f7110-c2e1-4040-b822-c4d6ae63bd11.png)


# Projet Trail Symfony

Le projet Trail Symfony est un projet réalisé  en fin de formation de développeur web et web mobile de 6 mois à ARINFO dans le cadre d'une reconversion professionnelle, premier gros projet.
Ce projet est la réalisation d'un site web pour une association sportive  à but non lucratif qui organise chaque année un trail dans ma région.
L'objectif était de développer un nouveau site vitrine permettant d’apporter un
nouveau support de communication accessible au plus grand nombre.
Site encore en amélioration a ce jour.

* Création d'un cahier des charges en accord avec l'association
* Réalisation d'une maquette
* Utilisation de la méthode MERISE pour la conception de la base de données
* Mise en place d'un projet PHP / Symfony
* Création des entités et de leurs CRUD et migrate avec l'ORM Doctrine vers MySQL
* Ajout de plugin Symfony CKEditor
* Javascript sur des templates Twig


## Environnement 

* PHP 8
* MySQL
* HTML5 / CSS3
* Sass
* Framework Bootstrap
* Javascript / JQuery
* Framework Symfony 5.3
* Composer 2.0.13
* Editeur de code Visual Studio code
* Git / Github


### Réalisation d'une interface Administration

Page d’accueil de la partie « Administration » du site.
![admin](https://user-images.githubusercontent.com/79690181/142187976-6433b94b-bfce-4d5a-a9a5-b2a4e7f82bba.png)

Pour répondre au besoin de l'association sur la personnalisation du site j'ai mis en place un
système de gestion de contenu.
L'association aura la possibilité d'importer des photos, de mettre du texte, de le modifier ou
de le supprimer et pagination a été mise en place.

La barre de navigation lorsque la souris passe par dessus:

![barreNavigationAdmin](https://user-images.githubusercontent.com/79690181/142189501-2b9d736f-447c-4e30-9591-276764f2a3eb.png)

### GESTION DE RUBRIQUES :
Barre de navigation de gauche lors du survol de ma souris, je
sélectionne le lien qui apparaît comme ceci:

![gestion-rubrique](https://user-images.githubusercontent.com/79690181/142189799-9f5558a6-1594-4d84-ad14-9a4795a7c02a.png)

Voici la barre de navigation en responsive avec le burger :

![Barre-nav-burger](https://user-images.githubusercontent.com/79690181/142190590-d8aac252-b66a-457c-91b0-c95bddd558fc.png)

Au clic sur le burger le menu se déroule et il est possible de fermer ce même menu avec la
croix noire en haut à droite:

![fermeture-burger](https://user-images.githubusercontent.com/79690181/142191019-c6f54318-02ae-40b6-b6fa-e002b229b6cd.png)

Une fois mon lien Accueil sélectionné, j'arrive sur la page index de mon template home
pour modifier ou créer une nouvelle rubrique.
La page est représentée sous la forme d'un tableau avec des boutons et des icônes afin
d'interagir avec la rubrique.
L'Administrateur a la possibilité de modifier une rubrique ou une photo   ![icone-editer](https://user-images.githubusercontent.com/79690181/142191330-e9bb3603-6480-445e-8057-4b4f0a17001c.png).

### Exemple de la page d'ajout de contenu:

![ajout-contenu](https://user-images.githubusercontent.com/79690181/142191696-88cf82de-9785-401c-8991-13bee55f2b88.png)

L'admin a aussi la possibilité d'ajouter des images comme pour l'exemple des partenaires:

![admin-image](https://user-images.githubusercontent.com/79690181/142191916-791020af-cff2-424b-a233-48a7dd0a8322.png)

Il peut aussi supprimer  ![corbeille-admin](https://user-images.githubusercontent.com/79690181/142192419-62406f48-f488-4922-bd99-24dae9e25c57.png) ou enregistrer  ![enregistrer-admin](https://user-images.githubusercontent.com/79690181/142192447-e9a77521-de23-4f28-bf6e-99536c8e514a.png)
 les modifications de la rubrique.

Ici l’exemple est pour l’entité «Home» mais le concept est le même pour la plupart des autres rubriques:

![modification-admin](https://user-images.githubusercontent.com/79690181/142192499-a8357887-a90e-410d-80a8-7a2d6290d70b.png)

### AJOUT D'UNE RUBRIQUE :
 L'Administrateur a la possibilité de créer une nouvelle actualité.
![ajout-rubrique-admin](https://user-images.githubusercontent.com/79690181/142192885-a9e1e325-6b13-4dad-b605-96f8943b0f07.png)

### Lien du site

(https://trail-allaire-bisson.fr)