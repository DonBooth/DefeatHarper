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




// Load CHART Javascript (modified chartjs to add labels)
add_action( 'wp_enqueue_scripts', 'enqueue_and_register_my_scripts' );
function enqueue_and_register_my_scripts(){

    // Use `get_stylesheet_directroy_uri() if your script is inside your theme or child theme.
    wp_register_script( 'chartjs',  get_stylesheet_directory_uri().'/js/chart-new/ChartNew.js' );
   
    
    // Enqueue a script that has both jQuery (automatically registered by WordPress)
    wp_enqueue_script( 'chartjs',  get_stylesheet_directory_uri() . '/js/chart-new/ChartNew.js', array( 'jquery') );
   
}


// CHARTS - TEST!!!!!
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



// ===========================================================================================================================

//		LOGIN - remove Wordpress logo and replace with link to site.

// ===========================================================================================================================



add_filter('login_headerurl', 'my_login_url_local');
function my_login_url_local() {
	return get_bloginfo('url');
}

add_filter('login_headertitle', 'my_login_title_attr');
function my_login_title_attr() {
	return esc_attr(get_bloginfo('name'));
}

add_action('login_head', 'my_style_site_name');
function my_style_site_name() {
?>
	<style type="text/css">
	h1 a { font-family:"Lato","Helvetica Neue",Arial,sans-serif !important;
	font-size: 1.7em !important;
	width:auto; height:auto; 
	text-indent:0 !important; 
	font-weight: 300 !important;/* bold !important; */
	overflow:visible !important; 
	text-decoration:none; 
	color:#16a085 !important; 
	width:310px !important; display:block; margin:0; padding:0 10px; background:none !important; }
	h1 a:hover { color:#000; background:none; }
	h1 {   font-weight:bold !important; 
		text-align:center !important;  
		width:310px !important; 
		position:relative; right:-8px; 
		margin:0 0 1em 0; }
	input#wp-submit.button.button-primary.button-large{
		  background: #16a085 !important;
		  border-color: #109079 !important;
		  -webkit-box-shadow: inset 0 1px 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15);
		  box-shadow: inset 0 1px 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15);
	}
	p.message.register{
		border-left: 4px solid #16a085;
	}
	</style>
<?php
}



add_action( 'init', 'get_candidates' );

function get_candidates() {
	$theUrl = 'http://represent.opennorth.ca/boundaries/federal-electoral-districts-next-election/35006/candidates/';
     $response = wp_remote_get( $theUrl );//"https://represent.opennorth.ca/candidates/house-of-commons/?point=43.68013,-79.31627"
if ( is_wp_error( $response ) || 200 != wp_remote_retrieve_response_code( $response ) ) {
    return FALSE;
	  }
	
  $json = json_decode( wp_remote_retrieve_body( $response ),true );
	  //wp_cache_set( $path, $json, 'represent', strtotime( '+1 week' ) );
  // echo 'name '.$json['objects'][0]['name'].'<br><br>';
  // echo 'Party: '.$json['objects'][0]['party_name'].'<br><br>';
  // echo 'incumbent: '.$json['objects'][0]['incumbent'].'<br><br>';
  // echo 'url: '.$json['objects'][0]['personal_url'].'<br><br>';
  // echo 'picture url '.$json['objects'][0]['photo_url'].'<br><br>';
  
  echo 'Meta Data (number of candidates): '.$json['meta'][total_count].'<br><br>';
  
$elements = $json['meta'][total_count];
for ($i = 0; $i < $elements; $i++) 
{
	echo 'name '.$json['objects'][$i]['name'].'<br>';
  echo 'Party: '.$json['objects'][$i]['party_name'].'<br>';
  echo 'incumbent: '.$json['objects'][$i]['incumbent'].'<br>';
  echo 'url: '.$json['objects'][$i]['personal_url'].'<br>';
  echo 'picture url '.$json['objects'][$i]['photo_url'].'<br>';
  echo '================================================================<br>';
    
} 



  //var_dump($json);

  
}








// ===========================================================================================================================

//		NOTHING BELOW -  USED FOR SETUP ONLY

