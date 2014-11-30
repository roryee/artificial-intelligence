<?php if ( is_singular() ): ?>
	
	
	
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
