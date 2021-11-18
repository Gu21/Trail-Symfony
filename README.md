![projet-trail](https://user-images.githubusercontent.com/79690181/142174993-346f7110-c2e1-4040-b822-c4d6ae63bd11.png)


# Trail Symfony project

The Trail Symfony project is a project realized at the end of a 6 months web and mobile web developer training at ARINFO as part of a professional reconversion, first big project.
This project is the realization of a website for a non-profit sports association that organizes a trail every year in my region.
The objective was to develop a new showcase site allowing to bring a new communication support
accessible to the greatest number.
The site is still being improved to this day.


* Creation of specifications in agreement with the association
* Realization of a mockup
* Use of the MERISE method for the design of the database
* Setting up a PHP / Symfony project
* Creation of entities and their CRUDs and migration with the Doctrine ORM to MySQL
* Symfony CKEditor plugin added
* Javascript on engine Twig Templates


## Environment 

* PHP 8
* MySQL
* HTML5 / CSS3
* Préprocesseur SASS
* Toolms BOOTSTRAP
* Javascript / JQuery
* Symfony 5.3
* COMPOSER 2.0.13
* Visual Studio code editor
* Git / Github


### Creation of an administration interface

Home page of the "Administration" part of the site.
![admin](https://user-images.githubusercontent.com/79690181/142187976-6433b94b-bfce-4d5a-a9a5-b2a4e7f82bba.png)

To answer the need of the association on the personalization of the site I set up a
content management system.
The association will have the possibility to import photos, to put text, to modify it or to delete it and a pagination was set up.


The navigation bar when the mouse passes over it:

![barreNavigationAdmin](https://user-images.githubusercontent.com/79690181/142189501-2b9d736f-447c-4e30-9591-276764f2a3eb.png)

### TOPIC article :
Left navigation bar when I hover my mouse, I select the link that appears like this:


![gestion-rubrique](https://user-images.githubusercontent.com/79690181/142189799-9f5558a6-1594-4d84-ad14-9a4795a7c02a.png)

Here is the responsive navigation bar with the burger:

![Barre-nav-burger](https://user-images.githubusercontent.com/79690181/142190590-d8aac252-b66a-457c-91b0-c95bddd558fc.png)

When you click on the burger, the menu unfolds and it is possible to close the menu with the
black cross at the top right:

![fermeture-burger](https://user-images.githubusercontent.com/79690181/142191019-c6f54318-02ae-40b6-b6fa-e002b229b6cd.png)

Once my link is selected, I arrive on the index page of my home Template
to modify or create a new topic.
The page is represented as a table with buttons and icons to interact with the topic.


The Administrator has the possibility to modify a section or a photo  ![icone-editer](https://user-images.githubusercontent.com/79690181/142191330-e9bb3603-6480-445e-8057-4b4f0a17001c.png).

### Example of the add content page:

![ajout-contenu](https://user-images.githubusercontent.com/79690181/142191696-88cf82de-9785-401c-8991-13bee55f2b88.png)

The admin also has the possibility to add images like for the example of the partners:

![admin-image](https://user-images.githubusercontent.com/79690181/142191916-791020af-cff2-424b-a233-48a7dd0a8322.png)

It can also delete  ![corbeille-admin](https://user-images.githubusercontent.com/79690181/142192419-62406f48-f488-4922-bd99-24dae9e25c57.png)  or register ![enregistrer-admin](https://user-images.githubusercontent.com/79690181/142192447-e9a77521-de23-4f28-bf6e-99536c8e514a.png)
changes to the rubric.

Here the example is for the "Home" entity but the concept is the same for most of the other headings:

![modification-admin](https://user-images.githubusercontent.com/79690181/142192499-a8357887-a90e-410d-80a8-7a2d6290d70b.png)

### ADDED A NEWS:
The Administrator has the possibility to create a new news item.
![ajout-rubrique-admin](https://user-images.githubusercontent.com/79690181/142192885-a9e1e325-6b13-4dad-b605-96f8943b0f07.png)

## Putting into production

For the production of my site I used 02switch a web hosting company
100% French for both the server and the Sav based in Clermont-Ferrand.


![O2SWITCH](https://user-images.githubusercontent.com/79690181/142199551-467e9e87-02ce-486e-9c75-16f3d02a28ba.png)

In order to transfer local data from my computer, I used the
SFTP (Transfer Protocol) client "winSCP" which is open source and allows me to copy
of my files.

![winscp](https://user-images.githubusercontent.com/79690181/142199577-2df3b560-e1ec-4727-8282-02d8385109f8.png)

### Link to the site

(https://trail-allaire-bisson.fr)