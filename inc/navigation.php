<?php

//* Supprime la navigation après le bloc .site-header
remove_action( 'genesis_after_header', 'genesis_do_nav' );
//* Ajoute la navigation dans le bloc .site-header
// add_action( 'genesis_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'accessibleNav');

function accessibleNav() {
    $buttonClose = '<button id="menuClose" class="menu-button">X</button>';
    $buttonOpen = '<button id="menuOpen" class="menu-button">O</button>';
    $items_wrap = $buttonOpen;
    $items_wrap .= '<ul id="%1$s" class="%2$s">%3$s';
    $items_wrap .= sprintf( '<li id="">%1$s</li></ul>', $buttonClose );
    wp_nav_menu( array(
        'theme_location'    => 'menu-accessible',
        'container'         => 'nav',
        'container_class'   => 'nav-primary',
        'container_id'      => 'main-nav',
        'menu_class'        => 'menu',
        'menu_id'           => 'nav-primary-list',
        'items_wrap'        => $items_wrap
    )
 );
}



/* ----------------------------
CLEAN UP
-----------------------------*/

//* Modifie class des items dans le menu
add_filter( 'nav_menu_css_class', 'clean_nav_menu_classes', 5 );
function clean_nav_menu_classes( $classes ) {
  if( ! is_array( $classes ) )
    return $classes;

	foreach( $classes as $i => $class ) {

      //* Retire class .menu-item-ID
      $id = strtok( $class, 'menu-item-' );
      if( 0 < intval( $id ) )
		unset( $classes[ $i ] );

      //* Retire class .menu-item-type-*
      if( false !== strpos( $class, 'menu-item-type-' ) )
		unset( $classes[ $i ] );

      //* Retire class .menu-item-object-*
      if( false !== strpos( $class, 'menu-item-object-' ) )
		unset( $classes[ $i ] );

      // Change page ancestor to menu ancestor
      if( 'current-page-ancestor' == $class ) {
		$classes[] = 'current-menu-ancestor';
		  unset( $classes[ $i ] );
      }
	}

	//* Retire la class du sous-menu si depth est limitée
	if( isset( $args->depth ) && 1 === $args->depth ) {
      $classes = array_diff( $classes, array( 'menu-item-has-children' ) );
	}

	return $classes;
}
