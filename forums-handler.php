<?php

if ( ! is_user_logged_in() )
{
	wp_redirect( wp_login_url( get_post_type_archive_link( 'forum_thread' ) ) );
	exit;
}

/*
elseif ( ! current_user_can( 'view_forum_threads' ) )
{
	wp_redirect( home_url() );
	exit;
}
*/

// Implement creating forum threads
// TODO: Add editing and deleting support to frontend
//

if ( ! empty( $_POST['thread_new'] ) )
{
	// TODO: Check for permissions
	
	$thread_new = $_POST['thread_new'];
	
	$thread_new_id = wp_insert_post( array(
		'post_content' => $thread_new['content'],
		'post_title' => $thread_new['title'],
		'post_type' => 'forum_thread',
		'post_status' => 'publish',
		'tax_input' => array(
			'forum' => array(
				$thread_new['forum'],
			),
		),
	));
	
	if ( $thread_new_id === 0 )
	{
		// Post creation failed for some reason
		//
		// TODO: Implement fallback
	}
	
	else
	{
		// Post created; redirect to post page
		//
		wp_redirect( get_post( $thread_new_id )->guid );
	}
	
}
	
