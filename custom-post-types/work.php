<?php

	add_action( 'init', 'create_post_type_work' );

	function create_post_type_work() {
		register_post_type( 'work',
		array(
			'labels'             =>
			array(
				'name'               => _x( 'Work', 'post type general name', 'your-plugin-textdomain' ),
				'singular_name'      => _x( 'Work', 'post type singular name', 'your-plugin-textdomain' ),
				'menu_name'          => _x( 'Work', 'admin menu', 'your-plugin-textdomain' ),
				'name_admin_bar'     => _x( 'Work', 'add new on admin bar', 'your-plugin-textdomain' ),
				'add_new'            => _x( 'Add New', 'Work', 'your-plugin-textdomain' ),
				'add_new_item'       => __( 'Add New Work', 'your-plugin-textdomain' ),
				'new_item'           => __( 'New Work', 'your-plugin-textdomain' ),
				'edit_item'          => __( 'Edit Work', 'your-plugin-textdomain' ),
				'view_item'          => __( 'View Work', 'your-plugin-textdomain' ),
				'all_items'          => __( 'All Works', 'your-plugin-textdomain' ),
				'search_items'       => __( 'Search Works', 'your-plugin-textdomain' ),
				'parent_item_colon'  => __( 'Parent Works:', 'your-plugin-textdomain' ),
				'not_found'          => __( 'No Works found.', 'your-plugin-textdomain' ),
				'not_found_in_trash' => __( 'No Works found in Trash.', 'your-plugin-textdomain' )
			),
	        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'work' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'   			 => 'dashicons-images-alt2',
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		));
	}

?>
