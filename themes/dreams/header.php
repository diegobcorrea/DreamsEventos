<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php 
		// Forma de uso 
		//wp_title( $sep, $display, $seplocation ); 
	?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="main-container">
		<header class="row">
			<div class="logo large-12 columns">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-header.jpg" alt="Dreams Eventos"></a>
			</div>
			<nav class="topmenu large-12 columns">
				<?php wp_nav_menu( array( 'menu' => '2' ) ); ?>
			</nav>
		</header>

