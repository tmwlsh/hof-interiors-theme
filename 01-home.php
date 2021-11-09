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

	$homeIntro = get_field('home_intro_text');
	$homeIntroSubtitle = $homeIntro['intro_text_sub_title'];
	$homeIntroTitle = $homeIntro['intro_text_title'];

	$homeImgTxt = get_field('home_image_text');
	$homeImgTxtImg = $homeImgTxt['image'];
	$homeImgTxtTitle = $homeImgTxt['title'];
	$homeImgTxtText1 = $homeImgTxt['text_1'];
	$homeImgTxtText2 = $homeImgTxt['text_2'];
	$homeImgTxtLink = $homeImgTxt['link'];
?>

<div class="homepage-header">
	<div class="homepage-header-content">
		<div class="container medium">
			<?php if($homeHeaderSubtitle): ?>
				<h2><?php echo $homeHeaderSubtitle; ?></h2>
			<?php endif; ?>
			<?php if($homeHeaderTitle): ?>
				<h1><?php echo $homeHeaderTitle; ?></h1>
			<?php endif; ?>
		</div>
	</div>

	<?php if($homeHeaderLink): ?>
		<div class="homepage-header-link">
			<div class="container large">
				<a href="<?php echo $homeHeaderLink['url']; ?>">
					<span><?php echo $homeHeaderLink['title']; ?></span>
					<?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/arrow.svg' ); ?>
				</a>
			</div>
		</div>
	<?php endif; ?>

	<img class="homepage-header-img" src="<?php echo $homeHeaderImg['url']; ?>" alt="<?php echo $homeHeaderImg['alt']; ?>" />
</div>

<div class="homepage-intro-text">
	<div class="container medium">
		<p class="subtitle"><?php echo $homeIntroSubtitle; ?></p>
		<p class="title"><?php echo $homeIntroTitle; ?></p>
	</div>
</div>

<div class="homepage-image-text">
	<div class="container medium">
		<div class="homepage-image-text-inner">
			<div class="homepage-image-text-image">
				<img src="<?php echo $homeImgTxtImg[url]; ?>" alt="<?php echo $homeImgTxtImg['alt']; ?>" />
			</div>
			<div class="homepage-image-text-content">
				<?php if ($homeImgTxtTitle): ?>
					<p class="title"><?php echo $homeImgTxtTitle; ?></p>
				<?php endif; ?>
				<?php if ($homeImgTxtText1): ?>
					<p class="text-1"><?php echo $homeImgTxtText1; ?></p>
				<?php endif; ?>
				<?php if ($homeImgTxtText2): ?>
					<p class="text-2"><?php echo $homeImgTxtText2; ?></p>
				<?php endif; ?>
				<?php if ($homeImgTxtLink['url']): ?>
					<a href="<?php echo $homeImgTxtLink['url']; ?>">
						<span><?php echo $homeImgTxtLink['title']; ?></span>
						<?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/arrow.svg' ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<div class="homepage-work-slider">
	<div class="container medium">
		<h3>Our Work</h3>
	</div>
	<div class="homepage-work-slider-inner">
		<?php $loop = new WP_Query(array('post_type' => 'work', 'posts_per_page' => 9)); ?>
			<?php $index = $wp_query->current_post + 1; ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); $count++; ?>
				<div>
					<a href="<?php echo get_the_permalink(); ?>">
						<p>Read</br>More</p>
						<span><?php echo '0' . $count; ?></span>
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" />
					</a>
				</div>
			<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>
