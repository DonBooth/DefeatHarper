<?php
/**
 * Theme: Flat Bootstrap
 * 
 * Template Name: Defeat Harper Riding Page - Template
 *
 * Full width page template without page header or sidebar, but still contained within
 * the page margins.
 *
 * This is the template that displays pages with no sidebar and no content header.
 *
 * @package  flat-bootstrap-child
 */


/**
*
*
*	This template was modified for defeat harper.ca
*	
*
*/

/**
*
*
*	TO DO:
**
*	
*
*
*
*/



global $wp_query;

// Variables
$ridingNumber = get_query_var('riding');



get_header(); ?>


<div class="container">
<div id="main-grid" class="row">

	<div id="primary" class="content-area-wide col-md-12">
		<main id="main" class="site-main" role="main">

			<?php echo $ridingErrorMessage; ?>
		
			
<!-- Title and preliminary recomendation -->
	<div class="row clearfix title-area"  >
		<div class="col-md-3  centered" >
			
			<?php 
			if ( is_user_logged_in() ) 
			{
			echo '<a href=" '. get_site_url().'/voter-survey/' .' ">Have you been asking people how they intend to vote? click here.</a>'; 
			 }

			else
			{
				echo '<a href=" '.  wp_login_url( get_permalink()) .' " title="Login">Login/Register</a>';
			}
			?>

			
			
		</div>




		<div class="col-md-6  pie-charts  centered " id="df_riding_header">
			<div class="ridingHeader">
			<p>Your riding is</p>
			<h1 class="ridingPageTitle"><?php echo get_the_title();//DH_Riding_Page::get_instance()->myRiding->new_name$DH_Riding_Page->myRiding->new_name ?></h1>
			<h4 class="shortRecomendation">
				<?php echo DH_Riding_Page::get_instance()->shortRecomendation;  ?></h4>
			<!-- <p>In the last election the <?php echo $DH_Riding_Page->partyKeys[0]; ?> party won with <?php echo number_format($DH_Riding_Page->partyResults[$DH_Riding_Page->partyKeys[0]]); ?> votes in <?php echo $DH_Riding_Page->myRiding->new_name; ?>.<br />The margin of victory was <?php echo number_format($DH_Riding_Page->winningMargin); ?> votes (<?php echo $DH_Riding_Page->winningMarginPercent ?> %) .</p><br> -->
			<p>It is still early. Things may change. They often do.</p>
			</div><!-- ridingHeader -->
		</div><!-- col-lg-12 -->
		

	</div><!-- row -->



<!-- Pie Chart -->
<div class="row section  clearfix pie-charts">

		
		<br/>
			<div class="col-md-6 center-block" >
				<canvas id="chart-01" class="pie-chart" height="300" width="300"  ></canvas>
				<p style= "text-align: left;"><?php echo DH_Riding_Page::get_instance()->pieChartCaption; ?> </p>
				
			</div>
			<div class="col-md-6 center-block">
				<article style="padding:0 10px;" >
					<h3 class="ridingPageTitle">About <?php echo get_the_title();  ?></h3>
			<?php 
			echo DH_Riding_Page::get_instance()->top_content; 
			
			
			?>
				</article>
				
				
			</div>

			
	</div><!-- row -->
<!-- riding map -->
<div class="col-md-3  centered" id="riding-map-canvas" >
	
		
</div>

<div class="row section  clearfix pie-charts" id = 'candidates'>
<?php echo DH_Riding_Page::get_instance()->candidates; ?>
</div>

<div class="row section  clearfix pie-charts" id = 'survey'>

<?php 

// changed votes
// =======================================================================
global $wpdb;
$wpdb->flush();

$query3 = "SELECT m1.item_id, m1.meta_value as nextVote, m2.meta_value as prevVote, m3.meta_value as ridingNumber FROM wp_frm_item_metas m1
INNER JOIN wp_frm_item_metas m2
  ON m1.item_id=m2.item_id 
  AND m2.field_id=83
  AND m1.field_id=85 
  AND m1.meta_value!=m2.meta_value
INNER JOIN wp_frm_item_metas m3
  ON m1.item_id=m3.item_id
  AND m3.field_id=100
  AND m3.meta_value=$ridingNumber
  ";


