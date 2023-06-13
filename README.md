# Challenge Kiemtao : expression sans pression !!

## 1. Observer et s'approprier le code

Observez bien chaque répertoire, chaque fichier pour comprendre le fonctionnement du site. Vous devez identifier quel template va afficher quoi...

## 2. Ajouter des messages

Si vous avez trouvé quel template sert à afficher les **messages**, exploitez et implémentez un deuxième message en **HTML**, puis un troisième...

## 3. Stocker les messages

Maintenant que vous connaissez la structure d'un message, observez ce qui est contenu dans le dossier ``data`` : le fichier ``mock.php`` contient des **messages**, le fichier ``users.php`` contient des **utilisateurs/auteurs**. Sur le même modèle inventez et ajoutez, à chaque tableau, des messages et des utilisateurs.

## 4. Dynamiser la liste des messages

Maintenant, vous allez devoir récupérer les données à afficher dans le tableau ``$messages``, puis afficher ces messages les uns à la suite des autres, comme vous l'avez fait à l'étape 2. On pourrait essayer [cette méthode](https://www.php.net/manual/fr/control-structures.foreach.php) peut-être...

Une donnée va poser problème : l'auteur... En effet vous ne disposez que de son ``id`` à l'intérieur de ``$messages``. Il va donc falloir implémenter une fonction qui permet de récupérer un utilisateur à partir de son ``id`` dans le tableau ``$users``, puis l'utiliser pour pouvoir afficher un auteur (et ses passions...)