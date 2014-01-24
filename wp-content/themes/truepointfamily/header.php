<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(''); ?></title>
<link rel="icon" href="<?php bloginfo('url') ?>/wp-content/themes/truepointfamily/favicon.ico" type="image/x-ico" />
<link rel="shortcut icon" href="<?php bloginfo('url') ?>/wp-content/themes/truepointfamily/favicon.ico" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
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
	$pages_ids=get_pages_ids();
?>
</head>

<body <?php body_class(); ?>>
	<div class="edges"  style="background-image: none;"  >
		<div class="contentSpacing">
  <script type="text/javascript">
    jQuery(document).ready( function() {
      urlpath = window.location.pathname.split('/');
      jQuery('body').addClass(urlpath[1]);
    });
  </script>
  <map name="Map" id="Map" >
    <area shape="rect" coords="329,47,660,155" href="<?php echo home_url( '/' ); ?>" />
  </map>
  <div class="interiorBanner"><img src="<?php echo get_template_directory_uri(); ?>/images/interior-banner.jpg" align="left" usemap="#Map" border="0" alt="Truepoint Family Office" /></div>
  <div class="interiorNav">
    <a href="<?php echo get_permalink($pages_ids['our_approach_id']);?>" class="our-approach"></a>
    <a href="<?php echo get_permalink($pages_ids['offcie_model_id']);?>" class="family-office-model"></a>
    <a href="<?php echo get_permalink($pages_ids['about_us_id']);?>" class="about-us"></a>
  </div>
	<div class="main">
		<!--CONTENT-->
		<div class="content tempbody">
			<table>
				<tr>
					<td class="subMenu">

						
						
					</td>
					<td class="innerContent" style="max-width: 760px; width: 760px; overflow: hidden;">
			



<div>
<div style="text-align: center;"></div>
<div style="padding: 15px;">