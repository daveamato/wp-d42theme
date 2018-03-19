<?php
/*
 *  Author: David Amato
 *  URL: www.device42.com
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/
include('shortcodes.php');

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    add_theme_support('menus');
    add_theme_support('post-thumbnails');

    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true);

    add_theme_support('automatic-feed-links');

    load_theme_textdomain('d42custom', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

function html5blank_nav()
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
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

function load_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('d42-core', get_template_directory_uri() . '/js/scripts.js', array(), '0.0.1');
        wp_enqueue_script('d42-core');
        wp_register_script('d42-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array(), '1.0.0');
        wp_enqueue_script('d42-scripts');
    }
}



function load_styles()
{
    wp_register_style('d42localstyles', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('d42localstyles');
    wp_register_style('d42customstyles', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('d42customstyles');
}


function register_html5_menu()
{
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'd42custom'),
        'sidebar-menu' => __('Sidebar Menu', 'd42custom'),
        'extra-menu' => __('Extra Menu', 'd42custom')
    ));
}


function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

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

if (function_exists('register_sidebar'))
{
    register_sidebar(array(
        'name' => __('Widget Area 1', 'd42custom'),
        'description' => __('Widgets placed under here will show under "Widget Area 1".', 'd42custom'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Widget Area 2', 'd42custom'),
        'description' => __('Widgets placed here will show under "Widget Area 2".', 'd42custom'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

function d42_load_cat_widget()
{
    include('widgets/categories.php');
    register_widget('d42_cat_widget');
    include('widgets/archives.php');
    register_widget('d42_archive_widget');
}


function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}


function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'end_size' => 1,
        'mid_size' => 10
    ));
}

function html5wp_index($length)
{
    return 40;
}

function html5wp_custom_post($length)
{
    return 40;
}

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

function d42_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('Read More', 'd42custom') . '</a>';
}

function remove_admin_bar()
{
    return false;
}

function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}


function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/images/logo-square.jpeg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

function html5blankcomments($comment, $args, $depth)
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
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php __('Your comment is awaiting moderation.', 'd42custom') ?></em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
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



function d42_login_title() {
    return 'Device42 Blog';
}
function d42_login_url() {
    return '#';
}
function d42_login_logo() {
    ?>
    <style type="text/css">
.login h1 a {
    width:100%!important;
    height:auto!important;
    margin: 0 auto!important;
    padding:0!important;
    padding-bottom:24px!important;
    background-size: 100% 100%!important;

}
    </style>
    <?php
}



function remove_empty_p( $content ){
    $content = preg_replace( array(
        '#<p>\s*<(div|aside|section|article|header|footer)#',
        '#</(div|aside|section|article|header|footer)>\s*</p>#',
        '#</(div|aside|section|article|header|footer)>\s*<br ?/?>#',
        '#<(div|aside|section|article|header|footer)(.*?)>\s*</p>#',
        '#<p>\s*</(div|aside|section|article|header|footer)#',
    ), array(
        '<$1',
        '</$1>',
        '</$1>',
        '<$1$2>',
        '</$1',
    ), $content );
    return preg_replace('#<p>(\s|&nbsp;)*+(<br\s*/*>)?(\s|&nbsp;)*</p>#i', '', $content);
}


/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/
add_action('login_enqueue_scripts', 'd42_login_logo');
add_action('widgets_init', 'd42_load_cat_widget');
add_filter('login_headerurl', 'd42_login_url');
add_filter('login_headertitle', 'd42_login_title');


// Add Actions
add_action('init', 'load_scripts');
add_action('get_header', 'enable_threaded_comments')
add_action('wp_enqueue_scripts', 'load_styles');
add_action('init', 'register_html5_menu');
// add_action('init', 'create_post_type_html5');
add_action('widgets_init', 'my_remove_recent_comments_style'); 
add_action('init', 'html5wp_pagination');

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar');
add_filter('body_class', 'add_slug_to_body_class');
add_filter('widget_text', 'do_shortcode');
add_filter('widget_text', 'shortcode_unautop');
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args');
add_filter('the_category', 'remove_category_rel_from_category_list');
add_filter('the_excerpt', 'shortcode_unautop');
add_filter('the_excerpt', 'do_shortcode');
add_filter('excerpt_more', 'd42_view_article');
add_filter('show_admin_bar', 'remove_admin_bar');
add_filter('style_loader_tag', 'html5_style_remove');
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10);
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10);
add_filter('the_content', 'remove_empty_p', 20, 1 ;
remove_filter('the_excerpt', 'wpautop');


add_action('admin_menu', 'd42_admin_menu');

function d42_admin_menu() {
    include('d42_theme_admin.php');
    add_menu_page('Device42 Admin Settings', 'Device42', 'manage_options', 'device42_admin', 'd42_theme_admin', 'dashicons-lock', 8);
}

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'd42-custom');
    register_taxonomy_for_object_type('post_tag', 'd42-custom');
    register_post_type('d42-custom',
        array(
        'labels' => array(
            'name' => __('Device42 Custom Post', 'd42custom'),
            'singular_name' => __('Device42 Custom Post', 'd42custom'),
            'add_new' => __('Add New', 'd42custom'),
            'add_new_item' => __('Add New Device42 Custom Post', 'd42custom'),
            'edit' => __('Edit', 'd42custom'),
            'edit_item' => __('Edit Device42 Custom Post', 'd42custom'),
            'new_item' => __('New Device42 Custom Post', 'd42custom'),
            'view' => __('View Device42 Custom Post', 'd42custom'),
            'view_item' => __('View Device42 Custom Post', 'd42custom'),
            'search_items' => __('Search Device42 Custom Post', 'd42custom'),
            'not_found' => __('No Device42 Custom Posts found', 'd42custom'),
            'not_found_in_trash' => __('No Device42 Custom Posts found in Trash', 'd42custom')
        ),
        'public' => true,
        'hierarchical' => true,
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ),
        'can_export' => true,
        'taxonomies' => array(
            'post_tag',
            'category'
        )
    ));
}


?>

