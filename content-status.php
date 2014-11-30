<?php if ( is_singular() ): ?>
	
	
	
<?php else: ?>
	
	<section <?php post_class( 'w' ); ?>>
		<hgroup class="c">
			<div class="cc">
				
				<div class="icon"></div>
				
				<ul class="meta">
					<li>
						<?php the_time( 'n/j/Y g:i A' ); ?>
					</li>
				</ul>
				
				<div class="content">
					
					<?php the_content(); ?>
					
				</div>
				
			</div>
		</hgroup>
	</section>
	
<?php endif; ?>
