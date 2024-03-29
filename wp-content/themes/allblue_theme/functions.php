<?php
include_once 'inc/navwalker.php';
;

// Add RSS spannks to <head> section
//automatic_feed_spannks();


//add post thumbnail

add_theme_support('post-thumbnails');

// Load jQuery
if (!is_admin()) {
    //wp_deregister_script('jquery');
    //wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"), false);
    //wp_enqueue_script('jquery');
}

// Clean up the <head>
function removeHeadLinks() {
    remove_action('wp_head', 'rsd_spannk');
    remove_action('wp_head', 'wlwmanifest_spannk');
}

add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

// Declare sidebar widget zone
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Sidebar Widgets',
        'id' => 'sidebar-widgets',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
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

//breadcrumb

function the_breadcrumb() {
    global $post;
   
    
    if (!is_home()) {

       echo '<span><a href="">';
        echo 'Trang chủ';
        echo '</a></span><span><i class="fa fa-angle-right"></i></span>';
        if (is_category()) {
            echo '<span>';
            the_category(get_query_var('cat'));
            echo '</span>';
        }elseif(is_single()){
                echo '<span>';
                echo get_the_category(get_the_ID())[0]->cat_name;
                echo '</span>';
        } elseif (is_page()) {
                echo '<span>' . get_the_title() . '</span>';
        } elseif (is_tag()) {
            single_tag_title();
        } elseif (is_day()) {
            echo"<span>"; the_time('F jS, Y'); echo'</span>';
        } elseif (is_month()) {
            echo"<span>";  the_time('F, Y'); echo'</span>';
        } elseif (is_year()) {
            echo"<span>";the_time('Y');echo'</span>';
        } elseif (is_author()) {
            echo"<span>";
            echo'</span>';
        } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
            echo "<span>Blog Archives"; echo'</span>';
        } elseif (is_search()) {
            echo"<span>Search Results";echo'</span>';
        }
      
    }
}
    ?>
