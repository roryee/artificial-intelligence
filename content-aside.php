<?php if ( is_singular() ): ?>
	
	
	
<?php else: ?>
	
	<section <?php post_class( 'w' ); ?>>
		<hgroup class="c">
			<div class="cc">
				
				<div class="icon"></div>
				
				<ul class="meta">
					<li>
						<?php the_author_posts_link(); ?>
					</li>
					<li>
						<a href="#"><?php the_time( 'F d, Y' ); ?></a>
					</li>
					<li>
						<a href="<?php comments_link(); ?>"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></a>
					</li>
					<li>
						<a href="<?php the_permalink(); ?>">Read more</a>
					</li>
				</ul>
				
				<div class="content">
					<?php the_excerpt(); ?>
				</div>
				
			</div>
		</hgroup>
	</section>
	
<?php endif; ?>
