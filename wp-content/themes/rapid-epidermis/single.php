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

<?php if ( have_posts() ) while ( have_posts() ) : the_post();
global $post;
$tmp_post = $post;
?>    
	<div class="main">

		<!--CONTENT-->
		<?php if(get_field('image')){?>
    <div class="InteriorImage"><img src='<?php echo get_field('image');?>' alt='<?php echo get_field('image_description');?>' border='0'/><h6><?php echo get_field('image_description');?></h6></div>
		<?php }?>
		<div class="content">
			<table>
				<tr>
          
					<td class="subMenu">
						<div class="right-box search-form clear-inner-floats">
							<?php get_search_form(); ?>
						</div>
						<div class="sub-menu-shade tempintmenu">
							<?php
								$category = get_the_category();
								$cat_id = (int)$category[0]->cat_ID;
								$parents = array();
								$parents = get_cat_ancestors($cat_id);
								if (in_category('3', $post->ID)) {
									get_a_submenu(461);
								} elseif (in_category(11) || $parents[0]->cat_ID == 11) {
									get_a_submenu(375);
								} else {
									get_a_submenu(386);
								}
							?>
						</div>
						<?php
						$cat = NULL;
						if ( is_single() || is_category() ) :
							$cat = get_the_category();
							$category = get_cat_ancestors( $cat[0] );
							$cat_id = $category[0]->cat_ID;
						endif;
						if ( is_page() ) :
							switch ($post->ID) {
								case 386:
									$cat = 6;
									break;
								case 375:
									$cat = 11;
									break;
								case 4252:
									$cat = 24;
									break;
							}
						endif;
						if ( ! empty( $cat ) ) :
						?>
						<div class="right-box">
							<h3>Category</h3>
							<ul>
								<?php 
								$args = array(
									'child_of' => $cat_id,
									'title_li' => '',
									'hide_empty' => false,
									'current_category' => $cat[0]->cat_ID,
									'show_option_none' => ''
								);
								wp_list_categories( $args );
								?>

							</ul>
						</div>
						<?php endif; ?>
					</td>
          
					<td class="innerContent" style="max-width: 760px; width: 760px; overflow: hidden;">
			



<div>
<div style="padding: 15px;">
<h1><?php the_title();?></h1>
<?php truepoint_posted_by( FALSE ); ?>
<?php the_content(); ?>
<?php /*
<div class="entry-meta">
	<?php twentyten_posted_by(); ?>
</div><!-- .entry-meta -->*/ ?>
<?php if (in_category('3', $post->ID)): ?>
	<br /><br /><a href="<?php bloginfo('url'); ?>/in-the-news/inside-truepoint/">View the latest news and announcements.</a>
<?php endif; ?>
<!-- START NEWS LIST -->
<?php 
	if(get_field('in_the_news_section')){
		while(the_repeater_field('in_the_news_section')):
		?>
			<h3><?php the_sub_field('item_header'); ?></h3>
			<p>
				<?php the_sub_field('item_date'); ?> <br />
				<a href="<?php the_sub_field('link_url'); ?> <br />"><?php the_sub_field('link_name'); ?></a><br />
				<?php the_sub_field('author'); ?> 
				<?php if (get_sub_field('subcription_required')): ?>
					<br />(subscription required)
				<?php endif; ?>
			</p>
			<hr size="2" width="100%" />
		<?
		endwhile;
	}
?>
<!-- END NEWS LIST -->

<!-- START VIEWPOINTS -->
<?php 
	if(get_field('viewpoint')){
		$posts = get_posts(array('category'=>6, 'numberposts'=>10000));	
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
		}
	}
?>
<!-- END VIEWPOINTS -->

<!-- START EVENT LISTINGS -->
<?php while(the_repeater_field('event')): ?>
		<a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a><br />
		<p>
			<?php the_sub_field('date'); ?><br />
			<?php the_sub_field('description'); ?>
		</p>
		<hr />
<?php endwhile; ?>
<!-- END EVENT LISTINGS -->

<!-- START INSIDE TRUEPOINT LISTING -->
<?php 
	if(get_field('inside_truepoint')){
		$posts = get_posts(array('category'=>3, 'numberposts'=>10000));	
		foreach($posts as $p){
		?>
			<a name="<?php echo $p->ID ?>"></a>
			<strong><?php echo date('F d, Y', strtotime($p->post_date)); ?></strong>
			<p>
				<?php echo $p->post_content . "<br /> <a href='" . str_replace('wp_truepoint.amd', '174.120.8.195/~truepoin', $p->guid) . "'>Read More &raquo;</a>"; ?>
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
				echo '<img style="border-style: solid;border-width: 0px;margin: 0px;padding: 0px" alt="Acrobat" src="http://www.truepointinc.com/uploaded/Acrobat.gif" align="bottom" width="29" height="30">';
			}
		?>
		<a href="<?php echo $file; ?>"><?php the_sub_field('name'); ?></a> 
	</p>
<?php endwhile; ?>
<!-- END DOWNLOADS -->

</div>
</div>
</td>
<?php //get_sidebar( 'right' ); ?>
</tr>
</table>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
