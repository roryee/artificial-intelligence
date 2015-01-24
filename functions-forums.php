<?php

class Forums
{
	
	public static function init()
	{
		add_action( 'init', array(
			'Forums', 'post_type'
		));
		
		add_action( 'init', array(
			'Forums', 'menus',
		));
		
		add_action( 'widgets_init', array(
			'Forums', 'widgets'
		));
		
		add_action( 'wp_enqueue_scripts', array(
			'Forums', 'assets'
		));
		
	}
	
	public static function post_type()
	{
		
		register_post_type( 'forum_thread', array(
			
			'labels' => array(
				'name'                => __( 'Forum Threads' ),
				'singular_name'       => __( 'Forum' ),
				'menu_name'           => __( 'Forums' ),
				'name_admin_bar'      => __( 'Forum Thread' ),
				'all_items'           => __( 'Threads' ),
				'add_new'             => __( 'New Thread' ),
				'add_new_item'        => __( 'Forum Thread' ),
				'edit_name'           => __( 'Forum' ),
				'new_item'            => __( 'Forum Thread' ),
				'view_item'           => __( 'Forum Thread' ),
				'search_items'        => __( 'Forum' ),
				'not_found'           => __( 'Forum' ),
				'not_found_in_trash'  => __( 'forum' ),
				'parent_item_colon'   => __( 'parent thread' ),
			),
			
			'description' => __( 'Forums posts' ),
			
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			
			'menu_position' => 21,
			'menu_icon' => 'dashicons-format-status',
			
			'capability_type' => 'post',
			// TODO: Add custom capabilities
			// 'capabilities' => array(
			// 	'edit_post'
			// 	'delete_post'
			// 	'read_post'
			// 	'edit_posts'
			// 	'edit_others_posts'
			// ),
			
			'supports' => array(
				'title', 'editor', 'author', 'comments', 'revisions'
			),
			
			'rewrite' => array(
				'slug' => 'forums/t',
				'pages' => true,
			),
			'hierarchial' => false,
			// 'query_var' => true,
			
			'has_archive' => 'forums',
			'can_export' => true,
			
		));
		
		register_taxonomy( 'forum', array( 'forum_thread' ), array(
			
			'labels' => array(
				'name'                        => __( 'Forums' ),
				'singular_name'               => __( 'Forum' ),
				'menu_name'                   => __( 'Forums' ),
				'all_items'                   => __( 'All Forums' ),
				'edit_item'                   => __( 'Edit Forum' ),
				'view_item'                   => __( 'View Forum' ),
				'update_item'                 => __( 'Update Forum' ),
				'add_new_item'                => __( 'Add New Forum' ),
				'new_item_name'               => __( 'New Forum Name' ),
				'parent_item'                 => __( 'Parent Forum' ),
				'parent_item_colon'           => __( 'Parent Forum:' ),
				'search_items'                => __( 'Search Forums' ),
			),
			
			'public' => true,
			
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
			'hierarchical' => true,
			
			'rewrite' => array(
				'slug' => 'forums/f',
				'hierarchical' => true,
			),
			
			// TODO: Add capabilities
			// 'capabilities' => array(
			//
			// ),
			
		));
		
		
		register_taxonomy( 'forum_tag', array( 'forum_thread' ), array(
			'labels' => array(
				'name'                        => __( 'Tags' ),
				'singular_name'               => __( 'Tag' ),
				'menu_name'                   => __( 'Tags' ),
				'all_items'                   => __( 'All Tags' ),
				'edit_item'                   => __( 'Edit Tag' ),
				'view_item'                   => __( 'View Tag' ),
				'update_item'                 => __( 'Update Tag' ),
				'add_new_item'                => __( 'Add New Tag' ),
				'new_item_name'               => __( 'New Forum Tag' ),
				'parent_item'                 => __( 'Parent Tag' ),
				'parent_item_colon'           => __( 'Parent Tag:' ),
				'search_items'                => __( 'Search Tag' ),
				'popular_items'               => __( 'Popular Tags' ),
				'seperate_items_with_commas'  => __( 'Separate tags with colons' ),
				'add_or_remove_items'         => __( 'Add or remove tags' ),
				'choose_from_most_used'       => __( 'Choose from the most-used tags' ),
				'not_found'                   => __( 'No forums found.' ),
			),
			
			'public' => false,
			
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
			'hierarchial' => false,
			
			'rewrite' => array(
				'slug' => 'forums/tags',
			),
			
			// TODO: Add capabilities
			// 'capabilities' => array(
			//
			// ),
			
		));
		
	}
	
	public static function menus()
	{
		register_nav_menus( array(
			'forums_primary' =>          __( 'Forums' ),
			'forums_offcanvas_left'  =>  __( 'Forums Mobile' ),
		));
	}
	
	public static function widgets()
	{
		$sidebars = array(
			array(
				'name'          => 'Footer',
				'id'            => 'forums_footer',
				'description'   => 'Forums footer',
				'before_widget' => '<div id="%1$s" class="col %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h6>',
				'after_title'   => '</h6>',
			),
		);
		
		foreach ( $sidebars as $sidebar )
		{
			register_sidebar( $sidebar );
		}
		
	}
	
	public static function assets()
	{
		if ( is_forums() )
			wp_register_style(
				'forums',
				Artificial_Intelligence::$dir_abs . '/forums/gen/' . Artificial_Intelligence::$skin . '.css'
			);
		
		if ( is_forums() )
			wp_register_script(
				'forums',
				Artificial_Intelligence::$dir_abs . '/forums/gen/forums.js',
				array(
					'modernizr',
					'respond',
					'jquery',
					'slidesjs',
					'gsap',
				),
				'',
				true
			);
		
		if ( is_forums() )
		{
			wp_enqueue_style(  'forums' );
			wp_enqueue_script( 'forums' );
		}
		
	}
	
}

Forums::init();

/**
* Returns true if current page is forums-related.
*
* @return bool
**/
function is_forums()
{
	return is_singular( 'forum_thread' ) || is_post_type_archive( 'forum_thread' ) || is_tax( 'forum' ) || is_tax( 'forum_tag' );
}
