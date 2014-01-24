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
						<div class="right-box search-form clear-inner-floats">
							<?php get_search_form(); ?>
						</div>
            			<div class="sub-menu-shade tempintmenu">
							<?php get_a_submenu($post->ID)?>
            			</div>
						<?php
						$cat = NULL;
						switch ($post->ID) {
							case 386:
								$cat = 6;
								break;
							case 375:
								$cat = 11;
								break;
						}
						if ( ! empty( $cat ) ) :
						?>
						<div class="right-box">
							<h3>Category</h3>
							<ul>
								<?php 
								$args = array(
									'child_of' => $cat,
									'title_li' => '',
									'hide_empty' => false
								);
								wp_list_categories( $args );
								?>

							</ul>
						</div>
						<?php /*
						<div class="right-box">
							<h3>Articles by Month</h3>
							<?php echo do_shortcode('[cleanarchivesreloaded]'); ?>
						</div> */ ?>
						<?php endif; ?>
			            <div style="vertical-align: top;"></div>
					</td>
          			<?php endif; ?>
					<td class="innerContent" style="max-width: 760px; <?php echo ( get_field('viewpoint') || get_field('investor') ) ? 'width: 760px; ' : NULL; ?> overflow: hidden;">
			



<div>
<div style="padding: 15px;">

<h1><?php the_title();?></h1>

<?php
if( get_field('viewpoint') || get_field('investor') ) { // Removes the ShareThis icons for this pages
	$content = get_the_content();
	echo wpautop($content);
} else {
 the_content();
 } ?>

<!-- START NEWS LIST -->
<?php 
	if(get_field('in_the_news_section')){
		while(the_repeater_field('in_the_news_section')):
		?>
			<h3><?php the_sub_field('item_header'); ?></h3>
			<p>
				<?php the_sub_field('item_date'); ?> <br />
				<?php if (get_sub_field('link_url')): ?>
					<a href="<?php trim(the_sub_field('link_url')); ?>"><i><?php the_sub_field('link_name'); ?></i></a><br />
				<?php else: ?>
					<i><?php the_sub_field('link_name'); ?></i><br />
				<?php endif; ?>
				<?php the_sub_field('author'); ?> 
				<?php if (get_sub_field('subcription_required')): ?>
					<br />(subscription required)
				<?php endif; ?>
			</p>
			<hr size="2" width="100%" />
		<?
		endwhile;
		//echo 'For more news, visit the <a href="' . get_permalink(991) . '">Archived Quotes</a> page.';
	}
?>
<!-- END NEWS LIST -->

<!-- START VIEWPOINTS -->
<?php 
	if(get_field('viewpoint')){
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$posts = query_posts(array('cat'=>6, 'numberposts'=>10000, 'paged' => $paged));
		if ( $posts )
		{
			global $display_excerpt;
			$display_excerpt = TRUE;
			get_template_part('loop', 'category');
		}
		wp_reset_query();
		/*
		foreach($posts as $p){
		?>
			<a href="<?php echo $p->guid; ?>"><?php echo $p->post_title; ?></a><br />
			<p>
				<?php if (get_field('viewpoint_author', $p->ID)): ?>
					<?php echo get_field('viewpoint_author', $p->ID); ?><br />
				<?php endif; ?>
				<?php echo date('F Y', strtotime($p->post_date)); ?>
			</p>
			<hr />
		<?php
		}*/
	}
?>
<!-- END VIEWPOINTS -->

<!-- START INVESTORS -->
<?php 
	if(get_field('investor')){
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$posts = query_posts(array('cat'=>11, 'numberposts'=>10000, 'paged' => $paged));
		if ( $posts )
		{
			global $display_excerpt;
			$display_excerpt = TRUE;
			get_template_part('loop', 'category');
		}
		wp_reset_query();
	}
?>
<!-- END INVESTORS -->

<!-- START EVENT LISTINGS -->
<?php while(the_repeater_field('event')): ?>
		<a href="<?php the_sub_field('link'); ?>"><b><?php the_sub_field('title'); ?></b></a><br />
		<p>
			<i><?php the_sub_field('subtitle'); ?></i><br />
			<?php the_sub_field('date'); ?><br />
			<?php the_sub_field('description'); ?>
		</p>
		<hr />
<?php endwhile; ?>
<!-- END EVENT LISTINGS -->

<!-- START WEBINAR LISTINGS -->
<?php while(the_repeater_field('webinar')): ?>
		<a href="<?php the_sub_field('link'); ?>"><b><?php the_sub_field('title'); ?></b></a><br />
		<p>
			<i><?php the_sub_field('subtitle'); ?></i><br />
			<?php the_sub_field('date'); ?><br />
			<?php the_sub_field('description'); ?>
		</p>
		<hr />
<?php endwhile; ?>
<!-- END WEBINAR LISTINGS -->

<!-- START INSIDE TRUEPOINT LISTING -->
<?php 
	if(get_field('inside_truepoint')){
		$posts = get_posts(array('category'=>3, 'numberposts'=>10000));	
		foreach($posts as $p){
		?>
			<a name="<?php echo $p->ID ?>"></a>
			<strong><?php echo date('F d, Y', strtotime($p->post_date)); ?></strong>
			<p>
				<?php echo $p->post_content; ?>
			</p>
			<hr />
		<?php
		}
	}
?>
<!-- END INSIDE TRUEPOINT LISTING -->

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
				echo '<img style="border-style: solid;border-width: 0px;margin: 0px;padding: 0px" alt="Acrobat" src="'.get_template_directory_uri().'/images/Acrobat.gif" align="bottom" width="29" height="30">';
			}
		?>
		<a href="<?php echo $file; ?>"><?php the_sub_field('name'); ?></a> 
	</p>
<?php endwhile; ?>
<!-- END DOWNLOADS -->

</div>
</div>
</td>
<?php
if(get_field('viewpoint') || get_field('investor')) : /* ?>
<td class="subMenu right"> 
<div class="right-box search-form clear-inner-floats">
	<?php get_search_form(); ?>
</div>
<?php
$cat = NULL;
switch ($post->ID) {
	case 386:
		$cat = 6;
		break;
	case 375:
		$cat = 11;
		break;
}
if ( ! empty( $cat ) ) :
?>
<div class="right-box">
	<h3>Category</h3>
	<ul>
		<?php 
		$args = array(
			'child_of' => $cat,
			'title_li' => '',
			'hide_empty' => false
		);
		wp_list_categories( $args );
		?>

	</ul>
</div>
<div class="right-box">
	<h3>Articles by Month</h3>
	<?php echo do_shortcode('[cleanarchivesreloaded]'); ?>
</div>
<?php endif; ?>
</td>
<?php*/ endif; ?>
</tr>
</table>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
