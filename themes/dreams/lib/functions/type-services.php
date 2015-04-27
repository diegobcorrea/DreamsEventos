<?php
/**
 * This file contains all the botas functionality.
 *
 * @author Vita
 */

/**
 * ADD THE ACTIONS
 */
add_action('init', 'pexeto_register_services_post_type');  

/**
 * Registers the botas custom type.
 */
function pexeto_register_services_post_type() {

	register_post_type('services', array(
        'labels' => array(
	    	'name' => 'Servicios',
	    	'all_items' => 'Ver Servicios',
	    	'singular_name' => 'Servicio',
			'add_new' => 'Agregar',
			'add_new_item' => 'Agregar Servicio',
			'edit_item' => 'Editar Servicio',
			'new_item' => 'Nuevo Servicio',
			'view_item' => 'Ver Servicio',
			'search_items' => 'Buscar Servicios',
			'not_found' =>  'No se encontró',
			'not_found_in_trash' => 'No se encontró en papelera',
			'parent_item_colon' => '',
			'menu_name' => 'Servicios'
		),
        'public' => true,
        'has_archive' => false,
		'rewrite' => array('slug' => 'servicios'),
		'supports' => array('title', 'editor', 'thumbnail'),
    ));
}

