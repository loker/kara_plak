<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="container">
	<a class="sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'kara_plak' ); ?></a>
	<div class="row">
		<div class="col-lg-2">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="image-responsive">
					<img alt="kara plak yayınları logo" src="<?php echo esc_url( home_url( '/wp-content/themes/kara_plak/img/logo.png' ) ); ?>">
		      <!-- <img alt="kara plak yayınları logo" class="small-logo hidden-md hidden-lg" src="<?php echo esc_url( home_url( '/wp-content/themes/kara_plak/img/logo-yatay.png' ) ); ?>">-->
				</a>
			</div><!-- .site-branding -->
			<header id="masthead" class="site-header">
				<nav id="site-navigation" class="nav flex-column" role="navigation">
					<?php
							wp_nav_menu( array(
									'menu'              => 'ana-menu',
									'theme_location'    => 'primary',
									'depth'             => 2,
									'menu_class'        => 'nav',
									'fallback_cb'       => 'wp_page_menu',
									'walker'            => new WP_Bootstrap_Navwalker())
							);
					?>
				</nav><!-- #site-navigation -->
				</header><!-- #masthead -->
			</div>
			<div class="col-lg-10">
				<div id="content" class="site-content">
