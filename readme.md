# Projet 008 s-pion

Etape actuelle:

Webpack retiré : OK.
Logos re-dimenssionnés + cache clear : OK.
Sidenav: OK fonctionnelle reste à mettre les couleurs et la version admin en responsive avec tous les boutons.

Temps : 41h.

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

A faire:  
Ajouter liste de choix du pays dans le form mission  
Ajouter les forms des pages Admin content  
Faire les crud et tester à chaque étape ( voir code/replay todolist Chris Chevalier).  
Home page et Admin page bootstrap  
Ajouter role pour accès via connexion à admin page  
Ajouter logiique métier ( avec validator?).  
Faire searchbar autoau fur et à mesure de la complétion  
  Si OK : voir failel de sécurité? finaliser l eval et envoyer et mise en prod Heroku?  
     Faire leventdipatcher si besoin d envoi de mail ou autre?  

->>> Si =NONOK :  
Voir replay todolist en vanilla et faire l eval en full vanilla.  
