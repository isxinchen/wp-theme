<?php get_header(); ?>
<?php
	$options = get_option('inove_options');
	if (function_exists('wp_list_comments')) {
		add_filter('get_comments_number', 'comment_count', 0);
	}
?>
<!-- ¹«¸æ -->
<?php if ($options['notice'] && $options['notice_content']) : ?>
	<div class="post" id="notice">
		<div class="content">
			<?php echo($options['notice_content']); ?>
			<div class="fixed"></div>
		</div>
	</div>
<?php endif; ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); update_post_caches($posts); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		
		<div class="info">
		<h1><a class="title" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<span class="date"><?php the_time(__('F jS, Y', 'inove')) ?></span>
			<?php if ($options['author']) : ?><span class="author"><?php the_author_posts_link(); ?></span><?php endif; ?>
			<?php edit_post_link(__('Edit', 'inove'), '<span class="editpost">', '</span>'); ?>
			<span class="comments"><?php comments_popup_link(__('No comments', 'inove'), __('1 comment', 'inove'), __('% comments', 'inove'), '', __('Comments off', 'inove')); ?></span>
			<div class="fixed"></div>
		</div>
		<div class="content">
<?php if(is_category() || is_archive() || is_home() ) {
     the_excerpt();
 } else {
     the_content('More &raquo;');
 } ?>
 <div class="details">
 <div class="inside">
 <?php //comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
  <a href="<?php the_permalink() ?>">Read more &raquo;</a></div></div>

			<?php //the_content(__('Read more...', 'inove')); 
						
			?>
			<div class="fixed"></div>
		</div>
		<div class="under">
			<?php if ($options['categories']) : ?><span class="categories"><?php _e('Categories: ', 'inove'); ?></span><span><?php the_category(', '); ?></span><?php endif; ?>
			<?php if ($options['tags']) : ?><span class="tags"><?php _e('Tags: ', 'inove'); ?></span><span><?php the_tags('', ', ', ''); ?></span><?php endif; ?>
		</div>
	</div>
<?php endwhile; else : ?>
	<div class="errorbox">
		<?php _e('Sorry, no posts matched your criteria.', 'inove'); ?>
	</div>
<?php endif; ?>

<div id="pagenavi">
	<?php if(function_exists('wp_pagenavi')) : ?>
		<?php wp_pagenavi(9) ?>
	<?php else : ?>
		<span class="newer"><?php previous_posts_link(__('Newer Entries', 'inove')); ?></span>
		<span class="older"><?php next_posts_link(__('Older Entries', 'inove')); ?></span>
	<?php endif; ?>
	<div class="fixed"></div>
</div>

<?php get_footer(); ?>
