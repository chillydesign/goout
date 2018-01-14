<?php
/*
*  Author: Todd Motto | @toddmotto
*  URL: webfactor.com | @webfactor
*  Custom functions, support, custom post types and more.
*/

/*------------------------------------*\
External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 1600, '', true); // Large Thumbnail
    add_image_size('medium', 800, '', true); // Medium Thumbnail
    add_image_size('small', 400, '', true); // Small Thumbnail
    add_image_size('tiny', 30, 30, true); // Tiny Thumbnail // used for checking brightness
    add_image_size('square', 200, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
));*/

// Add Support for Custom Header - Uncomment below if you're going to use
/*add_theme_support('custom-header', array(
'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
'header-text'			=> false,
'default-text-color'		=> '000',
'width'				=> 1000,
'height'			=> 198,
'random-default'		=> false,
'wp-head-callback'		=> $wphead_cb,
'admin-head-callback'		=> $adminhead_cb,
'admin-preview-callback'	=> $adminpreview_cb
));*/

// Enables post and comment RSS feed links to head
add_theme_support('automatic-feed-links');

// Localisation Support
load_theme_textdomain('webfactor', get_template_directory() . '/languages');
}

/*------------------------------------*\
Functions
\*------------------------------------*/

// HTML5 Blank navigationh
function webfactor_nav()
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

function wf_version(){
    return '0.2.0';
}

// Load HTML5 Blank scripts (header.php)
function webfactor_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_deregister_script('jquery');

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

    }
}

