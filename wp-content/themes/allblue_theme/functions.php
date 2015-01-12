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
            echo '</span><span><i class="fa fa-angle-right"></i></span>';
        } elseif (is_single()) {
            echo '<span>';
            echo get_the_category(get_the_ID())[0]->cat_name;
            echo '</span><span><i class="fa fa-angle-right"></i></span>';
        } elseif (is_page()) {
            echo ' <span><strong> ' . get_the_title() . '</strong> </span>';
        } elseif (is_tag()) {
            single_tag_title();
        } elseif (is_day()) {
            echo"<span>";
            the_time('F jS, Y');
            echo'</span>';
        } elseif (is_month()) {
            echo"<span>";
            the_time('F, Y');
            echo'</span>';
        } elseif (is_year()) {
            echo"<span>";
            the_time('Y');
            echo'</span>';
        } elseif (is_author()) {
            echo"<span>";
            echo'</span>';
        } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
            echo "<span>Blog Archives";
            echo'</span>';
        } elseif (is_search()) {
            echo"<span>Search Results";
            echo'</span>';
        }
    }
}

// post type template

function create_post_type_template() {
    register_post_type('template', array(
        'labels' => array(
            'name' => 'Giao diện',
            'singular_name' => 'Giao diện',
            'add_new' => 'Thêm Giao diện mới',
            'edit_item' => 'Chỉnh sửa Giao diện',
            'all_items' => 'Tất cả Giao diện',
            'new_item_name' => 'Giao diện mới',
            'view_item' => 'Xem Giao diện',
            'menu_name' => 'Giao diện',
            'add_new_item' => 'Thêm Giao diện mới',
        ),
        'description' => 'Kho giao diện',
        'supports' => array(
            'title', 'excerpt', 'thumbnail', 'revisions',
        ),
        'taxonomies' => array('category'),
        'hierarchical' => true,
        'has_archive' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => false,
        'menu_position' => 7,
        'menu_icon' => '',
        'capability_type' => 'post',
    ));
    register_taxonomy('template-category', 'template', array(
        'labels' => array(
            'name' => 'Loại Giao diện',
            'singular_name' => 'Loại Giao diện',
            'add_new' => 'Mục Giao diện mới',
            'new_item_name' => 'Mục Giao diện mới',
            'add_new_item' => 'Thêm mục Giao diện'
        ),
        'public' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewirte' => array('slug' => 'template-cat'),
        'query_var' => true,
    ));
}

add_action('init', create_post_type_template());
//field image
add_action('add_meta_boxes', 'add_template_image');

function add_template_image() {
    add_meta_box('template-image', 'Ảnh Demo', 'set_template_image', 'template', 'normal', 'low', array());
}


function set_template_image() {
    global $post;
    $custom = get_post_custom($post->ID);
    $tpl_image = $custom['template-image'][0];
    add_thickbox();
    ?>

    <label>Ảnh Demo giao diện</label>

    <input type="hidden" name="template-image" id="imgurl" value="<?php if (isset($tpl_image)) echo $tpl_image; ?>" />
    <input onclick="upload_image('#imgurl')" type="submit" id="btn-upload" value="Upload Image" /> <br />
    <img id="show-tpl-imgurl" src="<?php if (isset($tpl_image)) echo $tpl_image; ?>" style="width: 800px; margin: 5px;" />
    <script>
        jQuery("#btn-upload").click(function () {
            return false;
        });
        function upload_image(imgid) {
            tb_show('', 'media-upload.php?type=image&TB_iframe=true');

            window.send_to_editor = function (html) {
                imgurl = jQuery('img', html).attr('src');
                jQuery(imgid).val(imgurl);
                jQuery("#show-tpl-imgurl").attr("src", imgurl);
                tb_remove();
            };
        }
    </script>
    <?php
}

add_action('save_post', 'update_tpl_image');

function update_tpl_image($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_REQUEST['post_type']) && $_REQUEST['post_type'] == 'template') {
        if (!empty($_REQUEST['template-image'])) {
            update_post_meta($post_id, 'template-image', $_POST['template_image']);
        } else {
            delete_post_meta($post_id, 'template-image');
        }
        //image
        if (isset($_POST['template-image'])) {
            update_post_meta($post_id, 'template-image', esc_url_raw($_POST['template-image']));
        }
    }
}

// them truong cho taxonomy
// Add term page
add_action('menu_category_edit_form_fields','menu_category_edit_form_fields');
add_action('menu_category_add_form_fields','menu_category_edit_form_fields');
add_action('edited_menu_category', 'menu_category_save_form_fields', 10, 2);
add_action('created_menu_category', 'menu_category_save_form_fields', 10, 2);

function menu_category_save_form_fields($term_id) {
    $meta_name = 'order';
    if ( isset( $_POST[$meta_name] ) ) {
        $meta_value = $_POST[$meta_name];
        // This is an associative array with keys and values:
        // $term_metas = Array($meta_name => $meta_value, ...)
        $term_metas = get_option("taxonomy_{$term_id}_metas");
        if (!is_array($term_metas)) {
            $term_metas = Array();
        }
        // Save the meta value
        $term_metas[$meta_name] = $meta_value;
        update_option( "taxonomy_{$term_id}_metas", $term_metas );
    }
}

function menu_category_edit_form_fields ($term_obj) {
    // Read in the order from the options db
    $term_id = $term_obj->term_id;
    $term_metas = get_option("taxonomy_{$term_id}_metas");
    if ( isset($term_metas['order']) ) {
        $order = $term_metas['order'];
    } else {
        $order = '0';
    }
?>
    <tr class="form-field">
            <th valign="top" scope="row">
                <label for="order"><?php _e('Category Order', ''); ?></label>
            </th>
            <td>
                <input type="text" id="order" name="order" value="<?php echo $order; ?>"/>
            </td>
        </tr>
<?php 
}

?>
