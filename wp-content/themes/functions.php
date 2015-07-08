<?php
/**
 * Theme: Flat Bootstrap Child
 * 
 * Functions file for child theme. If you want to make a lot more changes than what is
 * included here, consider downloading the Flat Bootstrap Developer child theme. It 
 * shows how to do more complex function overrides, like choosing more theme features to
 * include or exclude, loading up custom CSS or javascript, etc.
 *
 * @package flat-bootstrap-child
 */
 
/**
 * SET THEME OPTIONS HERE
 *
 * Theme options can be overriden here. These are all set the same defaults as in the 
 * parent theme, but listed here so you can easily change them. Just uncomment (remove
 * the //) from any lines that you change.
 * 
 * Parameters:
/**
 * Theme options. Can override in child theme. For theme developers, this is array so 
 * you can add these items to the customizer and store them all as a single options entry.
 * 
 * Parameters:
 * background_color - Hex code for default background color without the #. eg) ffffff
 * 
 * content_width - Only for determining "full width" image. Actual width in Bootstrap.css
 * 		is 1170 for screens over 1200px resolution, otherwise 970.
 * 
 * embed_video_width - Sets the maximum width of videos that use the <embed> tag. The
 * 		default is 1170 to handle full-width page templates. If you will ALWAYS display
 * 		the sidebar, can set to 600 for better performance.
 * 
 * embed_video_height - Leave empty to automatically set at a 16:9 ratio to the width
 * 
 * post_formats - Array of WordPress extra post formats. i.e. aside, image, video, quote,
 * 		and/or link
 * 
 * touch_support - Whether to load touch support for carousels (sliders)
 * 
 * fontawesome - Whether to load font-awesome font set or not
 * 
 * bootstrap_gradients - Whether to load Bootstrap "theme" CSS for gradients
 * 
 * navbar_classes - One or more of navbar-default, navbar-inverse, navbar-fixed-top, etc.
 * 
 * custom_header_location - If 'header', displays the custom header above the navbar. If
 * 		'content-header', displays it below the navbar in place of the colored content-
 *		header section.
 * 
 * image_keyboard_nav - Whether to load javascript for using the keyboard to navigate
 *		image attachment pages
 * 
 * sample_widgets - Whether to display sample widgets in the footer and page-bottom widet
 *		areas.
 * 
 * sample_footer_menu - Whether to display sample footer menu with Top and Home links
 * 
 * testimonials - Whether to activate testimonials custom post type if Jetpack plugin is active
 *
 * NOTE: $theme_options is being deprecated and replaced with $xsbf_theme_options. You'll
 * need to update your child themes.
 */
$xsbf_theme_options = array(
	//'background_color' 		=> 'f2f2f2',
	//'content_width' 			=> 1170,
	//'embed_video_width' 		=> 1170,
	//'embed_video_height' 		=> null, // i.e. calculate it automatically
	//'post_formats' 			=> null,
	//'touch_support' 			=> true,
	'fontawesome' 			=> true,
	//'bootstrap_gradients' 	=> false,
	//'navbar_classes'			=> 'navbar-default navbar-static-top',
	//'custom_header_location' 	=> 'header',
	//'image_keyboard_nav' 		=> true,
	//'sample_widgets' 			=> true, // for possible future use
	//'sample_footer_menu'		=> true,
	//'testimonials'			=> true
);

/*
 * OVERRIDE THE SITE CREDITS TO GET RID OF THE "THEME BY XTREMELYSOCIAL" AND JUST LEAVE
 * COPYRIGHT YOUR SITE NAME
 * 
 * You can hard-code whatever you want in here, but its better to have this function pull
 * the current year and site name and URL as shown below.
 */
add_filter('xsbf_credits', 'xsbf_child_credits'); 
function xsbf_child_credits ( $site_credits ) {
		
	$theme = wp_get_theme();
	$site_credits = sprintf( __( '&copy; %1$s %2$s', 'xtremelysocial' ), 
		date ( 'Y' ),
		'<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a>'
	);
	return $site_credits;
}


// ===========================================================================================================================


// Load CHART Javascript (modified chartjs to add labels)
add_action( 'wp_enqueue_scripts', 'enqueue_and_register_my_scripts' );
function enqueue_and_register_my_scripts(){

    // Use `get_stylesheet_directroy_uri() if your script is inside your theme or child theme.
    wp_register_script( 'chartjs',  get_stylesheet_directory_uri().'/js/chart-new/ChartNew.js' );
   
    
    // Enqueue a script that has both jQuery (automatically registered by WordPress)
    wp_enqueue_script( 'chartjs',  get_stylesheet_directory_uri() . '/js/chart-new/ChartNew.js', array( 'jquery') );
   
}


