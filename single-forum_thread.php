<?php get_header( 'forums' ); ?>

<main id="main-forums">
	<div class="c nav-padding">
		
		<?php get_template_part( 'interface', 'breadcrumbs-forums' ); ?>
		
		<?php if ( have_posts() ): ?>
			
			<?php while ( have_posts() ): the_post(); ?>
				
				<header id="forums-header">
					<h1><?php the_title(); ?></h1>
				</header>
				
				<article id="article">
					
					<p class="forum_thread-meta">
						<?php the_author(); ?> | <?php the_time( get_option( 'date_format' ) ); ?> | <?php comments_number( '0 comments', '1 comment', '% comments' ); ?>
					</p>
					
					<?php the_content(); ?>
					
				</article>
				
			<?php endwhile; ?>
			
		<?php endif; ?>
		
	</div>
	
	<?php comments_template( '/comments-forums.php' ); ?>
	
</main>

<?php get_footer( 'forums' ); ?>
