<?php
/*
Plugin Name: add photos metas
Plugin URI: http://ombres-et-lumieres.eu
Description: récupération des mots clefs des photos et autre éléments nécessaires
Version: 1.0.0
Author: Eric Wayaffe
Author URI: ombres-et-lumieres.eu
 License: GPL2
*/




if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');



define( 'PHOTOS_METAS_URL', plugin_dir_url( __FILE__ ) );





function olhk_load_text_domain()
{
	load_plugin_textdomain("ol_hierarchical_keywords", false, 'WP_PLUGIN_DIR' . "/languages");
}
add_action("init", "olhk_load_text_domain");


defined('ABSPATH') or die("No script kiddies please!");





include( "actions/photo-metas.php");
include( "actions/shortcodes.php");
include( "customize/organise-photos.php");
include( "customize/customizer-functions.php");
include( "customize/new-pannel.php");


// Deux dossiers: un pour des actions pour récupérer différentes données des photos chargées dans la bibliothèque et la création d' un shortcode et un pour ajouter une entrée dans le customizer qui ajoutera des tailles de photo supplémentaires ainsi que des noms de champs ACF traités dans l' autre dossier






















?>