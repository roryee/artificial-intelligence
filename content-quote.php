<?php if ( is_singular() ): ?>
	
	
	
<?php else: ?>
	
	<section <?php post_class( 'w' ); ?>>
		<hgroup class="c">
			<div class="cc">
				
				<div class="icon"></div>
				
				<cite class="cite"><?php the_title(); ?></cite>
				
				<div class="content">
					<?php the_content(); ?>
				</div>
				
			</div>
		</hgroup>
	</section>
	
<?php endif; ?>
