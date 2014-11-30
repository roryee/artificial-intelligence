<?php if ( is_singular() ): ?>
	
	
	
<?php else: ?>
	
	<section <?php post_class( 'w' ); ?>
		style="background-image:url(<?php the_post_thumbnail_src( $post ); ?>);">
		
		<hgroup class="c">
			
			<div class="icon"></div>
			
			<?php if ( is_sticky() ): ?>
				<div class="icon-sticky" title="Sticky post"></div>
			<?php endif; ?>
			
			<a href="<?php the_permalink(); ?>" class="cc">
				<h1><?php the_title(); ?></h1>
				<?php the_excerpt(); ?>
			</a>
			
		</hgroup>
		
	</section>
	
<?php endif; ?>
