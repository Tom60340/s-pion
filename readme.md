# Projet 008 s-pion

Etape actuelle:

Webpack retiré : OK.
Logos re-dimenssionnés + cache clear : OK.
Sidenav: OK fonctionnelle reste à mettre les couleurs et la version admin en responsive avec tous les boutons.

Temps : 67h.

Lien github de la partie projet:  
[Link text](https://github.com/Tom60340/008)
Lien github de la partie code:
[Link text](https://github.com/Tom60340/008-code)

Outils utilisés :  
Gestion de la version: github.  
Suivi des étapes: Trello.  
Maquettage: excalidraw.com.  
Figma pour la planche de style.  
Recherches à l'aide de Qwant concernant la psychologie des couleurs et les color palets.
Gestionnaire de dépendance : composer.  
Symfony CLI pour les commandes en ligne.
Framework Symfony(PHP) pour le développement (POO de type MVC).

Création du projet s-pion:

```
symfony new s-pion --webapp
```

Pour lancer le serveur local :

```
symfony serve -d
```

Pour clear le cache:

```

php bin/console cache:clear
```

Done :  
Refaire branche avant easyadmin   
Faire les entities  
Faire la DB  
Ajout de l'user Admin + auth + rôle :
```SQL
INSERT INTO admin (id, email, roles, password,firstname, lastname,created_at) 
  VALUES (nextval('admin_id_seq'), 'admin@admin.fr', '["ROLE_ADMIN"]', 
  '\$argon2id\$v=19\$m=65536,t=4,p=1\$2y$13$uyNIdmI5WBE1o6j05H73o.e3QqDwxToeHwsrPvcY0lv79EpvA.S3i','Admin', 'Admin',now())
``` 
Pages contenus admin + liens boutons ok done  
Form missions ajouté à checker.
Form country ajouté à checker : ok create en DB est OK.  
Ajouter cards des pays  + bouton modifier dans le content Gestion des pays 
Ajouter code pour que selon la route on soit sur la pge de création ou modification  
Faire le RUD pour country  
Ajouter liste de choix du pays dans le form mission  
Gestion agents ok reste à tester après possibilité de créer un agent  
Séparer bouttons Types, status et spé en 3  
Status controller + Type + templates + champs dans missions.  
Types controller + Type + templates + champs dans missions.  
Pb de relation  agents -> agentList : impossibilité de choix multiple dans le champs Liste des agents de création de mission.  
  Entities: agentList,contactList,stashList et targetList deleted. 
    ->>mis en manytomany (agentList) depuis Mission.  
Ajouter ManyToMany à mission vers : Contact, Target, Stash  
Contacts controller + Type + templates + champs dans form et template de missions.  
Cibles controller + Type + templates + champs dans form et template de missions.  
Planques controller + Type + templates + champs dans form et template de missions.  
Searchbar auto au fur et à mesure de la complétion  done pour home et admin   
Ajout des notblank Assert aux entités et Validator aux controllers : done .
Done : "  https://www.youtube.com/watch?v=vCjfxT6miT4&list=PLlxQJeQRaKDTRPbnUb8WtcLsmujZcAznu&index=27"  

  En cours: filtrer une lister d'entités par une autre entité : "  https://www.youtube.com/watch?v=vCjfxT6miT4&list=PLlxQJeQRaKDTRPbnUb8WtcLsmujZcAznu&index=28" pour gérer la règle métier :
    ->> Sur une mission, les contacts sont obligatoirement de la nationalité du pays de la mission..  



A faire:   
Revoir boutons Ajouter dans chaque page select  
Ajouter logique métier (comment? Services ?).  
Ajouter filter, paginator ( BONUS ): video grafikart : " https://www.youtube.com/watch?time_continue=2570&v=4uYpFjfUUbc&feature=emb_logo".   
  Si OK : voir faille de sécurité? finaliser l eval et envoyer et mise en prod Heroku?  
     Faire leventdipatcher si besoin d envoi de mail ou autre?  



En plus si j'ai le temps:  
  Vérifier que tout correspond aux consignes, à ce qui est attendu  
  ->> Faire gestion speciality (video GrafiKart : https://www.youtube.com/watch?v=6v_Vzv4dzP4)  
  Gérer l'ordre des liste des entités dans les choix 
  Problème de numéro de jour on peut choisir 31 jours à chaque mois !!!  
  Modifier/supprimer sans rechargement de page.  
  Utiliser form de contactType pour targetform template à la place de targetType  
  Revoir UI/UX card des missions pour que ce soit plus lisible  


Ennoncé:  
 Les agents ont un nom, un prénom, une date de naissance, un code d'identification, une nationalité, 1 ou plusieurs spécialités.
 Les cibles ont un nom, un prénom, une date de naissance, un nom de code, une nationalité.
 Les contacts ont un nom, un prénom, une date de naissance, un nom de code, une nationalité.
 Les planques ont un code, une adresse, un pays, un type.
 Les missions ont un titre, une description, un nom de code, un pays, 1 ou plusieurs agents, 1 ou plusieurs contacts, 1 ou plusieurs cibles, un type de mission (Surveillance, Assassinat, Infiltration …), un statut (En préparation, en cours, terminé, échec), 0 ou plusieurs planque, 1 spécialité requise, date de début, date de fin.
 Les administrateurs ont un nom, un prénom, une adresse mail, un mot de passe, une date de création.
Règle métier :
 Sur une mission, la ou les cibles ne peuvent pas avoir la même nationalité que le ou les agents.
 Sur une mission, les contacts sont obligatoirement de la nationalité du pays de la mission.
 Sur une mission, la planque est obligatoirement dans le même pays que la mission.
 Sur une mission, il faut assigner au moins 1 agent disposant de la spécialité requise.