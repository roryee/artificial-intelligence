<input class="thread-new-title" type="text" name="thread_new[title]" value="" placeholder="Title" />

<?php

wp_editor( '', 'thread-new', array(
	'wpautop'           => true,
	'media_buttons'     => true,
	'textarea_name'     => 'thread_new[content]',
	'textarea_rows'     => 15,
	'tabindex'          => null,
	// 'editor_css'        => '<style>@import url(' . Artificial_Intelligence::$dir_abs . '/editor/gen/' . Artificial_Intelligence::$skin . '.css' . ');</style>',
	'editor_class'      => 'thread-new-editor',
	'teeny'             => false,
	'dfw'               => true,
	'tinymce'           => true,
	'quicktags'         => false,
	'drag_drop_upload'  => true,
));

?>

<input type="hidden" name="thread_new[forum]" value="<?php echo get_queried_object()->term_id; ?>">

<button type="submit">Submit</button>
