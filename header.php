<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
	global $inove_nosidebar;
	$options = get_option('inove_options');
	if (is_home()) {
		$home_menu = 'current_page_item';
	} else {
		$home_menu = 'page_item';
	}
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

<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="baidu-site-verification" content="Iuqra3gExMWX2Qur" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<?php if (is_home()) { ?>
<meta name="keywords" content="心尘,无与伦比,beyondcompare,Android,Bash,book,C++,java,CSS,HTML,Java,Javascript,shell,Linux,Perl,PHP,Python,Ruby,SQL,Ubuntu,Unix,Web,Windows" />
<meta name="description" content="心尘的个人博客，学习形博客，旨在研究技术，分享工作生活中的点点滴滴，关注嵌入式、linux、web开发。记录个人的成长，工作中的得与失。" />

 <link rel="canonical"  href="<?php echo get_settings('home'); ?>" />
 <?php } ?>

 <?php if ( is_single() ||is_page()) { ?>
 <meta name="keywords" content="<?php $key="keywords"; echo get_post_meta($post->ID, $key, true); ?>" />
 <meta name="description"  content="<?php $key="description"; echo get_post_meta($post->ID, $key, true); ?>" />
 <link rel="canonical" href="<?php echo get_permalink($post->ID);?>" />
 <?php } ?>
 <?php if ( is_category() ) { ?>
<meta name="keywords" content="心尘,linux,嵌入式,android,web" />
 <meta name="description"  content="<?php echo category_description(); ?>" />
 <link rel="canonical" href="<?php
$category = get_the_category();
echo get_category_link($category[0]->term_id );
?>" />
<?php }?>

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0 - all posts', 'inove'); ?>" href="<?php echo $feed; ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0 - all comments', 'inove'); ?>" href="<?php bloginfo('comments_rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!-- style START -->
	<!-- default style -->
	<style type="text/css" media="screen">@import url( <?php bloginfo('stylesheet_url'); ?> );</style>
	<!-- for translations -->
	<?php if (strtoupper(get_locale()) == 'ZH_CN' || strtoupper(get_locale()) == 'ZH_TW') : ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/chinese.css" type="text/css" media="screen" />
	<?php elseif (strtoupper(get_locale()) == 'HE_IL' || strtoupper(get_locale()) == 'FA_IR' || strtoupper(get_locale()) == 'UG_CN' || strtoupper(get_locale()) == 'CKB') : ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/rtl.css" type="text/css" media="screen" />
	<?php endif; ?>
	<!--[if IE]>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" type="text/css" media="screen" />
	<![endif]-->
	<!-- style END -->

	<!-- script START -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/base.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/menu.js"></script>
	<!-- script END -->

	<?php wp_head(); ?>
</head>

<?php flush(); ?>

<body>
<?php include('templates/header.php'); ?>
<!-- container START -->
<div id="container" <?php if($options['nosidebar'] || $inove_nosidebar){echo 'class="one-column"';} ?> >

<!-- content START -->
<div id="content">

	<!-- main START -->
	<div id="main">