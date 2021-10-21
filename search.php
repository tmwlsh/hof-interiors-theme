<?php
/**
 * Search results page
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
		    <?php if ( have_posts() ): ?>
					
				<?php while ( have_posts() ) : the_post(); ?>
						<article class="clear search-result">
							<h5>
								<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h5>
						
							<?php the_excerpt();?>
						
						</article>
				<?php endwhile; ?>
				
			<?php else: ?>
					<h3>No results found for '<?php echo get_search_query(); ?>'</h3>
			<?php endif; ?>
	    </div>
    </div>



<?php Starkers_Utilities::get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>