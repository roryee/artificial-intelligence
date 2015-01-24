<?php

// Set the crumbs array
//
$crumbs = array();

// Place the root link
//
$crumbs[] = array(
	'name' => __( 'Forums' ),
	'url'  => get_post_type_archive_link( 'forum_thread' ),
);

// Find the current forum
//
$forum;

$obj = get_queried_object();

if ( is_singular( 'forum_thread' ) )
{
	$forum = wp_get_post_terms( get_queried_object()->ID, 'forum' )[0];
}

elseif ( is_tax( 'forum' ) )
{
	$forum = get_queried_object();
}

// Get the ancestors of the current forum, append the current forum
//
$forums = get_ancestors( $forum->term_id, 'taxonomy' );
$forums[] = $forum;

// Add the ancestors to the breadcrumbs
//
foreach ( $forums as $forum )
{
	$crumbs[] = array(
		'name' => $forum->name,
		'url'  => get_term_link( $forum ),
	);
}

// If it's a post, get the post title
//
if ( is_singular( 'forum_thread' ) )
{
	$crumbs[] = array(
		'name' => $obj->post_title,
	);
}

?>

<ul id="crumbs-forums">
	<?php foreach ( $crumbs as $crumb ): ?>
		<li class="crumb">
			
			<?php if ( empty( $crumb['url'] ) ): ?>
				<span><?php echo $crumb['name']; ?></span>
			<?php else: ?>
				<a href="<?php echo $crumb['url']; ?>"><?php echo $crumb['name']; ?></a>
			<?php endif; ?>
			
		</li>
	<?php endforeach; ?>
</ul>
