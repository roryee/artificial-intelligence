<?php get_header(); ?>

<main id="main" class="ww<?php echo ( get_field( 'fade' ) ? ' fade-slide' : '' ); ?>">
	
	<?php if ( is_home() ): ?>
	
		<?php if ( have_posts() ): ?>
			
			<?php while ( have_posts() ): the_post(); ?>
				
				<?php get_template_part( 'content', get_post_format() ); ?>
				
			<?php endwhile; ?>
			
		<?php endif; ?>
	
	<?php else: ?>
		
		<?php
		
		$q_slides_slider = new WP_Query([
			'post_type'  => 'slides',
			'meta_key'   => 'position',
			'meta_value' => 'slider',
			'orderby'    => 'menu_order',
			'order'      => 'ASC',
		]);
		
		?>
		
		<?php if ( $q_slides_slider->have_posts() ): ?>
			
			<section class="slidesjs">
				
				<?php while ( $q_slides_slider->have_posts() ): $q_slides_slider->the_post(); ?>
					
					<?php get_template_part( 'display', 'slide' ); ?>
					
				<?php endwhile; ?>
				
			</section>
			
		<?php endif; ?>
		
		<?php
		
		$q_slides_not_slider = new WP_Query([
			'post_type'    => 'slides',
			'meta_key'     => 'position',
			'meta_compare' => '!=',
			'meta_value'   => 'slider',
			'orderby'      => 'menu_order',
			'order'        => 'ASC',
		]);
		?>
		
		<?php if ( $q_slides_not_slider->have_posts() ): ?>
			
			<?php while ( $q_slides_not_slider->have_posts() ):
				$q_slides_not_slider->the_post(); ?>
				
				<?php get_template_part( 'display', 'slide' ); ?>
				
			<?php endwhile; ?>
			
		<?php endif; ?>
	
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>
