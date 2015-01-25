<?php

class Editor
{
	
	public static function init()
	{
		self::assets();
	}
	
	public static function assets()
	{
		add_editor_style(
			Artificial_Intelligence::$dir_abs . '/editor/gen/' . (
				get_theme_mod( 'ai_theme' ) ? get_theme_mod( 'ai_theme' ) : 'lightning'
			) . '.css'
		);
	}
	
}

Editor::init();
