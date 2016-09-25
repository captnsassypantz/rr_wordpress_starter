<?php
/**
 * 
 * @package 
 */ ?><!DOCTYPE html> 
<html class="no-js" <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://use.typekit.net/rup4itj.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300|Open+Sans:400,300,300italic,400italic,700,700italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<?php wp_head(); ?>	
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

	<div id="SiteMainWrapper">

		<?php get_template_part('_templates/site', 'header'); ?>

