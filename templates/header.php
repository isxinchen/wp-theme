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

	<div id="caption">
		<h1 id="title"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div id="tagline"><?php bloginfo('description'); ?></div>
	</div>
<!-- navigation START -->
	<!-- menus START -->
		<?php

		$defaults = array(
			'theme_location'  => 'primary',
			'menu'            => '',
			'container'       => 'div',
			'container_class' => 'menu-header',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		);

		wp_nav_menu( $defaults );

		?>
	
	<!-- menus END -->
<!-- navigation END -->

</div>
<!-- wrap END -->
</div>
<!-- header END -->