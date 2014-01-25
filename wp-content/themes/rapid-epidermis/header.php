<?php
	if (strpos($_SERVER["REQUEST_URI"], "previewCSS")) {
		$url = str_ireplace("&previewCSS=true", "", $_SERVER["REQUEST_URI"]);
		header("Location: http://truepointinc.com/" . $url);
	}
?>
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
<meta name="google-site-verification" content="Ki5d9soIWxLo7ISHCM-ldD_XI3Lg2temkvK71lOdre8" />

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19065593-1']);
  _gaq.push(['_setDomainName', 'truepointinc.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(''); ?></title>
<link rel="icon" href="<?php print get_stylesheet_directory_uri(); ?>/images/favicon.ico" type="image/x-ico" />
<link rel="shortcut icon" href="<?php print get_stylesheet_directory_uri(); ?>/images/favicon.ico" />
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" media="all" href="<?php print get_stylesheet_directory_uri(); ?>/css/ie.css" />
<![endif]-->
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
	 wp_enqueue_script( 'jquery' );
	wp_head();
?>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui-1.8.16.custom.css" type="text/css" />
<style type="text/css" title="">
	.ui-widget-header {
    background: none repeat scroll 0 0 #5D523D;
}
</style>
<script type="text/javascript">
	// initialise plugins
	jQuery(document).ready(function() {
		jQuery( "#dialog:ui-dialog" ).dialog( "destroy" );
		jQuery("#first_welcome").dialog({
			width: 500,
			height: 270,
			autoOpen: false,
			modal: true
		});

		jQuery("#subscribe a").click(function() {
			jQuery("#first_welcome").dialog('open');
		});
		
	});
	
	</script>
<script type="text/javascript">var switchTo5x=false;</script><script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher:'72a5c393-0353-43bb-8a97-5e60486322a1'});</script>
</head>

<body <?php body_class(); ?>>
	<div class="edges"  style="background-image: none;"  >
		<div class="contentSpacing">
			
					<div id="client_login">
						<form id="form1" name="form1" method="post" action="https://secure.truepointinc.com/includes/webengine/security/fo_security.asp" target="blank">
							<input type="hidden" name="Script_Name" value="/default.asp">
							<input type="hidden" name="Reason" value="-902">
							<input type="hidden" name="PostBackState" value="True" ID="Hidden1">
							<table border="0" cellspacing="0" cellpadding="0" align="center">
							<tr>

							<td><input type="text" value="USER NAME" onclick="this.value=''" onfocus="this.value=''" name="FormsUser" id="FormsUser" maxlength="40" /></td>
							<td>
							<label id="pass_label" onclick="this.innerHTML='';document.getElementById('FormsPassword').focus();">PASSWORD</label>
							<input type="password" value="" onclick="document.getElementById('pass_label').innerHTML=''" onfocus="document.getElementById('pass_label').innerHTML='';" name="FormsPassword" id="FormsPassword" maxlength="25" /></td>
							<td></td>
							<td><input type="submit" value="GO" id="LPLoginButton" name="LPLoginButton"></td></tr>
							</table>
						</form>

					</div>
				
			<div class="header tempheader">
				<div style="width: 100%;">
					<div style="float: left; overflow: hidden; padding-top:10px;">
						<a href="<?php echo home_url( '/' ); ?>" style="text-decoration: none;" id="logo">
						</a>
					</div>
					
					<div id="searchshare">

						
						
					</div>
				</div>
			</div>
			<div class="mainMenu">
				<div id="MainNav">
				<?php wp_nav_menu(array('menu_id'=>'header-menu','depth'=>3));?>
			     </div>
			</div>
			<div id="subscribe" style="float: right; margin-top: -28px;">
						<a href="javascript:;"><img src="<?php echo get_template_directory_uri(); ?>/images/subscribe2.png" alt="subscribe" width="90" /> <img src="<?php echo get_template_directory_uri(); ?>/images/email.png" height="19" alt="email" boder="0" /></a>
						<div id="header-search">
						<?php get_search_form(); ?>
					</div>
					</div>
			