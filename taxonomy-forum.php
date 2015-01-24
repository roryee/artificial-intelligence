<?php get_header( 'forums' ); ?>

<main id="main-forums">
	
	<div class="c nav-padding">
		
		<?php get_template_part( 'interface', 'breadcrumbs-forums' ); ?>
	
		<header id="forums-header">
			
			<h1><?php single_cat_title(); ?></h1>
			<p>
				<?php echo get_queried_object()->description; ?>
			</p>
			<hr>
			
		</header>
		
		<section class="forums-subforums">
			
			<?php $sub_forums = get_term_children( get_queried_object()->term_id, 'forum' ); ?>
			
			<?php if ( !empty( $sub_forums ) ): ?>
				
				<?php foreach ( $sub_forums as $forum ): $forum = get_term( $forum, 'forum' ); ?>
					
					<section class="forum">
						<a href="<?php bloginfo( 'url' ); ?>/forums/f/<?php echo $forum->slug; ?>/">
							
							<h2 class="forum-name"><?php echo $forum->name; ?></h2>
							
							<p class="forum-excerpt">
								<?php echo $forum->description; ?>
							</p>
							
						</a>
					</section>
					
				<?php endforeach; ?>
				
			<?php endif; ?>
			
		</section>
		
		<br><hr>
		
		<section class="forums-posts">
			
			<?php if ( have_posts() ): ?>
				
				<?php while ( have_posts() ): the_post(); ?>
					
					<section <?php post_class(); ?>>
						<a href="<?php the_permalink(); ?>">
							
							<h2 class="forum_thread-name"><?php the_title(); ?></h2>
							<p class="forum_thread-meta">
								<?php the_author(); ?> |
								<?php the_time( get_option( 'date_format' ) ); ?> |
								<?php comments_number( '0 comments', '1 comment', '% comments' ); ?>
							</p>
							
							<article class="forum_thread-excerpt">
								<?php the_excerpt(); ?>
							</article>
							
						</a>
					</section>
					
				<?php endwhile; ?>
				
			<?php endif; ?>
			
		</section>
	
	</div>
	
</main>

<?php get_footer( 'forums' ); ?>
