<?php if ( is_singular() ): ?>
	
	<article id="article"
	style="background-image:url(<?php the_post_thumbnail_src( $post ); ?>);">
	<div class="c">
		<div <?php post_class( 'article cc c' ); ?>>
			
			<h1><?php the_time( 'n/j/Y g:i A' ); ?></h1>
			<?php the_content(); ?>
			
		</div>
	</div>
</article>
	
<?php else: ?>
	
	<section <?php post_class( 'w' ); ?>>
		<div class="cc">
			
			<a class="icon" href="<?php the_permalink(); ?>"></a>
			
			<ul class="meta">
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_time( 'n/j/Y g:i A' ); ?></a>
				</li>
			</ul>
			
			<div class="content">
				
				<?php the_content(); ?>
				
			</div>
			
		</div>
	</section>
	
<?php endif; ?>
