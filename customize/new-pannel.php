<?php
/* 	ajout des panneaux:
	design home
	photo design
	archive page design
	custom taxo page design
	wp page design */

function oetl_pannels_register($wp_customize)
{

/* 	panneau pour gérer les tailles des photos et les champs ACF */
	$wp_customize->add_panel( 'photos', array
									(
									    'priority'       => 100,
									    'capability'     => 'edit_theme_options',
									    'theme_supports' => '',
									    'title'          => 'Photos',
									    'description'    => 'organisation des photos sur le site',
									)
					);
}
add_action( 'customize_register' ,"oetl_pannels_register" );



?>