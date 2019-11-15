<?php
/**
 * Plugin Name:       Water For Grassroots
 * Description:       Create custom post type for Water For Grassroots.
 * Version:           1
 * Requires at least: 5.3
 * Author:            Ragtag
 * Author URI:        https://ragtag.org/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       water-for-grassroots
 */

// Register Custom Post Type
function waterforgrassroots_register_cpt_organization() {

	$labels = array(
		'name'                  => _x( 'Organizations', 'Post Type General Name', 'water-for-grassroots' ),
		'singular_name'         => _x( 'Organization', 'Post Type Singular Name', 'water-for-grassroots' ),
		'menu_name'             => __( 'Organizations', 'water-for-grassroots' ),
		'name_admin_bar'        => __( 'Organization', 'water-for-grassroots' ),
		'archives'              => __( 'Organization Archives', 'water-for-grassroots' ),
		'attributes'            => __( 'Organization Attributes', 'water-for-grassroots' ),
		'parent_item_colon'     => __( 'Parent Organization:', 'water-for-grassroots' ),
		'all_items'             => __( 'All Organizations', 'water-for-grassroots' ),
		'add_new_item'          => __( 'Add New Organization', 'water-for-grassroots' ),
		'add_new'               => __( 'Add New', 'water-for-grassroots' ),
		'new_item'              => __( 'New Organization', 'water-for-grassroots' ),
		'edit_item'             => __( 'Edit Organization', 'water-for-grassroots' ),
		'update_item'           => __( 'Update Organization', 'water-for-grassroots' ),
		'view_item'             => __( 'View Organization', 'water-for-grassroots' ),
		'view_items'            => __( 'View Organizations', 'water-for-grassroots' ),
		'search_items'          => __( 'Search Organization', 'water-for-grassroots' ),
		'not_found'             => __( 'Not found', 'water-for-grassroots' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'water-for-grassroots' ),
		'featured_image'        => __( 'Featured Image', 'water-for-grassroots' ),
		'set_featured_image'    => __( 'Set featured image', 'water-for-grassroots' ),
		'remove_featured_image' => __( 'Remove featured image', 'water-for-grassroots' ),
		'use_featured_image'    => __( 'Use as featured image', 'water-for-grassroots' ),
		'insert_into_item'      => __( 'Insert into Organization', 'water-for-grassroots' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Organization', 'water-for-grassroots' ),
		'items_list'            => __( 'Organizations list', 'water-for-grassroots' ),
		'items_list_navigation' => __( 'Organizations list navigation', 'water-for-grassroots' ),
		'filter_items_list'     => __( 'Filter Organizations list', 'water-for-grassroots' ),
	);
	$args = array(
		'label'                 => __( 'Organization', 'water-for-grassroots' ),
		'description'           => __( 'Organizations affiliated with Water for Grassroots', 'water-for-grassroots' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', 'excerpt' ),
		'taxonomies'            => array( 'region' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'organization', $args );

}
add_action( 'init', 'waterforgrassroots_register_cpt_organization', 0 );

// Register Custom Taxonomy
function waterforgrassroots_register_tax_region() {

	$labels = array(
		'name'                       => _x( 'Regions', 'Taxonomy General Name', 'water-for-grassroots' ),
		'singular_name'              => _x( 'Region', 'Taxonomy Singular Name', 'water-for-grassroots' ),
		'menu_name'                  => __( 'Region', 'water-for-grassroots' ),
		'all_items'                  => __( 'All Regions', 'water-for-grassroots' ),
		'parent_item'                => __( 'Parent Region', 'water-for-grassroots' ),
		'parent_item_colon'          => __( 'Parent Region:', 'water-for-grassroots' ),
		'new_item_name'              => __( 'New Region Name', 'water-for-grassroots' ),
		'add_new_item'               => __( 'Add New Region', 'water-for-grassroots' ),
		'edit_item'                  => __( 'Edit Region', 'water-for-grassroots' ),
		'update_item'                => __( 'Update Region', 'water-for-grassroots' ),
		'view_item'                  => __( 'View Region', 'water-for-grassroots' ),
		'separate_items_with_commas' => __( 'Separate Regions with commas', 'water-for-grassroots' ),
		'add_or_remove_items'        => __( 'Add or remove Regions', 'water-for-grassroots' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'water-for-grassroots' ),
		'popular_items'              => __( 'Popular Regions', 'water-for-grassroots' ),
		'search_items'               => __( 'Search Regions', 'water-for-grassroots' ),
		'not_found'                  => __( 'Not Found', 'water-for-grassroots' ),
		'no_terms'                   => __( 'No Regions', 'water-for-grassroots' ),
		'items_list'                 => __( 'Regions list', 'water-for-grassroots' ),
		'items_list_navigation'      => __( 'Regions list navigation', 'water-for-grassroots' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'region', array( 'organization' ), $args );

}
add_action( 'init', 'waterforgrassroots_register_tax_region', 0 );
