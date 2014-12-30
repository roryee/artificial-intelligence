<?php // Template Name: Showcase ?>

<?php get_header( 'showcase' ); ?>

<main id="main" class="ww<?php echo ( get_field( 'fade' ) ? ' fade-slide' : '' ); ?>">

	<?php
	$showcase_q = new WP_Query( array(
		'post_type'      => 'showcases',
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'meta_key'       => 'show',
		'meta_value_num' => $post->ID,
	));
	?>

	<?php if ( $showcase_q->have_posts() ): ?>
		
		<?php while ( $showcase_q->have_posts() ): $showcase_q->the_post(); ?>
			
			<?php get_template_part( 'display', 'slide' ); ?>
			
		<?php endwhile; ?>
		
	<?php endif; ?>
	
</main>

<?php get_footer( 'showcase' ); ?>
