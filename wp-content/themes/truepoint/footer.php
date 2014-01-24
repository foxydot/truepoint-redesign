<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<div class="footer-nav">
		<ul id="footer-nav">
			<ul class='sections'>
   <li class='m4nav_l0 first' id='m4nav_footer_l0_firm-profile'><a href='/firm-profile'>Firm Profile</a>  </li>

   <li class='m4nav_l0' id='m4nav_footer_l0_service-offerings'><a href='/service-offerings'>Service Offerings</a>  </li>
   <li class='m4nav_l0' id='m4nav_footer_l0_investment-approach'><a href='/investment-approach'>Investment Approach</a>  </li>
   <li class='m4nav_l0' id='m4nav_footer_l0_financial-education'><a href='/financial-education'>Financial Education</a>  </li>
   <li class='m4nav_l0' id='m4nav_footer_l0_in-the-news'><a href='/in-the-news'>In the News</a>  </li>
   <li class='m4nav_l0' id='m4nav_footer_l0_careers'><a href='/careers'>Careers</a>  </li>

   <li class='m4nav_l0 last' id='m4nav_footer_l0_contact-us'><a href='/contact-us'>Contact Us</a>  </li>
</ul>

		</ul>
	</div>
			<div class="footer tempfooter">
				<div class="footer-info tempfooter" align="center" style="min-height: 98px;">
				<?php wp_nav_menu(array('menu'=>'footer-menu', 'menu_class' =>'links'));?>
				<!-- <ul class="links">
					<li><a href="/firm-profile/disclosures">Disclosures</a></li>
						<li class="divider">|</li>
					<li><a href="/careers">Careers</a></li>
 						<li class="divider">|</li>
  					<li><a href="/contact-us">Contact Us</a></li>
				</ul> -->
<ul class="icons">
  <li><a href="https://www.facebook.com/Truepoint" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="facebook" border="0" width="22" /></a></li>
  <li><a href="http://www.linkedin.com/company/108641" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="linkedin" border="0" width="22" /></a></li>
</ul>
					<p>Copyright &copy; 2010 Truepoint Incorporated. All Rights Reserved.</p>
					<p>powered by <a href="http://spotlets.com" target="blank">spotlets</a></p>
					<p><a href="/sitemap.jsp?articleId=0&sectionId=0">Sitemap</a> | <a href="/editspot/" target="_blank">Edit</a></p>

				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	
	<div id="first_welcome" style="text-align: left;" title="Truepoint Subscription">
		<?php gravity_form(2, false, false, false, null, true, 1); ?>
	</div>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>