// ===========================================================================================================================


			

		function programmatically_create_post() {


			global $wpdb;
			 define('WP_DEBUG', true);
			



			$query = "SELECT riding_number, new_name FROM dh_ridings";
			$results = $wpdb->get_results($query,ARRAY_A);
			
			// echo 'results from db query.'. $results[0]['riding_number'].' '.$results[0]['new_name'].'<br>'; 
			$r = count($results);
			//wp_die('length of results'. $r);
			$statusArray = [];
			for($i=0; $i<$r; $i++)
			{
				//echo 'what we got from the database: ' . $results[$i]['riding_number'] .' '. $results[$i]['new_name'] . '<br>'; 
				// if( null == get_page_by_title( $title ) )
				// get_page_by_title( $page_title, $output, $post_type ); //$output default is OBJECT, $post_type is page
				if( null == get_page_by_title( $results[$i]['new_name'] ) )
				{

					//wp_die('this page does NOT exist: '. $results[$i]['new_name']);

					$args = array(
	  
					  'post_content'   => 'my post content' , // The full text of the post.
					  'post_name'      => $results[$i]['riding_number'], // The name (slug) for your post
					  'post_title'     => $results[$i]['new_name'] , // The title of your post.
					  'post_status'    =>   'pending' , // Default 'draft'.
					  'post_type'      => 'page' , // Default 'post'.
					 
					  
					  'post_excerpt'   =>  $results[$i]['new_name']  , // For all your post excerpt needs.
					  
					  'comment_status' =>  'open' , // Default is the option 'default_comment_status', or 'closed'.
					 
					  
					  'page_template'  =>  'dh_riding_page_template.php'  // Requires name of template file, eg template.php. Default empty.
					);  



					$postStatus = wp_insert_post( $args, true );
					array_push($statusArray, $postStatus);
					
				}
				else
				{
					print_r($statusArray);
					wp_die('the page already exists: '. $results[$i]['new_name'].' '.$results[$i]['riding_number']);
				}


			}
			
			

			
			print_r($statusArray);
			wp_die('this is the end. done once, I hope.'.$i);
		}

		//add_filter( 'after_setup_theme', 'programmatically_create_post' );



// ===========================================================================================================================
//   =======> code below is for migrating data.  DANGER!  Danger!!!

function programmatically_publish_post()
{
	global $wpdb;
	$r = 6 + 338; //first post to change + number or ridings.
	for($i=0; $i<$r; $i++)
	{
		$post = get_post( $i ); 
		//if ( ! $post = get_post( $post ) ) return;

		//if ( 'publish' == $post->post_status ) return;
			
		$wpdb->update( $wpdb->posts, array( 'post_status' => 'publish' ), array( 'ID' => $post->ID ) );

		clean_post_cache( $post->ID );
			
		$old_status = $post->post_status;
		$post->post_status = 'publish';
		wp_transition_post_status( 'publish', $old_status, $post );
	}
	
	wp_die('status of last post: '. $post->post_status);
}
//add_filter( 'after_setup_theme', 'programmatically_publish_post' );



//============================================================================================================================================


//   =======> code below is for migrating data.  DANGER!  Danger!!!

	

