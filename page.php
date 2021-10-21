<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>


    <div class="row">
	    <div class="columns small-24">
		    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		    	
		    	<h3><?php the_title(); ?></h3>
				
				<?php the_content(); ?>		
					
			<?php endwhile; ?>
	    </div>
    </div>


<?php Starkers_Utilities::get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>