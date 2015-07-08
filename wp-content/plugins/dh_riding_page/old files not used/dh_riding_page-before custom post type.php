<?php
/*
Plugin Name: DH Riding Page
Plugin URI: 
Description: process database information about a single riding to be displayed on the riding page in the template called dh_riding_page-nosidebar-noheader.php
Version: 1.0
Author: Don Booth
Author URI: http://www.donbooth.ca
License: GPL2
*/
/*
Copyright 2015  Don Booth  (email : donbooth@rogers.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(!class_exists('DH_Riding_Page'))
{
	global $hits;

	global $theGlobalRidingNumber;
	global $theRidingName;
	

	class DH_Riding_page
	{
		private static $_instance;


		public $myRiding;  // the riding object
		public $theRidingNumber;
		public $ridingErrorMessage; //only returned if there is an error
		

		public $totalVote;
		public $partyResults = []; 
		public $partyKeys;// keys to find results and also a list of parties sorted by results.
		public $winningMargin; 
		public $secondPlaceMargin; 
		public $thirdPlaceMargin; 
		public $winningMarginPercent;
		public $shortRecomendation;
		public $pieChartCaption;
		public $analysis2;// = 'temp value - variable on the class';


		public static function get_instance() {
		    if ( ! isset( self::$_instance ) ) {
		      self::$_instance = new self;
		    }
		    return self::$_instance;
		  }

//Read more at http://hardcorewp.com/2013/initializing-singleton-classes-used-in-wordpress-plugins/#5Eur1ZqEdBet58Ug.99

		/**
		 * Construct the plugin object
		 */
		private function __construct()
		{
			if ( ! isset( self::$_instance ) ) {
				//$this->init();
		      //add_action( 'parse_query', array( $this, 'get_wp_query' ),1000 );
				add_action( 'wp', array($this, 'init'), 1000);
		    }
			
		}

		public function init()
		{
			$this->findRidingNumber();
			// global $theGlobalRidingNumber;
			
			// $this->theRidingNumber = $this->validateQueryObject($wpquery);
			// $theGlobalRidingNumber = $this->theRidingNumber;
			// $this->myRiding = $this->createTheRidingObject($this->theRidingNumber);
			

			//  $this->partyResults = $this->sortResults($this->myRiding);
			//  $this->partyKeys = $this->returnPartyKeys($this->partyResults);// keys to find results and also a list of parties sorted by results.
			//  $this->totalVote = $this->myRiding->liberal + $this->myRiding->conservative + $this->myRiding->ndp + $this->myRiding->bq + $this->myRiding->other + $this->myRiding->green;
			
			//  $this->winningMargin = $this->winMargin($this->partyResults, $this->partyKeys);

			//  $this->secondPlaceMargin = $this->secondMargin($this->partyResults, $this->partyKeys);
			//  $this->thirdPlaceMargin = $this->thirdMargin($this->partyResults, $this->partyKeys);
			//  $this->winningMarginPercent = $this->winningMargin / $this->myRiding->total_vote;//round ( float $val [, int $precision = 0 [, int $mode = PHP_ROUND_HALF_UP ]] )
		
			//  $this->winningMarginPercent = 100 * (round($this->winningMarginPercent,3,PHP_ROUND_HALF_UP));

			

			//  $this->shortRecomendation = $this->findShortRecomendation();
			//  $this->pieChartCaption = $this->pieChartCaption();
			
			//  $this->analysis2 = $this->secondAnalysis();


			// // ONLY after the page is complete.
			
			// $this->passVoteResultsByParty(); // injected on the page for javascript
			
		}

		private function findRidingNumber()
		{
			global $post;
			// // gets you the path after http://www.yourdomain.com
			// $path = $_SERVER["REQUEST_URI"];

			// $current_url = explode("/", $path);

			// $elements = count($current_url);
			// --$elements;
			// if(strlen($current_url[$elements]) !== 5)
			// {
			// 	--$elements;
			// }
			
			 

			$ridingNumber = get_post_meta($post->ID, 'wpcf-riding-number', true);//$current_url[$elements];
			$this->validateRidingNumber($ridingNumber);

		}


		private function assemblePage($ridingNumber)
		{

			global $theGlobalRidingNumber;
			
			$this->theRidingNumber = $ridingNumber;
			$theGlobalRidingNumber = $this->theRidingNumber;
			$this->myRiding = $this->createTheRidingObject($this->theRidingNumber);
			

			 $this->partyResults = $this->sortResults($this->myRiding);
			 $this->partyKeys = $this->returnPartyKeys($this->partyResults);// keys to find results and also a list of parties sorted by results.
			 $this->totalVote = $this->myRiding->liberal + $this->myRiding->conservative + $this->myRiding->ndp + $this->myRiding->bq + $this->myRiding->other + $this->myRiding->green;
			
			 $this->winningMargin = $this->winMargin($this->partyResults, $this->partyKeys);

			 $this->secondPlaceMargin = $this->secondMargin($this->partyResults, $this->partyKeys);
			 $this->thirdPlaceMargin = $this->thirdMargin($this->partyResults, $this->partyKeys);
			 $this->winningMarginPercent = $this->winningMargin / $this->myRiding->total_vote;//round ( float $val [, int $precision = 0 [, int $mode = PHP_ROUND_HALF_UP ]] )
		
			 $this->winningMarginPercent = 100 * (round($this->winningMarginPercent,3,PHP_ROUND_HALF_UP));

			

			 $this->shortRecomendation = $this->findShortRecomendation();
			 $this->pieChartCaption = $this->pieChartCaption();
			
			 $this->analysis2 = $this->secondAnalysis();


			// ONLY after the page is complete.
			
			$this->passVoteResultsByParty(); // injected on the page for javascript
		}

		// public function get_wp_query()
		// {
			
		// 	global $wp_query;
			

		// 	if( is_page( 'riding' ) )
		// 	{
				
		// 		if(!isset($this->the_wpquery) )
		// 		{
				
		// 			$this->init($wp_query);
		// 		}
		// 	}
		// 	else
		// 	{
		// 		return; // wrong page.
		// 	}
			
			
		// }
