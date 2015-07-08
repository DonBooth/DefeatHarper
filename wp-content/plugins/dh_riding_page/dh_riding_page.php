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
	//global $hits;

	//global $theGlobalRidingNumber;
	global $theRidingName;
	

	class DH_Riding_page
	{
		private static $_instance;


		public $myRiding;  // the riding object
		public $theRidingNumber;
		public $ridingErrorMessage; //only returned if there is an error
		public $votesByParty;
		public $custom_fields;

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
		public $top_content; //the content. displayed in a custom location. At the top of the page. It is the featured description of the riding.


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
			
				if ( ! isset( self::$_instance ) ) 
				{
					//$this->init();
			        //add_action( 'parse_query', array( $this, 'get_wp_query' ),1000 );

					add_action( 'wp', array($this, 'init'), 1000);
		    	}
			
			
			
		}

		public function init()
		{
			
			if ( 'riding' == get_post_type() && !is_admin()) 
			{

				$this->theRidingNumber = $this->findRidingNumber();
			}
			else
			{return;}
			
		}

		private function findRidingNumber()
		{
			

			global $post;
			$ridingNumber = get_post_meta($post->ID, 'wpcf-riding-number', true);
			$ridingNumber = $this->validateRidingNumber($ridingNumber);
			$this->assemblePage($ridingNumber);

		}


		private function assemblePage($ridingNumber)
		{

			
			

// List of the Custom Fields

// wpcf-riding-number => Array
// Array ( [0] => 35007 )

// wpcf-boundary-change => Array
// Array ( [0] => unchanged )

// wpcf-province => Array
// Array ( [0] => Ontario )

// wpcf-header-recommendation => Array
// Array ( [0] => Strong NDP Incumbent )

// wpcf-conservative => Array
// Array ( [0] => 11067 )

// wpcf-liberal => Array
// Array ( [0] => 14967 )

// wpcf-ndp => Array
// Array ( [0] => 20265 )

// wpcf-green => Array
// Array ( [0] => 2240 )

// wpcf-bloc => Array
// Array ( [0] => 0 )

// wpcf-other => Array
// Array ( [0] => 130 )

// wpcf-if-in-session-now => Array
// Array ( [0] => NDP )

// _edit_lock => Array
// Array ( [0] => 1435539944:1 )

// wpcf-votes-cast => Array
// Array ( [0] => 48669 )

// wpcf-electors-in-riding => Array
// Array ( [0] => 73302 ) 





			 // $custom_fields = get_post_custom();
			 //  foreach ( $custom_fields as $key => $value ) {
			 //    echo $key . " => " . $value . "<br />";
			 //    print_r($value);
			 //    echo "<br><br>";
			 //  }
			 
			global $post;
			$this->theRidingNumber = $ridingNumber;
			$this->top_content = $post->post_content;
			$this->custom_fields = get_post_custom();
			  
			$this->votesByParty = $this->assembleVotesByParty($this->custom_fields);
			
			
			//$this->myRiding = $this->createTheRidingObject($this->theRidingNumber);
			
			
			 $this->partyResults = $this->sortResults($this->votesByParty);
			 $this->partyKeys = $this->returnPartyKeys($this->partyResults);// keys to find results and also a list of parties sorted by results.
			 $this->totalVote = $this->custom_fields['wpcf-votes-cast'][0];
			 $this->winningMargin = $this->winMargin($this->partyResults, $this->partyKeys);

			 $this->secondPlaceMargin = $this->secondMargin($this->partyResults, $this->partyKeys);
			 $this->thirdPlaceMargin = $this->thirdMargin($this->partyResults, $this->partyKeys);
			 $this->winningMarginPercent = $this->winningMargin / $this->totalVote;
			 $this->winningMarginPercent = 100 * (round($this->winningMarginPercent,3,PHP_ROUND_HALF_UP));


			 $this->shortRecomendation = $this->findShortRecomendation();
			 $this->pieChartCaption = $this->pieChartCaption();
			
			


			// ONLY after the page is complete.
			
			$this->passVoteResultsByParty(); // injected on the page for javascript
		}

		
