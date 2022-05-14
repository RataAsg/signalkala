<?php
/**
 * Signalkala functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Signalkala
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0');
}

if ( ! defined( '_S_VERSION_RAND' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION_RAND', '1.0.' .  rand(1,99999));
}

if ( ! function_exists( 'signalkala_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function signalkala_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Signalkala, use a find and replace
		 * to change 'signalkala' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'signalkala', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		function register_my_menu() {
			register_nav_menu('signalkala-menu',__( 'Signalkala Menu' ));
		  }
		  add_action( 'init', 'register_my_menu' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// function for searching on whole page
		function cf_search_join( $join ) {
			global $wpdb;

			if ( is_search() ) {
				$join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
			}

			return $join;
		}
		add_filter('posts_join', 'cf_search_join' );
		function cf_search_where( $where ) {
			global $pagenow, $wpdb;

			if ( is_search() ) {
				$where = preg_replace(
					"/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
					"(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
			}

			return $where;
		}
		add_filter( 'posts_where', 'cf_search_where' );

		function cf_search_distinct( $where ) {
			global $wpdb;

			if ( is_search() ) {
				return "DISTINCT";
			}

			return $where;
		}
		add_filter( 'posts_distinct', 'cf_search_distinct' );
		// Alter search posts per page
		function myprefix_search_posts_per_page($query) {
    	if ( $query->is_search ) {
        $query->set( 'posts_per_page', '20' );
    	}
    	return $query;
		}
		add_filter( 'pre_get_posts','myprefix_search_posts_per_page' );
		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'signalkala_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 208,
				'width'       => 54,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'signalkala_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

function signalkala_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'signalkala_content_width', 640 );
}
add_action( 'after_setup_theme', 'signalkala_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function signalkala_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'signalkala' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'signalkala' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'signalkala_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function signalkala_styles() {
	wp_enqueue_style( 'signalkala-main', get_template_directory_uri() . '/main.min.css', array(), filemtime( get_stylesheet_directory() . '/main.min.css' ) );
	// wp_enqueue_style( 'signalkala-body', get_template_directory_uri() . '/body.css', array(), filemtime( get_stylesheet_directory() . '/body.css' ) );
	// wp_enqueue_style( 'signalkala-home', get_template_directory_uri() . '/home.css', array(), filemtime( get_stylesheet_directory() . '/home.css' ) );
	// wp_enqueue_style( 'signalkala-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_enqueue_style('flickity', get_template_directory_uri() . '/assets/js/custom/flickity.min.css', array(), _S_VERSION);
	// wp_enqueue_style('flickity-fade', get_template_directory_uri() . '/assets/js/custom/flickity-fade.css', array(), _S_VERSION);
	wp_enqueue_style( 'signalkala-tailwind', get_template_directory_uri() . '/tailwind.min.css', array(), _S_VERSION );


	wp_style_add_data( 'signalkala-style', 'rtl', 'replace' );
}
add_action( 'wp_head', 'signalkala_styles' , 1);

/**
 * Enqueue scripts and styles.
 */