// Load HTML5 Blank conditional scripts
function webfactor_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function webfactor_styles()
{


    wp_register_style('wf_style', get_template_directory_uri() . '/css/global.css', array(), wf_version(),  'all');
    wp_enqueue_style('wf_style'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'primary-navigation' => __('Primary Menu', 'webfactor'), // Main Navigation
        'footer-navigation' => __('Footer Menu', 'webfactor'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'webfactor') // Extra Navigation if needed (duplicate as many as you need!)
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
        'name' => __('Widget Area 1', 'webfactor'),
        'description' => __('Description for this widget-area...', 'webfactor'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'webfactor'),
        'description' => __('Description for this widget-area...', 'webfactor'),
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
function html5wp_pagination()
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
    return '... <a class="view_article" href="' . get_permalink($post->ID) . '">' . __('lire plus', 'webfactor') . '</a>';
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

// Custom Gravatar in Settings > Discussion
function webfactorgravatar ($avatar_defaults)
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
function webfactorcomments($comment, $args, $depth)
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
            <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
            <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
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

/*------------------------------------*\
Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'webfactor_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'webfactor_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'webfactor_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu

add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'webfactorgravatar'); // Custom Gravatar in Settings > Discussion
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
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
// add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]



/*------------------------------------*\
ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}




function chilly_nav($menu){

    wp_nav_menu(
        array(
            'theme_location'  => $menu,
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
            'items_wrap'      => '%3$s',
            'depth'           => 0,
            'walker'          => ''
        )
    );

}

function chilly_map( $atts, $content = null ) {

    $attributes = shortcode_atts( array(
        'title' => "Rue du Midi 15 Case postale 411 1020 Renens"
    ), $atts );



    $title = $attributes['title'];
    $chilly_map = '<div id="map_container_1"></div>';
    $chilly_map .= "<script> var latt = 46.5380683; var lonn=6.5812023; var map_title = '" . $title . "'  </script>";
    return $chilly_map;

}
add_shortcode( 'chilly_map', 'chilly_map' );


function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // filter to remove TinyMCE emojis
    // add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );


function remove_json_api () {

    // Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );
    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );
    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    // Remove all embeds rewrite rules.
    // add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

}
add_action( 'after_setup_theme', 'remove_json_api' );




function count_to_bootstrap_class($count){

    if ($count == 1) {
        $class = 'col-sm-12';
    } elseif ($count == 2) {
        $class = 'col-sm-6';
    } elseif ($count == 3) {
        $class = 'col-sm-4';
    } elseif ($count == 4) {
        $class = 'col-sm-3 col-xs-6';
    } elseif ($count <= 6 ) {
        $class = 'col-sm-2';
    } else {
        $class = 'col-sm-1';
    }
    return $class;
};

function thumbnail_of_post_url( $post_id,  $size='large'  ) {

    $image_id = get_post_thumbnail_id(  $post_id );
    $image_url = wp_get_attachment_image_src($image_id, $size  );
    $image = $image_url[0];
    return $image;

}



function goout_posts_slider($posts) {
    // turn a list of posts into a slider
    $str = '';
    $str .= '<ul class="post_slider" >';
    while($posts->have_posts()) : $posts->the_post();
    $str .= '<li>';
    $str .= '<a href="' . get_the_permalink() .'" title="' . get_the_title() .'">';
    $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'small') : '';
    $categories = get_the_category( );
    $str .= '<img src="' . $image . '" alt="" />';
    if ( sizeof($categories) > 0) :
        $str .= '<p class="category">' . $categories[0]->cat_name . '</p>';
    endif;
    $str .= '<h3>' . get_the_title() . '</h3>';
    $str .= '<p>' . get_the_excerpt() . '</p>';
    $str .= '</a>';
    $str .= '</li>';
endwhile;
$str .= '</ul>';

echo $str;
}


function convert_posts_to_strings() {
    $posts_array = []; $v = 0;
    if (have_posts()): while (have_posts()) : the_post();
    $image_size = ($v == 0 ) ? 'large' : 'medium';
    $permalink = get_the_permalink();
    $categories =  get_the_category( );
    $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  $image_size  ) : '';
    $post_string = '<div class="latest_article">';
    $post_string .= '<a href="' . $permalink . '"  class="latest_image" style="background-image:url(' . $image . ');" ></a>';
    $post_string .= '<div class="latest_text">';
    if ( sizeof($categories) > 0) :
        $post_string .= '<p class="category">' . $categories[0]->cat_name . '</p>';
    endif;
    $post_string .= '<h2><a href="' . $permalink . '">'.  get_the_title() .'</a></h2>';
    $post_string .= '<p>' . get_the_excerpt() .'<a class="read_more" href="' . $permalink . '"> lire plus...</a></p>';
    $post_string .='</div>';
    $post_string .='</div>';
    array_push($posts_array, $post_string);
    $v++; endwhile; endif;

    return $posts_array;
}


function convert_events_to_strings() {
    $posts_array = []; $v = 0;
    if (have_posts()): while (have_posts()) : the_post();
    $image_size = ($v % 2 == 1 ) ? 'medium' : 'large';
    $push_event_up = ($v % 8 == 4 || $v % 8 == 6 ) ? 'push_up' : '';
    $date = get_field('date');
    $permalink = get_the_permalink();
    $event_cat = get_the_terms( get_the_ID(), 'event_cat' );
    $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  $image_size  ) : '';
    $post_string = '<div class="'. $push_event_up . ' latest_event latest_event_'. $image_size .'">';
    $post_string .= '<a href="' . $permalink . '"  class="latest_image" style="background-image:url(' . $image . ');" >';
    $post_string .= '<div class="latest_text">';
    if  ($event_cat && sizeof($event_cat) > 0 ):
        $post_string .= '<p class="category">' . $event_cat[0]->name  . '</p>';
    endif;
    if  ($date ):
        $post_string .= '<p class="date">' . $date  . '</p>';
    endif;
    $post_string .= '<h2>'.  get_the_title() .'</h2>';
    $post_string .='</div>';
    $post_string .='</a></div>';
    array_push($posts_array, $post_string);
    if ($v % 4 == 3) $v++;;
    $v++; endwhile; endif;

    return $posts_array;
}




    function generate_sharing_buttons($link, $title, $image='') {

        return '
        <div class="share_buttons" >
            <a class="share_button share_button_facebook" href="https://www.facebook.com/sharer/sharer.php?u='.$link.'"></a>
            <a class="share_button share_button_twitter" href="http://www.twitter.com/share?url='.$link.'&via=GOOUTMAG&text='.$title.'&image-src='.$image.'"></a>
            <a class="share_button share_button_google" href="https://plus.google.com/share?url='.$link.'"></a>
            <a class="share_button share_button_pinterest" href="http://pinterest.com/pin/create/button/?url='.$link.'&description='.$title.'&image_url='.$image.'"></a>
        </div>';


    }

function show_advert($post) {
    $image = thumbnail_of_post_url($post->ID,  'large' ) ;
    $url = get_field('lien', $post->ID);
    if ($image) :
        $str = '<a href="' . $url .'" target="_blank">';
        $str .= '<div class="dvrt_container">';
        $str .= '<div class="dvrt_image" style="background-image:url(\'' .  $image . '\')"></div>';
        $str .= '</div>';
        $str .= '</a>';
        echo $str;
    endif;

}


function get_cityguidearticles_for_cityguide($cityguide_id){

    $posts = new WP_Query(array(
        'post_type'  => 'cityguidearticle',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key'     => 'city_guide',
                'value'   => $cityguide_id,
                'compare' => '=',
            )
        )
    ));
    return $posts;

}



function get_cityguide_and_escapades() {
    $posts = new WP_Query(array(
        'post_type'  => array(
            'cityguide',
            'escapade'
        ),
        'posts_per_page' => 10,
        'post_status' => 'publish'
    ));
    return $posts;
}


function getBrightness($url) {


    //replace url with its file location,
    // this is so imagecreatefromjpeg works
    $tdu = wp_upload_dir();
    $file  = explode($tdu['baseurl'], $url );

    if (sizeof($file) > 1) {
        $url = $tdu['basedir'] . $file[1];


        if (   stripos( $url, '.jpg' )  > 0 ||    stripos( $url, '.jpeg' )  > 0  ) {
            $gdHandle = imagecreatefromjpeg($url);
        } else if (   stripos( $url, '.png' )  )  {
            $gdHandle = imagecreatefrompng($url);
        } else {
            $gdHandle = false;
        }


        if ($gdHandle) {
            $width = imagesx($gdHandle);
            $height = imagesy($gdHandle);

            $totalBrightness = 0;

            for ($x = 0; $x < $width; $x++) {
                for ($y = 0; $y < $height; $y++) {
                    $rgb = imagecolorat($gdHandle, $x, $y);

                    $red = ($rgb >> 16) & 0xFF;
                    $green = ($rgb >> 8) & 0xFF;
                    $blue = $rgb & 0xFF;

                    $totalBrightness += (max($red, $green, $blue) + min($red, $green, $blue)) / 2;
                }
            }

            imagedestroy($gdHandle);

            return ($totalBrightness / ($width * $height)) / 2.55;

        }
    }


}



function show_random_coolspots($category, $limit, $post_id ) {
    // dont show the post with postid. its alreaydy visible on the page
    $coolspots = get_posts(array(
        'post_type'  => 'coolspot',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'post__not_in' => array($post_id),
        'tax_query' => array(
        		array(
        			'taxonomy' => 'coolspot_cat',
        			'field'    => 'slug',
        			'terms'    => $category,
        		),
        	),
    ));
    return $coolspots;

}



// add focus to get params accessible by get_query_var
function add_query_vars_filter( $vars ){
  $vars[] = "focus";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );



// show more custom post types on author.php page
// also only show focus posts on index.php if requested.
add_action( 'pre_get_posts', function ( $q ) {
    if( !is_admin() && $q->is_main_query() ) {

        if ($q->is_author() ) {
            $q->set( 'post_type', array('post', 'coolspot', 'coolthing', 'cityguidearticle', 'cityguide', 'escapade') );
        }  else if  ($q->is_home() ) {
            $is_focus = get_query_var( 'focus' );
            if ($is_focus == "focus" ) {
                $focus_query =  array( array('key'     => 'focus', 'value'   => '1','compare' => '=')  );
                $q->set('meta_query' , $focus_query);
            }
        }


    }
});



function generate_map($location) {

    $str = '';

    $str .= '<div style="height:200px" id="map_container"></div>';
    $str .= "<script type='text/javascript' src='//maps.google.com/maps/api/js?key=AIzaSyC-BDJZU14ltCrYRPei33a4ZSQfJqRbxNY&#038;ver=4.8.1'></script>";
    $str .=  '<script> var  place_location = "'. $location. '";</script>';


    echo $str;
}




function generate_stars($amount, $max, $class) {
    $str = '<div class="stars_container">';
    $whole_amount = floor($amount);
    $has_half = ($amount != $whole_amount );
    $need_to_do_half = true;
    for ($i=0; $i < $max ; $i++) {
        if ($i< $whole_amount) {
            $str .= '<span class="'.$class.' active"></span>';
        } else {
            if ( $has_half && $need_to_do_half ) {
                $str .= '<span class="'.$class.' active half "></span>';
                $need_to_do_half = false;
                $i++;
            }
            if ($i < $max) {
                $str .= '<span class="'.$class.' "></span>';
            }

        }
    }
    $str.= '</div>';
    return $str;
}



function social_meta_properties(){

    $smp =  new stdClass();
    global $post;

    if (is_single()) {

        $post_id = get_the_ID();
        $excerpt  =  get_the_excerpt();
        if ($excerpt == '') $excerpt =  wp_trim_words($post->post_content,20);
        $smp->title = get_the_title();
        $smp->description = $excerpt;
        $smp->image =  thumbnail_of_post_url( $post_id, 'medium' );
        $smp->url = get_the_permalink();

    } else {
        $smp->title = 'Go Out! Magazine';
        $smp->description = get_bloginfo('description');
        $smp->image =   get_template_directory_uri() . '/img/gooutfb.jpg';
        $smp->url = get_home_url();
    }


    return $smp;


}




function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');
function my_mce_before_init_insert_formats( $init_array ) {
// Define the style_formats array
    $style_formats = array(
/*
* Each array child is a format with it's own settings
* Notice that each array has title, block, classes, and wrapper arguments
* Title is the label which will be visible in Formats menu
* Block defines whether it is a span, div, selector, or inline style
* Classes allows you to define CSS classes
* Wrapper whether or not to add a new block-level element around any selected elements
*/
        array(
            'title' => 'Encadré',
            'block' => 'div',
            'classes' => 'encadre',
            'wrapper' => true,

        ),   array(
              'title' => 'Bouton',
              'block' => 'div',
              'classes' => 'button_article',
              'wrapper' => true,

          )
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );
    return $init_array;
}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-styles.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );
function wpse33318_tiny_mce_before_init( $mce_init ) {

    $mce_init['cache_suffix'] = 'v=123';

    return $mce_init;
}
add_filter( 'tiny_mce_before_init', 'wpse33318_tiny_mce_before_init' );







include('functions_custom_post_types.php');
include('functions_abonne_form.php');


?>
