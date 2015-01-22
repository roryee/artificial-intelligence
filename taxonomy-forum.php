<?php get_header( 'forums' ); ?>

<main id="main-forums">
	
	<div class="c nav-padding">
	
		<header id="forums-header">
			
			<h1><?php single_cat_title(); ?></h1>
			<p>
				<?php echo get_queried_object()->description; ?>
			</p>
			<hr>
			
		</header>
		
		<?php
		
		$crumbs = array(
			array(
				'name' => 'Forums',
				'url' => '/forums/',
			),
		);
		
		// $temp = get_ancestors( get_queried_object(), 'taxonomy' );
		
		?>
		
		<?php if ( have_posts() ): ?>
			
			<?php while ( have_posts() ): the_post(); ?>
				
				<section <?php post_class(); ?>>
					<a href="<?php the_permalink(); ?>">
						
						<h2 class="forum_thread-name"><?php the_title(); ?></h2>
						<p class="forum_thread-meta">
							<?php the_author(); ?> |
							<?php the_time( get_option( 'date_format' ) ); ?> |
							<?php comments_number( '0 comments', '1 comment', '% comments' ); ?>
						</p>
						
						<article class="forum_thread-excerpt">
							<?php the_excerpt(); ?>
						</article>
						
					</a>
				</section>
				
			<?php endwhile; ?>
			
		<?php endif; ?>
	
	</div>
	
</main>

<?php get_footer( 'forums' ); ?>
