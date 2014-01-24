<?php
/**
 * Template Name: Truepoint Plan
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

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>    
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
						if (count($children) > 0 || $parent > 0):
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

<h1><?php the_title();?></h1>
<?php the_content();?>

<table class="content">
	<tbody>
		<tr>
			<td class="yellowbar" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">
			<div style="width: 100%; padding: 25px; padding-left:0px;font-size:14px;">
			<table style="float:right;border-collapse:collapse;border:1px solid #000;width:240px;font-size:11px;margin:0px 90px 0px 20px;">
				<tbody>
					<tr>
						<td style="border:1px solid #999;padding:10px;">
							<p style="color:#333;">If you are experiencing trouble logging into your account, please contact KTRADE at 888-954-9321 or <a href="mailto:support@ktradeonline.com">support@ktradeonline.com</a></p>
						</td>
					</tr>
				</tbody>
			</table>
			
			<!-- START DOWNLOADS -->
			<?php while(the_repeater_field('download')): ?>
				<p>
					<?php
						$file = get_sub_field('file');
						if (trim($file) == "") {
							$file = get_sub_field('link');
						}
						$extension = substr(strrchr($file,'.'),1);
						$pdf = false;
						if ($extension == "pdf") {
							$pdf = true;
						}
					?>
					<a href="<?php echo $file; ?>" target="document"><strong><?php the_sub_field('title'); ?></strong>
					<?php if ($pdf) { ?>
					<img src="http://truepointinc.com/wp-content/themes/truepoint/images/Acrobat.gif" style="display:inline">
					<?php } ?>
					</a><br>
			<?php the_sub_field('description'); ?>
			
			<?php endwhile; ?>
			<!-- END DOWNLOADS -->

			</div>
				
			</td>
		</tr>

		<tr>
			<td class="yellowbar" colspan="3">&nbsp;</td>
		</tr>
					
	</tbody>
</table>
</div>
</div>
</td></tr>
</table>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
