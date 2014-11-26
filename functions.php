<?php

class Artificial_Intelligence
{
	
	public static $assets_css = [
		[
			'slug' => 'frontend',
			'uri' => '/css/frontend.css',
		],
	];

	public static $assets_js = [
		[
			'slug' => 'modernizr',
			'uri' => '/js/deps/modernizr.js',
			'deps' => array(),
			'vers' => '',
			'footer' => true,
		],
		[
			'slug' => 'gsap',
			'uri' => '/bower_components/gsap/src/minified/TweenMax.min.js',
			'deps' => array(),
			'vers' => '',
			'footer' => true,
		],
		[
			'slug' => 'jquery-gsap',
			'uri' => '/bower_components/gsap/src/minified/jquery.gsap.min.js',
			'deps' => ['jquery', 'gsap'],
			'vers' => '',
			'footer' => true,
		],
		[
			'slug' => 'slidesjs',
			'uri' => '/bower_components/slidesjs/source/jquery.slides.min.js',
			'deps' => ['jquery'],
			'vers' => '',
			'footer' => true,
		],
		[
			'slug' => 'jquery-cookie',
			'uri' => '/bower_components/jquery-cookie/jquery.cookie.js',
			'deps' => ['jquery'],
			'vers' => '',
			'footer' => true,
		],
		[
			'slug' => 'slider',
			'uri' => '/js/slider.js',
			'deps' => ['jquery', 'slidesjs'],
			'vers' => '',
			'footer' => true,
		],
	];

	public static function init()
	{
		add_action( 'wp_enqueue_scripts', ['Artificial_Intelligence', 'assets'] );
	}

	public static function assets()
	{
		foreach ( self::$assets_css as $style )
		{
			wp_enqueue_style(
				$style['slug'],
				get_template_directory_uri() . $style['uri']
			);
		}

		foreach ( self::$assets_js as $script )
		{
			wp_enqueue_script(
				$script['slug'],
				get_template_directory_uri() . $script['uri'],
				$script['deps'],
				$script['vers'],
				$script['footer']
			);
		}
	}

}

Artificial_Intelligence::init();
