<?php
function oetl_photos_sizes($wp_customize)
{
	
	$wp_customize->add_section( "number_sizes",
	                           array(
	                               'panel' => 'photos',
	                               'title' =>  __("nombre de tailles d' image", "ombres-et-lumieres") ,
	                               'priority' => 10,
	                               'capability' => 'edit_theme_options',
	                               "description" => "nombre de tailles de photo disponibles sur le site",
	                           )
	                         );	
	
	
	$wp_customize->add_setting( "sizes_number",
								array(
									    "capability" => "edit_posts",
									    "default" => get_theme_mod("sizes_number", "4" )
									)
								);

	$wp_customize->add_control( "sizes_number_id",
								array(
									'label'    => __("nombre de tailles photos", "ombres-et-lumieres"),
									'section'  => "number_sizes",
									'settings' => "sizes_number",
									'type'     => 'number',
									//'input_attrs' => oetl_sizes_types($size_type)
									)
								);	
	
	
	$wp_customize->add_section( "image_sizes",
	                           array(
	                               'panel' => 'photos',
	                               'title' =>  __("tailles d' image", "ombres-et-lumieres") ,
	                               'priority' => 20,
	                               'capability' => 'edit_theme_options',
	                               "description" => "tailles des photos disponibles sur le site",
	                           )
	                         );

	for($i = 1; $i <= get_theme_mod( "sizes_number", "4" ); $i++)
	{
		oel_size_setting($wp_customize, "image_sizes", "setting_image_sizes" .$i, "control_image_sizes". $i, "photo_size", "choisissez une taille de photo (dans sa plus grande dimension)");
	}

}
add_action( 'customize_register' ,"oetl_photos_sizes" );


// ajout des dimensions

for($i = 1; $i <= get_theme_mod( "sizes_number", "4" ); $i++)
{
	add_image_size(get_theme_mod("setting_image_sizes" .$i) ."px", get_theme_mod("setting_image_sizes" .$i), get_theme_mod("setting_image_sizes" .$i));
}









?>