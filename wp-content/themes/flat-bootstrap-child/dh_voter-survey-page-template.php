<?php
/**
 * Theme: Flat Bootstrap
 * 
 * Template Name: Voter Survey Template (Defeat Harper)
 *
 * Full width page template without page header or sidebar, but still contained within
 * the page margins.
 *
 * This is the template that displays pages with no sidebar and no content header.
 *
 * @package flat-bootstrap-child
 */

get_header(); ?>

<div class="container">
<div id="main-grid" class="row">

	<div id="primary" class="content-area-wide col-md-12">
		<main id="main" class="site-main" role="main">


			<?php while ( have_posts() ) : the_post(); ?>

				<?php /*get_template_part( 'content', 'page-fullwidth' ); ;*/



// SELECT * 
// FROM  'wp_frm_item_metas' 
// WHERE  'field_id' = 87
// field_id is the userID and the meta_value is the id of the user who submitted the form.

 

// echo 'the meta: '.(get_page_template_slug( get_the_ID() ));
// echo ' the meta the other way: '.get_post_meta( get_the_ID(), '_wp_page_template', true );
// echo '<br> the post meta data '.  '<br>';
// print_r(get_post_meta( get_the_ID() )) ;
				
// ================================================================================
				// ===>>>>> this will give us the list of ridings to use in the autocomplete.
				// $ridings = "SELECT  new_name , province, riding_number FROM  dh_ridings ORDER BY  new_name ASC;";//province ASC,
				// $ridings = $wpdb->get_results($ridings,ARRAY_A);

				// foreach ($ridings as $r ) 
				// {
				// 	echo '{ value: "'. $r['riding_number'].'", label: "'. $r['new_name'] .'" },';
				// }

				//print_r($ridings);
				//wp_die();

				// $querystr = "SELECT COUNT(*) AS number_of_entries 
				// 	FROM wp_frm_item_metas 
				// 	WHERE field_id = 87 
				// 	AND meta_value = $canvasser 
				// 	AND created_at >= ( NOW() - INTERVAL 5 DAY ) ";//


// ================================================================================

				global $user_ID;
				
				if(!current_user_can('administrator')) //$form->id == 7 and 
				{ 
				    $five_days_ago = strtotime(current_time('mysql', 1)) - (60*60*24*5); //calculate 5 days ago
				    $num_surveys = FrmEntry::getRecordCount("it.created_at > '".date('Y-m-d H:i:s', $five_days_ago)."' and user_id=".$user_ID);
				    //echo 'we can calculate num_surveys '.$num_surveys;
				}
				{
					$num_surveys = 0;
				}
				

				// Most recent Survey Date
				global $wpdb;
				$querystr = "SELECT id,created_at 
					FROM wp_frm_items
					WHERE user_id = $user_ID 
					AND created_at >= ( NOW() - INTERVAL 5 DAY ) 
					ORDER BY created_at DESC";//

				$surveys = $wpdb->get_results($querystr,ARRAY_A);

				$wpdb->print_error();
				$wpdb->flush();

				$num_surveys = count($surveys);
				$most_recent_survey = $surveys[0]['created_at'];
				// echo '<br>current: '.current_time('timestamp'). ' last survey: '.strtotime($most_recent_survey);
				// echo '<br>the difference: '.$theDifference = current_time('timestamp') - strtotime($most_recent_survey);
				// echo '<br>'. $theDifference/(60*60);
				?>

				<?php get_template_part( 'content', 'page' ); ?>
				<?php

				// put surveys on the page.
				if( $num_surveys < 5)
				{
					$s_remaining = 5 - $num_surveys;
					echo '<h3>You may complete up to <strong>'. $s_remaining .'</strong> surveys.</h3>';
					echo FrmFormsController::get_form_shortcode( array( 'id' => 7, 'title' => true, 'description' => false ) );
					// display a number of surveys
					// for( $i=0; $i<$s_remaining; $i++ )
					// {
					// 	echo '<div class="row section  clearfix pie-charts">';
					// 	echo '<hr>';
					// 	echo FrmFormsController::get_form_shortcode( array( 'id' => 7, 'title' => true, 'description' => false ) );
					// 	echo '</div>';
					// }

				}
				else
				{
					
					echo '<article>';
					echo '<div class=" col-md-12  section   pie-charts ">';
					echo '<p>';
					echo 'You have used all of your surveys for now. Please remember that you can enter a maximum of 5 survey results over 5 days.<br>';
					echo 'You need to wait <strong>' . human_time_diff(  current_time('timestamp'), strtotime($most_recent_survey) ) . '</strong> before you can enter more voter results.';
					echo '<br><small>If you have lots of results and just cannot wait then contact us and we will give you a hand.</small>';
					echo '<p>';
					echo '</div>';
					echo '</article>';
				}
				?>
				
				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
				?>
				<div class="comments-wrap">
				<?php comments_template(); ?>
				</div><!-- .comments-wrap"
				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php //get_sidebar(); ?>

</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
