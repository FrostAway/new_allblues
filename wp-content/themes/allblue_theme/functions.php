<?php
include_once 'inc/navwalker.php';;
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
        
        //add post thumbnail
        
        add_theme_support('post-thumbnails');
        
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

    
    //query post
    add_action('pre_get_posts', 'my_post_queries');
    function my_post_queries($query) {
    // do not alter the query on wp-admin pages and only alter it if it's the main query
    if (!is_admin() && $query->is_main_query()) {

        // alter the query for the home and category pages 

        if (is_home()) {
            $query->set('posts_per_page', 1);
        }

        if (is_category()) {
            $query->set('posts_per_page', 1);
        }

        if (is_search()) {
            $query->set('posts_per_page', 1);
        }
        
    }
}
    
?>