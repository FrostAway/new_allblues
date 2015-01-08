<?php
/*
 * Template Name: Template Store
 */
?>

<?php get_header() ?>
<?php get_sidebar('breadcrumb') ?>

<div id="templates" class="full">
    <h1 class="text-center blue">KHO GIAO DIỆN</h1>
    <div id="templates-header">
        <ul class="list-inline">
            <li data-category="1" class="active">
                <p><i class="fa fa-star fa-2x"></i></p>
                <p>Nổi bật</p>
                <div class="li-triangle"></div>
            </li>
            <li data-category="2">
                <p><i class="fa fa-shopping-cart fa-2x"></i></p>
                <p>Bán hàng</p>
            </li>
            <li data-category="3">
                <p><i class="fa fa-windows fa-2x"></i></p>
                <p>Doanh nghiệp</p>
            </li>
            <li data-category="4">
                <p><i class="fa fa-user fa-2x"></i></p>
                <p>Cá nhân</p>
            </li>
            <li data-category="5">
                <p><i class="fa fa-newspaper-o fa-2x"></i></p>
                <p>Tin tức</p>
            </li>
            <li data-category="6">
                <p><i class="fa fa-university fa-2x"></i></p>
                <p>Giáo dục</p>
            </li>
            <li data-category="7">
                <p><i class="fa fa-laptop fa-2x"></i></p>
                <p>Công nghệ</p>
            </li>
            <li data-category="8">
                <p><i class="fa fa-list-ul fa-2x"></i></p>
                <p>Khác</p>
            </li>
            <div class="clear-fix"></div>
        </ul>
    </div>
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
            <div class="template-box" cat="1 2">
                <div class="template-img">
                    <img src="<?php echo bloginfo('template_directory') ?>/assets/images/templates/item2.jpg">
                    <div class="layer"></div>
                    <a class="view-template" data-img="<?php echo bloginfo('template_directory') ?>/assets/images/templates/full/index.jpg" href="#">
                        <i class="fa fa-search"></i> Chi tiết
                    </a>
                </div>
                <h5>Công ty TNHH Thành Nam</h5>
                <p class="template-note">Bài ca người xây dựng</p>
            </div>
            <div class="template-box" cat="1 2">
                <div class="template-img">
                    <img src="<?php echo bloginfo('template_directory') ?>/assets/images/templates/item4.jpg">
                    <div class="layer"></div>
                    <a class="view-template" data-img="<?php echo bloginfo('template_directory') ?>/assets/images/templates/full/index.jpg" href="#">
                        <i class="fa fa-search"></i> Chi tiết
                    </a>
                </div>
                <h5>Công ty TNHH Thành Nam</h5>
                <p class="template-note">Bài ca người xây dựng</p>
            </div>
            <div class="template-box" cat="1 2">
                <div class="template-img">
                    <img src="<?php echo bloginfo('template_directory') ?>/assets/images/templates/item2.jpg">
                    <div class="layer"></div>
                    <a class="view-template" data-img="<?php echo bloginfo('template_directory') ?>/assets/images/templates/full/index.jpg" href="#">
                        <i class="fa fa-search"></i> Chi tiết
                    </a>
                </div>
                <h5>Công ty TNHH Thành Nam</h5>
                <p class="template-note">Bài ca người xây dựng</p>
            </div>
            <div class="template-box" cat="1 2">
                <div class="template-img">
                    <img src="<?php echo bloginfo('template_directory') ?>/assets/images/templates/item3.jpg">
                    <div class="layer"></div>
                    <a class="view-template" data-img="<?php echo bloginfo('template_directory') ?>/assets/images/templates/full/index.jpg" href="#">
                        <i class="fa fa-search"></i> Chi tiết
                    </a>
                </div>
                <h5>Công ty TNHH Thành Nam</h5>
                <p class="template-note">Bài ca người xây dựng</p>
            </div>
            <div class="template-box" cat="1 2">
                <div class="template-img">
                    <img src="<?php echo bloginfo('template_directory') ?>/assets/images/templates/item4.jpg">
                    <div class="layer"></div>
                    <a class="view-template" data-img="<?php echo bloginfo('template_directory') ?>/assets/images/templates/full/index.jpg" href="#">
                        <i class="fa fa-search"></i> Chi tiết
                    </a>
                </div>
                <h5>Công ty TNHH Thành Nam</h5>
                <p class="template-note">Bài ca người xây dựng</p>
            </div>
            <div class="clear-fix"></div>
        </div>
    </div>
</div>
<!---- / #templates ---->

<a href="#" id="close-layer">
    <i class="fa fa-close fa-2x"></i>
</a>
<div id="fixed-layer">
    <img src="#">
</div>
<div style="float: left; width: 100%; height: 100px"></div>

<?php get_footer(); ?>