<?php
/*
 * Template Name: Template Store
 */
?>

<?php get_header() ?>
<?php include_once 'inc/breadcrum.php'; ?>

<!---- #templates ---->
<div id="templates" class="full">
    <h1 class="text-center blue">Kho giao diện mẫu phong phú và tuyệt đẹp</h1>
    <div id="templates-header">
        <ul class="list-inline">
            <?php $terms = get_terms('template-category'); ?>
            <?php foreach ($terms as $term) { ?>        
                <li data-category="<?php echo $term->term_id; ?>">
                    <p><i class="fa fa-laptop fa-2x"></i></p>
                    <p><?php echo $term->name ?></p>
                </li>
            <?php } ?>
            <div class="clear-fix"></div>
        </ul>
    </div>


    <div class="clear-fix"></div>
    <div id="templates-body">
        <div class="wrapper">
            <div class="template-box" cat="1">
                <div class="template-img">
                    <img src="<?php echo bloginfo('template_directory') ?>/assets/images/templates/item2.jpg">
                    <div class="layer"></div>
                    <a class="view-template" data-img="<?php echo bloginfo('template_directory') ?>/assets/images/templates/full/index.jpg" href="#">
                        <i class="fa fa-search"></i> Chi tiết
                    </a>
                </div>
                <h5>Công ty TNHH Trường Phát</h5>
                <p class="template-note">Vươn xa mọi miền Tổ quốc</p>
            </div>


            <?php query_posts(array('post_type' => 'template')); ?>
            <?php if (have_posts()): while (have_posts()): the_post(); ?>

                    <?php
                    $taxonomies = get_the_terms($post->ID, 'template-category');
                    $term_id = '';
                    foreach ($taxonomies as $term) {
                        $term_id .= $term->term_id . ' ';
                    }
                    ?>
                    <div class="template-box" cat="<?php echo $term_id; ?>">
                        <div class="template-img">
                            <?php the_post_thumbnail() ?>
                            <div class="layer"></div>
                            <a class="view-template" data-img="<?php echo get_post_meta(get_the_ID(), 'template-image', true); ?>" href="#">
                                <i class="fa fa-search"></i> Chi tiết
                            </a>
                        </div>
                        <h5><?php the_title() ?></h5>
                        <p class="template-note"><?php the_excerpt() ?></p>
                    </div>

    <?php endwhile; else: ?>

                <h2>None</h2>

    <?php endif; ?>




            <div class="clear-fix"></div>
        </div>
    </div>
</div>
<!---- / #templates ---->

<a href="#" id="close-layer-button">
    <i class="fa fa-close fa-2x"></i>
</a>
<div id="fixed-layer"></div>
<div id="fixed-img">
    <img src="">
</div>

<?php get_footer(); ?>
