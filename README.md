snapblog
========

##A faire | SnapBlog


###Sécurité

* Créer une classe SecurityTool 
* Y ajouter une méthode statique safeOnSet($string), retournant la chaîne sans balises html
* Y ajouter une méthode statique safeOnGet($string), retournant la chaîne avec les caratères spéciaux convertis en entités HTML
* Appeler ces méthodes dans les getters et setters appropriés des objets Post et Comment 


###Validation complète des formulaires

* Créez une classe PostValidator qui hérite de Validator
* Y ajouter une méthode isValid(Post $post){}, retournant un booléen
* Cette méthode doit déclencher la validation complète du formulaire soit : 
  * Username : contient uniquement des caractères alphanumériques, longueur de 4 à 30 caractères
  * Email : email valide, max 50 caractères
  * Titre : longueur de 2 à 255 caractères
  * Contenu : longueur de 10 caractères minimum

* Appelez cette méthode isValid depuis le contrôleur. 

* Idem pour les commentaires (Créez une class CommentValidator... etc). N'oubliez pas de valider qu'il y a bien un id de post, et que celui-ci existe.


###Authentification

* Lorsqu'un utilisateur soumet un formulaire de commentaire ou d'article, sauvegarder dans 1 ou 2 cookies son username et son email, afin qu'il n'ait pas à le retaper à chaque utilisation du site. 
* Vérifier toujours ensuite si le cookie existe afin de préremplir le formulaire. 
* À vous de voir comment procéder/organiser votre code, il y a 300 manières de faire. 


###Slug

* Ajoutez un slug aux Post (à la classe ET à la table MySQL).
* Générez le slug avec la classe Cocur/Slugify
* Vérifiez que le slug généré est unique avant de sauvegarder un nouveau Post. 
* Utilisez le dans l'url dans la page détails à la place de l'id.


###Emails

* Créer une class Mailer dans le namespace Controller. 
* Y ajouter une méthode nommée sendThankYou($username, $email, $type) envoyant un mail de remerciement à l'utilisateur qui vient de créer un post OU un article. Précisez le type (post || article) dans l'argument $type de la méthode, afin d'adapter votre message. 
* Utiliser PHPMailer pour envoyer le message.


