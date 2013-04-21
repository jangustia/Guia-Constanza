<?php
/**
 * Boilerplate functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, boilerplate_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'boilerplate_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run boilerplate_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'boilerplate_setup' );

if ( ! function_exists( 'boilerplate_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override boilerplate_setup() in a child theme, add your own boilerplate_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Ten 1.0
 */
function boilerplate_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Uncomment if you choose to use post thumbnails; add the_post_thumbnail() wherever thumbnail should appear
	//add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'boilerplate', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'boilerplate' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/headers/path.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to boilerplate_header_image_width and boilerplate_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'boilerplate_header_image_width', 940 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'boilerplate_header_image_height', 198 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Don't support text inside the header image.
	define( 'NO_HEADER_TEXT', true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See boilerplate_admin_header_style(), below.
	add_custom_image_header( '', 'boilerplate_admin_header_style' );

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'berries' => array(
			'url' => '%s/images/headers/starkers.png',
			'thumbnail_url' => '%s/images/headers/starkers-thumbnail.png',
			/* translators: header image description */
			'description' => __( 'Boilerplate', 'boilerplate' )
		)
	) );
}
endif;

if ( ! function_exists( 'boilerplate_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in boilerplate_setup().
 *
 * @since Twenty Ten 1.0
 */
function boilerplate_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

/**
 * Makes some changes to the <title> tag, by filtering the output of wp_title().
 *
 * If we have a site description and we're viewing the home page or a blog posts
 * page (when using a static front page), then we will add the site description.
 *
 * If we're viewing a search result, then we're going to recreate the title entirely.
 * We're going to add page numbers to all titles as well, to the middle of a search
 * result title and the end of all other titles.
 *
 * The site title also gets added to all titles.
 *
 * @since Twenty Ten 1.0
 *
 * @param string $title Title generated by wp_title()
 * @param string $separator The separator passed to wp_title(). Twenty Ten uses a
 * 	vertical bar, "|", as a separator in header.php.
 * @return string The new title, ready for the <title> tag.
 */
function boilerplate_filter_wp_title( $title, $separator ) {
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'boilerplate' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'boilerplate' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'boilerplate' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'boilerplate_filter_wp_title', 10, 2 );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Twenty Ten 1.0
 */
function boilerplate_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'boilerplate_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Twenty Ten 1.0
 * @return int
 */
function boilerplate_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'boilerplate_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function boilerplate_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'boilerplate' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and boilerplate_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function boilerplate_auto_excerpt_more( $more ) {
	return ' &hellip;' . boilerplate_continue_reading_link();
}
add_filter( 'excerpt_more', 'boilerplate_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function boilerplate_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= boilerplate_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'boilerplate_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css.
 *
 * @since Twenty Ten 1.0
 * @return string The gallery style filter, with the styles themselves removed.
 */
function boilerplate_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'boilerplate_remove_gallery_css' );

if ( ! function_exists( 'boilerplate_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own boilerplate_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function boilerplate_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php printf( __( '<span class="meta">%1$s / %2$s</span>', 'boilerplate' ), get_comment_author_link(), get_comment_date() ); ?>
				<?php edit_comment_link( __( '(Edit)', 'boilerplate' ), ' ' ); ?>
			</div><!-- .comment-author .vcard -->
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php _e( 'Your comment is awaiting moderation.', 'boilerplate' ); ?></em>
				<br />
			<?php endif; ?>
			<div class="comment-body">
				<?php get_avatar($comment, 65); ?>
				<?php comment_text(); ?>
			</div>
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-##  -->
	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'boilerplate' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'boilerplate'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override boilerplate_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function boilerplate_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'boilerplate' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'boilerplate' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'boilerplate' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'boilerplate' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'boilerplate' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'boilerplate' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'boilerplate' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'boilerplate' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'boilerplate' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'boilerplate' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'boilerplate' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'boilerplate' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running boilerplate_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'boilerplate_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * @since Twenty Ten 1.0
 */
function boilerplate_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'boilerplate_remove_recent_comments_style' );

if ( ! function_exists( 'boilerplate_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 *
 * @since Twenty Ten 1.0
 */
function boilerplate_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'boilerplate' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'boilerplate' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'boilerplate_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Twenty Ten 1.0
 */
function boilerplate_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boilerplate' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boilerplate' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boilerplate' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/*	Begin Boilerplate */
	// Add Admin
		require_once(TEMPLATEPATH . '/boilerplate-admin/admin-menu.php');

	// remove version info from head and feeds (http://digwp.com/2009/07/remove-wordpress-version-number/)
		function boilerplate_complete_version_removal() {
			return '';
		}
		add_filter('the_generator', 'boilerplate_complete_version_removal');
/*	End Boilerplate */

// add category nicenames in body and post class
	function boilerplate_category_id_class($classes) {
	    global $post;

	    if (isset ($post->ID))
		    foreach((get_the_category($post->ID)) as $category)
		        $classes[] = 'category-' . $category->category_nicename;
		        return $classes;
	}
	add_filter('post_class', 'boilerplate_category_id_class');
	add_filter('body_class', 'boilerplate_category_id_class');

// change Search Form input type from "text" to "search" and add placeholder text
	function boilerplate_search_form ( $form ) {
		$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
		<div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
		<input type="search" placeholder="Search for..." value="' . get_search_query() . '" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
		</div>
		</form>';
		return $form;
	}
	add_filter( 'get_search_form', 'boilerplate_search_form' );

// added per WP upload process request
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}




// !Guia Constanza Code
//------------------------------------------

// Remove unnecessary widgets from front page
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
function remove_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}

if ( ! function_exists( 'guiaconstanza_register_post_types' ) ) :
add_action( 'init', 'guiaconstanza_register_post_types' );
function guiaconstanza_register_post_types() {
	$template_url = get_bloginfo ('template_url');

	register_post_type ('gc_hoteles',
		array (
			'labels'       => array (
				'name'               => __('Hoteles'),
				'singular_name'      => __('Hotel'),
				'add_new'            => _x('Añadir nuevo', 'guiaconstanza_hotel'),
				'all_items'          => __('Todos los hoteles'),
				'add_new_item'       => __('Añadir nuevo hotel'),
				'edit_item'          => __('Editar hotel'),
				'new_item'           => __('Nuevo hotel'),
				'view_item'          => __('Ver hotel'),
				'search_items'       => __('Buscar hoteles'),
				'not_found'          => __('No se encontraron hoteles'),
				'not_found_in_trash' => __('No se encontraron hoteles en la papelera')
			),
			'public'       => true,
			'show_in_menu' => true,
			'menu_icon'    => $template_url . '/images/icon_hotels_small.png',
			'supports'     => array ('title', 'editor', 'thumbnail', 'revisions'),
			'taxonomies'   => array ('category', 'post_tag')
		)
	);

	register_post_type ('gc_bares_y_rests',
		array (
			'labels'       => array (
				'name'               => __('Bares y Restaurantes'),
				'singular_name'      => __('Bar o Restaurante'),
				'add_new'            => _x('Añadir nuevo', 'guiaconstanza_bares-y-restaurantes'),
				'all_items'          => __('Todos los bares y restaurantes'),
				'add_new_item'       => __('Añadir nuevo bar o restaurante'),
				'edit_item'          => __('Editar bar o restaurante'),
				'new_item'           => __('Nuevo bar o restaurante'),
				'view_item'          => __('Ver bar o restaurante'),
				'search_items'       => __('Buscar bares y restaurantes'),
				'not_found'          => __('No se encontraron bares y restaurantes'),
				'not_found_in_trash' => __('No se encontraron bares y restaurantes en la papelera')
			),
			'public'       => true,
			'show_in_menu' => true,
			'menu_icon'    => $template_url . '/images/icon_bars_small.png',
			'supports'     => array ('title', 'editor', 'thumbnail', 'revisions'),
			'taxonomies'   => array ('category', 'post_tag')
		)
	);

	register_post_type ('gc_atractivos',
		array (
			'labels'       => array (
				'name'               => __('Atractivos'),
				'singular_name'      => __('Atractivo'),
				'add_new'            => _x('Añadir nuevo', 'guiaconstanza_hotel'),
				'all_items'          => __('Todos los atractivos'),
				'add_new_item'       => __('Añadir nuevo atractivo'),
				'edit_item'          => __('Editar atractivo'),
				'new_item'           => __('Nuevo atractivo'),
				'view_item'          => __('Ver atractivo'),
				'search_items'       => __('Buscar atractivos'),
				'not_found'          => __('No se encontraron atractivos'),
				'not_found_in_trash' => __('No se encontraron atractivos en la papelera')
			),
			'public'       => true,
			'show_in_menu' => true,
			'menu_icon'    => $template_url . '/images/icon_atractivos_small.png',
			'supports'     => array ('title', 'editor', 'thumbnail', 'revisions'),
			'taxonomies'   => array ('category', 'post_tag')
		)
	);

	register_post_type ('gc_galerias',
		array (
			'labels'       => array (
				'name'               => __('Galerías'),
				'singular_name'      => __('Galería'),
				'add_new'            => __('Añadir Nueva'),
				'all_items'          => __('Todas las galerías'),
				'add_new_item'       => __('Añadir nueva galería'),
				'edit_item'          => __('Editar galería'),
				'new_item'           => __('Nueva galeria'),
				'view_item'          => __('Ver galería'),
				'search_items'       => __('Buscar galerías'),
				'not_found'          => __('No se encontraron galerías'),
				'not_found_in_trash' => __('No se encontraron galerías en la papelera')
			),
			'public'       => true,
			'show_in_menu' => true,
			'has_archive'  => true,
			'menu_icon'    => $template_url . '/images/icon_atractivos_small.png',
			'supports'     => array ('title', 'editor', 'thumbnail'),
			'taxonomies'   => array ('albums')
		)
	);


}
endif;

// This initializes the write panel.
add_action('admin_init','guiaconstanza_meta_init');
function guiaconstanza_meta_init() {
	wp_enqueue_style(
		'hotel_css',
		STYLESHEETPATH . '/css/hotel_form.css'
	);

	add_meta_box(
		'hotel_meta',            // HTML Element ID
		'Información del Hotel', // Title
		'hotel_form',            // Callback display function
		'gc_hoteles',            // Page in which to display this
		'advanced',              // Part of the page in which to display
		'high'                   // Priority
	);
	add_meta_box(
		'restaurant_meta',
		'Información del Bar o Restaurante',
		'restaurant_form',
		'gc_bares_y_rests',
		'advanced',
		'high'
	);
	add_meta_box(
		'atractivos_meta',
		'Información del Atractivo',
		'atractivo_form',
		'gc_atractivos',
		'advanced',
		'high'
	);

	// add a callback function to save any data a user enters in
	add_action('save_post', 'my_meta_save');
}

//----

function hotel_form() {
	global $post;

	$tipo     = get_post_meta ($post->ID, 'tipo',     TRUE);
	$image1   = get_post_meta ($post->ID, 'image1',   TRUE);
	$image2   = get_post_meta ($post->ID, 'image2',   TRUE);
	$image3   = get_post_meta ($post->ID, 'image3',   TRUE);
	$image4   = get_post_meta ($post->ID, 'image4',   TRUE);
	$chim     = get_post_meta ($post->ID, 'chim',     TRUE);
	$pool     = get_post_meta ($post->ID, 'pool',     TRUE);
	$james    = get_post_meta ($post->ID, 'james',    TRUE);
	$heat     = get_post_meta ($post->ID, 'heat',     TRUE);
	$menu     = get_post_meta ($post->ID, 'menu',     TRUE);
	$bar      = get_post_meta ($post->ID, 'bar',      TRUE);
	$tv       = get_post_meta ($post->ID, 'tv',       TRUE);
	$wifi     = get_post_meta ($post->ID, 'wifi',     TRUE);
	$address  = get_post_meta ($post->ID, 'address',  TRUE);
	$phone    = get_post_meta ($post->ID, 'phone',    TRUE);
	$fax      = get_post_meta ($post->ID, 'fax',      TRUE);
	$email    = get_post_meta ($post->ID, 'email',    TRUE);
	$website  = get_post_meta ($post->ID, 'website',  TRUE);
	$geo_lat  = get_post_meta ($post->ID, 'geo_lat',  TRUE);
	$geo_long = get_post_meta ($post->ID, 'geo_long', TRUE);

	include (STYLESHEETPATH . '/views/hotel_form.php');

	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="my_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function restaurant_form() {
	global $post;

	$tipo     = get_post_meta ($post->ID, 'tipo',     TRUE);
	$image1   = get_post_meta ($post->ID, 'image1',   TRUE);
	$image2   = get_post_meta ($post->ID, 'image2',   TRUE);
	$image3   = get_post_meta ($post->ID, 'image3',   TRUE);
	$image4   = get_post_meta ($post->ID, 'image4',   TRUE);
	$crio     = get_post_meta ($post->ID, 'crio',     TRUE);
	$inter    = get_post_meta ($post->ID, 'inter',    TRUE);
	$tv       = get_post_meta ($post->ID, 'tv',       TRUE);
	$wifi     = get_post_meta ($post->ID, 'wifi',     TRUE);
	$delivery = get_post_meta ($post->ID, 'delivery', TRUE);
	$bar      = get_post_meta ($post->ID, 'bar',      TRUE);
	$address  = get_post_meta ($post->ID, 'address',  TRUE);
	$phone    = get_post_meta ($post->ID, 'phone',    TRUE);
	$fax      = get_post_meta ($post->ID, 'fax',      TRUE);
	$email    = get_post_meta ($post->ID, 'email',    TRUE);
	$website  = get_post_meta ($post->ID, 'website',  TRUE);
	$geo_lat  = get_post_meta ($post->ID, 'geo_lat',  TRUE);
	$geo_long = get_post_meta ($post->ID, 'geo_long', TRUE);

	include (STYLESHEETPATH . '/views/restaurant_form.php');

	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="my_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

//----

function atractivo_form() {
	global $post;

	$geo_lat  = get_post_meta ($post->ID, 'geo_lat',  TRUE);
	$geo_long = get_post_meta ($post->ID, 'geo_long', TRUE);

	include (STYLESHEETPATH . '/views/atractivo_form.php');

	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="my_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}


function my_meta_save($post_id) {
	// authentication checks
	if (!isset ($_REQUEST['my_meta_noncename']) OR !wp_verify_nonce ($_REQUEST['my_meta_noncename'], __FILE__))
		return $post_id;
	if (!current_user_can ('edit_post', $post_id))
		return $post_id;

	// The array of accepted fields for Books
	$accepted_fields['gc_hoteles']       =
	$accepted_fields['gc_bares_y_rests'] = array (
		'tipo',
		'image1',
		'image2',
		'image3',
		'image4',
		'bar',
		'tv',
		'wifi',
		'address',
		'phone',
		'fax',
		'email',
		'website'
	);

	array_push ($accepted_fields['gc_hoteles'],
		'chim',
		'pool',
		'james',
		'heat',
		'menu'
	);

	array_push ($accepted_fields['gc_bares_y_rests'],
		'crio',
		'inter',
		'delivery'
	);

	$accepted_fields['gc_hoteles'][]       =
	$accepted_fields['gc_bares_y_rests'][] =
	$accepted_fields['gc_atractivos'][]    = 'geo_lat';

	$accepted_fields['gc_hoteles'][]       =
	$accepted_fields['gc_bares_y_rests'][] =
	$accepted_fields['gc_atractivos'][]    = 'geo_long';

	$post_title = get_the_title ($post_id);

	if (empty ($post_title))
		delete_post_meta ($post_id, 'nombre');
	else
		update_post_meta ($post_id, 'nombre', $post_title);


	$post_type_id = $_REQUEST['post_type'];

	foreach($accepted_fields[$post_type_id] as $key)
	{
		$custom_field = $_REQUEST[$key];

		if (is_null ($custom_field))
			delete_post_meta ($post_id, $key);
		elseif (isset ($custom_field) && !is_null ($custom_field))
			update_post_meta ($post_id, $key, $custom_field);
		else
			add_post_meta ($post_id, $key, $custom_field, TRUE);
	}

	wp_set_object_terms ($post_id, array (category_for_post_type ($post_type_id)), 'category');

	return $post_id;
}

//----

if (!function_exists ('post_type_for_category')):
function post_type_for_category ($category) {
	switch ($category) {
	case 'hoteles':
		return 'gc_hoteles';
		break;
	case 'bares-y-restaurantes':
		return 'gc_bares_y_rests';
		break;
	case 'atractivos':
		return 'gc_atractivos';
		break;
	}
}
endif;

if (!function_exists ('category_for_post_type')):
function category_for_post_type ($post_type) {
	switch ($post_type) {
	case 'gc_hoteles':
		return 'hoteles';
		break;
	case 'gc_bares_y_rests':
		return 'bares-y-restaurantes';
		break;
	case 'gc_atractivos':
		return 'atractivos';
		break;
	}
}
endif;

if (!function_exists ('bares_y_rests_icons')):
function bares_y_rests_icons() {
	$icons         = array();
	$custom_fields = get_post_custom();
	$facilidades   = array (
		//'crio'     => 'Comida Criolla',
		//'inter'    => 'Comida Internacional',
		'tv'       => 'Televisión',
		'wifi'     => 'Wireless',
		'delivery' => 'Delivery',
		'bar'      => 'Tragos'
	);

	foreach ($custom_fields as $i => $entry)
		if (array_key_exists ($i, $facilidades) && current ($entry))
			$icons[$i] = $facilidades[$i];

	return $icons;
}
endif;

if (!function_exists ('hoteles_icons')):
function hoteles_icons() {
	$icons         = array();
	$custom_fields = get_post_custom();
	$facilidades   = array (
		'tv'       => 'Televisión',
		'wifi'     => 'Wireless',
		'menu' 	   => 'Restaurante',
		'bar'      => 'Tragos',
		'heat' 	   => 'Agua Caliente',
		'james'    => 'Juegos',
		'pool' 	   => 'Piscina',
		'chim' 	   => 'Chimenea'
	);

	foreach ($custom_fields as $i => $entry)
		if (array_key_exists ($i, $facilidades) && current ($entry))
			$icons[$i] = $facilidades[$i];

	return $icons;
}
endif;

function custom_excerpt_more( $more ) {
	return ' ...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );


// From http://www.intenseblog.com/wordpress/multiple-post-excerpt-lengths-wordpress.html
function new_excerpt ($charlength) {
   $excerpt = get_the_excerpt();
   $charlength++;
   if(strlen($excerpt)>$charlength) {
       $subex = substr($excerpt,0,$charlength-5);
       $exwords = explode(" ",$subex);
       $excut = -(strlen($exwords[count($exwords)-1]));
       if($excut<0) {
            echo substr($subex,0,$excut);
       } else {
       	    echo $subex;
       }
       echo "...";
   } else {
	   echo $excerpt;
   }
}

// !Image hooks

// Enable post thumbnail
add_theme_support ('post-thumbnails');

// Create new custom image sizes
if ( function_exists( 'add_image_size' ) ) {
	add_image_size ('square-thumb', 75,  75,  true);  // Small square thumbnail for showing in sidebar lists
	add_image_size ('thumbnail',    115, 91,  true);  // Small rectangular thumbnail for showing in lists (Home for example)
	add_image_size ('medium',       400, 240, true);  // Medium image for showing in featured home rotator
	add_image_size ('atractivo-featured',  445, 252, true);
}

// Time passed function for tweets
function time_passed($timestamp) {
    //type cast, current time, difference in timestamps
    $timestamp      = (int) $timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;
    
    //intervals in seconds
    $intervals      = array (
        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
    );
    
    //now we just find the difference
    if ($diff == 0)
    {
        return 'just now';
    }    

    if ($diff < 60)
    {
        return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
    }        

    if ($diff >= 60 && $diff < $intervals['hour'])
    {
        $diff = floor($diff/$intervals['minute']);
        return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
    }        

    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
    {
        $diff = floor($diff/$intervals['hour']);
        return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
    }    

    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
    {
        $diff = floor($diff/$intervals['day']);
        return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
    }    

    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
    {
        $diff = floor($diff/$intervals['week']);
        return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
    }    

    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
    {
        $diff = floor($diff/$intervals['month']);
        return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';
    }    

    if ($diff >= $intervals['year'])
    {
        $diff = floor($diff/$intervals['year']);
        return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';
    }
}


/*
if (!function_exists ('gc_js_body_data')):
function gc_js_body_data() {
	if ( is_front_page() )
		$template = 'home';
	else if ( is_home() )
		$template = 'blog';

	else if ( is_page() ) {
		$page_id   = $wp_query->get_queried_object_id();
		$post      = get_page($page_id);

		$template   = 'page';
		$slug       = $post->post_name;
		$individual = sanitize_html_class( str_replace( '.', '-', get_post_meta( $page_id, '_wp_page_template', true ) ) );
	}

	else if ( is_category() ) {
		$cat        = $wp_query->get_queried_object();
		$template   = 'category';
		$slug       = sanitize_html_class( $cat->slug, $cat->term_id );
	}

	else if ( is_single() ) {
		$post_id = $wp_query->get_queried_object_id();
		$post    = $wp_query->get_queried_object();

		$template   = 'single';
		$slug       = sanitize_html_class ( $post->post_type, $post_id );
		$individual = 'single-' . $post_id;
	}

	else if ( is_archive() ) {
		$template = 'archive';
	}

	else if ( is_search() ) {
		$template = 'search';
		$slug     = !empty( $wp_query->posts ) ? 'results' : 'no-results';
	}

	else if ( is_attachment() )
		$template = 'attachment';
	else if ( is_404() )
		$template = 'error404';
	$template = 'boom';
	if (isset ($template))
		$attr[] = 'data-template="'. $template .'"';
	if (isset ($slug))
		$attr[] = 'data-slug="'. $slug .'"';
	if (isset ($individual))
		$attr[] = 'data-individual="'. $individual .'"';

	return implode(' ', $attr);
}

add_filter('body_class', 'gc_js_body_data');
endif;
*/

?>
