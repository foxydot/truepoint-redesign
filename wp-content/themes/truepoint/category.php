<?php
/**
 * The template for displaying Category Archive pages.
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
						<div class="sub-menu-shade tempintmenu">
							
							<?php
							$cat_id = get_query_var('cat');
							$parents = get_cat_ancestors($cat_id);
							if ($parents[0]->cat_ID == 11) {
								get_a_submenu(375);
							} elseif ($parents[0]->cat_ID == 6) {
								get_a_submenu(386);
							}?>
            			</div>
						<?php
						$cat = NULL;
						if ( is_single() || is_category() ) :
							$cat = get_query_var('cat');
							$category = get_cat_ancestors( $cat );
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
									'hide_empty' => false,
									'current_category' => $cat[0]->cat_ID
								);
								wp_list_categories( $args );
								?>

							</ul>
						</div>
						<?php endif; ?>
					</td>
					<td class="innerContent" style="max-width: 760px; overflow: hidden;">
			



<div>
<div style="padding: 15px;">
				<h1 class="page-title"><?php
					printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

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
</td>*/ ?>
				</tr>
</table>
<?php //endwhile; // end of the loop. ?>
<?php get_footer(); ?>
