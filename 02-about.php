<?php
/**
 * Template Name: 02 - About
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<?php
	$pageHeader = get_the_post_thumbnail_url();
	$pageIntro = get_field('about_intro');

	$pageRow1 = get_field('about_row_1');
	$pageRow1Subtitle = $pageRow1['subtitle'];
	$pageRow1Text1 = $pageRow1['text_1'];
	$pageRow1Text2 = $pageRow1['text_2'];
	$pageRow1Link = $pageRow1['link'];
	$pageRow1Image = $pageRow1['image'];

	$pageRow2 = get_field('about_row_2');
	$pageRow2Subtitle = $pageRow2['subtitle'];
	$pageRow2Text1 = $pageRow2['text_1'];
	$pageRow2Text2 = $pageRow2['text_2'];
	$pageRow2Link = $pageRow2['link'];
	$pageRow2Image = $pageRow2['image'];
?>

<div class="page-header">
	<div class="page-header-inner">
		<div class="container medium">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<img src="<?php echo $pageHeader; ?>" alt="<?php the_title(); ?>" />
</div>

<div class="page-intro-text">
	<div class="container medium">
		<p class="subtitle">Who we are</p>
		<p class="title"><?php echo $pageIntro; ?></p>
	</div>
</div>

<div class="page-image-text">
	<div class="container medium">
		<div class="page-image-text-inner">
			<div class="page-image-text-image">
				<h1><?php echo $pageRow1['image']; ?></h1>
				<img src="<?php echo $pageRow1Image['url']; ?>" alt="<?php echo $pageRow1Image['alt']; ?>" />
			</div>
			<div class="page-image-text-content">
				<?php if ($pageRow1Subtitle): ?>
					<p class="title"><?php echo $pageRow1Subtitle; ?></p>
				<?php endif; ?>
				<?php if ($pageRow1Text1): ?>
					<p class="text-1"><?php echo $pageRow1Text1; ?></p>
				<?php endif; ?>
				<?php if ($pageRow1Text2): ?>
					<p class="text-2"><?php echo $pageRow1Text2; ?></p>
				<?php endif; ?>
				<?php if ($pageRow1Link['url']): ?>
					<a href="<?php echo $pageRow1Link['url']; ?>">
						<span><?php echo $pageRow1Link['title']; ?></span>
						<?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/arrow.svg' ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<div class="page-image-text">
	<div class="container medium">
		<div class="page-image-text-inner">
			<div class="page-image-text-image">
				<h1><?php echo $pageRow2['image']; ?></h1>
				<img src="<?php echo $pageRow2Image['url']; ?>" alt="<?php echo $pageRow2Image['alt']; ?>" />
			</div>
			<div class="page-image-text-content">
				<?php if ($pageRow2Subtitle): ?>
					<p class="title"><?php echo $pageRow2Subtitle; ?></p>
				<?php endif; ?>
				<?php if ($pageRow2Text1): ?>
					<p class="text-1"><?php echo $pageRow2Text1; ?></p>
				<?php endif; ?>
				<?php if ($pageRow2Text2): ?>
					<p class="text-2"><?php echo $pageRow2Text2; ?></p>
				<?php endif; ?>
				<?php if ($pageRow2Link['url']): ?>
					<a href="<?php echo $pageRow2Link['url']; ?>">
						<span><?php echo $pageRow2Link['title']; ?></span>
						<?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/arrow.svg' ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php wp_reset_query(); ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>
