<?php if ( is_singular() ): ?>
	
	
	
<?php else: ?>
	
	<section <?php post_class( 'w' ); ?>>
		<hgroup class="cc">
			
			<div class="icon"></div>
			
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
