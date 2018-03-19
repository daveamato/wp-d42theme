<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php if (function_exists('is_tag') && is_tag()) { echo 'Tag Archive for &quot;' . $tag . '&quot;';} elseif (is_archive()) {wp_title( '|', true, 'right' );} elseif (is_search()) {echo 'Search for &quot;' . wp_specialchars($s) . '$quot;';} elseif (is_404()) {echo 'Not found';} elseif (!is_404() && (is_single() || (is_page()))) {wp_title('');} else {bloginfo('description');} echo ' | ';bloginfo('name'); ?></title>
		<link href="//d42cdn.s3.amazonaws.com" rel="dns-prefetch">
		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/images/logo-square.png" rel="apple-touch-icon-precomposed">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<?php wp_head(); ?>
		<style><?php echo get_option('custom_styles'); ?></style>
		<?php echo get_option('head_scripts'); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php include('scrape-nav.php'); ?>
		<!-- wrapper -->
		<div class="top-wrap" style="margin-top:53px;">

