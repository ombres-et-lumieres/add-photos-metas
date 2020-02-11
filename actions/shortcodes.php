<?php
function metas_photo_func($atts)
{
	$thumb_id = get_post_thumbnail_id();
	
	$attachment_metas = wp_get_attachment_metadata($thumb_id);
	
	
	$auteur = get_field( 'auteur', $thumb_id );
	
	$copyright = get_field( 'copyright', $thumb_id );
	
	$pays = get_field( 'pays', $thumb_id );
	
	$region = get_field( 'region', $thumb_id );
	
	$ville = get_field( 'ville', $thumb_id );
	
	$lieu = get_field( 'lieu', $thumb_id );
	
	$sous_emplacement = get_field( 'sous_emplacement', $thumb_id );
	
	$date_de_creation = get_field( 'date_de_creation', $thumb_id );
	
	$style_photographique = get_field( 'style_photographique', $thumb_id );
	
	$titre = $attachment_metas["image_meta"]["title"];
	
	$description = $attachment_metas["image_meta"]["caption"];
	
		    
	
	
	if(""!= $titre): $texte_titre = "<h4>Titre: </h4>" . $titre; else: $texte_titre = ""; endif;
	
	if(""!= $description): $texte_description = "<h4>Description: </h4>" . $description; else: $texte_description = ""; endif;
	
	if(""!= $auteur): $texte_auteur = "<h4>Auteur: </h4>" . $auteur; else: $texte_auteur = ""; endif;
	
	if(""!= $copyright ): $texte_copyright = "<h4>Copyright: </h4>" . $copyright; else: $texte_copyright = ""; endif;
	
	if(""!= $pays): $texte_pays = "<h4>Pays: </h4>" . $pays; else:  $texte_pays = "";  endif;
	
	if(""!= $region): $texte_region = "<h4>Région: </h4>" . $region; else: $texte_region = "" ; endif;
	
	if(""!= $ville): $texte_ville = "<h4>Ville: </h4>" . $ville; else: $texte_ville = "" ; endif;
	
	if(""!= $lieu): $texte_lieu = "<h4>Lieu: </h4>" . $lieu; else: $texte_lieu = "" ;   endif;
	
	if(""!= $sous_emplacement): $texte_sous_emplacement = "<h4>Sous_emplacement: </h4>" . $sous_emplacement; else: $sous_emplacement = "" ;   endif;
	
	if(""!= $date_de_creation): $texte_date_de_creation = "<h4>Date de creation: </h4>" . $date_de_creation; else: $texte_date_de_creation = "" ;   endif;
	
	if(""!= $style_photographique): $texte_style_photographique = "<h4>Style photographique: </h4>" . $style_photographique; else: $texte_style_photographique = "";    endif;
					
					
	$infos_photo = "<div class = 'metas-photos'>"
					.$texte_titre
					.$texte_description
					.$texte_auteur
					.$texte_copyright
					.$texte_pays
					.$texte_region
					.$texte_ville
					.$texte_lieu
					.$sous_emplacement
					.$texte_date_de_creation
					.$texte_style_photographique
					."</div>";
	
	
	
	return $infos_photo;
		
	
}
add_shortcode("metas_photo", "metas_photo_func");
?>


