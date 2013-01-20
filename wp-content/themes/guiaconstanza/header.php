<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 * We filter the output of wp_title() a bit -- see
		 * boilerplate_filter_wp_title() in functions.php.
		 */wp_title( '|', true, 'right' );
		?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
?>
</head>
<body <?php body_class(); ?>>
	<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
	<a class="visuallyhidden" id="skip" href="#content" title="<?php esc_attr_e( 'Skip to content', 'boilerplate' ); ?>"><?php _e( 'Skip to content', 'boilerplate' ); ?></a>
	<header id="header" role="banner" class="clearfix">
		<div class="wrap">
			<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<div id="header_info">
				<div id="weather">
					<span>Temperatura</span>
					<img src="<?php bloginfo('template_url') ?>/images/wi-rain.png" alt="Clima Lluvioso" />
					<a id="weather_lightbox" href="#">12 &deg;C</a>
				</div>
				<form id="search">
					<input type="search" placeholder="Buscar atractivos..." />
					<input type="submit" value="Buscar" />
				</form>
			</div><!-- #header_info -->
		</div><!-- .wrapper -->
	</header><!-- close header -->
	<nav id="navigation" class="wrap" role="navigation">
		<ul id="main-menu" class="clearfix">
			<li><a href="<?php bloginfo('url') ?>">Inicio</a></li>
			<?php
				wp_nav_menu( array(
					'menu' => 'main',
					'menu_class' => '',
					'container' => false,
					'items_wrap' => '%3$s'
					)
				);
			?>
			<li><a rel="external" href="http://www.facebook.com">Facebook</a></li>
			<li><a rel="external" href="http://www.twitter.com">Twitter</a></li>
		</ul>
	</nav><!-- #access -->
