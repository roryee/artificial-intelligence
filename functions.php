<?php

class Artificial_Intelligence
{
	
	public static $dir;
	
	protected static $assets_css = [
		[
			'slug' => 'frontend',
			'uri' => '/css/frontend.css',
		],
	];

	protected static $assets_js = [
		[
			'slug' => 'modernizr',
			'uri' => '/js/deps/modernizr.js',
			'deps' => [],
			'vers' => '',
			'footer' => true,
		],
		[
			'slug' => 'gsap',
			'uri' => '/bower_components/gsap/src/minified/TweenMax.min.js',
			'deps' => [],
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
	
	protected static $menus = [
		'primary' => 'Primary Navigation',
		'mobile'  => 'Mobile Navigation',
		'admin'   => 'Admin Navigation',
	];
	
	protected static $sidebars = [
		[
			'name'          => 'Footer',
			'id'            => 'footer',
			'description'   => 'Primary footer',
			'before_widget' => '<div id="%1$s" class="col %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',
		],
	];
	
	
	public static function init()
	{
		
		self::$dir = get_template_directory_uri();
		
		add_action( 'after_setup_theme',  ['Artificial_Intelligence', 'setup'  ] );
		add_action( 'wp_enqueue_scripts', ['Artificial_Intelligence', 'assets' ] );
		add_action( 'init',               ['Artificial_Intelligence', 'menus'  ] );
		add_action( 'widgets_init',       ['Artificial_Intelligence', 'widgets'] );
	}
	
	public static function setup()
	{
		add_theme_support( 'html5', [
			'comment-list', 'comment-form', 'search-form', 'gallery', 'caption',
		]);
		
		add_theme_support( 'custom-background', [
			'default-color'      => '#eee',
			'default-image'      => self::$dir . '/images/robot2.jpg',
			'default-attachment' => 'fixed',
			'default-position-x' => 'center',
			'default-repeat'     => 'no-repeat',
		]);
			
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', [
			'aside', 'image', 'video', 'status', 'quote', 'link',
		]);
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		
		
		add_post_type_support( 'page', 'excerpt' );
		
	}

	public static function assets()
	{
		foreach ( self::$assets_css as $style )
		{
			wp_enqueue_style(
				$style['slug'],
				self::$dir . $style['uri']
			);
		}

		foreach ( self::$assets_js as $script )
		{
			wp_enqueue_script(
				$script['slug'],
				self::$dir . $script['uri'],
				$script['deps'],
				$script['vers'],
				$script['footer']
			);
		}
	}
	
	public static function menus()
	{
		register_nav_menus( self::$menus );
	}
	
	public static function widgets()
	{
		foreach ( self::$sidebars as $sidebar )
		{
			register_sidebar( $sidebar );
		}
	}

}

Artificial_Intelligence::init();

function get_post_thumbnail_src( $post )
{
	if ( has_post_thumbnail( $post->ID ) )
	{
		return wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
	}
	
	else
	{
		return Artificial_Intelligence::$dir . '/images/robot2.jpg';
	}
}

function the_post_thumbnail_src( $post )
{
	echo get_post_thumbnail_src( $post );
}
