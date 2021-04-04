<?php

add_theme_support(
  'html5',
  array(
    'caption',
    'comment-form',
    'comment-list',
    'gallery',
    'search-form'
  )
);


add_theme_support( 'genesis-responsive-viewport' );


//* SUPPRIME OU AJOUTE .wrap autours des éléments listés
add_theme_support(
  'genesis-structural-wraps',
  array(
    'menu-primary',
    'menu-secondary',
    // 'site-inner',
    'footer-widgets',
    'footer',
  )
);

//* Supprime le chargement de style.css par défaut
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
//* Retire la barre latérale alternative
unregister_sidebar( 'sidebar-alt' );
//* retire la zone de widget sous le header
unregister_sidebar( 'header-right' );
//* Supprime le favicon par défaut de Genesis
remove_action( 'wp_head', 'genesis_load_favicon' );
//* Supprime la description du site dans le header
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
//* Supprime les méta données de .entry-header
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
//* Supprime la sidebar principale
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

//# Ajoute un wrap .content-area
add_filter( 'genesis_attr_content-sidebar-wrap', 'change_content_sidebar_wrap' );
function change_content_sidebar_wrap( $attributes ) {
	$attributes['class'] = ' content-area';
	return $attributes;
}

//* Ajoute un ID a site-inner
add_filter( 'genesis_attr_site-inner', 'site_inner_id' );
function site_inner_id( $attributes ) {
	$attributes['id'] = 'main-content';
	return $attributes;
}


//* Supprime les breadcrumbs avant la boucle WordPress
// remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_filter( 'genesis_breadcrumb_args', 'breadcrumb_args' );
function breadcrumb_args( $args ) {
	$args['home'] = 'Accueil';
	$args['sep'] = ' / ';
	$args['list_sep'] = ', '; // Genesis 1.5 and later
	$args['prefix'] = '<nav class="breadcrumb">';
	$args['suffix'] = '</nav>';
	$args['heirarchial_attachments'] = true; // Genesis 1.5 and later
	$args['heirarchial_categories'] = true; // Genesis 1.5 and later
	$args['display'] = true;
	$args['labels']['prefix'] = '';
	$args['labels']['author'] = '';
	$args['labels']['category'] = ''; // Genesis 1.6 and later
	$args['labels']['tag'] = '';
	$args['labels']['date'] = '';
	$args['labels']['search'] = '';
	$args['labels']['tax'] = '';
	$args['labels']['post_type'] = '';
	$args['labels']['404'] = ''; // Genesis 1.5 and later
return $args;
}

/* -------------------------------------------

# MICRO DATAS

------------------------------------------- */
// Supprime les données structurées par défaut de Genesis.
add_filter( 'genesis_disable_microdata', '__return_true' );
