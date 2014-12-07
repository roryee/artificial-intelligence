<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Artificial Intelligence: Post prototype</title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="www" <?php body_class(); ?>>
		<header id="header" class="ww">
			<div class="cc">
				
				<hgroup id="logo" class="header-sep">
					<ul class="c">
						<li class="nav-mobile-toggle">
							<a href="#"><span data-icon="menu"></span></a>
						</li>
						<li class="number">
							<a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'description' ); ?></a>
						</li>
						<li class="name">
							<a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'tagline' ); ?></a>
						</li>
					</ul>
				</hgroup>
				
				<?php
				
				if ( is_user_logged_in() && has_nav_menu( 'admin' ) )
				{
					wp_nav_menu([
						'theme_location'  => 'admin',
						'menu'            => 'Admin',
						'container'       => 'nav',
						'container_class' => 'header-sep',
						'container_id'    => 'nav',
						'menu_class'      => 'c',
						'menu_id'         => false,
						'depth'           => 2,
					]);
				}
				
				else
				{
					wp_nav_menu([
						'theme_location'  => 'primary',
						'menu'            => 'Primary',
						'container'       => 'nav',
						'container_class' => 'header-sep',
						'container_id'    => 'nav',
						'menu_class'      => 'c',
						'menu_id'         => 'nav-c',
						'fallback_cb'     => false,
						'depth'           => 2,
					]);
				}
				
				?>
				
			</div>
			
			<?php
			
			wp_nav_menu([
				'theme_location'  => 'mobile',
				'menu'            => 'Mobile',
				'container'       => 'nav',
				'container_class' => false,
				'container_id'    => 'nav-mobile',
				'menu_class'      => 'c',
				'menu_id'         => false,
				'fallback_cb'     => false,
				'depth'           => 1,
			]);
			
			?>
			
		</header>
