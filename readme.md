# Projet 008 s-pion

Etape actuelle:

Webpack retiré : OK.
Logos re-dimenssionnés + cache clear : OK.
Sidenav: OK fonctionnelle reste à mettre les couleurs et la version admin en responsive avec tous les boutons.

Temps TOTAL: 35h.
Temps debuggage : 15h.
Temps choses faites inutilement : 5h.
Temps de maquettage : 10h.
Temps UML : 5h.

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

Installation du easyadmin bundle:
```
composer require easycorp/easyadmin-bundle
```

Fichier.env.local ajouté.

Entités effectuées:  
Mission ( sans les FK)  
MissionType  
Status  
Speciality  
Country  
Agent  
AgentList  
Contact  
ContactList  
Target  
TargetList  
Stash  
StashList  
Mission à MAJ  : status / missiontype / country  / speciality  
Admin  
Créer la database  
Créer les migrations  
Migrer les migrations  
Dashboard Admin fait  
Champs des entités ajoutés  
Implémentation de function persist dans les constructeur d'entités  

ABANDONNé:
  Revoir UML, problème avec relation entre Mission et lists(agentlist/targetlist/contactlist/stashlist)   
  ->>> retirer les FK de mission.  DONE
  Tests:  
  Pb avec les array des truc"list"  à tester: enlever les array du construct et refaire setter & getter    
  Fait sur stash mais pb tjs présent ...   
  
  
  Reprendre la vidéo à minute 32 .  
  
  
  Pour la logique métier pour les agents qui ne sont pas du même pays voir les querybuilder ( minute 41).  

A faire:
refaire branche avant easyadmin et faire les formulaires et la vue.
->>> Si pas OK faire:
Home page et Admin page bootstrap
Ajouter role pour accès via connexion à admin page
Faire les crud et tester à chaque étape ( voir code/replay todolist Chrhis Chevalier).
Ajouter logiique métier ( avec validator?).
Faire searchbar autoau fur et à mesure de la complétion

->Si OK : voir failel de sécurité? finaliser l eval et envoyer et mise en prod Heroku?
     Faire leventdipatcher si besoin d envoi de mail ou autre?

->>> Si =NONOK :
Voir replay todolist e nvanilla et faire l eva le nfull vanilla.