// CHARTS - HOME PAGE!!!!!
add_action( 'wp_enqueue_scripts', 'enqueue_and_register_home_page' );
function enqueue_and_register_home_page(){
	if(is_page_template('homepage-defeatharper.php'))
	{
    // Use `get_stylesheet_directroy_uri() if your script is inside your theme or child theme.
    wp_register_script( 'responsive-test',  get_stylesheet_directory_uri().'/js/homepage-charts.js' );

    
    // Enqueue a script that has both jQuery (automatically registered by WordPress)
    wp_enqueue_script( 'responsive-test',  get_stylesheet_directory_uri() . '/js/homepage-charts.js', array( 'chartjs'), false, true);
    }
}




// ******************************************************************************************************
// ******************************************************************************************************

//		Find your riding

// ******************************************************************************************************
// ******************************************************************************************************

//add_action('wp_enqueue_scripts', 'enqueue_and_register_find_your_riding');
function enqueue_and_register_find_your_riding()
{

		
		wp_register_script('findyourrep_pack',get_stylesheet_directory_uri() .'/js/findYourRep/jquery.findyourrep-pack.min.js', array( 'jquery'),false,true);
		wp_register_script('findyourrep_ca',get_stylesheet_directory_uri() .'/js/findYourRep/jquery.findyourrep.ca.min.js', array( 'jquery','findyourrep_pack'),false,true);
		wp_register_script('callFindYourRep',get_stylesheet_directory_uri() .'/js/findYourRep/callFindYourRep.js', array( 'jquery','findyourrep_pack','findyourrep_ca'),false,true);

		wp_enqueue_script('findyourrep_pack',get_stylesheet_directory_uri() .'/js/findYourRep/jquery.findyourrep-pack.min.js');
		wp_enqueue_script('findyourrep_ca',get_stylesheet_directory_uri() .'/js/findYourRep/jquery.findyourrep.ca.min.js');
		wp_enqueue_script('callFindYourRep',get_stylesheet_directory_uri() .'/js/findYourRep/callFindYourRep.js');
	
}






// ******************************************************************************************************
/*
*				GOOGLE API     AND    REVERSE LOOKUP
*/
// ******************************************************************************************************



//   GOOGLE apis - google lookup
add_action( 'wp_enqueue_scripts', 'google_reverse_lookup_scripts' );
function google_reverse_lookup_scripts(){

	if(is_page_template('homepage-defeatharper.php'))
	{
	//wp_register_script( 'maps_api',  'https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places' , array( 'jquery'));
	wp_register_script( 'maps_api',  'https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places' , array( 'jquery'),false,true);
    //toggle If 600 People voted differently...
     wp_enqueue_script( 'maps_api');
     }
}

add_action( 'wp_enqueue_scripts', 'maps_api_style' );
function maps_api_style() {
	if(is_page_template('homepage-defeatharper.php'))
	{
	wp_enqueue_style( 'maps_api_style', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500' );
	}
}

//add_action('wp_enqueue_scripts', 'reverselookup');
function reverselookup()
{
	if(is_page_template('homepage-defeatharper.php'))
	{
	wp_register_script('reverse_lookup', get_stylesheet_directory_uri().'/js/reverse-lookup.js',array( 'jquery','findyourrep_pack','findyourrep_ca'));
  	wp_enqueue_script('reverse_lookup');
   	}
}

// ******************************************************************************************************
/*
*				REPRESENT NORTH  	FIND YOUR REPRESENTATIVE (TO BE MODIFIED)
*/
// ******************************************************************************************************

add_action('wp_enqueue_scripts', 'representNorthFindRepDemo');
function representNorthFindRepDemo()
{
	if(is_page_template('homepage-defeatharper.php'))https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js
	{
	//wp_register_script('underscore','https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js',array('jquery'), false, true);
  	//wp_enqueue_script('underscore');
  	
  	wp_register_script('leaflet','https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js',array('jquery','underscore'), false, true);
  	wp_enqueue_script('leaflet');

  	//wp_register_script('imagesLoaded',get_stylesheet_directory_uri().'/js/imagesloaded.pkgd.min.js',array('jquery','underscore','leaflet'), false, true);
  	//wp_enqueue_script('imagesLoaded');

	wp_register_script('repNorthFindRep', get_stylesheet_directory_uri().'/js/representNorthFindRepDemo.js',array('jquery','maps_api', 'leaflet'), false, true );//,,'underscore','leaflet','imagesLoaded' false, true);
  	wp_enqueue_script('repNorthFindRep');

  	// styles
	wp_register_style( 'repNorthFindRepStyle' , get_stylesheet_directory_uri().'/css/representNorthFindRepDemo.css' );
    wp_enqueue_style( 'repNorthFindRepStyle' );



   	}
}


//add_action( 'init', 'get_candidates' );

function get_candidates() {
     $response = wp_remote_get( "https://represent.opennorth.ca/candidates/house-of-commons/?point=43.68013,-79.31627" );
if ( is_wp_error( $response ) || 200 != wp_remote_retrieve_response_code( $response ) ) {
    return FALSE;
	  }
	
  $json = json_decode( wp_remote_retrieve_body( $response ) );
	  //wp_cache_set( $path, $json, 'represent', strtotime( '+1 week' ) );
  var_dump($json);

  
}












