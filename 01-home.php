<?php
/**
 * Template Name: 01 - Home
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<?php
	$homeHeader = get_field('home_header');
	$homeHeaderImg = $homeHeader['image'];
	$homeHeaderTitle = $homeHeader['title'];
	$homeHeaderSubtitle = $homeHeader['subtitle'];
	$homeHeaderLink = $homeHeader['link'];
?>

<div class="homepage-header">
	<div class="homepage-header-content">
		<div class="container medium">
			<h2><?php echo $homeHeaderSubtitle; ?></h2>
			<h1><?php echo $homeHeaderTitle; ?></h1>
		</div>
	</div>
	<div class="homepage-header-link">
		<div class="container large">
			<a href="<?php echo $homeHeaderLink['url']; ?>">
				<span><?php echo $homeHeaderLink['title']; ?></span>
				<?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/arrow.svg' ); ?>
			</a>
		</div>
	</div>
	<img class="homepage-header-img" src="<?php echo $homeHeaderImg['url']; ?>" alt="<?php echo $homeHeaderImg['alt']; ?>" />
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>