function signalkala_scripts() {

	// wp_enqueue_script( 'gsap', get_template_directory_uri() . '/assets/js/gsap.min.js', array(), true );
	wp_enqueue_script( 'Jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'signalkala-vendor', get_template_directory_uri() . '/assets/js/vendor.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'signalkala-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), filectime( get_stylesheet_directory() . '/assets/js/custom.js' ) );
	wp_enqueue_script( 'signalkala-fancy', get_template_directory_uri() . '/assets/fancy/jquery.fancybox.min.js', array(), filectime( get_stylesheet_directory() . '/assets/fancy/jquery.fancybox.min.js' ) );

	// wp_enqueue_script( 'persianDate', get_template_directory_uri() . '/assets/js/persian-date.js', array(), _S_VERSION );
	// wp_enqueue_script( 'persianDatepicker', get_template_directory_uri() . '/assets/js/persian-datepicker.js', array(), _S_VERSION );
	// wp_enqueue_script( 'persianDatescript', get_template_directory_uri() . '/assets/js/persian-date-script.js', array(), _S_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_footer', 'signalkala_scripts' );

// Theme Options
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'signalkala Options',
        'menu_title'    => 'signalkala Options',
        'menu_slug'     => 'signalkala-options',
        // 'capability'     => 'signalkala-options',
        'parent_slug'   => '',
        'position'      => false,
        'icon_url'      => false,
        'redirect'      => false,
    ));

	acf_add_options_sub_page(array(
        'page_title'    => 'Archive',
        'menu_title'    => 'Archive',
        'menu_slug'     => 'signalkala-options-archive',
        // 'capability'     => 'signalkala-options',
        'parent_slug'   => 'signalkala-options',
        'position'      => false,
        'icon_url'      => false,
	));

    acf_add_options_sub_page(array(
        'page_title'    => 'Header',
        'menu_title'    => 'Header',
        'menu_slug'     => 'signalkala-options-header',
        // 'capability'     => 'signalkala-options',
        'parent_slug'   => 'signalkala-options',
        'position'      => false,
        'icon_url'      => false,
	));

	acf_add_options_sub_page(array(
        'page_title'    => 'Sidebar',
        'menu_title'    => 'Sidebar',
        'menu_slug'     => 'signalkala-options-sidebar',
        // 'capability'     => 'signalkala-options',
        'parent_slug'   => 'signalkala-options',
        'position'      => false,
        'icon_url'      => false,
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Footer',
        'menu_title'    => 'Footer',
        'menu_slug'     => 'signalkala-options-footer',
        // 'capability'     => 'signalkala-options',
        'parent_slug'   => 'signalkala-options',
        'position'      => false,
        'icon_url'      => false,
	));

}


// add pagination to function.php for category.php page
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages,
		'mid_size' => 2,
		'show_all' => False,
	'prev_next' => True,
	'prev_text' => __('&lt;'),
	'next_text' => __('&gt;'),
	'type'      => 'list',
	'add_args' => ''
    ));
}

/*
 * Set post views count using post meta
 */
function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

/*
 * Set post views count number
 */
function gt_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count views";
}
function gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function gt_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function gt_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo gt_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );


// use this code for configuration customize comment form
function signalkala_comment_form ($fields) {


	// change field order
	$author_field = $fields['author'];
	$email_field = $fields['email'];
	$comment_field = $fields['comment'];
	unset($fields['comment']);
	unset($fields['author']);
	unset($fields['email']);
	$fields['comment'] = $comment_field;
	$fields['author'] = $author_field;
	$fields['email'] = $email_field;

	// now we create customize comment here
	$fields['comment'] = '<textarea id="comment" name="comment"  rows="8" maxlength="65525" placeholder="دیدگاه خود را بنویسید:" required="required"></textarea>';

	// customize author field
    $fields['author'] = '<input id="author" name="author" value="" placeholder="نام و نام‌خانوادگی:" size="5" required="required" type="text">';

	// customize email field
    $fields['email'] = '<input id="email" name="email" type="email" value="" placeholder="ایمیل:" size="5" maxlength="100" aria-describedby="email-notes" required="required">';

    //remove website
	unset($fields['url']);


    //remove cookies
	unset($fields['cookies']);


	//remove must be logged in to comment message.
	// unset($fields['must_log_in']);

    return $fields;
}

//here we change default wp comments with customize one
add_filter('comment_form_fields', 'signalkala_comment_form');

// we use this function for changing reply text content
function signalkala_comment_reply($content) {
	$content = str_replace('Reply', 'پاسخ به دیدگاه', $content);
	return $content;
}
add_filter('comment_reply_link', 'signalkala_comment_reply');

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'signalkalaTheme') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

function tn_custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );

add_filter( 'woocommerce_breadcrumb_defaults', 'change_breadcrumb_home_text' );
/**
 * Rename "home" in WooCommerce breadcrumb
 */
function change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Shop'
	$defaults['home'] = ' ';
	return $defaults;
}

// Delete Title, Quantity, Sku and category from woocommerce_single_product_summary.
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

// Change Add To Cart Button Position from woocommerce_single_product_summary
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 5 );

