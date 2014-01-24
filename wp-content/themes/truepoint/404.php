<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

	<div class="main">

		<!--CONTENT-->
		<?php if(get_field('image')){?>
    <div class="InteriorImage"><img src='<?php echo get_field('image');?>' alt='<?php echo get_field('image_description');?>' border='0'/><h6><?php echo get_field('image_description');?></h6></div>
		<?php }?>
		<div class="content">
			<table>
				<tr>
					<?php 
						$children = get_pages('child_of='.$post->ID);
						$parent = $post->post_parent;
						if (count($children) == 0 && $parent > 0):
					?>
					<td class="subMenu">
            			<div class="sub-menu-shade tempintmenu">
							<?php get_a_submenu($post->ID)?>
            			</div>
			            <div style="vertical-align: top;"></div>
					</td>
          			<?php endif; ?>
					<td class="innerContent" style="max-width: 760px; width: 760px; overflow: hidden;">
			



<div>
<div style="padding: 15px;">

<h1><?php _e( 'Not Found', 'twentyten' ); ?></h1>
<div id="post-0" class="post error404 not-found">
				<div class="entry-content">
					<p><?php _e( 'Apologies, but the page you requested could not be found. ', 'twentyten' ); ?></p>
					<p><a href="<?php echo bloginfo('url'); ?>">Return Home</a></p>
				</div><!-- .entry-content -->
			</div><!-- #post-0 -->

</div>
</div>
</td></tr>
</table>
<?php get_footer(); ?>
