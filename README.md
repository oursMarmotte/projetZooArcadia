
# projetZooArcadia

ce repositorie contient :
-les fichiers sources de l'application zooarcadia.local
-le fichier sql zooarcadia
-le diagramme de cas d'utilisationZoo_Arcadia
-le diagramme Entité Relation
-le diagramme du modele conceptuel de donné
-le diagramme du modele logique de donné

#Déploiement

Le déploiement en local nécessite au préalable l'installation de Xampp V 3.3.0
sur l'ordinateur ( window,linux).
le repertoire htdocs a été choisis pour hébergé le projet zooarcadia


En local le site est indexé sous lenom de domaine zooarcadia.local nécéssitant le
renseignement des directives suivantes dans httpd.conf

-Listen 80
-ServerName localhost:80
<Directory />
    AllowOverride none
    Require all denied
</Directory>
Souvent ces directives sont renseigné par défaut .

DocumentRoot "C:/xampp/htdocs"
<Directory "C:/xampp/htdocs">

et les directives virtualhost sont à renseigner aussi
dans httpd-vhosts.conf
C:\XAMPP\apache\conf\extra\httpd-vhosts.conf 
avec les directives suivantes:

<VirtualHost *:80>
DocumentRoot "C:\xampp\htdocs\zooArcadia"
ServerName zooArcadia.local
</VirtualHost>


Pour finir il faut également éditer le fichier host
dans windows 
C:\windows\system32\drivers\etc
et y ajouter les informations suivantes:
127.0.0.1 zooArcadia.local
Redémarrez le serveur Apache

#Base de donné

Xampp integre un Systeme de base de donnée relationnel  MYSQL phpMyAdmin
dans laquelle la base de donné bdd_zooarcadia à été construite 
cette base de donné comporte 12 tables nécessaire au bon fonctionnement
de l'application ,une copie est jointe dans ce répositorie dans le répertoire
fichierCréationBdd .
Pour l'importer 

Ouvrir l'inerface phpMyAdmin 
clicquer sur l'onglet importer 
sélectionner Choisir un fichier