// **************************************************************************************************************

		private function validateRidingNumber($ridingNumber)
		{

			
				$ridingNumber = (int)$ridingNumber;


				if($ridingNumber > 10000 && $ridingNumber < 62002)
				{

					
					$this->assemblePage($ridingNumber);
					
				}
				else
				{
					//$this->throwError('Cannot find that riding - riding number is wrong');
				}

				
				
			
		}

		private function createTheRidingObject($theRidingNumber)
		{
			$theRidingNumber = (int)$theRidingNumber;

			global $wpdb;
			//prepare the query:
			$query = "SELECT * FROM dh_ridings WHERE riding_number = %d";
			$myRiding = $wpdb->get_row($wpdb->prepare($query,$theRidingNumber));
			$this->validateTheRidingObject($myRiding); 
			
			return $myRiding;	
		}

		private function validateTheRidingObject($myRiding)
		{
			if(empty($myRiding))
			{
				$this->throwError('Cannot find that riding - object did not validate');
			}


		}

		
// **************************************************************************************************************

		private function findShortRecomendation( )
		{
			// Manual override.
			if( strlen ( $this->myRiding->short_recommendation ) > 3  )
			{
				return $this->myRiding->short_recommendation;
			}


			// LEANING - The winning margin is over 40%

			// 3 WAY RACE - NO margin over 40% and none less than 25%

			//	2 WAY RACE - difference between top 2 is 10% or less

			$winningPercent = $this->partyResults[$this->partyKeys[0]] / $this->totalVote;

			$secondPercent = $this->partyResults[$this->partyKeys[1]] / $this->totalVote;
			
			$thirdPercent = $this->partyResults[$this->partyKeys[2]] / $this->totalVote;
			

			switch ($this->winningMargin) {
				case ($winningPercent >= 0.4):
					$i = 1;
					break;
				case ($winningPercent < 0.4 && $secondPercent > 0.25 && $thirdPercent > 0.25):
					$i = 2;
					break;
				case ($winningPercent < 0.4 && $secondPercent > 0.25):
					$i = 3;
					break;
				
				default:
					$i = 4;
					break;
			}


			

			global $wpdb;
			$wpdb->flush();
			//prepare the query:
			$myquery = "SELECT * FROM dh_rough_predicitons WHERE id = %d";
			$myShortPrediction = $wpdb->get_row($wpdb->prepare($myquery,$i));

			
			$myPrediction = $myShortPrediction->prediciton;

			if($i === 1)
			{
				$string = $this->myRiding->new_name  . ' ' . $myPrediction . ' ' . $this->partyKeys[0];
			}
			elseif ($i === 2) 
			{
				$string = $this->myRiding->new_name . ' ' .  $myPrediction . ' ' . $this->partyKeys[0] . ' ' . $this->partyKeys[1] . ' ' . $this->partyKeys[2];
			}
			elseif ($i === 3) 
			{
				$string = $this->myRiding->new_name . ' ' .  $myPrediction . ' ' . $this->partyKeys[0] . ' and ' . $this->partyKeys[1] ;
			}
			else
			{
				$string = 'We do not see a clear trend in this riding.';
			}
			
			return $string ;	

		
			// return $myShortPrediction;	
		}

		private function upperCasePartyNames()
		{
				//$this->partyKeys
				for($i=0; $i < count($this->partyKeys); $i++)
				{
					if($this->partyKeys[$i] === 'ndp')
					{
						$this->partyKeys[$i] = 'NDP';
					}
					ucwords ( $this->partyKeys[$i] );
				}

		}


