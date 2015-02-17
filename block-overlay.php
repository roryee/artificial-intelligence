<section class="slide overlay"
style="background-image:url(<?php the_post_thumbnail_src( $post ); ?>);">
	<div class="ccc">
		
		<hgroup class="c">
			
			<h1><?php the_field( 'heading' ); ?></h1>
			<h2><?php the_field( 'heading_2' ); ?></h2>
			<p>
				<?php the_field( 'content' ); ?>
			</p>
				
		</hgroup>
		
	</div>
</section>
