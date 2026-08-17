<?php
/*
 *  Author: Samuel Kobe | @samuelkobe
 *  URL: webok.ca/web-ok-starter-theme | @web-ok-starter
 *  Functions, custom post types and more.
 */

 // ONLY USE THIS WHEN LOCAL
$hostname = $_SERVER['SERVER_NAME'];
if (stripos($hostname, "local") || stripos($hostname, "dok")) {
	// development
	add_filter( 'https_ssl_verify', '__return_false' );
}

 /*------------------------------------*\
  Overall Site Options
\*------------------------------------*/

if ( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
    acf_set_options_page_menu('Theme Settings');
    // acf_add_options_sub_page('Specific Settings');
}

/* ####### Theme Support ####### */

if (!isset($content_width))
{
    $content_width = 1280;
}

if (function_exists('add_theme_support')) {

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('web-ok-starter', get_template_directory() . '/languages');

    // Custom logo support
    $logo_width  = 240;
    $logo_height = 128;

    add_theme_support(
        'custom-logo',
        array(
            'height'               => $logo_height,
            'width'                => $logo_width,
            'unlink-homepage-logo' => false,
        )
    );

    add_theme_support( "custom-background" );

    add_editor_style( 'custom-editor-style.css' );

}

/* ####### Fucntions ####### */

// Navigation
function webokstarter_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
        'add_li_class'    => '',
		'walker'          => false
		)
	);
}

// Footer Navigation
function footer_nav_one()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'footer-menu-one',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="">%3$s</ul>',
		'depth'           => 0,
        'add_li_class'    => '',
		'walker'          => false
		)
	);
}

// Footer Navigation
function footer_nav_two()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'footer-menu-two',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="">%3$s</ul>',
		'depth'           => 0,
        'add_li_class'    => '',
		'walker'          => false
		)
	);
}


add_action( 'after_setup_theme', 'wpse_theme_setup' );
function wpse_theme_setup() {
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );
}

// Load scripts (header.php)
function header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('webokscripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0'); // Custom scripts
        wp_enqueue_script('webokscripts'); // Enqueue
    }
}

// Enqueue conditional scripts
function conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array(), '1.0.0'); // Conditional scripts
        wp_enqueue_script('scriptname'); // Enqueue
    }
}

function footer_scripts()
{
    wp_register_script('menu-scripts', get_template_directory_uri() . '/js/menu.js', array(), '1.0.0'); // Custom scripts
    wp_enqueue_script('menu-scripts'); // Enqueue
    
    wp_register_script('scroll-helper', get_template_directory_uri() . '/js/scroll.js', array(), '1.0.0'); // Custom scripts
    wp_enqueue_script('scroll-helper'); // Enqueue
    
    //vh height adjustment script for ensuring tailwind h-screen(100vh) heights are not effected by mobile browser's UI and controls
    wp_register_script('h-vh', get_template_directory_uri() . '/js/h-vh.js');
    wp_enqueue_script('h-vh'); // Enqueue it!
    
    wp_register_script('faqs-scripts', get_template_directory_uri() . '/js/faqs.js', array(), '1.0.0'); // Custom scripts
    wp_enqueue_script('faqs-scripts'); // Enqueue
}

