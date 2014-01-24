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
<div class="footer tempfooter">
				<div class="footer-info tempfooter" align="center" style="min-height: 98px;">
				<?php wp_nav_menu(array('menu'=>'footer-menu','menu_class'=>'footerNav'));?>
					<p>Copyright &copy; 2010. All Rights Reserved.</p>

					<p>powered by <a href="http://spotlets.com" target="blank">spotlets</a></p>
					<p><a href="/sitemap.jsp?articleId=0&sectionId=0">Sitemap</a> | <a href="/editspot/" target="_blank">Edit</a></p>
				</div>
			</div>
		</div>
	</div>

	</div>
	</div>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19065593-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
