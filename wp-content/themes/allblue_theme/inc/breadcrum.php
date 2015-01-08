<!----- #breadcrumb ----->
<div class="breadcrumb full">
    <div class="wrapper">
        <div class="left-bread">
            <h1>            
           <?php
		      if (function_exists('is_tag') && is_tag()) {
		        single_tag_title("Tag Archive for &quot;");  }
		      elseif (is_archive()) {
		         wp_title('');  }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; -'; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title('');}
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
            
            </h1>
        </div>
        <div class="right-bread">
            <?php the_breadcrumb(); ?>
        </div>
        <div class="clear-fix"></div>
    </div>
</div>
<!-----/ #breadcrumb ----->

