<?php get_header( 'forums' ); ?>

<?php

$forums = get_terms( 'forum', array(
	// 'orderby' => 'name',
	// 'order' => 'ASC',
	'hide_empty' => false,
	
));

?>

<main id="main-forums" class="ww">
	
	<div class="c nav-padding">
		
		<header id="forums-header">
			<h1><?php bloginfo( 'tagline' ); ?> Forums</h1>
			<hr>
		</header>
		
		<?php foreach ( $forums as $forum ): ?>
			
			<section class="forum">
				<a href="<?php bloginfo( 'url' ); ?>/forums/f/<?php echo $forum->slug; ?>/">
					
					<h2 class="forum-name"><?php echo $forum->name; ?></h2>
					
					<p class="forum-excerpt">
						<?php echo $forum->description; ?>
					</p>
					
				</a>
			</section>
			
		<?php endforeach; ?>
		
	</div>
	
</main>

<?php get_footer( 'forums' ); ?>
