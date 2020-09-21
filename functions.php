<?php
/**
 * And Memories functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage And_Memories
 * @since And Memories 1.0
 */

/**
 * And Memories only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function AndMemories_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/AndMemories
	 * If you're building a theme based on And Memories, use a find and replace
	 * to change 'AndMemories' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'AndMemories' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'AndMemories-featured-image', 2000, 1200, true );

	add_image_size( 'AndMemories-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'AndMemories' ),
			'social' => __( 'Social Links Menu', 'AndMemories' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://wordpress.org/support/article/post-formats/
	 */
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		)
	);

	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo',
		array(
			'width'      => 250,
			'height'     => 250,
			'flex-width' => true,
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
	  */
	add_editor_style( array( 'assets/css/editor-style.css', AndMemories_fonts_url() ) );

	// Load regular editor styles into the new block-based editor.
	add_theme_support( 'editor-styles' );

	// Load default block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'home',
			'about'            => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact'          => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog'             => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'AndMemories' ),
				'file'       => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'AndMemories' ),
				'file'       => 'assets/images/sandwich.jpg',
			),
			'image-coffee'   => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'AndMemories' ),
				'file'       => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods'  => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'top'    => array(
				'name'  => __( 'Top Menu', 'AndMemories' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name'  => __( 'Social Links Menu', 'AndMemories' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters And Memories array of starter content.
	 *
	 * @since And Memories 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'AndMemories_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'AndMemories_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function AndMemories_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( AndMemories_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter And Memories content width of the theme.
	 *
	 * @since And Memories 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'AndMemories_content_width', $content_width );
}
add_action( 'template_redirect', 'AndMemories_content_width', 0 );

/**
 * Register custom fonts.
 */
function AndMemories_fonts_url() {
	$fonts_url = '';

	/*
	 * translators: If there are characters in your language that are not supported
	 * by Libre Franklin, translate this to 'off'. Do not translate into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'AndMemories' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family'  => urlencode( implode( '|', $font_families ) ),
			'subset'  => urlencode( 'latin,latin-ext' ),
			'display' => urlencode( 'fallback' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since And Memories 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function AndMemories_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'AndMemories-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'AndMemories_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function AndMemories_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'AndMemories' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'AndMemories' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'AndMemories' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'AndMemories' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'AndMemories' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'AndMemories' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'AndMemories_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since And Memories 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function AndMemories_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Post title. */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'AndMemories' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'AndMemories_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since And Memories 1.0
 */
function AndMemories_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'AndMemories_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function AndMemories_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'AndMemories_pingback_header' );

/**
 * Display custom color CSS.
 */
function AndMemories_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );

	$customize_preview_data_hue = '';
	if ( is_customize_preview() ) {
		$customize_preview_data_hue = 'data-hue="' . $hue . '"';
	}
	?>
	<style type="text/css" id="custom-theme-colors" <?php echo $customize_preview_data_hue; ?>>
		<?php echo AndMemories_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'AndMemories_colors_css_wrap' );

/**
 * Enqueues scripts and styles.
 */
function AndMemories_scripts() {
	// wp_enqueue_script ('animate-header', '/wp-content/themes/andmemories/assets/js/custom-animation.js','','',true);
	// wp_enqueue_script ('onload animation', '/wp-content/themes/andmemories/assets/js/onload-animation.js','','',true);

	wp_enqueue_script( 'animate-header', get_theme_file_uri( '/assets/js/custom-animation.js' ), array( ), '', true );
	wp_enqueue_script( 'onload animation', get_theme_file_uri( '/assets/js/onload-animation.js' ), array('jquery' ), '', true );
	add_filter('onload animation', 'add_type_attribute' , 10, 3);




	function add_type_attribute($tag, $handle, $src) {
		// if not your script, do nothing and return original $tag
		if ( 'onload animation' !== $handle ) {
			return $tag;
		}
		// change the script tag by adding type="module" and return it.
		$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
		return $tag;
	}
	wp_enqueue_script( 'shake', get_theme_file_uri( '/assets/js/shake.js' ), array('jquery' ), '', true );


	wp_enqueue_script( 'email', get_theme_file_uri( '/assets/js/email.js' ), array( ), '', true );


	wp_enqueue_style( 'animate-header-style', get_theme_file_uri( '/assets/css/custom-animation.css' ), array( 'AndMemories-style' ) );
	wp_enqueue_style( 'custom-slider', get_theme_file_uri( '/assets/css/custom-slider.css' ), array( 'AndMemories-style' ) );

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'AndMemories-fonts', AndMemories_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'AndMemories-style', get_stylesheet_uri(), array(), '20190507' );

	// Theme block stylesheet.
	wp_enqueue_style( 'AndMemories-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'AndMemories-style' ), '20190105' );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'AndMemories-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'AndMemories-style' ), '20190408' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'AndMemories-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'AndMemories-style' ), '20161202' );
		wp_style_add_data( 'AndMemories-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'AndMemories-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'AndMemories-style' ), '20161202' );
	wp_style_add_data( 'AndMemories-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '20161020' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'AndMemories-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '20161114', true );

	$AndMemories_l10n = array(
		'quote' => AndMemories_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'AndMemories-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '20161203', true );
		$AndMemories_l10n['expand']   = __( 'Expand child menu', 'AndMemories' );
		$AndMemories_l10n['collapse'] = __( 'Collapse child menu', 'AndMemories' );
		$AndMemories_l10n['icon']     = AndMemories_get_svg(
			array(
				'icon'     => 'angle-down',
				'fallback' => true,
			)
		);
	}

	wp_enqueue_script( 'AndMemories-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '20190121', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'AndMemories-skip-link-focus-fix', 'AndMemoriesScreenReaderText', $AndMemories_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	
	wp_enqueue_script( 'text-fit', get_theme_file_uri( '/assets/js/textFit.js' ));


}
add_action( 'wp_enqueue_scripts', 'AndMemories_scripts' );


/**
 * Enqueues styles for the block-based editor.
 *
 * @since And Memories 1.8
 */
function AndMemories_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'AndMemories-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ), array(), '20190328' );
	// Add custom fonts.
	wp_enqueue_style( 'AndMemories-fonts', AndMemories_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'AndMemories_block_editor_styles' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since And Memories 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function AndMemories_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			$sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'AndMemories_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since And Memories 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function AndMemories_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'AndMemories_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since And Memories 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function AndMemories_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'AndMemories_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since And Memories 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function AndMemories_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'AndMemories_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since And Memories 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function AndMemories_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'AndMemories_widget_tag_cloud_args' );

/**
 * Get unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @since And Memories 2.0
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @staticvar int $id_counter
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function AndMemories_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

include('custom-slider.php');
