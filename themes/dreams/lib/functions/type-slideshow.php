<?php
/**
 * This file contains all the botas functionality.
 *
 * @author Vita
 */

/**
 * ADD THE ACTIONS
 */
add_action('init', 'pexeto_register_slides_category');  
add_action('init', 'pexeto_register_slides_post_type');  
add_action('manage_posts_custom_column',  'slides_show_columns'); 
add_filter('manage_edit-slides_columns', 'slides_columns');

/**
 * Registers the botas category taxonomy.
 */
function pexeto_register_slides_category(){

	register_taxonomy("slideshow_category",
		array('slideshow'),
		array(	"hierarchical" => true,
			'labels' => array(
			    'name' => 'Categorias'
			),
	        'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			'rewrite' => array(
			    'slug' => 'slides'
			)
		)
	);
}

/**
 * Registers the botas custom type.
 */
function pexeto_register_slides_post_type() {

	register_post_type('slideshow', array(
		'labels' => array(
			'name' => 'Slides',
			'singular_name' => 'Slides',
			'add_new' => 'Agregar',
			'add_new_item' => 'Agregar Slide',
			'edit_item' => 'Editar Slide',
			'new_item' => 'Nuevo Slide',
			'all_items' => 'Slides',
			'view_item' => 'Ver Slides',
			'search_items' => 'Buscar Slides',
			'not_found' =>  'No se encontraron',
			'not_found_in_trash' => 'No se encontraron Slides en la papelera',
			'parent_item_colon' => '',
			'menu_name' => 'Slides'
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'slides'),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => true,
		'menu_position' => 5,
		'supports' => array('title'),
		'taxonomies' => array('slideshow_category'),
	));
}


function slides_columns($columns) {
	$columns['category'] = 'Categorias';
	return $columns;
}

/**
 * Add category column to the botas items page
 * @param $name
 */
function slides_show_columns($name) {
	global $post;
	switch ($name) {
		case 'category':
			$cats = get_the_term_list( $post->ID, 'slideshow_category', '', ', ', '' );
			echo $cats;
	}
}

