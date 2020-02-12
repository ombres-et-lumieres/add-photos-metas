<?php

// ajout d' une section pour le nombre de tailles d' image et de champs ACF

function oetl_photos_sizes($wp_customize)
{
	
	$wp_customize->add_section( "number_section",
	                           array(
	                               'panel' => 'photos',
	                               'title' =>  __("nombre de tailles d' image et de champs acf", "ombres-et-lumieres") ,
	                               'priority' => 10,
	                               'capability' => 'edit_theme_options',
	                               "description" => "nombre de tailles de photo disponibles sur le site ainsi que des champs acf présent pour chaque média",
	                           )
	                         );	
	
	
// 	nombre de tailles d' image
	
	$wp_customize->add_setting( "sizes_number_setting",
								array(
									    "capability" => "edit_posts",
									    "default" => get_theme_mod("sizes_number_setting", "4" )
									)
								);

	$wp_customize->add_control( "sizes_number_control",
								array(
									'label'    => __("nombre de tailles photos", "ombres-et-lumieres"),
									'section'  => "number_section",
									'settings' => "sizes_number_setting",
									'type'     => 'number',
									)
								);	
	
// 	nombre de tailles de champs ACF
	
	
	$wp_customize->add_setting( "acf_number_setting",
								array(
									    "capability" => "edit_posts",
									    "default" => get_theme_mod("acf_number_setting", "0" )
									)
								);

	$wp_customize->add_control( "acf_number_control",
								array(
									'label'    => __("nombre de champs acf pour chaque photo", "ombres-et-lumieres"),
									'section'  => "number_section",
									'settings' => "acf_number_setting",
									'type'     => 'number',
									)
								);






		//ajout d' une section pour décrire les tailles d' images à ajouter


	$wp_customize->add_section( "image_sizes",
	                           array(
	                               'panel' => 'photos',
	                               'title' =>  __("tailles d' image", "ombres-et-lumieres") ,
	                               'priority' => 20,
	                               'capability' => 'edit_theme_options',
	                               "description" => "tailles des photos disponibles sur le site",
	                           )
	                         );

	for($i = 1; $i <= get_theme_mod( "sizes_number_setting", "4" ); $i++)
	{
		// fonction décrite par ailleurs
		oel_size_setting($wp_customize, "image_sizes", "setting_image_sizes" .$i, "control_image_sizes". $i, "photo_size", "choisissez une taille de photo (dans sa plus grande dimension)");
	}




	
	
// 	ajout de la section qui va décrire les champs ACF
	
	
	$wp_customize->add_section( "champ_acf_section",
	                           array(
	                               'panel' => 'photos',
	                               'title' =>  __("noms des champs acf", "ombres-et-lumieres") ,
	                               'priority' => 20,
	                               'capability' => 'edit_theme_options',
	                               "description" => "noms des champs acf présents dans chaque média. Attention utiliser les noms normés définis dans 'nom du champ' au niveau de l' interface d' ACF",
	                           )
	                         );

	for($i = 1; $i <= get_theme_mod( "acf_number_setting", "0" ); $i++)
	{
	
		$wp_customize->add_setting( "acf_name_setting" . $i,
									array(
										    "capability" => "edit_posts",
										    "default" => get_theme_mod("acf_name_setting" . $i, "" )
										)
									);
	
		$wp_customize->add_control( "acf_name_control" . $i,
									array(
										'label'    => __("champs acf numéro " . $i, "ombres-et-lumieres"),
										'section'  => "champ_acf_section",
										'settings' => "acf_name_setting" . $i,
										'type'     => 'text',
										)
									);
	
	
		
	}



}
add_action( 'customize_register' ,"oetl_photos_sizes" );


// ajout des dimensions via add_image_size

for($i = 1; $i <= get_theme_mod( "sizes_number_setting", "4" ); $i++)
{
	add_image_size(get_theme_mod("setting_image_sizes" .$i) ."px", get_theme_mod("setting_image_sizes" .$i), get_theme_mod("setting_image_sizes" .$i));
}







?>