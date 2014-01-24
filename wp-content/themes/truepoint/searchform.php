<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ) ?>" >
	<div><label class="screen-reader-text" for="s"><?php echo __('Search for:') ?></label>
	<input type="text" placeholder="<?php echo esc_attr__('Search')?>" value="<?php echo get_search_query(); echo ( ! empty($_GET['search_string']) ) ? $_GET['search_string'] : NULL;  ?>" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="<?php echo esc_attr__('Search') ?>" />
	<?php
	if ( is_category() || is_archive() || is_single() ) {
		$cat = get_the_category();
		$category = get_cat_ancestors( $cat[0] );
		$cat_id = $category[0]->cat_ID;
	} elseif ( is_page() ) {
		switch ( get_the_ID() ) {
			case 386:
				$cat_id = 6;
				break;
			case 375:
				$cat_id = 11;
				break;
		}
	}
		if ( ! empty( $cat_id ) ) : ?>
	<input type="hidden" name="cat" value="<?php echo $cat_id ?>" />
		<?php endif;
	?>
	</div>
</form>