function migrate_db_to_ridings_custom_post_type() {
/* EXAMPLE DB ENTRY NOTE SPELLING

array ( 'id' => '2', 
	'riding_number' => '10001', 
	'boundry_change' => 'redistricted', 
	'new_name' => 'Avalon', 
	'province' => 'Newfoundland and Labrador', 
	'short_recommendation' => 'This could be a close race ', 
	'anaylsis1' => 'This riding has the same name but keeps only some of its previous character. Avalon voted Liberal in 2011, but a large Liberal-leaning portion has been moved to Bonavista-Burin-Trinity, and a large NDP-leaning portion fr
	om St. John\'s East has been added to the riding. This gives the Conservatives a theoretical advantage in this riding
	, based on previous voting patterns. However, much will depend on who the candidates will be
	. Scott Andrews, who was elected as a Liberal but sat as an independent for some of the term, has announced his retirement from politics. Yvonne Jones, who won the by-election in Labrador when Peter Panashue was forced to step down, is running for the Liberals in Avalon this time. The other parties have not yet announced their candidates.', 

	'anaylsis2' => '', 
	'anaylsis3' => '', 
	'link_to_survey' => '', 
	'conservative' => '13214', 
	'liberal' => '11820', 
	'ndp' => '10164', 
	'green' => '226', 
	'bq' => '0', 
	'other' => '201', 
	'con_over_lib' => '1394', 
	'con_over_ndp' => '3050', 
	'total_votes' => '35625', 
	'lib+ndp+grn' => '22210', 
	'precent_opposition' => '62', 
	'if_in_session_now' => 'Tory', 
	'margin_of_victory' => '1394', 
	'total_vote' => '35625', 
	'(margin_of_victory_as_percent_of_total_votes_cast' => '3.91298', )
*/


	global $wpdb;
	global $query; 
	define('WP_DEBUG', true);

	// $mapping = array(
	// 	'riding_number'=>'riding-number',
	// 	'boundary_change'=>'boundary-change',
	// 	'new_name'=>'post_title',
	// 	'riding_number'=>'riding-number',
	

	// );

	// if(!isset($_GET['migrate']) || $_GET['migrate'] != 1){
	// 	return;
	// }

	$query = "SELECT * FROM temp_stats ";//limit 1
	$results = $wpdb->get_results($query,ARRAY_A);

	//echo 'the array with stats in it: <br>';
	

	//print_r($results);
	//wp_die();
	


	//foreach($results as $db_entry)
	for($i=0;$i<338;$i++)
	{


	$myrows = $wpdb->get_results( "SELECT post_name, post_type, ID FROM wp_posts WHERE post_name = '". $results[$i]['riding_number'] ."' AND post_type = 'riding'");
	foreach ( $myrows as $myrow ) 
	{
		update_post_meta($myrow->ID, 'wpcf-votes-cast', $results[$i]['votes']);
		update_post_meta($myrow->ID, 'wpcf-electors-in-riding', $results[$i]['electors']);
		
	    //echo 'Post Type: ' . $myrow->post_type . ' Post ID: ' . $myrow->ID.  'riding number: ' . $results[0]['riding_number'].' electors: '.$results[0]['electors']. '  votes: '.$results[0]['votes']. '<br>';
		//wp_die('electors: '.$db_entry['electors'].'votes cast: '.$db_entry['votes']);

	}


		//echo 'what we got from the database: ' . $results[$i]['riding_number'] .' '. $results[$i]['new_name'] . '<br>'; 
		// if( null == get_page_by_title( $title ) )
		// get_page_by_title( $page_title, $output, $post_type ); //$output default is OBJECT, $post_type is page
			//var_export($db_entry);



			// $args = array(

			//   'post_content'   => $db_entry['anaylsis1'] , // The full text of the post.
			//   'post_name'      => $db_entry['riding_number'], // The name (slug) for your post
			//   'post_title'     => $db_entry['new_name'] , // The title of your post.
			//   'post_status'    => 'publish' , // Default 'draft'.
			//   'post_type'      => 'riding' , // Default 'post'.
			//   'post_excerpt'   =>  $db_entry['new_name']  , // For all your post excerpt needs.
			  
			//   'comment_status' =>  'open' , // Default is the option 'default_comment_status', or 'closed'.
			 
			  
			//   'page_template'  =>  'dh_riding_page_template.php'  // Requires name of template file, eg template.php. Default empty.
			// );  



			//var_dump ($args);
			

			

			// ===> to create a new post.
			//$post_id = wp_insert_post( $args );

		
			// if(!$post_id){
			// 	wp_die('Failed to create post for ' . $db_entry['new_name']);
			// }

			// update_post_meta($post_id, 'wpcf-votes-cast', $db_entry['votes']);
			// update_post_meta($post_id, 'wpcf-electors-in-riding', $db_entry['electors']);
			// wp_die('electors: '.$db_entry['electors'].'votes cast: '.$db_entry['votes']);

			// update_post_meta($post_id, 'wpcf-riding-number', $db_entry['riding_number'], true);// ***>> store only one value or one array. false for storing multiple values
			// //echo 'added meta<br>';
			// update_post_meta($post_id, 'wpcf-boundary-change', $db_entry['boundry_change'], true);
			// //echo 'added meta<br>';
			// update_post_meta($post_id, 'wpcf-province', $db_entry['province'], true);
			// //echo 'added meta<br>';
			// update_post_meta($post_id, 'wpcf-header-recommendation', $db_entry['short_recommendation'], true);
			// //echo 'added meta<br>';
			// update_post_meta($post_id, 'wpcf-conservative', $db_entry['conservative'], true);
			// //echo 'added meta<br>';
			// update_post_meta($post_id, 'wpcf-liberal', $db_entry['liberal'], true);
			// //echo 'added meta<br>';
			// update_post_meta($post_id, 'wpcf-ndp', $db_entry['ndp'], true);
			// //echo 'added meta<br>';
			// update_post_meta($post_id, 'wpcf-green', $db_entry['green'], true);
			// //echo 'added meta<br>';
			// update_post_meta($post_id, 'wpcf-bloc', $db_entry['bq'], true);
			// //echo 'added meta<br>';
			// update_post_meta($post_id, 'wpcf-other', $db_entry['other'], true);
			// //echo 'added meta<br>';
			// update_post_meta($post_id, 'wpcf-if-in-session-now', $db_entry['if_in_session_now'], true);
			// //echo 'added meta<br>';
			


			//array_push($statusArray, $postStatus);
			//wp_update_post_meta($post_id, 'r');
			
		// {
		// 	print_r($statusArray);
		// 	wp_die('the page already exists: '. $db_entry['new_name'].' '.$db_entry['riding_number']);
		// }

		

	}
				
			
	exit('Migration done!');
			
	print_r($statusArray);
	wp_die('this is the end. done once, I hope.'.$i);
}

//add_action( 'init', 'migrate_db_to_ridings_custom_post_type' );




/**
* Retrieve a post given its title.
*
* @uses $wpdb
*
* @param string $post_title Page title
* @param string $post_type post type ('post','page','any custom type')
* @param string $output Optional. Output type. OBJECT, ARRAY_N, or ARRAY_A.
* @return mixed
*/
function get_post_by_title($the_slug = '10001') {
	global $wpdb;
	//$the_slug = '10002'; // <-- edit it
	$myrows = $wpdb->get_results( "SELECT post_name, post_type, ID FROM wp_posts WHERE post_name = '". $the_slug ."' AND post_type = 'riding'");
	foreach ( $myrows as $myrow ) 
	{
	    echo 'Post Type: ' . $myrow->post_type . ' Post ID: ' . $myrow->ID;
	}
	return $myrow->ID;
	
}
//add_action( 'init', 'get_post_by_title' );