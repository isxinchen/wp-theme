<!-- header START -->
<script type="text/javascript">
//<![CDATA[
	var searchbox = MGJS.$("searchbox");
	var searchtxt = MGJS.getElementsByClassName("textfield", "input", searchbox)[0];
	var searchbtn = MGJS.getElementsByClassName("button", "input", searchbox)[0];
	var tiptext = "<?php _e('Type text to search here...', 'inove'); ?>";
	if(searchtxt.value == "" || searchtxt.value == tiptext) {
		searchtxt.className += " searchtip";
		searchtxt.value = tiptext;
	}
	searchtxt.onfocus = function(e) {
		if(searchtxt.value == tiptext) {
			searchtxt.value = "";
			searchtxt.className = searchtxt.className.replace(" searchtip", "");
		}
	}
	searchtxt.onblur = function(e) {
		if(searchtxt.value == "") {
			searchtxt.className += " searchtip";
			searchtxt.value = tiptext;
		}
	}
	searchbtn.onclick = function(e) {
		if(searchtxt.value == "" || searchtxt.value == tiptext) {
			return false;
		}
	}
//]]>
</script>
<div id="header">
<!-- wrapper START-->
<div class="wrapper">
<!-- searchbox START -->
<!--
	<div id="searchbox">
		<?php if($options['google_cse'] && $options['google_cse_cx']) : ?>
			<form action="http://www.google.com/cse" method="get">
				<div class="content">
					<input type="text" class="textfield" name="q" size="24" />
					<input type="submit" class="button" name="sa" value="" />
					<input type="hidden" name="cx" value="<?php echo $options['google_cse_cx']; ?>" />
					<input type="hidden" name="ie" value="UTF-8" />
				</div>
			</form>
		<?php else : ?>
			<form action="<?php bloginfo('home'); ?>" method="get">
				<div class="content">
					<input type="text" class="textfield" name="s" size="24" value="<?php echo wp_specialchars($s, 1); ?>" />
					<input type="submit" class="button" value="" />
				</div>
			</form>
		<?php endif; ?>
	</div>
-->
	<!-- searchbox END -->

	<div id="caption">
		<h1 id="title"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div id="tagline"><?php bloginfo('description'); ?></div>
	</div>
<!-- navigation START -->

	<!-- menus START -->
		<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
	
	<!-- menus END -->

</div>
<!-- wrap END -->
</div>
<!-- header END -->