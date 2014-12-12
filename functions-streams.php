<?php


class Streams
{
	protected static $assets_css = [];
	protected static $assets_js = [];
	
	public static function init()
	{
		add_action( 'init',                       ['Streams', 'post_type'     ] );
		// add_filter( 'json_authentication_errors', ['Streams', 'authentication'], 999 );
		
		add_action( 'wp_enqueue_scripts', ['Streams', 'assets'] );
	}
	
	// public static function authentication()
	// {
	// 	return true;
	// }
	
	public static function assets()
	{
		wp_enqueue_script( 'angular', Artificial_Intelligence::$dir .
		                   '/bower_components/angular/angular.min.js', [], '1.3.6', false );
		
		wp_enqueue_script( 'angular-sanitize', Artificial_Intelligence::$dir .
		                   '/bower_components/angular-sanitize/angular-sanitize.min.js',
											 ['angular'], '1.3.6', false );
		
		wp_enqueue_script( 'angular-resource', Artificial_Intelligence::$dir .
		                   '/bower_components/angular-resource/angular-resource.min.js',
											 ['angular'], '1.3.6', false );
		
		wp_enqueue_script( 'angular-route', Artificial_Intelligence::$dir .
		                   '/bower_components/angular-route/angular-route.min.js',
											 ['angular'], '1.3.6', false );
		
		wp_enqueue_script( 'wp-api' );
		
		
		wp_enqueue_style( 'bootstrap',
		  'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'
		);
		
		wp_enqueue_style( 'bootstrap-theme',
			'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css'
		);
		
		
		
		wp_enqueue_script( 'bootstrap-js',
			'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js',
			[],
			'3.3.1',
			true
		);
		
		wp_enqueue_script( 'streams-ctrls',
		                   Artificial_Intelligence::$dir . '/js/streams/controllers.js',
		                   [
		                   	'wp-api',
		                   	'angular',
		                   	'angular-sanitize',
		                   	'angular-resource',
		                   	'angular-route',
												// 'streams-factories',
		                   ], '', false );
		
		wp_enqueue_script( 'streams-factories',
											 Artificial_Intelligence::$dir . '/js/streams/factories.js',
											 [
											 	'wp-api',
											 	'angular',
											 	'angular-sanitize',
											 	'angular-resource',
											 	'angular-route'
											 ], '', false );
		
		wp_enqueue_script( 'streams',
		                   Artificial_Intelligence::$dir . '/js/streams/app.js',
											 [
											 	'wp-api',
											 	'angular',
											 	'angular-sanitize',
											 	'angular-resource',
											 	'angular-route',
												// 'streams-ctrls',
												// 'streams-factories'
											 ], '', false );
		
		wp_localize_script( 'streams', 'streamsConfig', [
			'partials' => Artificial_Intelligence::$dir . '/streams',
		]);
	}
	
	public static function post_type()
	{
		register_post_type( 'streams', [
			'labels' => [
				'name'               => __( 'Streams' ),
				'singular_name'      => __( 'Stream Post' ),
			],
			'description'          => 'A realtime communications application.',
			'menu_position'        => 20,
			'menu_icon'            => 'dashicons-dashboard',
			'public'               => true,
			'show_ui'              => true,
			'exclude_from_search'  => false,
			'publicly_queryabale'  => false,
			'rewrite'              => false,
			'supports'             => [
				'title', 'author', 'revisions',
				'editor', 'post-formats', 'comments',
			],
		]);
		
		register_taxonomy( 'stream-cats', ['streams'], [
			'labels' => [
				'name'           => 'Groups',
				'singular_name'  => 'Group',
			],
			'public'        => true,
			'show_tagcloud' => false,
		]);
	}
	
}

// if ( is_page_template( 'streams.php' ) )
	Streams::init();
