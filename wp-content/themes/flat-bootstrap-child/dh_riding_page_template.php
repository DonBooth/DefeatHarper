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


// 	GET myRiding Object
global $wp_query;




get_header(); ?>


<div class="container">
<div id="main-grid" class="row">

	<div id="primary" class="content-area-wide col-md-12">
		<main id="main" class="site-main" role="main">

			<?php echo $ridingErrorMessage; ?>
			
			<?php //echo "the riding: " . $myRiding->new_name ; ?>
			<?php global $hits;
					echo $hits; ?>
<!-- Title and preliminary recomendation -->
	<div class="row clearfix" >
		<div class="col-lg-12  pie-charts  centered " id="df_riding_header">
			<div class="ridingHeader">
			<p>Your riding is</p>
			<h1 class="ridingPageTitle"><?php echo DH_Riding_Page::get_instance()->myRiding->new_name;//$DH_Riding_Page->myRiding->new_name ?></h1>
			<!-- <h4 class="shortRecomendation"><?php //echo   str_replace("winning party", $DH_Riding_Page->partyKeys[0],  $DH_Riding_Page->shortRecomendation); //$myRiding->short_recommendation; ?></h4> -->
			<h4 class="shortRecomendation">Based on voting patterns of the election in 2011:<br>
				<?php echo DH_Riding_Page::get_instance()->shortRecomendation ;  ?></h4>
			<!-- <p>In the last election the <?php echo $DH_Riding_Page->partyKeys[0]; ?> party won with <?php echo number_format($DH_Riding_Page->partyResults[$DH_Riding_Page->partyKeys[0]]); ?> votes in <?php echo $DH_Riding_Page->myRiding->new_name; ?>.<br />The margin of victory was <?php echo number_format($DH_Riding_Page->winningMargin); ?> votes (<?php echo $DH_Riding_Page->winningMarginPercent ?> %) .</p><br> -->
			<p>It is still early. Things may change. They often do.</p>
			</div><!-- ridingHeader -->
		</div><!-- col-lg-12 -->
	</div><!-- row -->



<!-- Pie Chart -->
<div class="row section  clearfix pie-charts">
		<!-- <h2 >Most Canadians did not vote for Stephen Harper's Conservatives</h2> 
		<br/>-->
			<div class="col-lg-6 center-block" >
				<canvas id="chart-01" class="pie-chart" height="300" width="300"  ></canvas>
				<p style= "text-align: left;"><?php echo DH_Riding_Page::get_instance()->pieChartCaption; ?> </p>
				
			</div>
			<div class="col-lg-6 center-block">
				<article style="padding:0 10px;" >
					<h3 class="ridingPageTitle">About <?php echo DH_Riding_Page::get_instance()->myRiding->new_name; ?></h3>
			<?php echo DH_Riding_Page::get_instance()->myRiding->anaylsis1; ?>

		
				</article>
				
				
			</div>

			
	</div><!-- row -->


<!-- if there is a second analysis add it here -->
	<?php 

	if( isset(DH_Riding_Page::get_instance()->analysis2) )
	{
		

		
		//to see errors:
		//"locate_template( array('dh_analysis_fullwidth_template.php'), true, false )" ;
		locate_template(array('dh_analysis_fullwidth_template.php'));
		//get_template_part('analysis','fullpagewidthtemplate');//analysis-fullpagewidthtemplate.php
		//echo include ( locate_template( 'analysis-fullpagewidthtemplate.php') );
	}

	?>






		<div class="row ">


			<?php while ( have_posts() ) : the_post(); ?>

				<?php /*get_template_part( 'content', 'page-fullwidth' ); */ ?>
				<?php get_template_part( 'content', 'page' ); ?>

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
