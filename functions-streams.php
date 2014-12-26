<?php

class Streams
{
	protected static $assets_css = [];
	protected static $assets_js = [];
	
	public static function init()
	{
		add_action( 'init',               ['Streams', 'post_type'] );
		add_action( 'wp_enqueue_scripts', ['Streams', 'assets'   ] );
	}
	
	public static function auth()
	{
		if ( ! is_user_logged_in )
			return false;
		
		return true;
	}
	
	public static function assets()
	{
		if ( is_page_template( 'streams.php' ) )
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
			  Artificial_Intelligence::$dir . '/bower_components/bootstrap/dist/css/bootstrap.min.css'
			);
			
			wp_enqueue_style( 'bootstrap-theme',
				Artificial_Intelligence::$dir . '/bower_components/bootstrap/dist/css/bootstrap-theme.min.css'
			);
			
			
			
			wp_enqueue_script( 'bootstrap-js',
				Artificial_Intelligence::$dir . '/bower_components/bootstrap/dist/js/bootstrap.min.js',
				['jquery'],
				'3.3.1',
				true
			);
			
			
			wp_enqueue_script( 'streams',
			                   Artificial_Intelligence::$dir . '/streams/streams.js',
												 [
												 	'wp-api',
												 	'angular',
												 	'angular-sanitize',
												 	'angular-resource',
												 	'angular-route',
												 ], '', false );
			
			ob_start();
			dynamic_sidebar('sidebar_streams');
			$sidebar = ob_get_clean();
			
			wp_localize_script( 'streams', 'streamsConfig', [
				'partials' => Artificial_Intelligence::$dir . '/streams/partials',
				'sidebar'  => $sidebar,
				'urls'     => [
					'admin'   => admin_url(),
					'profile' => admin_url( 'profile.php' ),
					'logout'  => wp_logout_url( home_url() ),
				],
			]);
			
			unset($sidebar);
			
		}
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
			'taxonomies'           => ['post_tag'],
		]);
		
		register_taxonomy( 'stream_cats', ['streams'], [
			'labels' => [
				'name'           => 'Groups',
				'singular_name'  => 'Group',
			],
			'public'        => true,
			'show_tagcloud' => false,
			'hierarchial'   => false,
		]);
	}
	
}

// Streams::init();
