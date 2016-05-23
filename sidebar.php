<?php
	$options = get_option('inove_options');

	if($options['feed'] && $options['feed_url']) {
		if (substr(strtoupper($options['feed_url']), 0, 7) == 'HTTP://') {
			$feed = $options['feed_url'];
		} else {
			$feed = 'http://' . $options['feed_url'];
		}
	} else {
		$feed = get_bloginfo('rss2_url');
	}
?>
<!-- searchbox START -->

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
					<input type="submit" class="button" value="搜索" />
				</div>
			</form>
		<?php endif; ?>
	</div>
<!-- searchbox END -->
<!-- sidebar START -->
<div id="sidebar">

<!-- sidebar north START -->
<div id="northsidebar" class="sidebar">

	

	<!-- showcase -->
	<?php if( $options['showcase_content'] && (
		($options['showcase_registered'] && $user_ID) || 
		($options['showcase_commentator'] && !$user_ID && isset($_COOKIE['comment_author_'.COOKIEHASH])) || 
		($options['showcase_visitor'] && !$user_ID && !isset($_COOKIE['comment_author_'.COOKIEHASH]))
	) ) : ?>
		<div class="widget">
			<?php if($options['showcase_caption']) : ?>
				<h3><?php if($options['showcase_title']){echo($options['showcase_title']);}else{_e('Showcase', 'inove');} ?></h3>
			<?php endif; ?>
			<div class="content">
				<?php echo($options['showcase_content']); ?>
			</div>
		</div>
	<?php endif; ?>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('north_sidebar') ) : ?>

	<!-- posts -->
	<?php
		if (is_single()) {
			$posts_widget_title = 'Recent Posts';
		} else {
			$posts_widget_title = 'Random Posts';
		}
	?>

	<div class="widget">
		<h3><?php echo $posts_widget_title; ?></h3>
		<ul>
			<?php
				if (is_single()) {
					$posts = get_posts('numberposts=10&orderby=post_date');
				} else {
					$posts = get_posts('numberposts=5&orderby=rand');
				}
				foreach($posts as $post) {
					setup_postdata($post);
					echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
				}
				$post = $posts[0];
			?>
		</ul>
	</div>

	<!-- recent comments -->
	<?php if( function_exists('wp_recentcomments') ) : ?>
		<div class="widget">
			<h3>Recent Comments</h3>
			<ul>
				<?php wp_recentcomments('limit=5&length=16&post=false&smilies=true'); ?>
			</ul>
		</div>
	<?php endif; ?>

	<!-- tag cloud -->
	<div id="tag_cloud" class="widget">
		<h3>Tag Cloud</h3>
		<?php wp_tag_cloud('smallest=8&largest=16'); ?>
	</div>

<?php endif; ?>
</div>
<!-- sidebar north END -->

<div id="centersidebar">

	<!-- sidebar east START -->
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('east_sidebar') ) : ?>
	<div class="widget">
		<!-- categories -->
			<h3>Categories</h3>
			<ul>
				<?php wp_list_cats('sort_column=name&optioncount=0&depth=1'); ?>
			</ul>
		
	</div>
	<?php endif; ?>
	
	<!-- sidebar east END -->

	<!-- sidebar west START -->
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('west_sidebar') ) : ?>
	<div class="widget">
		<!-- blogroll -->
		
			<h3>Blogroll</h3>
			<ul>
				<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
			</ul>
		
	</div>
	<?php endif; ?>
	
	<!-- sidebar west END -->
	<div class="fixed"></div>
</div>

<!-- sidebar south START -->
<div id="southsidebar" class="sidebar">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('south_sidebar') ) : ?>

	<!-- archives -->
	<div class="widget">
		<h3>Archives</h3>
		<?php if(function_exists('wp_easyarchives_widget')) : ?>
			<?php wp_easyarchives_widget("mode=none&limit=6"); ?>
		<?php else : ?>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		<?php endif; ?>
	</div>

	<!-- meta -->
	<div class="widget">
		<h3>Meta</h3>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
		</ul>
	</div>

<?php endif; ?>
</div>
<!-- sidebar south END -->

</div>
<!-- sidebar END -->
