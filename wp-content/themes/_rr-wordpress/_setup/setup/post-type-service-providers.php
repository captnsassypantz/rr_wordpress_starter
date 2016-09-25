<?php
/**
 * Communities
 * @package brandco
 */

function service_providers_taxonomy() {
	register_taxonomy(
		'service-providers',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'services',   		 //post type name
		array(
			'hierarchical' 		=> true,
			'label' 			=> 'Service Types',  //Display name
			'query_var' 		=> true,
			'rewrite'			=> array(
					'slug' 			=> 'services', // This controls the base slug that will display before each term
					'with_front' 	=> false // Don't display the category base before
					)
			)
		);
}
add_action( 'init', 'service_providers_taxonomy');

/**
 * Maintain the permalink structure for custom taxonomy
 * Display custom taxonomy term name before post related to that term
 * @uses post_type_filter hook
 */
function filter_post_type_link( $link, $post) {
    if ( $post->post_type != 'services' )
        return $link;

    if ( $cats = get_the_terms( $post->ID, 'service-providers' ) )
        $link = str_replace( '%service-providers%', array_pop($cats)->slug, $link );
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);

function service_provider_name_title( $title ){
     $screen = get_current_screen();

     if  ( 'service-providers' == $screen->post_type ) {
          $title = 'Enter company name here';
     }

     return $title;
}

add_filter( 'enter_title_here', 'service_provider_name_title' );

add_action( 'init', 'RegisterCPT_ServiceProviders' );
function RegisterCPT_ServiceProviders() {
	$menu_name = 'Service Providers';
	$regular_name = 'Service Providers';
	$singular_name = 'Provider';
	$register_name = 'service-providers';
	$icon = 'dashicons-universal-access-alt';

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
		'capability_type'    => 'page',
		'has_archive'        => true,
		'taxonomies' => array('service-providers'),
		// 'rewrite' => array('slug' => 'themes/%service-providers%','with_front' => FALSE),
		'hierarchical'       => true,
		'menu_position'      => null,
		'menu_icon'			 => $icon,
		'supports'           => array( 'title', 'editor', 'page-attributes', 'thumbnail' )
	);
	register_post_type( $register_name, $args );
}
