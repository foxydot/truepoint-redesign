<?php
/**
 * Template Name: Home page
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header('home'); 
$pages_ids=get_pages_ids();


?>

	<div class="edges"  style="background-image: none;"  >
		<div class="contentSpacing">
			<div class="header tempheader">
				<div style="width: 100%;">
					<div style="float: left; width: 941px; overflow: hidden;">
						<a href="<?php echo home_url( '/' ); ?>" style="text-decoration: none;">
							
						</a>
					</div>

					
					<div id="searchshare">
						
						
					</div>
				</div>
			</div>
			<div class="mainMenu">
				<ul id="menu">
					<li class='m4nav_l0 first' id='m4nav_footer_l0_our-approach' ><a href='<?php echo get_permalink($pages_ids['our_approach_id']);?>'>Our Approach</a>  </li>
<li class='m4nav_l0' id='m4nav_footer_l0_family-office-model' ><a href='/family-office-model'>Family Office Model</a>  </li>

<li class='m4nav_l0 last' id='m4nav_footer_l0_about-us' ><a href='/about-us'>About Us</a>  </li>

				</ul>
			</div>

		<div class="contentArea tempbody">
			<div class="hcontent1">
				
				<div><img title="home_banner" alt="home_banner" src="<?php echo get_template_directory_uri(); ?>/images/home_banner.jpg" height="370" width="990" align="left" /></div>
			</div>
			<div class="hcontent2">

				
				<div><div class="navigation">
        <a href="<?php echo get_permalink($pages_ids['our_approach_id']);?>" class="our-approach"></a>
        <a href="<?php echo get_permalink($pages_ids['offcie_model_id']);?>" class="family-office-model"></a>
        <a href="<?php echo get_permalink($pages_ids['about_us_id']);?>" class="about-us"></a>
      </div></div>
			</div>	
		</div>
		<div class="contentAreaHome tempbody" width="941px">
			<table>

				<tr>
					<td class="hcontent3">
						<div class="leftBox">
							<?php 
							
								$excerpt=get_field('page_excerpt',$pages_ids['our_approach_id']);
							?>
							<h1><?php echo $page->post_title;?></h1>

							<div><?php echo $excerpt;?>
  <br />
</p>
<br />
<p class="float-link"><a href="<?php echo get_permalink($pages_ids['our_approach_id']);?>">Read More</a>
</p></div>

						</div>
					</td>
					<td class="hcontent4">
						<div class="middleImg" align="center">
							<?php 
								
								$excerpt=get_field('page_excerpt',$pages_ids['offcie_model_id']);
							?>
							<h1><?php echo $page->post_title;?></h1>

							<div><?php echo $excerpt;?>
</p> 
<br />
<br />
<p class="float-link"><a href="<?php echo get_permalink($pages_ids['offcie_model_id']);?>">Read More</a>

</p></div>
						</div>
					</td>
					
					<td class="hcontent5">
						<div class="leftBox" style="margin-left: 10px; width: 270px; vertical-align: top;">
							<h1></h1>
							<?php 
								$excerpt=get_field('page_excerpt',$pages_ids['about_us_id']);
							?>
							<div><?php echo $excerpt;?>
  <br />
</p>
<br />

<br />
<p class="float-link"><a href="<?php echo get_permalink($pages_ids['about_us_id']);?>">Read More</a>
</p></div>
						</div>
					
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
      	   
		
  	 	  






	<div class="footer-nav">
		<ul id="footer-nav">
			<ul class='sections'>
   <li class='m4nav_l0 first' id='m4nav_footer_l0_our-approach'><a href='/our-approach'>Our Approach</a>  </li>

   <li class='m4nav_l0' id='m4nav_footer_l0_family-office-model'><a href='/family-office-model'>Family Office Model</a>  </li>
   <li class='m4nav_l0 last' id='m4nav_footer_l0_about-us'><a href='/about-us'>About Us</a>  </li>
</ul>

		</ul>
	</div>

<?php get_footer(); ?>
