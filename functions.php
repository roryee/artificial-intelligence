<?php

define( 'ACF_LITE', true );
require_once dirname( __FILE__ ) . '/vendor/advanced-custom-fields/acf.php';
require_once dirname( __FILE__ ) . '/vendor/json-rest-api/plugin.php';

class Artificial_Intelligence
{
	
	public static $version = '1.1.0';
	
	public static $dir;
	
	protected static $menus = [
		'primary'           => 'Navbar',
		'offcanvas_left'    => 'Offcanvas Left',
		'offcanvas_right'   => 'Offcanvas Right',
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
		[
			'name'          => 'Footer',
			'id'            => 'footer_showcase',
			'description'   => 'Showcase Footer',
			'before_widget' => '<div id="%1$s" class="col %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',
		],
	];
	
	protected static $themes = [
		'lightning' => 'Electrify',
		'cappy'     => 'Mecha',
		'kitty'     => 'Blue',
		'modern'    => 'Yosemite',
		'edge'      => 'Edge',
	];
	
	
	public static function init()
	{
		
		self::$dir = get_template_directory_uri();
		
		add_action( 'after_setup_theme',  ['Artificial_Intelligence', 'setup'     ] );
		add_action( 'wp_enqueue_scripts', ['Artificial_Intelligence', 'assets'    ] );
		add_action( 'init',               ['Artificial_Intelligence', 'menus'     ] );
		add_action( 'widgets_init',       ['Artificial_Intelligence', 'widgets'   ] );
		add_action( 'init',               ['Artificial_Intelligence', 'post_types'] );
		add_action( 'customize_register', ['Artificial_Intelligence', 'customizer'] );
		
		add_filter( 'excerpt_length', ['Artificial_Intelligence', 'excerpt'], 999 );
	}
	
	public static function setup()
	{
		add_theme_support( 'html5', [
			'comment-list', 'comment-form', 'search-form', 'gallery', 'caption',
		]);
		
		add_theme_support( 'custom-background', [
			'default-color'      => '#000',
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
		
		add_post_type_support( 'page', 'excerpt' );
		
	}

	public static function assets()
	{
		wp_enqueue_style( 'frontend', self::$dir . '/frontend/gen/' .
			( get_theme_mod( 'ai_theme' ) ? get_theme_mod( 'ai_theme' ) : 'lightning' ) . '.css'
		);
		
		wp_enqueue_script( 'modernizr', self::$dir . '/frontend/gen/modernizr.js',
		[], '', false);
		
		wp_enqueue_script( 'respond', self::$dir . '/bower_components/Respond/src/respond.js',
		['modernizr'], '', false );
		
		wp_enqueue_script( 'gsap', self::$dir . '/bower_components/gsap/src/minified/TweenMax.min.js',
		[], '', false );
		
		wp_enqueue_script( 'slidesjs', self::$dir . '/bower_components/slidesjs/source/jquery.slides.min.js',
		['jquery'], '', false );
		
		wp_enqueue_script( 'frontend', self::$dir . '/frontend/gen/frontend.js',
		['jquery', 'slidesjs', 'gsap'], '', true );
		
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
	
	
	public static function customizer( $wp_customize )
	{
		
		$wp_customize->add_setting(
			'ai_theme',
			[
				'default' => 'lightning',
			]
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ai_theme',
				[
					'label'     => __( 'Skin' ),
					'section'   => 'colors',
					'settings'  => 'ai_theme',
					'type'      => 'select',
					'choices'   => self::$themes,
				]
			)
		);
		
		
		$wp_customize->add_setting(
			'copyright',
			[
				'default' => '',
			]
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'copyright',
				[
					'label'    => __( 'Copyright text' ),
					'section'  => 'title_tagline',
					'settings' => 'copyright',
					'type'     => 'text',
				]
			)
		);
		
	}
	
	public static function post_types()
	{
		register_post_type( 'slides', [
			'labels' => [
				'name'               => __( 'Slides' ),
				'singular_name'      => __( 'Slide'  ),
			],
			'description'          => 'Slides that appear on the front page.',
			'menu_position'        => 20,
			'menu_icon'            => 'dashicons-images-alt2',
			'show_ui'              => true,
			'exclude_from_search'  => true,
			'publicly_queryabale'  => false,
			'show_in_nav_menus'    => false,
			'rewrite'              => false,
			'supports'             => [
				'title', 'author', 'revisions',
				'thumbnail', 'custom-fields', 'page-attributes',
			],
		]);
		
		register_post_type( 'showcases', [
			'labels' => [
				'name'               => __( 'Showcase' ),
				'singular_name'      => __( 'Showcase Part' ),
			],
			'description'          => __( 'Pages used for advertising.' ),
			'menu_position'        => 21,
			'menu_icon'            => 'dashicons-analytics',
			'show_ui'              => true,
			'exclude_from_search'  => true,
			'publicly_queryabale'  => false,
			'show_in_nav_menus'    => false,
			'rewrite'              => false,
			'supports'             => [
				'title', 'author', 'revisions',
				'thumbnail', 'custom-fields', 'page-attributes',
			]
		]);
		
		// Temporary structure for ACF until I can make it better
		if ( ! WP_DEBUG )
			require_once self::$dir . '/functions-acf.php';
		
	}
	
	public static function excerpt( $length )
	{
		return 30;
	}

}

Artificial_Intelligence::init();

require_once dirname( __FILE__ ) . '/functions-streams.php';

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
