<?php

/**
 * Streams class.
 *
 * @package Artificial Intelligence
 * @subpackage Streams
 * @version 0.9
 *
 * @since 0.9 Initial release.
 **/
class Streams
{
	
	/**
	 * Initializes Streams.
	 *
	 * @since 0.9 Initial release.
	 **/
	public static function init()
	{
		
		// Register Streams post type.
		//
		add_action( 'init', array(
			'Streams', 'post_type'
		));
		
		// Enqueue Streams assets.
		//
		add_action( 'wp_enqueue_scripts', array(
			'Streams', 'assets'
		));
		
	}
	
	/**
	 * Enqueue Streams assets.
	 *
	 * @since 0.9 Initial release.
	 **/
	public static function assets()
	{
		
		if ( is_page_template( 'streams.php' ) )
		{
			// AngularJS
			// Front-end framework.
			//
			wp_enqueue_script( 'angular', Artificial_Intelligence::$dir_abs .
			                   '/bower_components/angular/angular.min.js', array(), '1.3.6', false );
			
			// AngularJS Sanitize
			// Plugin for AngularJS.
			//
			wp_enqueue_script( 'angular-sanitize', Artificial_Intelligence::$dir_abs .
			                   '/bower_components/angular-sanitize/angular-sanitize.min.js',
												 array('angular'), '1.3.6', false );
			
			// AngularJS Resource
			// Plugin for AngularJS.
			wp_enqueue_script( 'angular-resource', Artificial_Intelligence::$dir_abs .
			                   '/bower_components/angular-resource/angular-resource.min.js',
												 array('angular'), '1.3.6', false );
			
			// AngularJS Route
			// Plugin for AngularJS.
			wp_enqueue_script( 'angular-route', Artificial_Intelligence::$dir_abs .
			                   '/bower_components/angular-route/angular-route.min.js',
												 array('angular'), '1.3.6', false );
			
			// Enqueue JSON API.
			//
			wp_enqueue_script( 'wp-api' );
			
			// Bootstrap
			// Design framework that makes rapid prototyping easy.
			//
			wp_enqueue_style( 'bootstrap',
			  Artificial_Intelligence::$dir_abs . '/bower_components/bootstrap/dist/css/bootstrap.min.css'
			);
			
			// Bootstrap Theme
			// Adds visual styles to Bootstrap components.
			//
			wp_enqueue_style( 'bootstrap-theme',
				Artificial_Intelligence::$dir_abs . '/bower_components/bootstrap/dist/css/bootstrap-theme.min.css'
			);
			
			// Bootstrap JavaScript
			// Provides interactivity for Bootstrap components.
			//
			wp_enqueue_script( 'bootstrap-js',
				Artificial_Intelligence::$dir_abs . '/bower_components/bootstrap/dist/js/bootstrap.min.js',
				array('jquery'),
				'3.3.1',
				true
			);
			
			// Streams app
			// Primary Streams JavaScript app file
			//
			wp_enqueue_script( 'streams',
			                   Artificial_Intelligence::$dir_abs . '/streams/streams.js',
												 array(
												 	'wp-api',
												 	'angular',
												 	'angular-sanitize',
												 	'angular-resource',
												 	'angular-route',
												 ), '', false );
			
			// Output sidebar
			//
			ob_start();
			dynamic_sidebar('sidebar_streams');
			$sidebar = ob_get_clean();
			
			// Inject information into JavaScript.
			//
			wp_localize_script( 'streams', 'streamsConfig', array(
				'partials' => Artificial_Intelligence::$dir_abs . '/streams/partials',
				'sidebar'  => $sidebar,
				'urls'     => array(
					'admin'   => admin_url(),
					'profile' => admin_url( 'profile.php' ),
					'logout'  => wp_logout_url( home_url() ),
				),
			));
			
			unset($sidebar);
			
		}
	}
	
	/**
	 * Register Streams post type and taxonomy.
	 *
	 * @since 0.9 Initial release.
	 **/
	public static function post_type()
	{
		
		// Register Streams post type.
		//
		register_post_type( 'streams', array(
			'labels' => array(
				'name'               => __( 'Streams' ),
				'singular_name'      => __( 'Stream Post' ),
			),
			'description'          => 'A realtime communications application.',
			'menu_position'        => 20,
			'menu_icon'            => 'dashicons-dashboard',
			'public'               => true,
			'show_ui'              => true,
			'exclude_from_search'  => false,
			'publicly_queryabale'  => false,
			'rewrite'              => false,
			'supports'             => array(
				'title', 'author', 'revisions',
				'editor', 'post-formats', 'comments',
			),
			'taxonomies'           => array('post_tag'),
		));
		
		// Register Streams categories.
		//
		register_taxonomy( 'stream_cats', array('streams'), array(
			'labels' => array(
				'name'           => 'Groups',
				'singular_name'  => 'Group',
			),
			'public'        => true,
			'show_tagcloud' => false,
			'hierarchial'   => false,
		));
		
	}
	
}

// Initialize Streams.
//
// Streams::init();
