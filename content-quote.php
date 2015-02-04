<?php if ( is_singular() ): ?>
	
	<article id="article"
	style="background-image:url(<?php the_post_thumbnail_src( $post ); ?>);">
		<div class="c">
			<div <?php post_class( 'article cc c' ); ?>>
				
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				
			</div>
		</div>
	</article>
	
	<?php get_template_part( 'nav', 'single' ); ?>
	
<?php else: ?>
	
	<section <?php post_class( 'w' ); ?>>
		<div class="cc">
			
			<a class="icon" href="<?php the_permalink(); ?>"></a>
			
			<cite class="cite"><?php the_title(); ?></cite>
			
			<div class="content">
				<?php the_content(); ?>
			</div>
			
		</div>
	</section>
	
<?php endif; ?>