// **************************************************************************************************************

		private function validateRidingNumber($ridingNumber)
		{

			
				$ridingNumber = (int)$ridingNumber;


				if($ridingNumber > 10000 && $ridingNumber < 62002)
				{

					return $ridingNumber;
					//$this->assemblePage($ridingNumber);
					
				}
				else
				{
					$this->throwError('Cannot find that riding - riding number is wrong');
				}

				
				
			
		}

		private function assembleVotesByParty($custom_fields)
		{
			

			$votesByParty = [];

			$votesByParty['Liberal'] = $custom_fields['wpcf-liberal'][0];
			$votesByParty['Conservative'] = $custom_fields['wpcf-conservative'][0];
			$votesByParty['NDP'] = $custom_fields['wpcf-ndp'][0];
			$votesByParty['Green'] = $custom_fields['wpcf-green'][0];
			$votesByParty['Bloc'] = $custom_fields['wpcf-bloc'][0];
			$votesByParty['Other'] = $custom_fields['wpcf-other'][0];
			
			return $votesByParty;

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
			
			// Manual override
			if( strlen ( $this->custom_fields['wpcf-header-recommendation'][0] ) > 3  )
			{
				return $this->custom_fields['wpcf-header-recommendation'][0];
			}


			// LEANING - The winning margin is over 40%    "leans"

			// 3 WAY RACE - NO margin over 40% and none less than 25%  "looks like a three way race between"

			//	2 WAY RACE - difference between top 2 is 10% or less     "looks like a two way race between"

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


			

			

			if($i === 1)
			{
				'Based on voting patterns from 2011 '.$string = get_the_title()  . ' ' . ' is leaning' . ' ' . $this->partyKeys[0];
			}
			elseif ($i === 2) 
			{
				'Based on voting patterns from 2011 '.$string = get_the_title() . ' ' .  'looks like a three way race between' . ' ' . $this->partyKeys[0] . ' ' . $this->partyKeys[1] . ' ' . $this->partyKeys[2];
			}
			elseif ($i === 3) 
			{
				'Based on voting patterns from 2011 '.$string = get_the_title() . ' ' .  'looks like a two way race between' . ' ' . $this->partyKeys[0] . ' and ' . $this->partyKeys[1] ;
			}
			else
			{
				$string = 'Based on voting patterns from 2011, we do not see a clear trend in this riding.';
			}
			
			return $string ;	

		}

		private function upperCasePartyNames()
		{
				
				for($i=0; $i < count($this->partyKeys); $i++)
				{
					if($this->partyKeys[$i] === 'ndp')
					{
						$this->partyKeys[$i] = 'NDP';
					}
					ucwords ( $this->partyKeys[$i] );
				}

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
		//echo "winning party: ".$this->partyKeys[0];
		if($this->partyKeys[0] === 'Conservative')
		{
			
			$margin = ( $this->totalVote - $this->votesByParty['Conservative'] ) / $this->totalVote;
			

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
			
			$string = 'In 2011, '.$margin.' of voters in the '. $this->custom_fields['wpcf-boundary-change'][0] .' riding of '.get_the_title().' voted NDP, Liberal, '.$quebec.' or Green.';

			
		}
		else //if non-Conservative win
		{

			$margin = $this->totalVote - $this->votesByParty['Conservative'];// all parties except Conservative
			
			$margin = $margin / $this->totalVote;
			
			

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
			
			
			$string = 'In 2011, '.$margin.' of voters in the '. $this->custom_fields['wpcf-boundary-change'][0] .' riding of '.get_the_title().' voted NDP, Liberal, '.$quebec.' or Green. ';

			
		}

		if($this->myRiding->boundry_change === 'redistricted')
		{
			$string = $string . '<br>The boundries of '.get_the_title().' have changed. These results reflect the new boundries.';
		}
		elseif ($this->myRiding->boundry_change === 'new')
		{
			$string = $string . '<br>The riding of '.get_the_title().' is new. <br>It is composed of parts of neighbouring ridings.';
		}

	

		return $string;


		
	}











// **************************************************************************************************************

		//  ==> Organize the Election Results by Parties
		private function sortResults($myRiding)
		{


			arsort($myRiding);

			return $myRiding;
			
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
			
			
			$template_names = get_stylesheet_directory_uri().'single-riding.php';
			locate_template( $template_names, true, true );

			// javascript CHART - RIDING PAGE
			add_action( 'wp_enqueue_scripts',  array( $this, 'enqueue_and_register_riding_page' )  );


			

			
		}

		

		private function throwError($statementToUser)
		{
			$this->ridingErrorMessage = $statementToUser;
			wp_die($statementToUser);

		}

		

		

		
// **************************************************************************************************************

		public function enqueue_and_register_riding_page()
		{
			
			    wp_register_script( 'ridingPieChart',  get_stylesheet_directory_uri().'/js/ridingPieChart.js' );

			    
			    wp_enqueue_script( 'ridingPieChart',  get_stylesheet_directory_uri() . '/js/ridingPieChart.js', array( 'chartjs'), false, true);


// $votesByParty['Liberal'] = $custom_fields['wpcf-liberal'][0];
// 			$votesByParty['Conservative'] = $custom_fields['wpcf-conservative'][0];
// 			$votesByParty['NDP'] = $custom_fields['wpcf-ndp'][0];
// 			$votesByParty['Green'] = $custom_fields['wpcf-green'][0];
// 			$votesByParty['Bloc'] = $custom_fields['wpcf-bloc'][0];
// 			$votesByParty['Other'] = $custom_fields['wpcf-other'][0];
			    $data = array(
				'conVotes'=>$this->votesByParty['Conservative'],//$this->myRiding->conservative, 
				'libVotes' => $this->votesByParty['Liberal'],//$this->myRiding->liberal,
				'ndpVotes' => $this->votesByParty['NDP'],//$this->myRiding->ndp,
				'grnVotes' => $this->votesByParty['Green'],//$this->myRiding->green,
				'bqVotes' => $this->votesByParty['Bloc'],//$this->myRiding->bq,
				'other' => $vthis->otesByParty['Other'],//$this->myRiding->other
				);
			
			
			wp_localize_script( 'ridingPieChart', 'dh_voteResultsByParty', $data );



			// history of votes in the region 
			wp_register_script( 'ridingVoterHistoryChart',  get_stylesheet_directory_uri().'/js/regionalVoterHistory.js' );

			wp_enqueue_script( 'ridingVoterHistoryChart',  get_stylesheet_directory_uri() . '/js/regionalVoterHistory.js', array( 'chartjs'), false, true);

		    
		}

		
		
// **************************************************************************************************************


		/**
		 * Activate the plugin
		 */
		public static function activate()
		{
			// Do nothing
		} 

		/**
		 * Deactivate the plugin
		 */
		public static function deactivate()
		{
			// Do nothing
		} 

	}
}

// **************************************************************************************************************


//if(class_exists('DH_Riding_Page'))
if(!($DH_Riding_Page instanceof DH_Riding_Page) )
{
		
		// Installation and uninstallation hooks
		register_activation_hook(__FILE__, array('DH_Riding_Page', 'activate'));
		register_deactivation_hook(__FILE__, array('DH_Riding_Page', 'deactivate'));


		$DH_Riding_Page = DH_Riding_Page::get_instance();
	

}



