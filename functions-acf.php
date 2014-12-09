<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
	'id' => 'acf_block',
	'title' => 'Block',
	'fields' => array (
	array (
	'key' => 'field_5485eeaee7c89',
	'label' => 'Position',
	'name' => 'position',
	'type' => 'radio',
	'instructions' => 'Select where the slide should be positioned.',
	'required' => 1,
	'choices' => array (
	'slider' => 'Slider',
	'whole' => 'Below Slider',
	),
	'other_choice' => 0,
	'save_other_choice' => 0,
	'default_value' => 'slider',
	'layout' => 'vertical',
	),
	array (
	'key' => 'field_5485ee71e7c88',
	'label' => 'Heading',
	'name' => 'heading',
	'type' => 'text',
	'instructions' => 'The heading to use in the slide.',
	'required' => 1,
	'default_value' => '',
	'placeholder' => '',
	'prepend' => '',
	'append' => '',
	'formatting' => 'html',
	'maxlength' => '',
	),
	array (
	'key' => 'field_5485ee48e7c87',
	'label' => 'Content',
	'name' => 'content',
	'type' => 'textarea',
	'instructions' => 'The content that will appear in the slide\'s footer.',
	'required' => 1,
	'default_value' => '',
	'placeholder' => '',
	'maxlength' => '',
	'rows' => '',
	'formatting' => 'br',
	),
	array (
	'key' => 'field_5485ed20434d2',
	'label' => 'Link',
	'name' => 'link',
	'type' => 'page_link',
	'instructions' => 'Where do you want this slide\'s link to take you?',
	'post_type' => array (
	0 => 'all',
	),
	'allow_null' => 1,
	'multiple' => 0,
	),
	),
	'location' => array (
	array (
	array (
	'param' => 'post_type',
	'operator' => '==',
	'value' => 'slides',
	'order_no' => 0,
	'group_no' => 0,
	),
	),
	),
	'options' => array (
	'position' => 'normal',
	'layout' => 'no_box',
	'hide_on_screen' => array (
	),
	),
	'menu_order' => 0,
	));
	register_field_group(array (
	'id' => 'acf_showcasing',
	'title' => 'Showcasing',
	'fields' => array (
	array (
	'key' => 'field_5485f5b309b66',
	'label' => 'Fade In',
	'name' => 'fade',
	'type' => 'true_false',
	'instructions' => 'Whether the first slide or block on the page should fade into view.',
	'message' => '',
	'default_value' => 0,
	),
	),
	'location' => array (
	array (
	array (
	'param' => 'page_type',
	'operator' => '==',
	'value' => 'front_page',
	'order_no' => 0,
	'group_no' => 0,
	),
	),
	),
	'options' => array (
	'position' => 'normal',
	'layout' => 'no_box',
	'hide_on_screen' => array (
	),
	),
	'menu_order' => 0,
	));
}
