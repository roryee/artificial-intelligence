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
	
<?php else: ?>
	
	<section <?php post_class(); ?>>
		<hgroup class="cc">
			
			<a class="icon" href="<?php the_permalink(); ?>"></a>
			
			<ul class="meta">
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
				<li>
					<?php the_time( 'n/j/Y g:i A' ); ?>
				</li>
			</ul>
			
			<div class="content">
				
				<?php the_content(); ?>
				
			</div>
		</hgroup>
	</section>
	
<?php endif; ?>
