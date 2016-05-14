<?php
/**
 * attila functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package attila
 */

if ( ! function_exists( 'attila_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function attila_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on attila, use a find and replace
   * to change 'attila' to the name of your theme in all the template files.
   */
  load_theme_textdomain( 'attila', get_template_directory() . '/languages' );

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
  register_nav_menus( array(
    'primary' => esc_html__( 'Primary Menu', 'attila' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

  /*
   * Enable support for Post Formats.
   * See https://developer.wordpress.org/themes/functionality/post-formats/
   */
  add_theme_support( 'post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
  ) );

  // Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'attila_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );
}
endif;
add_action( 'after_setup_theme', 'attila_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function attila_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'attila_content_width', 640 );
}
add_action( 'after_setup_theme', 'attila_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function attila_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'attila' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'attila' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'attila_widgets_init' );

/**
 * Add Author Links
 */
function add_to_author_profile( $contactmethods ) {
  $contactmethods['user_location'] = 'Location';
  $contactmethods['rss_url'] = 'RSS URL';
  $contactmethods['google_profile'] = 'Google Profile URL';
  $contactmethods['twitter_profile'] = 'Twitter Profile URL';
  $contactmethods['facebook_profile'] = 'Facebook Profile URL';
  $contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
  
  return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);

/**
 * Pagination
 */
function pagination_nav() {
  global $wp_query;

  if ( $wp_query->max_num_pages > 1 ) { ?>
    <span class="pagination-next"><?php next_posts_link( '&larr; Older posts' ); ?></span>
    <span class="pagination-prev"><?php previous_posts_link( 'Newer posts &rarr;' ); ?></span>
  <?php }
}

/**
 * Enqueue scripts and styles.
 */
function attila_scripts() {
  wp_enqueue_style( 'attila-style', get_stylesheet_uri() );

  wp_enqueue_script( 'attila-jquery', 'https://code.jquery.com/jquery-2.2.3.min.js', array(), '20151215', true );
  wp_enqueue_script( 'attila-highlight', get_template_directory_uri() . '/js/highlight.pack.js', array(), '20151215', true );
  wp_enqueue_script( 'attila-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array(), '20151215', true );
  wp_enqueue_script( 'attila-history', get_template_directory_uri() . '/js/jquery.history.js', array(), '20151215', true );
  wp_enqueue_script( 'attila-nprogress', get_template_directory_uri() . '/js/nprogress.js', array(), '20151215', true );
  wp_enqueue_script( 'attila-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
  wp_enqueue_script( 'attila-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
  wp_enqueue_script( 'attila-main-scripts', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'attila_scripts' );

function new_excerpt_more( $more ) {
  // global $post;
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
