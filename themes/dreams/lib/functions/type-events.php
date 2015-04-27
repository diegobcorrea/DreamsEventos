<?php
/**
 * This file contains all the botas functionality.
 *
 * @author Vita
 */

/**
 * ADD THE ACTIONS
 */
add_action('init', 'pexeto_register_events_category');  
add_action('init', 'pexeto_register_events_post_type');  
add_action('manage_posts_custom_column',  'events_show_columns'); 
add_filter('manage_edit-events_columns', 'events_columns');

/**
 * Registers the botas category taxonomy.
 */
function pexeto_register_events_category(){

    register_taxonomy("events_category",
		array('events'),
    	array(
			'labels' => array(
			    'name' => 'Categorias'
			),
	        'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			'rewrite' => array(
			    'slug' => 'eventos/categoria'
			)
		)
	);
}

/**
 * Registers the botas custom type.
 */
function pexeto_register_events_post_type() {

	register_post_type('events', array(
        'labels' => array(
			'name' => 'Eventos',
			'singular_name' => 'Eventos',
			'add_new' => 'Agregar',
			'add_new_item' => 'Agregar Evento',
			'edit_item' => 'Editar Evento',
			'new_item' => 'Nuevo Evento',
			'all_items' => 'Eventos',
			'view_item' => 'Ver Eventos',
			'search_items' => 'Buscar Evento',
			'not_found' =>  'No se encontraron',
			'not_found_in_trash' => 'No se encontraron eventos en la papelera',
			'parent_item_colon' => '',
			'menu_name' => 'Eventos'
		),
        'public' => true,
        'has_archive' => false,
		'rewrite' => array('slug' => 'eventos'),
		'supports' => array('title', 'editor', 'thumbnail'),
    ));
}


function events_columns($columns) {
	$columns['category'] = 'Categorias';
	return $columns;
}

/**
 * Add category column to the botas items page
 * @param $name
 */
function events_show_columns($name) {
	global $post;
	switch ($name) {
		case 'category':
			$cats = get_the_term_list( $post->ID, 'events_category', '', ', ', '' );
			echo $cats;
	}
}

