<!DOCTYPE html>
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title><?php wp_title( '|' ); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/normalize.css">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/main.css">
		<!--[if (IE 8) | (IEMobile)]>
			<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/modernizr.js"></script>
		<!-- WPHEAD -->
		<?php wp_head(); ?>
		<!-- WPHEAD -->
	</head>

	<body <?php body_class(); ?>>