<?php
/**
 * The template for displaying 404 pages (Not Found)
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
			    
			    <h1 class="super">404</h1>
			    
				<h1>We Couldn't Find Your Page</h1>
      		
				<p>The page you are looking for has been moved or renamed. Use the navigation above to browse our site.</p>
			    
		    </div>
		    
	</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>