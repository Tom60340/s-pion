# Projet 008 s-pion

Etape actuelle:

Webpack retiré : OK.
Logos re-dimenssionnés + cache clear : OK.
Sidenav: OK fonctionnelle reste à mettre les couleurs et la version admin en responsive avec tous les boutons.

Temps : 32h.

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

A faire:
Revoir UML, poroblème avec relation entre Mission et lists(agentlist/targetlist/contactlist/stashlist)   
->>> retirer les FK de mission.  DONE
Tests:  
Pb avec les array des truc"list"  à tester: enlever les array du construct.  



Reprendre la vidéo à minute 32 .  


Pour la logique métier pour les gaents qui ne sont pas du même pays voir les querybuilder ( minute 41).  