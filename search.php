<?php get_header(); ?>

<main id="main" class="ww">
	
	<header id="header-archive">
		<h1>Search Results</h1>
		<h2>&ldquo;<?php echo get_search_query(); ?>&rdquo;</h2>
	</header>
	
	<?php if ( have_posts() ): ?>
		
		<?php while ( have_posts() ): the_post(); ?>
			
			<?php get_template_part( 'content', get_post_format() ); ?>
			
		<?php endwhile; ?>
		
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>
