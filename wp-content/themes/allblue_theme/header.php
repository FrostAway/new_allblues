<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
           <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	
	
	
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        
        <link rel="stylesheet" href="<?php echo bloginfo('template_directory') ?>/assets/css/reset.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        
        <link rel="stylesheet" href="<?php echo bloginfo('template_directory') ?>/assets/css/font-awesome.min.css">

    <script src="<?php echo bloginfo('template_directory') ?>/assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="<?php echo bloginfo('template_directory') ?>/assets/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo bloginfo('template_directory') ?>/assets/js/slide.js"></script>
    <script src="<?php echo bloginfo('template_directory') ?>/assets/js/carousel.js"></script>
    <script src="<?php echo bloginfo('template_directory') ?>/assets/js/animate.js"></script>
    <link rel="shortcut icon" href="<?php echo bloginfo('template_directory') ?>/assets/images/ico/favicon.ico">    
        

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<div id="top-menu" class="full">
    <div class="wrapper">
        <a class="logo" href="<?php echo home_url(); ?>"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/top-logo.png"></a>
        <ul class="menu list-inline">
            <li><a href="<?php echo home_url() ?>">Trang chủ</a></li>
            <li><a href="<?php echo home_url() ?>/gioi-thieu">Giới thiệu</a></li>
            <li class="dropdown">
                <a href="#">Dịch vụ <i class="fa fa-caret-down"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo home_url()?>/dich-vu/thiet-ke-website">Thiết kế website</a></li><hr>
                    <li><a href="<?php echo home_url()?>/dich-vu/thiet-ke-do-hoa">Thiết kế đồ họa</a></li><hr>
                    <li><a href="<?php echo home_url()?>/dich-vu/seo-tu-khoa">SEO từ khóa</a></li><hr>
                    <li><a href="<?php echo home_url()?>/dich-vu/quang-cao-google-adwords">Quảng cáo Google Adwords</a></li><hr>
                    <li><a href="<?php echo home_url()?>/dich-vu/quang-cao-facebook">Quảng cáo Facebook</a></li>
                </ul>
            </li>
            <li><a href="<?php echo home_url()?>/kho-giao-dien">Kho giao diện</a></li>
            <li><a href="<?php echo home_url()?>/category/tin-tuc">Tin tức</a></li>
            <li><a href="<?php echo home_url()?>/lien-he">Liên hệ</a></li>
        </ul>


    
<script>

</script>
        
        <div class="clear-fix"></div>
    </div>
</div>
    