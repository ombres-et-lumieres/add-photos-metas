<?php
function ol_modify_attachment_datas($data, $id)
{


		/* je fais une recherche des exifs et iptc au cas où je n' aurais rien récupéré via le plugin */
		/* la fonction php exif_read_data nécessite un chemin absolu */

	$scr =  wp_get_attachment_image_src( $id);

	$upload = wp_upload_dir();

	$url = $scr[0];

	$path = $upload["basedir"] . "/" . $data["file"];

	$img_exif = exif_read_data($path, NULL, true, false); //fonction php au lieu de wp_read_image_metadata parce que celle-ci me renvoie une erreur

	$img_iptc = getimagesize($url, $info);

	$iptc = iptcparse( $info['APP13'] );



	$newdata = $data;



if(isset($img_exif["IFD0"]["Artist"]))
	{
		$author = $img_exif["IFD0"]["Artist"];
	}
	elseif(isset($iptc))
		{
			$author = $iptc["2#122"][0];
		}
		else 
			{
			$author = "";
			}






if(isset($img_exif["IFD0"]["Copyright"]))
	{
		$copyright = $img_exif["IFD0"]["Copyright"];
	}
	elseif(isset($iptc))
		{
			$copyright = $iptc["2#116"][0];
		}
		else 
			{
				$copyright = "";
			}





/*
if(isset($iptc["2#005"][0]))
	{
		$titre = $iptc["2#005"][0];
	}
	else 
		{
			$titre = "";
		}
*/

$titre = $iptc["2#005"][0];


if(isset($img_exif["IFD0"]["ImageDescription"]))
	{
		$description = $img_exif["IFD0"]["ImageDescription"];
	}
	elseif(isset($iptc))
		{
			$description = $iptc["2#120"][0];
		}
		else 
			{
				$description = "";
			}




if(isset($iptc["2#101"][0]))
	{
		$country = $iptc["2#101"][0];
	}
	else 
		{
			$country = "";
		} 




if(isset($iptc["2#095"][0]))
	{
		$state = $iptc["2#095"][0];
	}
	else 
		{
			$state = "";
		}


if(isset($iptc["2#090"][0]))
	{
		$city = $iptc["2#090"][0];
	}
	else 
		{
			$city = "";
		} 




if(isset($iptc["2#026"][0]))
	{
		$location = $iptc["2#026"][0];
	}
	else 
		{
			$location = "";
		}


if(isset($img_exif["EXIF"]["DateTimeOriginal"]))
	{
		$creation_date = $img_exif["EXIF"]["DateTimeOriginal"];
	}
	elseif(isset($iptc))
		{
			$creation_date = $iptc["2#055"][0];
		}
		else 
			{
				$creation_date = "";
			} 



if(isset($iptc["2#015"][0]))
	{
		$photografic_style = $iptc["2#015"][0];
	}
	else 
		{
			$photografic_style = "";
		} 





if(isset($iptc["2#092"][0]))
	{
		$sous_emplacement = $iptc["2#092"][0];
	}
	else 
		{
			$sous_emplacement = "";
		}



	$newdata["oetl" ] =  array  (
									"Author" => $author,
									 "Copyright" =>$copyright,
									 "title" => $titre,
									 "Description" => $description,
									 "Country" => $country,
									 "State" => $state,
									 "City" => $city,
									 "Location" => $location,
									 "Creation_Date" => $creation_date,
									 "photografic_style" => $photografic_style,
									 "sous-emplacement" => $sous_emplacement
								);


if(is_plugin_active("advanced-custom-fields-pro/acf.php"))

{

	if(get_field('auteur')):  update_field( 'auteur',$author , $id ); endif;
	
	if(get_field('copyright')):  update_field( 'copyright',$copyright , $id ); endif;
	
	if(get_field('titre')):  update_field( 'titre',$titre , $id ); endif;
	
	if(get_field('description')):  update_field( 'description',$description , $id ); endif;
	
	if(get_field('pays')):  update_field( 'pays' ,$country , $id ); endif;
	
	if(get_field('region')):  update_field( 'region',$state , $id ); endif;
	
	if(get_field('ville')):  update_field( 'ville',$city , $id ); endif;
	
	if(get_field('lieu')):  update_field( 'lieu',$location , $id ); endif;
	
	if(get_field('sous_emplacement')):  update_field( 'sous_emplacement',$sous_emplacement , $id ); endif;
	
	if(get_field('date_de_creation')):  update_field( 'date_de_creation',$creation_date , $id ); endif;
	
	if(get_field('style_photographique')):  update_field( 'style_photographique',$photografic_style , $id ); endif;

}







/* ici j' ai récupéré les informations qui m' intéressent */

/* format des coordonnées dans Lr: 39°27'36" N 0°21'27" W */

/*
liste ses codes iptc

["1#090"] ????
["2#000"]???
["2#005"]titre
["2#015"]catégorie
["2#055"]date création
["2#060"]heure création
["2#062"]????
["2#063"]?????
["2#080"]auteur
 ["2#085"]byliine title du créateur
["2#090"]city
["2#101"]pays
["2#105"]headline
["2#116"]copyright
["2#120"]caption
["2#122"]caption writer
"2#118" Contact
"2#110" crédit
"2#095" province, état
"2#092"  région
"2#026" location
"2#022" identifiant
"2#020" catégorie supplémentaire, tableau
"2#092" sous emplacement
*/




/* 	ajout des informations strctement nécessaires pour éviter l' effet usine à gaz */



	return $newdata ;


}
add_filter( 'wp_update_attachment_metadata' ,'ol_modify_attachment_datas', 10, 2 );























































?>