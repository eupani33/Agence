/Applications/MAMP/Library/bin/mysqld_safe --port=3306 --socket=/Applications/MAMP/tmp/mysql/mysql.sock --pid-file=/Applications/MAMP/tmp/mysql/mysql.pid --log-error=/Applications/MAMP/logs/mysql_error_log &
symfony server:start -d
npm run dev-server

/usr/local/mysql/support-files/mysql.server stop
/usr/local/mysql/support-files/mysql.server start


git add .
git commit -m "29-01-2021"
git branch -M main
git remote add https://github.com/eupani33/agence.git
git branch -M main
git push -u origin main


git init                                Initialise un dépôt git dans un répertoire vide.
git status                              Affiche le statut des choses dans le répertoire suivi
git add <NOM DU FICHIER A SUIVRE>       Ajoute un fichier à suivre dans la zone d’attente
git commit -m "entrez votre message"    Consigner (déclarer) toute modification.
git remote add origin url               Connecte votre dépôt local avec GitHub.
git push -u origin nom_branche          Pousse les modifications vers GitHub
git checkout                            basculer vers une (autre) branche
git -b <NomBranche>                     crée une nouvelle branche dans votre dépôt.
git log                                 affiche un journal des modifications au dépôt
git clone <URL GITHUB>                  clone un projet de votre système à partir de github
git branch <nom_branche>                crée une copie de la branche master appelée
git checkout <branch_name>              bascule vers nom_branche comme branche de travail
git checkout master                     bascule la branche vers master
git branch -a                           affiche les branches existantes pour le dépôt particulier

 
 
  