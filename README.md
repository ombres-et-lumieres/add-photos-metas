# add-photos-metas
 
plugin wp pour ajouter une liste de métas dans le tableau des attachments metadatas.
Leur sources sont les données exif et iptc des photos.
Si le plugin ACF est activé, on ajoute également ces valeurs dans des champs créés dans la page media.
J' ai ajouté un shortcode [metas-photo] pour afficher des données de la photo.

Deux problèmes: 

1) Utilisation de la fonction is_plugin_active("advanced-custom-fields-pro/acf.php") pour détecter le plugin ACF. J' ai besoin de savoir si elle est bien utilisée.

2)Pour remplir les champs ACF, j' utilise une boucle foreach sur les valeurs d' un tableau, plus un incrément $i pour lister les noms champs ACF définis dans le customizer: donc si je fais une erreur en introduisant un nom, cela va générer une erreur, et si j' en interverti deux, les valeurs seront dans les mauvais champs.
Donc j' ai besoin d' une solution.


A faire en plus: 

1)réécriture en POO

2)je n' ai pas introduit d' actions à faire lors de la désactivation ou la suppression.

 