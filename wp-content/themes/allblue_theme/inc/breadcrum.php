<!----- #breadcrumb ----->
<div class="breadcrumb full">
    <div class="wrapper">
        <div class="left-bread">
                       
            <?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1><?php single_cat_title(); ?></h1>
                                
			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1><?php single_tag_title(); ?></h1>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1><?php the_time('F jS, Y'); ?></h1>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1><?php the_time('F, Y'); ?></h1>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1><?php the_time('Y'); ?></h1>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1>Author Archive</h1>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1>Blog Archives</h1>
			
			<?php } ?>
                                
                                
                   <?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>
            
            
        </div>
        <div class="right-bread">
            <?php the_breadcrumb(); ?>
        </div>
        <div class="clear-fix"></div>
    </div>
</div>
<!-----/ #breadcrumb ----->

