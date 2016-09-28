<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' );?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
	<?php wp_head();?>
</head>
<body>
	<header class="header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#papaya-top-menu">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?php echo get_bloginfo('url');?>" class="brand pull-left">
					<img src="<?php echo get_field('site_logo','options'); ?>" class="desktop-logo">
					<img src="<?php echo get_field('site_logo_mobile','options'); ?>" class="mobile-logo">
			</a>
			<?php 
			$args = array(
				'theme_location'  => 'primary',
				'menu'            => 'Primary Menu', 
				'container'       => 'div', 
				'container_class' => 'collapse navbar-collapse pull-right', 
				'container_id'    => 'papaya-top-menu',
				'items_wrap'      => '<ul id="menu-primary-menu" class="nav navbar-nav %2$s">%3$s</ul>',
			) ;
			echo wp_nav_menu($args);
			?>
	</header>
	<div class="content-wrapper">