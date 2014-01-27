<?php
/**
 * TwentyTen functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, twentyten_setup(), sets up the theme by registering support
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
 *     remove_filter( 'excerpt_length', 'twentyten_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
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
function twentyten_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'twentyten', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
	) );

	// This theme allows users to set a custom background
	//add_custom_background();

	// Your changeable header business starts here
	if ( ! defined( 'HEADER_TEXTCOLOR' ) )
		define( 'HEADER_TEXTCOLOR', '' );

	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	if ( ! defined( 'HEADER_IMAGE' ) )
		define( 'HEADER_IMAGE', '%s/images/headers/path.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to twentyten_header_image_width and twentyten_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyten_header_image_width', 940 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyten_header_image_height', 198 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Don't support text inside the header image.
	if ( ! defined( 'NO_HEADER_TEXT' ) )
		define( 'NO_HEADER_TEXT', true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See twentyten_admin_header_style(), below.
	add_custom_image_header( '', 'twentyten_admin_header_style' );

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'berries' => array(
			'url' => '%s/images/headers/berries.jpg',
			'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Berries', 'twentyten' )
		),
		'cherryblossom' => array(
			'url' => '%s/images/headers/cherryblossoms.jpg',
			'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Cherry Blossoms', 'twentyten' )
		),
		'concave' => array(
			'url' => '%s/images/headers/concave.jpg',
			'thumbnail_url' => '%s/images/headers/concave-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Concave', 'twentyten' )
		),
		'fern' => array(
			'url' => '%s/images/headers/fern.jpg',
			'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Fern', 'twentyten' )
		),
		'forestfloor' => array(
			'url' => '%s/images/headers/forestfloor.jpg',
			'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Forest Floor', 'twentyten' )
		),
		'inkwell' => array(
			'url' => '%s/images/headers/inkwell.jpg',
			'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Inkwell', 'twentyten' )
		),
		'path' => array(
			'url' => '%s/images/headers/path.jpg',
			'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Path', 'twentyten' )
		),
		'sunset' => array(
			'url' => '%s/images/headers/sunset.jpg',
			'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Sunset', 'twentyten' )
		)
	) );
}
endif;

if ( ! function_exists( 'twentyten_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in twentyten_setup().
 *
 * @since Twenty Ten 1.0
 */
