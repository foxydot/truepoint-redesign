<?php
/**
 * Template Name: Home page
 */

get_header(); ?>
    <script type="text/javascript">
    
    jQuery(document).ready(function (){
jQuery('iframe').each(function(){
var url = jQuery(this).attr("src");
jQuery(this).attr("src",url+"?wmode=transparent");
});
});
    
      jQuery(document).ready( function()
      {
      	var hover1 = new Image(); 
		hover1.src = "<?php echo get_template_directory_uri(); ?>/images/family_over.jpg";
		var hover2 = new Image(); 
		hover2.src = "<?php echo get_template_directory_uri(); ?>/images/capital_over.jpg";
		var hover3 = new Image(); 
		hover3.src = "<?php echo get_template_directory_uri(); ?>/images/financial_over.jpg";
      
        //flashembed("flash-banner", "/templates/truepointinc/flash/header.swf");

        jQuery("#LogoNav a.slide").hover(
          function()
          {
            jQuery(".hcontent1 div.slide." + jQuery(this).attr('id')).fadeIn(500).siblings().fadeOut(200);
          }, function()
          {
            jQuery(".hcontent1 div.slide." + jQuery(this).attr('id')).stop(true, true).fadeOut(200);
            jQuery(".hcontent1 div.slide.tpi").fadeIn(200);
          }
        );
	        
    	jQuery("#family_link").hover(
	    	function() {
	        	jQuery("#banner_copy").fadeOut(function() {
	        		jQuery("#banner_copy").html(jQuery("#family").html());
	        		jQuery("#banner_copy").fadeIn();
	        	});
	        },
	        function() {
	        	if (!jQuery("#banner_link").hover()) {
		        	jQuery("#banner_copy").fadeOut(function() {
		        		jQuery("#banner_copy").html(jQuery("#base").html());
		        		jQuery("#banner_copy").fadeIn();
		        	});
	        	}
	        }
        );
       jQuery("#truepoint_link").hover(
	       	function() {
	        	jQuery("#banner_copy").fadeOut(function() {
	        		jQuery("#banner_copy").html(jQuery("#truepoint").html());
	        		jQuery("#banner_copy").fadeIn();
	        	});
	        },
	        function() {
	        	if (!jQuery("#banner_link").hover()) {
		        	jQuery("#banner_copy").fadeOut(function() {
		        		jQuery("#banner_copy").html(jQuery("#base").html());
		        		jQuery("#banner_copy").fadeIn();
		        	});
		        }
	        }
       	);
        jQuery("#truepath_link").hover(
	        function() {
	        	jQuery("#banner_copy").fadeOut(function() {
	        		jQuery("#banner_copy").html(jQuery("#truepath").html());
	        		jQuery("#banner_copy").fadeIn();
	        	});
	        },
	        function() {
	        	if (!jQuery("#banner_link").hover()) {
		        	jQuery("#banner_copy").fadeOut(function() {
		        		jQuery("#banner_copy").html(jQuery("#base").html());
		        		jQuery("#banner_copy").fadeIn();
		        	});
		        }
	        }
        );
        
        jQuery("#banner_links").hover(
        	function() {
        		//hover stuff
        	},
        	function() {
        		jQuery("#banner_copy").fadeOut(function() {
	        		jQuery("#banner_copy").html(jQuery("#base").html());
	        		jQuery("#banner_copy").fadeIn();
	        	});
        	}
        );
        
        jQuery("#family_link").click(function() {
        	window.location = "<?php echo get_permalink(191);?>";
        });
        
        jQuery("#truepoint_link").click(function() {
        	window.location = "<?php echo get_permalink(196);?>";
        });
        
        jQuery("#truepath_link").click(function() {
        	window.location = "<?php echo get_permalink(201);?>";
        });
        
      });
    </script>
   	<div id="banner" class="contentArea tempbody">
    	<div id="banner_copy">
    		<strong><?php echo get_field('default_title');?></strong>
    		<?php if (get_field('default_subtitle')): ?>
    			<span style="font-style: oblique"><?php echo get_field('default_subtitle');?></span>
    		<?php endif; ?>
    		<div class="spacer"></div>
    		<?php echo get_field('default_text');?>
            <div class="link"><a href="/firm-profile/">Learn More &raquo;</a></div>
    	</div>
    	<div id="base" style="display: none;">
			<strong><?php echo get_field('default_title');?></strong>
    		<?php if (get_field('default_subtitle')): ?>
    			<br /><span style="font-style: oblique"><?php echo get_field('default_subtitle');?></span>
    		<?php endif; ?>
    		<div class="spacer"></div>
    		<?php echo get_field('default_text');?>
    	</div>
    	<div id="family" style="display: none;">
				<strong><?php echo get_field('family_title');?></strong>
    		<?php if (get_field('family_subtitle')): ?>
    			<br /><span style="font-style: oblique"><?php echo get_field('family_subtitle');?></span>
    		<?php endif; ?>
    		<div class="spacer"></div>
    		<?php echo get_field('family_text');?>
    			
    		</div>
    		<div id="truepoint" style="display: none;">
				<strong><?php echo get_field('capital_title');?></strong>
    		<?php if (get_field('capital_subtitle')): ?>
    			<br /><span style="font-style: oblique"><?php echo get_field('capital_subtitle');?></span>
    		<?php endif; ?>
    		<div class="spacer"></div>
    		<?php echo get_field('capital_text');?>
    		</div>

    		<div id="truepath" style="display: none;">
				<strong><?php echo get_field('financial_title');?></strong>
    		<?php if (get_field('financial_subtitle')): ?>
    			<br /><span style="font-style: oblique"><?php echo get_field('financial_subtitle');?></span>
    		<?php endif; ?>
    		<div class="spacer"></div>
    		<?php echo get_field('financial_text');?>
    		</div>
    	</div>


