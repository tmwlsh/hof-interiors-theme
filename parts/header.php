<header class="header">
	<div class="container large">
		<div class="header-inner">
			<div class="header-left">
				<a class="header-logo" href="<?php echo home_url(); ?>"><?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/main-logo.svg' ); ?></a>
				<nav><?php wp_nav_menu( array( 'container_class' => 'primary-nav', 'theme_location' => 'header-menu' ) ); ?></nav>
			</div>
			<div class="header-right">
				<div class="header-hamb">
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
				</div>
				<a class="header-contact-cta" href="#">
					<span>Get in touch</span>
					<?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/arrow.svg' ); ?>
				</a>
			</div>
		</div>
	</div>
</header>
