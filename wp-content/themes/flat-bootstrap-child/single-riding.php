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


// 	GET myRiding Object
global $wp_query;




get_header(); ?>


<div class="container">
<div id="main-grid" class="row">

	<div id="primary" class="content-area-wide col-md-12">
		<main id="main" class="site-main" role="main">

			<?php echo $ridingErrorMessage; ?>
			
			
<!-- Title and preliminary recomendation -->
	<div class="row clearfix" >
		<div class="col-md-12  pie-charts  centered " id="df_riding_header">
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
<div class="row section  clearfix pie-charts">
		<!-- <h2 >Most Canadians did not vote for Stephen Harper's Conservatives</h2> 
		<br/>-->
			<div class="col-md-12 center-block" >
				
				<canvas id="voter-history-chart" class="pie-chart" height="400" width="700"  ></canvas>
				<p style= "text-align: left;"><?php echo DH_Riding_Page::get_instance()->shortRecomendation; ?> </p>
				
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
