<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================

	Sets wordpress test cookie

	======================================================================================================================== */

	setcookie(TEST_COOKIE, 'WP Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN);
	if ( SITECOOKIEPATH != COOKIEPATH ) setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);

	/* ========================================================================================================================

	Required external files

	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================

	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme

	======================================================================================================================== */

	/*
	* @brief Remove WP admin menu items from left nav
	* @param
	* @return
	*/
	function remove_menus(){
	  //remove_menu_page( 'index.php' );                  //Dashboard
	  //remove_menu_page( 'jetpack' );                    //Jetpack*
	  //remove_menu_page( 'edit.php' );                   //Posts
	  //remove_menu_page( 'upload.php' );                 //Media
	  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
	  //remove_menu_page( 'edit-comments.php' );          //Comments
	  //remove_menu_page( 'themes.php' );                 //Appearance
	  //remove_menu_page( 'plugins.php' );                //Plugins
	  //remove_menu_page( 'users.php' );                  //Users
	  //remove_menu_page( 'tools.php' );                  //Tools
	  //remove_menu_page( 'options-general.php' );        //Settings

	}
	add_action( 'admin_menu', 'remove_menus' );

	// options page
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page();
	}

	/*
	* @brief Hide the text editor on certain pages/posts
	* @param
	* @return
	*/
	function hide_editor() {
	  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	  if( !isset( $post_id ) ) return;
	  if($post_id == 8){
	    //remove_post_type_support('page', 'editor');
	  }
	}
	add_action( 'admin_init', 'hide_editor' );


	/*
	* @brief Register menus for use in theme
	* @param
	* @return
	*/
	function register_my_menus() {
	  register_nav_menus(
	    array(
	      'header-menu' => __( 'Header Menu' ),
	      'footer-menu' => __( 'Footer Menu' )
	    )
	  );
	}
	add_action( 'init', 'register_my_menus' );


	/*
	* @brief Add custom image sizes to be generated on image upload
	* @param
	* @return
	*/
	add_image_size( 'small-thumb', 180, 180, array( 'left', 'top' ) );


	/* ========================================================================================================================

	Actions and Filters

	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	add_filter('pre_get_posts', 'amend_query');
	add_filter('wp_nav_menu_objects', 'add_first_and_last');
	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );
	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );


	/*
	* @brief Amend WP query before render
	* @param the WP query
	* @return the query
	*/
	function amend_query($query){
	   if( is_tax() ) {
		   $query->set('posts_per_page', -1);
	   }
	    return $query;
	}


	/*
	* @brief Add classes to first and last menu itms
	* @param items
	* @return items with added classes
	*/
	function add_first_and_last($items) {
	  $items[1]->classes[] = 'first-menu-item';
	  $items[count($items)]->classes[] = 'last-menu-item';
	  return $items;
	}


	/*
	* @brief Custom styles to be added to WYSIWYG editor
	* @param setup array
	* @return Array of included styles
	*/
	function my_mce_before_init_insert_formats( $init_array ) {
		$style_formats = array(
			array(
				'title' => 'Call To Action Button',
				'inline' => 'a',
				'classes' => 'btn',
			)
		);
		$init_array['style_formats'] = json_encode( $style_formats );
		return $init_array;
	}
	add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

	/* ========================================================================================================================

	Custom Post Types - include custom post types and taxonimies here e.g.

	======================================================================================================================== */

	require_once( 'custom-post-types/services.php' );
	require_once( 'custom-post-types/work.php' );

	/* ========================================================================================================================

	Scripts

	======================================================================================================================== */

	/*
	* @brief Inject or remove JS source into template header or footer
	* @param
	* @return <script> tag
	*/
	function starkers_script_enqueuer() {
		wp_deregister_script( 'wp-embed' );
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, NULL, true );
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'plugins', get_stylesheet_directory_uri() . '/js/plugins.min.js', false, NULL, true );
		wp_enqueue_script( 'plugins' );
		wp_register_script( 'site', get_stylesheet_directory_uri() . '/js/site.min.js', false, NULL, true );
		wp_enqueue_script( 'site' );
	}


	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );


	/* ========================================================================================================================

	Pagination

	======================================================================================================================== */

	/*
	* @brief Adds pagination support for $queries
	* @param
	* @return pagination html
	*/
	function wt_pagination() {
		global $wp_query;
		$big = 999999999; // This needs to be an unlikely integer
		$paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
		    'current' => max( 1, get_query_var('paged') ),
		    'total' => $wp_query->max_num_pages,
		     'mid_size' => 5
		) );
        if ( $paginate_links ) {
            echo '<div class="pagination">';
            echo $paginate_links;
            echo '</div><!--// end .pagination -->';
        }
	}
