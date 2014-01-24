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
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<h1><?php the_title();?></h1>
<?php if(get_field('subheader')){?>
<h2><?php echo get_field('subheader');?></h2>
<?php }?>
	<table>
		<tr>
			<td>

				<div>
					<?php the_content();?>
					
					<!-- START DOWNLOADS -->
					<?php while(the_repeater_field('download')): ?>
						<p>
							<?php
								$file = get_sub_field('file');
								if (trim($file) == "") {
									$file = get_sub_field('file_url');
								}
								$extension = substr(strrchr($file,'.'),1);
								if ($extension == "pdf") {
									echo '<img style="border-style: solid;border-width: 0px;margin: 0px;padding: 0px" alt="Acrobat" src="http://www.truepointinc.com/uploaded/Acrobat.gif" align="bottom" width="29" height="30">';
								}
							?>
							<a href="<?php echo $file; ?>"><?php the_sub_field('name'); ?></a> 
						</p>
					<?php endwhile; ?>
					<!-- END DOWNLOADS -->
					
				</div>
			</td>
		</tr>
	</table>
<?php endwhile; // end of the loop. ?>
	</div></td></tr></table>
<?php get_footer(); ?>
