<?php 
/**
 * Communities
 * @package brandco
 */

add_action( 'init', 'RegisterCPT_AreaLinks' );
function RegisterCPT_AreaLinks() {
	$menu_name = 'Area Links';
	$regular_name = 'Area Links';
	$singular_name = 'Link';
	$register_name = 'area-links';
	$icon = 'dashicons-location-alt';

	$labels = array(
		'name'               => _x( $regular_name, 'post type general name', 'brandco' ),
		'singular_name'      => _x( $singular_name, 'post type singular name', 'brandco' ),
		'menu_name'          => _x( $menu_name, 'admin menu', 'brandco' ),
		'name_admin_bar'     => _x( $singular_name, 'add new on admin bar', 'brandco' ),
		'add_new'            => _x( 'Add New', $register_name, 'brandco' ),
		'add_new_item'       => __( 'Add New ' . $singular_name, 'brandco' ),
		'new_item'           => __( 'New ' . $singular_name, 'brandco' ),
		'edit_item'          => __( 'Edit ' . $singular_name, 'brandco' ),
		'view_item'          => __( 'View ' . $singular_name, 'brandco' ),
		'all_items'          => __( 'All ' . $regular_name, 'brandco' ),
		'search_items'       => __( 'Search ' . $regular_name, 'brandco' ),
		'parent_item_colon'  => __( 'Parent ' . $regular_name . ':', 'brandco' ),
		'not_found'          => __( 'No ' . $regular_name . ' found.', 'brandco' ),
		'not_found_in_trash' => __( 'No ' . $regular_name . ' found in Trash.', 'brandco' )
	);

	# There is a customizer option to choose a Page. 
	# If a Page is chosen, refresh the permalinks to 
	# use that page's slug for this custom post type
	$theme_mod_id = get_theme_mod( 'page_for_' . $register_name );
	if ( $theme_mod_id ) {
		global $post;
		$slug_by_id = get_post( $theme_mod_id )->post_name;
		$slug = array( 'slug' => $slug_by_id );
	} else {
		$slug = array( 'slug' => $register_name );
	}

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => $slug,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			 => $icon,
		'supports'           => array( 'title', 'editor', 'page-attributes', 'thumbnail' )
	);
	register_post_type( $register_name, $args );		
}

function arealink_title( $title ){
     $screen = get_current_screen();
 
     if  ( 'area-links' == $screen->post_type ) {
          $title = 'Enter local area place name here';
     }
 
     return $title;
}
add_filter( 'enter_title_here', 'arealink_title' );


