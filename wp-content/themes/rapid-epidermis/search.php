<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<div class="main">

		<!--CONTENT-->
		<div class="content">
			<table>
				<tr>
					<td class="subMenu">
						<div class="right-box search-form clear-inner-floats">
							<?php get_search_form(); ?>
						</div>
						<?php
						$cat_id = get_query_var('cat');
						switch ($cat_id) {
							case 6:
								get_a_submenu(386);
								break;
							case 11:
								get_a_submenu(375);
								break;
						}
						?>
						<?php //get_a_submenu(375); ?>
						<?php
						$cat = NULL;
						if ( is_single() || ( is_category() && !is_search() ) ) :
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
									'hide_empty' => false
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

<?php if ( have_posts() ) : ?>
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'category' );
				?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'twentyten' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>

</div>
</div>
</td>
<?php //get_sidebar( 'right' ); ?>
<?php /*
<td class="subMenu">
	
<?php 

$parents = array();
$parents = get_cat_ancestors($cat_id);
if ( !empty($parents)) : ?>
	<div class="right-box">
		<h3>Category</h3>
		<ul>
			<?php 
			$args = array(
				'child_of' => $parents[0]->cat_ID,
				'title_li' => '',
				'hide_empty' => false
			);
			wp_list_categories( $args );
			?>

		</ul>
	</div>
<?php 	
endif;
?>
			<div class="right-box">
				<h3>Articles by Month</h3>
				<?php echo do_shortcode('[cleanarchivesreloaded]'); ?>
			</div>
</td> */ ?>
				</tr>
</table>
<?php //endwhile; // end of the loop. ?>
<?php get_footer(); ?>