// **************************************************************************************************************
/**
*    if there is A Second Analysis.
*/ 	
// **************************************************************************************************************
private function secondAnalysis()
{

	
	return $this->myRiding->anaylsis2;

	

}



/**
* assemble caption for pie chart.
*/ 	

	private function pieChartCaption()
	{
		
		$quebec = '';
		if($this->myRiding->province === 'Quebec') 
		{
			$quebec = 'Bloc,';
		} 
		
		$string = 'Based on voting patterns in 2011, this riding has  ';


		//if Conservative win
		if($this->partyKeys[0] === 'conservative')
		{
			$margin = $this->myRiding->liberal + $this->myRiding->ndp + $this->myRiding->bq + $this->myRiding->green;
			
			$margin = $margin / $this->myRiding->total_vote;
			
			

			switch ($margin) {
				case ($margin < 0.3):
					$margin = 'a small minority';
					break;
				case ($margin < 0.39):
					$margin = 'a minority';
					break;
				case ($margin < 0.50):
					$margin = 'nearly half';
					break;
				case ($margin < 0.57):
					$margin = 'over half';
					break;
				case ($margin < 0.69):
					$margin = 'the majority';
					break;
				case ($margin < 100):
					$margin = 'the vast majority';
					break;
				
			}
			
			$string = 'In 2011, '.$margin.' of voters in the '. $this->myRiding->boundryChange .' riding of '.$this->myRiding->new_name.' voted NDP, Liberal, '.$quebec.' or Green.';

			
		}
		else //if non-Conservative win
		{

			$margin = $this->myRiding->liberal + $this->myRiding->ndp + $this->myRiding->bq + $this->myRiding->green;
			
			$margin = $margin / $this->myRiding->total_vote;
			
			

			switch ($margin) {
				case ($margin < 0.5):
					$margin = 'the greatest number';
					break;
				case ($margin < 0.59):
					$margin = 'the majority';
					break;
				case ($margin < 0.52):
					$margin = 'the greatest number';
					break;
				case ($margin < 0.57):
					$margin = 'over half';
				default:
				$margin = 'the vast majority';
					break;
				
			}
			
			
			$string = 'In 2011, '.$margin.' of voters in the '. $this->myRiding->boundryChange .' riding of '.$this->myRiding->new_name.' voted NDP, Liberal, '.$quebec.' or Green. ';

			
			
		}

		if($this->myRiding->boundry_change === 'redistricted')
		{
			$string = $string . '<br>The boundries of '.$this->myRiding->new_name.' have changed. These results reflect the new boundries.';
		}
		elseif ($this->myRiding->boundry_change === 'new')
		{
			$string = $string . '<br>The riding of '.$this->myRiding->new_name.' is new. <br>It is composed of parts of neighbouring ridings.';
		}

	

		return $string;


		
	}











// **************************************************************************************************************

		//  ==> Organize the Election Results by Parties
		private function sortResults($myRiding)
		{
			
			$partyResults['conservative'] = $myRiding->conservative;
			$partyResults['liberal'] = $myRiding->liberal;
			$partyResults['ndp'] = $myRiding->ndp;
			$partyResults['green'] = $myRiding->green;
			$partyResults['bq'] = $myRiding->bq;
			$partyResults['other'] = $myRiding->other;
			arsort($partyResults);

			return $partyResults;
			
		}

		// keys to find results and also a list of parties sorted by results.
		private function returnPartyKeys($partyResults)
		{
			return $partyKeys = array_keys($partyResults);
		}

		private function winMargin($partyResults, $partyKeys)
		{
			return $partyResults[$partyKeys[0]] - $partyResults[$partyKeys[1]];

		}
		
		private function secondMargin($partyResults, $partyKeys)
		{
			return ( $partyResults[$partyKeys[0]] - $partyResults[$partyKeys[2]] ) / $this->totalVote;
		}

		private function thirdMargin($partyResults, $partyKeys)
		{
			return ( $partyResults[$partyKeys[0]] - $partyResults[$partyKeys[3]] ) / $this->totalVote;
		}


