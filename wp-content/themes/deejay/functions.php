<?php
/**
 * Deejay functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Deejay
 */

if ( ! function_exists( 'deejay_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function deejay_setup() {
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_editor_style();

		add_theme_support( 'custom-logo', array(
			'height'      => 150,
			'width'       => 200,
			'flex-width' => true,
		) );

		add_theme_support( 'post-formats', array( 'video', 'audio' ) );

		register_nav_menus( array(
			'bar' => esc_html( 'Top Navigation Bar','deejay' ),
			'header' => esc_html__( 'Header Menu', 'deejay' ),
			'social' => esc_html__( 'Social Menu', 'deejay' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-header', apply_filters( 'deejay_custom_header_args', array(
			'default-image'          => '%s/images/remix.jpg',
			'default-text-color'     => '#4ac6c9',
			'uploads'                => true,
			'flex-height'            => true,
			'flex-width'             => true,
			'width'                  => 1900,
			'height'                 => 860,
			'video'					 => true,
			)
		) );

		add_theme_support( 'custom-background', apply_filters( 'deejay_custom_background_args', array(
			'default-color' => '#0a0a0a',
			)
		) );

		register_default_headers( array(
			'remix' => array(
				'url' => '%s/images/remix.jpg',
				'thumbnail_url' => '%s/images/remix.jpg',
				'description' => __( 'Remix', 'deejay' ),
			),
		) );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'render'    => 'deejay_infinite_scroll_render',
			'footer'    => 'page',
		) );

		add_theme_support( 'jetpack-responsive-videos' );
		add_theme_support( 'jetpack-testimonial' );
		add_theme_support( 'jetpack-portfolio' );

		add_theme_support( 'starter-content', array(
			'posts' => array(
				'about',
				'contact',
				'blog',
				'news',
			),
			'nav_menus' => array(
				'bar' => array(
					'name' => __( 'Top Navigation Bar', 'deejay' ),
					'items' => array(
						'page_about',
						'page_blog',
						'page_contact',
					),
				),
				'header' => array(
					'name' => __( 'Header Menu', 'deejay' ),
					'items' => array(
						'page_news',
						'page_about',
						'page_blog',
						'page_contact',
					),
				),
				'social' => array(
					'name' => __( 'Social Menu', 'deejay' ),
					'items' => array(
						'link_facebook',
						'link_twitter',
						'link_instagram',
					),
				),
			),
		) );

		add_theme_support( 'editor-color-palette', '#4ac6c9', '#b902c4', '#111111' );
	}
}  // End if().