<div class="contentArea2" width="941px">
			<table>
				<tr>
					<td class="hcontent3">
						<div class="leftBox">
							<h1></h1>
							<div class="news-wrap">
								<h3>
									<a href="http://truepointinc.com/in-the-news/">
										News &amp; Insights
									</a>
								</h3>
								<?php if( have_posts() ) {
									  while( have_posts() ) {
									    the_post(); ?>   
								<ul class="news">
								<?php 

								if(get_field('news_insights','options')){
									$in_the_news=array();
										$i=0;
										while(the_repeater_field('news_insights','options')){
											$in_the_news[$i]['item_title']=get_sub_field('news_title','options');
											$in_the_news[$i]['item_date']=get_sub_field('news_date','options'); 
											$in_the_news[$i]['item_link']=get_sub_field('news_link','options');
											$i++;
										}
									?>
									<?php
									$i = 1;
									$j = 1;
									foreach($in_the_news as $item){?>
									<li class="slide-<?php echo $j; echo ( $i % 3 == 1 ) ? ' first' : NULL; ?>"><a href="<?php echo $item['item_link']; ?>"><?php echo $item['item_date']; ?> - <?php echo $item['item_title']; ?></a><br /></li>
									<?php
									if( $i % 3 == 0 ) {
										$j++;
									}
									$i++;
									}?>
								<?php }?>
								</ul>
								<?php } } // end of the loop. ?>
								<div class="slider-wrap">
									<ul class="slider-nav-news">
										<li class="prev"><a href="#">Prev</a></li>
										<?php for( $i = 1; $i < $j; $i++) : ?>
										<li<?php echo ( $i == 1 ) ? ' class="active"' : NULL; ?>>
											<a href="#"><?php echo $i; ?></a>
										</li>
										<?php endfor; ?>
										<li class="next"><a href="#">Next</a></li>
										<li class="clear">
										<br />
										</li>
									</ul>
								</div>
								<script type="text/javascript">
									jQuery(document).ready( function($) {
										$('.slider-nav-news a').click(function(e){
											e.preventDefault();
											var $index = $(this).html();
											var $activeIndex = $('.slider-nav-news .active a').html();
											$activeIndex = parseInt($activeIndex);
											var $total = $('.slider-nav-news li:not(.prev, .next)').length;
											if($(this).parent().hasClass('prev')) {
												var prev_item = $activeIndex - 1;
												if (prev_item == 0) {
													prev_item = $total - 1;
												}
												$('.slider-nav-news li:eq(' + prev_item + ') a').trigger('click');
											} else if($(this).parent().hasClass('next')) {
												var next_item = $activeIndex + 1;
												if( next_item == $total ) {
													next_item = 1;
												}
												$('.slider-nav-news li:eq(' + next_item + ') a').trigger('click');
											} else if( ! $(this).parent().hasClass('active') ) {
												$('.slider-nav-news li').removeClass('active');
												$(this).parent('li').addClass('active');
												$('.news li:visible').fadeOut( 300, function() {
													$('.news li.slide-' + $index).fadeIn(300);
												});
											}
										});
									});
								</script>
							</div>
							<div class="video">
								<iframe width="200" style="z-index:1" height="112" src="<?php the_field( 'youtube_link', 'options' ) ?>?rel=0&showinfo=0&wmode=transparent" frameborder="0" wmode="transparent"></iframe>

								
								<p class="desc">
									<?php the_field( 'video_description', 'options' ) ?><?php if( get_field( 'read_more_link', 'options' ) ) : ?> <a href="<?php the_field( 'read_more_link', 'options' ) ?>">Read More &raquo;</a><?php endif; ?>
								</p>
							</div>
						</div>
					</td>

					<td class="hcontent4">
						<div class="middleImg" align="center">
							
						</div>
					</td>
					
					<td class="hcontent5">
					    <?php /*
						<script type="text/javascript">
							jQuery(document).ready( function($) {
								$(".scroll li:odd").addClass("even");
								$(".scroll li:gt(1)").hide();
								$(".slider-nav li a").live("click", function() {
									//Get current active
									var active_a = $(".slider-nav li a.active");
									var current_num = active_a.html();
									var last_li = $(".slider-nav li").length-3;
									//If clicked a number
									if($(this).hasClass("num")) {
										current_num = $(this).html();
									}
									else {
										//If clicked previous
										if($(this).parent().hasClass("prev")) {
											current_num--;
											if(current_num == 0) current_num = last_li;
										}
										//If clicked next
										else {
											current_num++;
											if(current_num > last_li) current_num = 1;
										}
									}
									active_a.removeClass("active");
									//Add active class to newly focused element, fade out old articles, fade in active
									$(".slider-nav li:eq(" + current_num + ") a").addClass("active");
									$(".scroll li:visible").fadeOut(300, function() {
										var starting_index = current_num*2-2;
										$(".scroll li:eq(" + starting_index + "), .scroll li:eq(" + parseInt(starting_index+1) + ")").stop(true, true).fadeIn();
									});
									
								});
								var items_num = Math.round($(".scroll li").length/2);
								if(items_num > 1) {
									for(var i=1; i<=items_num; i++) {
										if(i == 1) {
											var a_class = ' active';
										}
										else {
											var a_class = '';
										}
										$(".slider-nav li.next").before('<li><a href="javascript:;" class="num' + a_class + '">' + i + '</a></li>');
									}
								}
								else {
									$(".slider-nav").hide();
								}
								var slider_container_width = $(".hcontent5").width();
								var slider_width = $(".slider-nav").width();
								var slider_nav_margin_left = parseInt(slider_container_width - slider_width)/2;
								$(".slider-nav").css("margin-left", slider_nav_margin_left + "px");
								
								function next_slide(hovered) {
									//If not hovering, advance to next slide
									if(hovered == 0) $(".slider-nav li.next a").click();									
									
									setTimeout(function() {
										//See if currently hovering over announcements box
										$(".hcontent5 > .leftBox > div").hover(
											function(){
												$(this).addClass("hovered");
											},
											function(){
												$(this).removeClass("hovered");
											}
										);
										
										var hovering = $(".hcontent5 > .leftBox > div").is(".hovered");
										
										next_slide(hovering);
									}, 6000);
								}
								
								next_slide(1);
							});
						
						</script>
						<div class="leftBox" style="margin-left: 10px; width: 270px; vertical-align: top;">

							<h1></h1>
              <div><h3><a href="/in-the-news/inside-truepoint">Inside Truepoint</a>
</h3>
<ul class="scroll">
<?php $posts=get_posts(array('category'=>3, 'numberposts'=>22));
	foreach($posts as $p){
		$excerpt = htmlspecialchars(substr(strip_tags($p->post_content), 0, 105)) . "... <a href='" . $p->guid . "'>Read More &raquo;</a>";
		echo "<li>" . $excerpt . "</li>\n";
	}
?>
</ul>
<ul class="slider-nav">
  <li class="prev"><a href="javascript:;">Prev</a></li>
  <li class="next"><a href="javascript:;">Next</a></li>

  <li class="clear">
  <br /></li>
</ul></div>
            </div>
                         * */ ?>
                         
                         <?php dynamic_sidebar('homepage-widget-area'); ?>
					
					</td>
				</tr>
			</table>
				</tr>
			</table>

		</div>
	</table>
	</td>
	</tr>
</table>
<?php get_footer(); ?>