// Load styles
function styles_sheet()
{
    wp_register_style('web-ok-starter-styles', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('web-ok-starter-styles'); // Enqueue
}

// Register  Navigation
function register_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'web-ok-starter'), // Header/Main Navigation
        'footer-menu-one' => __('Footer Menu 1', 'web-ok-starter'), // Footer Navigation
        'footer-menu-two' => __('Footer Menu 2', 'web-ok-starter'), // Footer Navigation
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'web-ok-starter'),
        'description' => __('Description for this widget-area...', 'web-ok-starter'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'web-ok-starter'),
        'description' => __('Description for this widget-area...', 'web-ok-starter'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function webokstarter_wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function webokstarter_wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using webokstarter_wp_excerpt('webokstarter_wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using webokstarter_wp_excerpt('webokstarter_wp_custom_post');
function webokstarter_wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function webokstarter_wp_excerpt($length_callback = '', $more_callback = '')
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
function webokstarter_wp_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'web-ok-starter') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function webokstarter_wp_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function webokstarter_wp_gravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function webokstarter_wp_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>', 'web-ok-starter'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'web-ok-starter') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s', 'web-ok-starter'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'web-ok-starter'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Web Ok - Navigation alterations
\*------------------------------------*/

// Remove and add custom navigation classes - Web Ok
function add_link_atts($atts, $item) {
  $atts['class'] = "menu-anchor"; // gives menu <a> "menu-anchor" class
  $atts['data-title'] = $item->title; // gives menu <a> a data attribute for the title of the page
  return $atts;
}

function clear_nav_menu_item_id($id, $item, $args) {
    return ""; //clears <li> IDs from menu
}

function clear_nav_menu_item_class($classes, $item, $args) {
  if (in_array('current-menu-item', $classes) ){
    return array('active'); //adds class of active to <li> from menu
  } else {
    return array();
  }
}

function formatUrl($str, $sep='-')
{
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        return trim($res, $sep);
}

// /*------------------------------------*\
// 	Custom Services Post Type
// \*------------------------------------*/

// function create_post_type_services()
// {
//     register_taxonomy_for_object_type('category', 'service'); // Register Taxonomies for Category
//     register_taxonomy_for_object_type('post_tag', 'service');
//     register_post_type('service', // Register Custom Post Type
//         array(
//         'labels' => array(
//             'name' => __('Services', 'service'),
//             'singular_name' => __('Service', 'service'),
//             'add_new' => __('Add Service', 'service'),
//             'add_new_item' => __('Add New Service', 'service'),
//             'edit' => __('Edit', 'service'),
//             'edit_item' => __('Edit Service', 'service'),
//             'new_item' => __('New Service', 'service'),
//             'view' => __('View Service', 'service'),
//             'view_item' => __('View Service', 'service'),
//             'search_items' => __('Search Services', 'service'),
//             'not_found' => __('No Services found', 'service'),
//             'not_found_in_trash' => __('No Services found in Trash', 'service')
//         ),
//         'has_archive' => false,
//         'public' => true,
//         'menu_position' => 8,
//         'rewrite' => array(
//           'slug' => 'service'
//         ),
//         'menu_icon' => 'dashicons-star-filled',
//         'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
//         'supports' => array(
//             'title',
//             // 'editor',
//             // 'thumbnail'
//         ), // Go to Dashboard Custom HTML5 Blank post for supports
//         'can_export' => true, // Allows export in Tools > Export
//         'taxonomies' => array(
//             // 'post_tag',
//             // 'category',
//         ) // Add Category and Post Tags support
//     ));
// }

/*------------------------------------*\
	Custom Events Post Type
\*------------------------------------*/

function create_post_type_events()
{
    register_taxonomy_for_object_type('category', 'event'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'event');
    register_post_type('event', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Events', 'event'),
            'singular_name' => __('Event', 'event'),
            'add_new' => __('Add Event', 'event'),
            'add_new_item' => __('Add New Event', 'event'),
            'edit' => __('Edit', 'event'),
            'edit_item' => __('Edit Event', 'event'),
            'new_item' => __('New Event', 'event'),
            'view' => __('View Event', 'event'),
            'view_item' => __('View Event', 'event'),
            'search_items' => __('Search Events', 'event'),
            'not_found' => __('No Events found', 'event'),
            'not_found_in_trash' => __('No Events found in Trash', 'event')
        ),
        'has_archive' => false,
        'public' => true,
        'menu_position' => 7,
        'rewrite' => array(
          'slug' => 'event'
        ),
        'menu_icon' => 'dashicons-calendar-alt',
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'supports' => array(
            'title',
            // 'editor',
            // 'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            // 'post_tag',
            'category',
        ) // Add Category and Post Tags support
    ));
}

/* ####### Actions + Filters + ShortCodes ####### */

// Add Actions
add_action('init', 'header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_footer', 'footer_scripts'); // Add custom scripts to wp_footer
// add_action('wp_print_scripts', 'conditional_scripts'); // Add Conditional Page Scripts | Uncomment if used
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'styles_sheet'); // Add Theme Stylesheet
add_action('init', 'register_menu'); // Add Menus
add_action('init', 'create_post_type_events'); // Add Services Custom Post Type
// add_action('init', 'create_post_type_services'); // Add Services Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'webokstarter_wp_pagination'); // Add the Pagination

// Remove Actions
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.

// Add Filters
add_filter('avatar_defaults', 'webokstarter_wp_gravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'webokstarter_wp_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'webokstarter_wp_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Web Ok filters
add_filter('nav_menu_link_attributes', 'add_link_atts', 10, 2); // add attr to menu anchors - Web Ok
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3); // Remove id attr on menu items - Web Ok
add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3); // Remove class attr on menu items - Web Ok

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

?>
