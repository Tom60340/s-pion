# Projet 008 s-pion

Etape actuelle:

Webpack retiré : OK.
Logos re-dimenssionnés + cache clear : OK.
Sidenav: OK fonctionnelle reste à mettre les couleurs et la version admin en responsive avec tous les boutons.

Temps : 58h.

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
Ajout de l'user Admin + auth + rôle : done  
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



A faire: 
Pb de relation  agents -> agentList : impossibilité de choix multiple dans le champs Liste des agents de création de mission.  
Contacts controller + Type + templates + champs dans missions.  
Cibles controller + Type + templates + champs dans missions.  
Planques controller + Type + templates + champs dans missions.  
Faire les crud et tester à chaque étape (voir code/replay todolist Chris Chevalier).  
Ajouter logique métier (avec validator?).  
Faire searchbar auto au fur et à mesure de la complétion  
  Si OK : voir faille de sécurité? finaliser l eval et envoyer et mise en prod Heroku?  
     Faire leventdipatcher si besoin d envoi de mail ou autre?  

->>> Si =NONOK :  
Voir replay todolist en vanilla et faire l eval en full vanilla.  

En plus si j'ai le temps:  
  ->> Faire gestion speciality (video GrafiKart : https://www.youtube.com/watch?v=6v_Vzv4dzP4)  
  Revoir templates affichage Admin par pages  
  gérer l'ordre des liste des entités  
  problème de numéro de jour on peut choisir 31 jours à chaque mois !!!  
  Modifier/supprimer sans rechargement de page.  

