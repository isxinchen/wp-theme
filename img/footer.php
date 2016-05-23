	</div>
	<!-- main END -->

	<?php
		$options = get_option('inove_options');
		global $inove_nosidebar;
		if(!$options['nosidebar'] && !$inove_nosidebar) {
			get_sidebar();
		}
	?>
	<div class="fixed"></div>
</div>
<!-- content END -->
<!-- footer START -->
<div id="footer">
	<div id="copyright">
		<?php
			global $wpdb;
			$post_datetimes = $wpdb->get_row($wpdb->prepare("SELECT YEAR(min(post_date_gmt)) AS firstyear, YEAR(max(post_date_gmt)) AS lastyear FROM $wpdb->posts WHERE post_date_gmt > 1970"));
			if ($post_datetimes) {
				$firstpost_year = $post_datetimes->firstyear;
				$lastpost_year = $post_datetimes->lastyear;

				$copyright = __('Copyright &copy; ', 'inove') . $firstpost_year;
				if($firstpost_year != $lastpost_year) {
					$copyright .= '-'. $lastpost_year;
				}
				$copyright .= ' ';

				echo $copyright;
				//bloginfo('name');
			}
		?>
		<a href="http://www.beyondcompare.cn" ><?php bloginfo('name');?></a>|
		Powered by <a href="http://wordpress.org/">WordPress</a>|
		<?php printf(__('Theme based on <a href="%1$s">iNove</a>', 'inove'), 'http://www.neoease.com/inove'); ?>,Redesigned by 心尘|自由的互联网不需要备案
		<a href="#" onclick="MGJS.goTop();return false;"><?php _e('Top', 'inove'); ?></a>
		<?php $options = get_option('inove_options');
		if ($options['analytics']) {
			echo($options['analytics_content']);
			}?>
			
	</div>
	
</div>
<!-- footer END -->
</div>
<!-- container END -->
</div>
<!-- wrap END -->
<?php
	wp_footer();//调用footer模板
?>

</body>
</html>

