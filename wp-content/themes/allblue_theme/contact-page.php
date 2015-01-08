<?php
/* 
    Template Name: Contact
 */
?>

<?php get_header() ?>
<?php get_sidebar('breadcrumb') ?>


<div id="news" class="full">
    <div class="wrapper">
        <div class="left">
            <h3>Liên hệ với AllBlue</h3>
            <form>
                <p>Họ tên</p>
                <p><input type="text"></p>
                <p>Số điện thoại</p>
                <p><input type="text"></p>
                <p>Email</p>
                <p><input type="email"></p>
                <p>Nội dung liên hệ</p>
                <p><textarea rows="10"></textarea></p>
                <p><button type="submit">Gửi</button></p>
            </form>
        </div>
        <div class="right"></div>
        <div class="clear-fix"></div>
    </div>
</div>

<?php get_footer(); ?>