$myBundle = $wpdb->get_results($query3);
$myBundle = count($myBundle);
//var_dump( $myBundle );
//$wpdb->show_errors();
//$wpdb->print_error();
//$wpdb->flush();
//print_r($myBundle);
//wp_die();
if(isset($myBundle) && $myBundle >= 1)
{
	echo '<strong>'. $myBundle .'</strong>'. ' voters in '.get_the_title().' have changed their vote to Defeat Harper.<br>';
}
else
{
	echo 'Be the first from '.get_the_title().'to vote in our survey.';
}

//echo '<br> myBundle: '.$myBundle.'<br>';
//print_r($myBundle);
//flushes: $wpdb->last_result, $wpdb->last_query, and $wpdb->col_info.


//Number of voters collecting votes
// ======================================================================
$number_of_voters_voting = FrmProStatisticsController::stats_shortcode(array(
				'id' => '87', 
				'type' => 'unique',
				'user_id' => $user_ID,
				'entry_id'=>$ridingNumber, //any riding page
				));//,//'92' =>  'Voter Survey',,//


?>




	<div class="col-md-12 center-block" >

<?php 
if($myBundle >= 1)
{


	echo FrmProStatisticsController::graph_shortcode(array(
	'id' => 103,
	 '100'=>  $ridingNumber,
	 'ids'=>'104,105,106,107,108', 
	 'type'=>'line', 
	 'x_axis'=>"created_at", 
	 'curveType'=>'function',
	 'group_by'=> 'day',
	 'data_type'=>'total',
	 'response_count'=> '2000',
	 'width'=>'90%',
	 'colors'=>'#0071BC,#FF0000,#F7931E,#00FFFF,#006837,#F7E3A4',
	 'start_date'=> '2015-04-01',
	 'end_date'=> '2015-08-01',
	 'show_key'=>'1',
	 'title' => get_the_title(). ' '. $ridingNumber,
	 'curveType'=>'function',
    
	 ));  
}



// 	var conBlue = '#0071BC,#FF0000,#F7931E,#00FFFF,#006837,#F7E3A4';
// var ndpOrng = '#F7931E';
// var libRed  = '#FF0000';
// var bqBlue  = '#00FFFF';
// var grnGrn  = '#006837';
// var neutralColor = '#F7E3A4';





			
	// =======================================================================
				
				

			// Did user submit a form - at all? from any riding page?
			global $user_ID;
			$votes_by_this_user = FrmProStatisticsController::stats_shortcode(array(
				'id' => 'hpz3rz', 
				'type' => 'count',
				'user_id' => $user_ID,
				'value'=>'riding', //any riding page
				));//,//'92' =>  'Voter Survey',,//
			//echo 'number of submissions from this user (to any riding page): '. $votes_by_this_user;

			 
			

				if ( is_user_logged_in() ) 
				{    
					if($votes_by_this_user > 1)
					{
						echo 'Thank you for filling out a voter survey.';
					}
					else
					{
						echo FrmFormsController::get_form_shortcode( array( 'id' => 7, 'title' => true, 'description' => false ) );
					}
					 
					
				}
				else
				{
					
					echo '<a href=" '.  wp_login_url( get_permalink().'#survey'  ) .' " title="Login to vote">You must be logged in to vote. Login/Register</a>';
					//echo '<a href=" '.  wp_login_url( get_permalink()) .' " title="Login">Login/Register</a>';
				}
			//}
			?>

	</div>
</div>

<div class="row section  clearfix pie-charts">
		<!-- <h2 >Most Canadians did not vote for Stephen Harper's Conservatives</h2> 
		<br/>-->
			<div class="col-md-12 center-block" >
			<?php if( isset(DH_Riding_Page::get_instance()->noRegionalChart) )
			{
				echo DH_Riding_Page::get_instance()->noRegionalChart;
			} 
			else
			{

				echo '<canvas id="voter-history-chart" class="pie-chart" height="300" width="600"  ></canvas>';
				?>
				<p style= "text-align: left;"><?php echo DH_Riding_Page::get_instance()->shortRecomendation; ?> </p>
	  <?php } ?>
			</div>

			
	</div><!-- row -->







		<div class="row ">


			<?php while ( have_posts() ) : the_post(); ?>

				<?php /*get_template_part( 'content', 'page-fullwidth' ); */ ?>
				 <?php //get_template_part( 'content', 'page' ); 
				//  ===>>  NOTE! this reprints the content of the top post. maybe start this loop later? after the first comment??>

				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
				?>
				<div class="comments-wrap">
				<?php comments_template(); ?>
				</div><!-- .comments-wrap" -->
				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>

			<!-- comments -->
			<?php //comments_template(); ?>
			

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php //get_sidebar(); ?>

</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