add_action( 'after_setup_theme', 'deejay_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function deejay_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'deejay_content_width', 800 );
}
add_action( 'after_setup_theme', 'deejay_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function deejay_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Widgets: Header', 'deejay' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'The header widget area is only visible on the front page and only has room for 3 widgets. The space is somewhat limited, so carefully select widgets that will fit inside the area. At 960px width, only the first header widget will be shown.','deejay' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Widgets: Below the content', 'deejay' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Widgets in this section will be shown on the front page below your content. ','deejay' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'deejay' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Widgets in this section will be shown in the footer of all your pages. ','deejay' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Copyright', 'deejay' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Please place a single text widget with your copyright information here. It will then be shown in the footer.','deejay' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'deejay_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function deejay_scripts() {
	wp_enqueue_style( 'deejay-style', get_stylesheet_uri() );
	wp_enqueue_script( 'deejay-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'deejay-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'deejay_scripts' );

function deejay_excerpt_length( $length ) {
	if ( ! is_admin() ) {
		return 35;
	} else {
		return $length;
	}
}
add_filter( 'excerpt_length', 'deejay_excerpt_length', 999 );

function deejay_excerpt_more( $more ) {
	if ( ! is_admin() ) {
		global $post;
		return '&hellip; <br><br><a class="more-link" href="' . esc_url( get_permalink( $post->ID ) ) . '">' .
		/* translators: %s: post title */
		sprintf( esc_html__( 'Continue Reading %s', 'deejay' ), get_the_title( $post->ID ) ) . '</a>';
	} else {
		return $more;
	}
}
add_filter( 'excerpt_more', 'deejay_excerpt_more' );


if ( ! function_exists( 'deejay_comments_pagination' ) ) {
	/**
	 * Because get_the_comments_pagination() only accepts one type (plain) I had to alter the function slightly to add the list type,
	 * so that the comment pagination could be styled in the same way as the post pagination.
	 * https://developer.wordpress.org/reference/functions/get_the_comments_pagination/
	 * Related ticket: https://core.trac.wordpress.org/ticket/39792
	 **/
	function deejay_comments_pagination( $args = array() ) {
		$navigation = '';
		$args       = wp_parse_args( $args, array(
			'screen_reader_text' => __( 'Comments navigation', 'deejay' ),
			'prev_text' => _x( 'Previous', 'previous set of comments', 'deejay' ),
			'next_text' => _x( 'Next', 'next set of comments', 'deejay' ),
			'type' => 'list',
		) );
		$links = paginate_comments_links( $args );
		if ( $links ) {
			$navigation = _navigation_markup( $links, 'comments-pagination', $args['screen_reader_text'] );
		}
	}
}

add_filter( 'body_class', 'deejay_classes' );
function deejay_classes( $classes ) {
	/*
	 *	If header media is used, add a class to body.
 	 *
	 */
	if ( has_header_image() || has_header_video() ) {
		$classes[] = 'has-header-media';
	}

	return $classes;
}

if ( class_exists( 'woocommerce' ) ) {
	function deejay_woocommerce_pagination() {
		the_posts_pagination( array( 'type' => 'list' ) );
	}
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination' );
	add_action( 'woocommerce_after_shop_loop', 'deejay_woocommerce_pagination', 10 );
}

/**
 * Remove the Jetpack likes and sharing_display filter so that we can resposition them to our post footer.
 * Otherwise, they are displayed below the content, but above the page links ( wp_link_pages() ) if a post has multiple pages.
 */
function deejay_move_share() {
	if ( function_exists( 'sharing_display' ) ) {
		remove_filter( 'the_content', 'sharing_display',19 );
		remove_filter( 'the_excerpt', 'sharing_display',19 );
	}

	if ( class_exists( 'Jetpack_Likes' ) ) {
		remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
	}
}
add_action( 'loop_start', 'deejay_move_share' );

/**
 * Remove the Jetpack related posts filter so that we can resposition them to our post footer.
 */
function deejay_move_related_posts() {
	if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
		$jprp = Jetpack_RelatedPosts::init();
		$callback = array( $jprp, 'filter_add_target_to_dom' );
		remove_filter( 'the_content', $callback, 40 );
	}
}
add_filter( 'wp', 'deejay_move_related_posts', 20 );

if ( ! function_exists( 'deejay_menu_home' ) ) {
	function deejay_menu_home( $items, $args ) {
		if ( 'bar' === $args->theme_location ) {
			$new_item = array( '<li class="menu-item"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html__( 'Home', 'deejay' ) . '</a></li>' );
			$items = preg_replace( '/<\/li>\s<li/', '</li>,<li',  $items );
			$array_items = explode( ',', $items );
			array_splice( $array_items, 0, 0, $new_item );
			$items = implode( '', $array_items );
		}
		return $items;
	}
	add_filter( 'wp_nav_menu_items','deejay_menu_home', 10, 2 );
}
/*
if ( ! function_exists( 'deejay_menu_site_icon' ) ) {
	function deejay_menu_site_icon( $items, $args ) {
		if ( 'bar' === $args->theme_location && has_site_icon() ) {
			$new_item = array( '<li class="menu-item"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img src="' . get_site_icon_url('32') . '"></a></li>' );
			$items = preg_replace( '/<\/li>\s<li/', '</li>,<li',  $items );
			$array_items = explode( ',', $items );
			array_splice( $array_items, 0, 0, $new_item );
			$items = implode( '', $array_items );
		}
		return $items;
	}
	add_filter( 'wp_nav_menu_items','deejay_menu_site_icon', 10, 2 );
}
*/

function deejay_page_menu_home( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'deejay_page_menu_home' );

function deejay_header_menu_description( $item_output, $item, $depth, $args ) {
	if ( 'header' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'deejay_header_menu_description', 10, 4 );

/**
 * Custom render function for Infinite Scroll.
 */
function deejay_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'content', get_post_format() );
	}
}

/**
 * Custom colors for this theme.
 */
require get_template_directory() . '/inc/colors.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/class-customize.php';

/**
 * Hybrid Media Grapper
 */
require get_template_directory() . '/inc/class-media-grabber.php';

/**
 * SVG icons
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Load custom widget files.
 */
require get_template_directory() . '/inc/recent-posts-widget.php';
require get_template_directory() . '/inc/recent-comments-widget.php';

/* We have added support for testimonials, but don't enable the widget unless Jetpack is installed. */
if ( class_exists( 'Jetpack' ) ) {
	require get_template_directory() . '/inc/testimonial-widget.php';
}

if ( ! function_exists( 'deejay_customize_css' ) ) {
	function deejay_customize_css() {
		echo '<style type="text/css">';

		if ( is_front_page() && has_header_image() && ! has_header_video() ) {
		?>
			.home .site-header{ 
				background: url(<?php header_image(); ?>) no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				min-height: <?php echo esc_attr( get_custom_header()->height ); ?>px !important;
				padding-top: 4em;
				overflow: hidden;
			}
			@media only screen and (min-device-width : 768px) and (max-device-width : 1024px)  {
				.home .site-header { background-attachment: scroll !important; }
			}
		<?php
		} elseif ( ! is_front_page() && has_header_image() ) {

			if ( get_theme_mod( 'deejay_header_bgcolor' ) ) {
				echo '.site-header{background:' . esc_attr( get_theme_mod( 'deejay_header_bgcolor' ) ) . ';}';
			} else {
				?>
				.site-header{ 
					background: url(<?php header_image(); ?>) no-repeat center center fixed;
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;
				}
			<?php
			}
		}

		if ( '2' === get_theme_mod( 'deejay_grid_size' ) ) {
			echo '.grid{ width:48%; }';
			echo '@media screen and (max-width: 1200px) { .grid { width: 100%; }';
		} elseif ( '1' === get_theme_mod( 'deejay_grid_size' ) ) {
			echo '.grid { width: 100%; min-height: initial;}';
		}

		echo '</style>';
	}
	add_action( 'wp_head', 'deejay_customize_css' );
}
