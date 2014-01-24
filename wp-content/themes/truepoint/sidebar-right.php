<td class="subMenu right"> 
<div class="right-box search-form clear-inner-floats">
	<?php get_search_form(); ?>
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
<div class="right-box">
	<h3>Articles by Month</h3>
	<?php echo do_shortcode('[cleanarchivesreloaded]'); ?>
</div>
</td>