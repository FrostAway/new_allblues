<?php get_header(); ?>
<?php include_once 'inc/breadcrum.php'; ?>
	

<div id="news" class="full">
    <div class="wrapper">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div class="post" id="post-<?php the_ID(); ?>">

			<h2><?php the_title(); ?></h2>

			

		</div>
		
		<?php // comments_template(); ?>

		<?php endwhile; endif; ?>

    </div>
</div>

<?php get_footer(); ?>