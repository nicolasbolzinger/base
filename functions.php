<?php


/* -------------------------------------------

# SCRIPTS ET STYLES

------------------------------------------- */

add_action( 'wp_enqueue_scripts', 'global_enqueues' );
function global_enqueues() {

  if ( !is_admin() ) {

    wp_dequeue_style( 'dashicon' );

    //* Déplace jquery dans footer
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_enqueue_script( 'jquery' );

  };

  //* Charge le fichier main.css
  wp_enqueue_style( 'mainCss' , get_stylesheet_directory_uri() . '/css/main.css' );

  //* Charge les polices
  // wp_enqueue_style( 'google-fonts', 'URL_DES_POLICES' );

  //* Charge le fichier main.js dans le footer
  wp_enqueue_script( 'mainJs' , get_stylesheet_directory_uri() . '/js/main.min.js', array(), false, true );


}

//* Retire le chargement des emoticones dans wp_head
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );




/* -------------------------------------------

# INSTALLATION GLOBALE

------------------------------------------- */

add_action( 'genesis_setup', 'global_setup', 15 );
function global_setup() {

  include_once( get_stylesheet_directory() . '/inc/genesis-change.php' );
  include_once( get_stylesheet_directory() . '/inc/wordpress-cleanup.php' );
  include_once( get_stylesheet_directory() . '/inc/accessibilite.php' );
  include_once( get_stylesheet_directory() . '/inc/navigation.php' );



}


/* -------------------------------------------

# TRADUCTION

------------------------------------------- */

add_action( 'after_setup_theme', 'traduction' );
function traduction() {
  load_child_theme_textdomain( 'genesis', get_stylesheet_directory() . '/lib/languages/' );
}
