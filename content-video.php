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
			
			<div class="icon"></div>
			
			<ul class="meta">
				<li>
					<a href="#">Team Video</a>
				</li>
				<li>
					11/21/2014 9:39 AM
				</li>
			</ul>
			
			<div class="content">
				
				<?php the_content(); ?>
				
			</div>
		</hgroup>
	</section>
	
<?php endif; ?>