// **************************************************************************************************************

		// Last thing before being finished
		private function passVoteResultsByParty()
		{
			//locate_template( $template_names, $load, $require_once )

			//$this->defineGlobals();

			$template_names = get_stylesheet_directory_uri().'dh_riding_page-nosidebar-noheader.php';
			locate_template( $template_names, true, true );

			// javascript CHART - RIDING PAGE
			add_action( 'wp_enqueue_scripts',  array( $this, 'enqueue_and_register_riding_page' )  );


			// // Add subject and hidden riding number to contact form.
			// add_action( 'comment_form_logged_in_after', array($this, 'additional_fields') );
			// add_action( 'comment_form_after_fields', array($this, 'additional_fields') );
			// // save title and riding name
			// add_action( 'comment_post', array($this,'save_comment_meta_data') );
			// // add title to exisiting comments
			// add_filter( 'comment_text', array($this,'modify_comment') );

			// add_filter( 'preprocess_comment', array($this,'verify_comment_meta_data') );

			
		}

		// private function defineGlobals()
		// {
		// 	global $theGlobalRidingNumber;
		// 	global $theRidingName;

		// 	$theGlobalRidingNumber = $this->theRidingNumber;
		// 	$theRidingName = $this->myRiding->new_name;
		// }

		private function throwError($statementToUser)
		{
			$this->ridingErrorMessage = $statementToUser;
			wp_die($statementToUser);

		}

		

		// // Add subject and hidden riding number to contact form.
		// public function additional_fields () {
		//   echo '<p class="comment-form-title">'.
		//   '<label for="title">' . __( 'Subject' ) . '</label>'.
		//   '<input id="title" name="title" type="text" size="30"  tabindex="5" /></p>';

		//   echo 'ridingNumber: '. 
		//   '<input id="ridingNumber" name="ridingNumber" type="hidden" size="5" value='.$this->theRidingNumber.' />';
		  

		// }


		// public function verify_comment_meta_data( $commentdata ) {
		//   if ( ! isset( $_POST['title'] ) )
		//   wp_die( __( 'Error: You did not add title. Hit the Back button on your Web browser and resubmit your comment with a title.' ) );
		//   return $commentdata;
		// }


		// // Save subject and hidden riding number from contact form.
		// public function save_comment_meta_data( $comment_id ) {

 			
 	// 			wp_die( __( 'Error: You did not add title. Hit the Back button on your Web browser and resubmit your comment with a title.' ) );
		//   return $commentdata;
 			
		  

		// 	//echo 'id and title: '.$comment_id. ' '.$_POST['title'];

		//   if ( ( isset( $_POST['title'] ) ) && ( $_POST['title'] != '') )
		//   $title = wp_filter_nohtml_kses($_POST['title']);
		//   add_comment_meta( $comment_id, 'title', 'test title' );

		//   if ( ( isset( $_POST['ridingNumber'] ) ) && ( $_POST['ridingNumber'] != '') )
		//  $ridingNumber = wp_filter_nohtml_kses($_POST['ridingNumber']);
		//   add_comment_meta( $comment_id, 'ridingNumber', $this->ridingNumber);
		// }

		// public function modify_comment( $text ){

		//   $plugin_url_path = WP_PLUGIN_URL;

		//   if( $commenttitle = get_comment_meta( get_comment_ID(), 'title', true ) ) 
		//   {
		//     $commenttitle = '<strong>' . esc_attr( $commenttitle ) . '</strong><br/>';
		//     $text = $commenttitle . $text;

		//     return $text;
		//   } else {
		//     return $text;
		//   }
		// }


		
// **************************************************************************************************************

		public function enqueue_and_register_riding_page()
		{
			
			    wp_register_script( 'ridingPieChart',  get_stylesheet_directory_uri().'/js/ridingPieChart.js' );

			    
			    wp_enqueue_script( 'ridingPieChart',  get_stylesheet_directory_uri() . '/js/ridingPieChart.js', array( 'chartjs'), false, true);

			    $data = array(
				'conVotes'=>$this->myRiding->conservative, 
				'libVotes' => $this->myRiding->liberal,
				'ndpVotes' => $this->myRiding->ndp,
				'grnVotes' => $this->myRiding->green,
				'bqVotes' => $this->myRiding->bq,
				'other' => $this->myRiding->other
				);
			
			
			wp_localize_script( 'ridingPieChart', 'dh_voteResultsByParty', $data );
		    
		}

		
		
// **************************************************************************************************************


		/**
		 * Activate the plugin
		 */
		public static function activate()
		{
			// Do nothing
		} // END public static function activate

		/**
		 * Deactivate the plugin
		 */
		public static function deactivate()
		{
			// Do nothing
		} // END public static function deactivate

	}
}

// **************************************************************************************************************


//if(class_exists('DH_Riding_Page'))
if(!($DH_Riding_Page instanceof DH_Riding_Page) )
{
		
		// // Installation and uninstallation hooks
		// register_activation_hook(__FILE__, array('DH_Riding_Page', 'activate'));
		// register_deactivation_hook(__FILE__, array('DH_Riding_Page', 'deactivate'));

		// instantiate the plugin class
		//$DH_Riding_Page = new DH_Riding_Page();
		$DH_Riding_Page = DH_Riding_Page::get_instance();
	

}

register_activation_hook(__FILE__, array('DH_Riding_Page', 'activate'));
register_deactivation_hook(__FILE__, array('DH_Riding_Page', 'deactivate'));
function deactivate()
{
	deactivate_plugins( plugin_basename( __FILE__ ) );
}