function twentyten_admin_header_style() {
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
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Twenty Ten 1.0
 * @return int
 */
function twentyten_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function twentyten_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function twentyten_auto_excerpt_more( $more ) {
	//return ' &hellip;' . twentyten_continue_reading_link();
	return ' [...]';
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function twentyten_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		//$output .= twentyten_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 * @since Twenty Ten 1.2
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 * @since Twenty Ten 1.0
 * @deprecated Deprecated in Twenty Ten 1.2 for WordPress 3.1
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function twentyten_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
	add_filter( 'gallery_style', 'twentyten_remove_gallery_css' );

if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function twentyten_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'twentyten' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'twentyten' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
    // Homepage footer
    register_sidebar( array(
        'name' => __( 'Homepage Widget Area', 'twentyten' ),
        'id' => 'homepage-widget-area',
        'description' => __( 'The homepage announcement area', 'twentyten' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'twentyten_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using Twenty Ten 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default Twenty Ten styling.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );

if ( ! function_exists( 'twentyten_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentyten' ), get_the_author() ) ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'twentyten_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
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



function get_a_submenu($post_id, $current=true){
	$pst=get_post($post_id);
	$original=$pst;

	while($pst->post_parent!=0&&$current){
		$post_id=$pst->post_parent;
		$pst=get_post($post_id);
	}
	$posts=get_posts(array('post_parent'=>$post_id, 'post_type'=>'page','orderby' =>'menu_order', 'order'=>'ASC', 'numberposts' =>10000));
	if(count($posts)<1)return;

	if($current){
		echo '<ul class="sub-menu">';
	}else{
		if ($post_id == 45 || $post_id == 457) {
			echo '<ul class="third-menu" style="display: none;">';
		} else {
			echo '<br /><br /><ul class="third-menu">';
		}
	}
	$first = array_shift($posts);
	echo "<li class='article first".($first->ID==$original->ID?" current":"")."' ><a href='".get_permalink($first->ID)."'".($first->ID==$original->ID?" class='current'":"").">".$first->post_title."</a>";
		if($first->ID==$original->ID || $first->ID==$original->post_parent){
			get_a_submenu($first->ID,false);
		}
		echo "</li></hr>";
	$last=array_pop($posts);
	foreach($posts as $p){
		echo "<li class='article".($p->ID==$original->ID?" current":"")."' ><a href='".get_permalink($p->ID)."'".($p->ID==$original->ID?" class='current'":"").">".$p->post_title."</a>";
		if($p->ID==$original->ID || $p->ID==$original->post_parent){
			get_a_submenu($p->ID,false);
		}
		echo "</li></hr>";
		//echo "<li class='article' ><a href='".get_permalink($p->ID)."'>".$p->post_title."</a></li></hr>";
	}
	if($last){
		echo "<li class='article last".($last->ID==$original->ID?" current":"")."' ><a href='".get_permalink($last->ID)."'".($last->ID==$original->ID?" class='current'":"").">".$last->post_title."</a>";
		if($last->ID==$original->ID || $last->ID==$original->post_parent){
			get_a_submenu($last->ID,false);
		}
		echo "</li></hr>";
		//echo "<li class='article last' ><a href='".get_permalink($last->ID)."'>".$last->post_title."</a></li></hr>";
	}
	echo "</ul>";
} 
function move_in_the_news_to_archive(){
	global $wpdb;
	// get fields names and last id
	$res=$wpdb->get_results("select * FROM  ".$wpdb->postmeta." WHERE meta_key LIKE ('_in_the_news_section_%') and post_id=991");
	$author_field_id="";
	$date_field_id="";
	$header_field_id="";
	$name_field_id="";
	$url_field_id="";
	$subscription_field_id="";
	$last_id=0;
	foreach($res as $v){
		if(preg_match('!_in_the_news_section_\d+_item_header!',$v->meta_key)){
			$header_field_id=$v->meta_value;
		}else if(preg_match('!_in_the_news_section_\d+_item_date!',$v->meta_key)){
			$date_field_id=$v->meta_value;
		}else if(preg_match('!_in_the_news_section_\d+_link_name!',$v->meta_key)){
			$name_field_id=$v->meta_value;
		}else if(preg_match('!_in_the_news_section_\d+_link_url!',$v->meta_key)){
			$url_field_id=$v->meta_value;
		}else if(preg_match('!_in_the_news_section_\d+_author!',$v->meta_key)){
			$author_field_id=$v->meta_value;
		}else if(preg_match('!_in_the_news_section_\d+_subcription_required!',$v->meta_key)){
			$subscription_field_id=$v->meta_value;
		}
		preg_match('!_in_the_news_section_(\d+)_item_header!',$v->meta_key,$ids);
		if(isset($ids[1])){
			 if((integer)$ids[1]>$last_id){$last_id=(integer)$ids[1];}
		}
	}
	
	$res=$wpdb->get_results("select * FROM  ".$wpdb->postmeta." WHERE meta_key LIKE ('in_the_news_section_%') and post_id=44");
	foreach($res as $v){
		if(preg_match('!in_the_news_section_\d+_item_date!',$v->meta_key)){
			if(strtotime($v->meta_value)<strtotime("-1 year")){
				preg_match('!in_the_news_section_(\d+)_item_date!',$v->meta_key,$rt);
				if(isset($rt[1])){
					$last_id++;
					$item_id=(integer)$rt[1];
					$item_res=$wpdb->get_results("select * FROM  ".$wpdb->postmeta." WHERE meta_key LIKE ('in_the_news_section_".$item_id."%') and post_id=44");
					foreach($item_res as $item){
						add_post_meta(991,preg_replace('!\d+!',$last_id,$item->meta_key),$item->meta_value);
						delete_post_meta(44,$item->meta_key);
						delete_post_meta(44,"_".$item->meta_key);
					}
					add_post_meta(991,'_in_the_news_section_'.$last_id.'_author',$author_field_id);
					add_post_meta(991,'_in_the_news_section_'.$last_id.'_item_date',$date_field_id);
					add_post_meta(991,'_in_the_news_section_'.$last_id.'_item_header',$header_field_id);
					add_post_meta(991,'_in_the_news_section_'.$last_id.'_link_name',$name_field_id);
					add_post_meta(991,'_in_the_news_section_'.$last_id.'_link_url',$url_field_id);
					add_post_meta(991,'_in_the_news_section_'.$last_id.'_subcription_required',$subscription_field_id);
				}
			}
			
		}
	}
	
	update_post_meta(991,'in_the_news_section',$last_id);

	$res=$wpdb->get_var("select count(meta_id) FROM  ".$wpdb->postmeta." WHERE meta_key LIKE ('in_the_news_section_%_item_header') and post_id=44");
	
	update_post_meta(44,'in_the_news_section',$res);
}

add_action('in_the_news_to_archive_event', 'move_in_the_news_to_archive');

function in_the_news_to_archive_activation() {
	if ( !wp_next_scheduled( 'in_the_news_to_archive_event' ) ) {
		wp_schedule_event(time(), 'daily', 'in_the_news_to_archive_event');
	}
}
add_action('wp', 'in_the_news_to_archive_activation');

function twentyten_posted_by() {
	printf( __( '<h4>%1$s <span class="the_date">%3$s</span></h4>', 'twentyten' ),
		 get_the_author_link(),
		get_the_author(),
		get_the_time('l, F jS, Y')
	);
}

function truepoint_posted_by( $display_date = TRUE ) {
	$content = get_the_content();
	$contributed = strpos( $content, 'Contributed by' );
	if ( $contributed === FALSE ) {
		$posted_by = '<p class="contributed">Contributed by ' . get_the_author_link() . '</p>';
	}
	if ( ! empty($posted_by) && $display_date === TRUE ) {
		$posted_by .= '<div class="entry-meta"><h4><span class="the_date">' . get_the_time('l, F jS, Y') . '</span></h4></div>';
	}
	echo $posted_by;
}

function get_cat_ancestors($category, $ancestors = array())
{
    // Accept the category object or the category's ID
    $cat = (is_object($category)) ? get_category($category->cat_ID) : (is_numeric($category)) ? get_category($category) : FALSE;
     
    // If there the category has a parent...
    if (isset($cat->category_parent))
    {
        // Add the category object to the array
        array_unshift($ancestors, $cat);
         
        // If parent category ID is 0, don't iterate again
        if ($cat->category_parent != 0)
            $ancestors = get_cat_ancestors($cat->category_parent, $ancestors);
    }
 
    return $ancestors;
}

function improved_trim_excerpt($text) {
        global $post;
				$contributed = strpos( $text, 'Contributed by' );
				if ( $contributed !== FALSE ) {
					$link_end = strpos($text, '</a>') + strlen('</a>');
					if ( $link_end > strlen('</a>') ) {
						$and_present = strpos(substr($text, $link_end), ' and <a');
						if ( $and_present === 0 ) {
							$link_end = strpos($text, '</a>', $link_end) + strlen('</a>');
						}
						$text = substr($text, 0, $link_end) . '<p class="entry-meta"><span class="the_date">' . get_the_time('l, F jS, Y') . '</span></p>' . substr($text, $link_end);
					}
				}
        return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt', 100);
add_filter('the_content', 'post_bottom_section', 2000);
function post_bottom_section( $content ) {
	if ( is_single() ) {
		$category = get_the_category();
		$cat_id = (int)$category[0]->cat_ID;
		$parents = array();
		$parents = get_cat_ancestors($cat_id);
		if ( in_category(11) || $parents[0]->cat_ID == 11 || in_category(6) || $parents[0]->cat_ID == 6) {
			//$share_this = strpos($content, '<span class="st_sharethis"');
			//if ( $share_this === FALSE ) {
				//$content .= '<p><span class="st_sharethis" displaytext="ShareThis"></span></p>';
			//}
			$return_to_all = strpos($content, 'Return to all');
			if ( $return_to_all === FALSE ) {
				$link = '';
				if ( in_category(11) || $parents[0]->cat_ID == 11 ) {
					$link = get_permalink( 375 );
				} elseif ( in_category(6) || $parents[0]->cat_ID == 6 ) {
					$link = get_permalink( 386 );
				}
				$parent_name = $parents[0]->name;
				if ( ! empty( $link ) ) {
					$content .= '<p><a href="' . $link . '">Return to all ' . $parent_name . ( ( $parent_name[strlen($parent_name) - 1] != 's' ) ? 's' : '' ) . '.</a></p>';
				}
			}
			if (function_exists( 'get_field' ) ) {
				$content .= wpautop( get_field('disclaimer_section', 'options') );
			}
		}
	}
	return $content;
}
add_action('init', 'register_scripts');
function register_scripts(){
	// Load jQuery
	if (!is_admin()) {
		wp_register_script('placeholder', get_template_directory_uri() . '/js/jquery.placeholder.min.js', array('jquery'));
		wp_enqueue_script('placeholder');
		wp_register_script('app', get_template_directory_uri() . '/js/app.js', array('jquery', 'placeholder'));
		wp_enqueue_script('app');
	}
}
function register_additional_button($buttons) {
   array_unshift($buttons, 'fontsizeselect');
   return $buttons;
}

// Assigns register_additional_button() to "mce_buttons_2" filter
add_filter('mce_buttons_2', 'register_additional_button');

/*
 * Add styles and scripts
*/
add_action('wp_enqueue_scripts', 'msdlab_add_styles');
//add_action('wp_enqueue_scripts', 'msdlab_add_scripts');

function msdlab_add_styles() {
    global $is_IE;
    if(!is_admin()){
        //use cdn        
            //wp_enqueue_style('bootstrap-style','//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css');
            wp_enqueue_style('font-awesome-style','//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
            wp_enqueue_style('msd-style',get_stylesheet_directory_uri().'/css/style.css',array('font-awesome-style'));
        if($is_IE){
            wp_enqueue_script('ie-style',get_stylesheet_directory_uri().'/css/ie.css');
        }
        if(is_front_page()){
            wp_enqueue_style('msd-homepage-style',get_stylesheet_directory_uri().'/css/homepage.css',array('font-awesome-style'));
        }
    }
}

function msdlab_add_scripts() {
    global $is_IE;
    if(!is_admin()){
        //use cdn
            wp_enqueue_script('bootstrap-jquery','//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js',array('jquery'));
        //use local
            wp_enqueue_script('bootstrap-jquery',get_stylesheet_directory_uri().'/lib/bootstrap/js/bootstrap.min.js',array('jquery'));
        wp_enqueue_script('msd-jquery',get_stylesheet_directory_uri().'/lib/js/theme-jquery.js',array('jquery','bootstrap-jquery'));
        wp_enqueue_script('equalHeights',get_stylesheet_directory_uri().'/lib/js/jquery.equal-height-columns.js',array('jquery'));
        if($is_IE){
            wp_enqueue_script('columnizr',get_stylesheet_directory_uri().'/lib/js/jquery.columnizer.js',array('jquery'));
            wp_enqueue_script('ie-fixes',get_stylesheet_directory_uri().'/lib/js/ie-jquery.js',array('jquery'));
        }
        if(is_front_page()){
            wp_enqueue_script('msd-homepage-jquery',get_stylesheet_directory_uri().'/lib/js/homepage-jquery.js',array('jquery','bootstrap-jquery'));
        }
    }
}