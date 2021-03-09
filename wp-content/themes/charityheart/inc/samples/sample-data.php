<?php

$path_dir = get_template_directory() . '/inc/samples/data/';
$path_uri = get_template_directory_uri() . '/inc/samples/data/';

if ( is_dir($path_dir) ) {
	$demo_datas = array(
		'home'               => array(
			'data_dir'      => $path_dir . 'home',
			'thumbnail_url' => $path_uri . 'home/screenshot.jpg',
			'title'         => esc_html__( 'Home 1', 'charityheart' ),
			'demo_url'      => 'http://apusthemes.com/wp-demo/charityheart/',
		)
	);
}