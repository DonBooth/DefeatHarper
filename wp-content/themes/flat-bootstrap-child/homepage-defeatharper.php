<?php
/**
 * Theme: Flat Bootstrap Child
 * 
 * Template Name: Homepage for Defeat Harper
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
	<div class="row section clearfix quickLink ">
		<!-- <h2 >Most Canadians did not vote for Stephen Harper's Conservatives</h2> 
		<br/>-->
			<div class="col-lg-12  small">
				<a  href= " <?php echo esc_url( home_url( ).'#find-your-riding-fullpage' ); ?>"  class="pull-right smoothscroll" >Find your riding.</a>
			</div>
	</div>

	<div class="row top-section pie-charts centered clearfix ">
		<!-- <h2 >Most Canadians did not vote for Stephen Harper's Conservatives</h2> 
		<br/>-->
			<div class="col-md-6 center-block ">
				
				<h3 style= "text-align: center;">In 2011 Canadians voted for parties from the left, centre and right.</h3>
				<center>
				<canvas id="chart-01"  height="300" width="500">This graphic shows that 39% voted Conservative while 31% voted NDP, 12% voted Liberal, 12% voted Bloc Quebequois, and 4% voted Green. </canvas>
				</center>
				
			</div>

			
			
			<div class="col-md-6  center-block ">
				<center>
				<h3 style= "text-align: center;" >The majority of us did not vote for Stephen Harper or the Conservatives.</h3>
				<br>
				<canvas id="chart-02"  height="300" width="500">This graphic shows that 61% of voters voted for centre or progressive parties.</canvas>
				</center>
				<p>The Conservatives won in over half the ridings in Canada because we split our votes among the other parties.</p>
			</div>

			<h2 style= "text-align: center;">The Conservatives won 39% of the vote but got 100% of the power.</h2>
			<p>The Conservatives won in over half the ridings in Canada because we split our votes among the other parties.</p>
			<h2><strong>We can't let it happen again.</strong></h2>
	</div><!-- row -->

	<!-- Second Row -->
	<div class="row top-section centered clearfix ">
		<!-- <h2 >Most Canadians did not vote for Stephen Harper's Conservatives</h2> 
		<br/>-->
			<div class="col-md-6 center-block pie-charts">
				
				
				<p>In early Summer 2015 the polls are very encouraging.<br>
					We're seeing support for the Conservatives slip.
				</p>
				
				<canvas id="national-line-chart"  height="300" width="500">This chart shows that, nationally, snce April the Conservatives and Liberals have been losing support while the NDP has gained.</canvas>
				<div><a href = "http://www.electionalmanac.com/ea/"><small>source: Election Almanac</small></a></div>
				
			</div>

			<div class="col-md-6  pie-charts">
				<img class="img-responsive img-center" src=" <?php echo get_stylesheet_directory_uri(); ?>/images/you_wont_recognize.jpg" />
				<p style= "text-align: left;" >However, national polls are a poor predictor of riding-by-riding results. Each riding is different.</p>
				
				
				
			</div>
	</div><!-- row -->

<div class="row top-section pie-charts clearfix ">
	<h2><strong>With your help, people in your riding can make a more informed decision.</strong></h2>
	<p>While we can provide some basic information about the candidates in your riding and how people voted in the last election, you can contribute more relevant information: how you plan to vote, how others you know plan to vote. The most valuable contribution of all will be when you ask a few complete strangers how they plan to vote - or whether they will.</p>
	<p>To start the process</p>
<div>




</div><!-- contianer -->





<aside id="find-your-riding-fullpage" class="widget find-your-riding-fullpage">
	<div class="container">


		
		<div class="textwidget">
		<div class="row widget_text section centered clearfix  find-your-riding-fullpage">
		<div class="col-lg-8 col-lg-offset-2">
		


		<!-- test from represent nother demo site. -->
    <h3 class="hidden-xxs">Find your riding</h3>
    <form class="form-inline  find-your-riding-fullpage" role="form">
      <label for="address">Enter an address, street, province  -  or enter postal code</label>
      <input type="text" class="form-control input-lg find-your-riding-fullpage" id="address" placeholder="Enter an address or postal code">
      <button class="btn btn-lg btn-primary" id="submit">
        <span class="glyphicon glyphicon-search"></span> Find
      </button>
    </form>
  <!-- </div> -->
<div class="alert alert-warning  find-your-riding-fullpage" id="many-results">
  Which address is yours? <select id="addresses"></select>
</div>
<div class="alert alert-danger  find-your-riding-fullpage" id="no-results">
  We couldn't find your address. Please try again.
</div>
<div class="alert alert-danger  find-your-riding-fullpage" id="unknown-error">
  Something went wrong. Please try again.
</div>
<div class="alert bg-primary  find-your-riding-fullpage" id="going-to-riding">
  Just a moment. We're taking you to your riding.
</div>


<!-- END of test from represent nother demo site. -->


		
		</div><!-- col-lg-8 -->
		</div><!-- row -->
		</div><!-- textwidget -->
	</div><!-- container -->
</aside>






<div class="container section">

		
		
	
		<!-- new row - make your vote count. -->
		<div class="row section clearfix">
	<div class="col-lg-10 col-lg-offset-2  content-area-wide clearfix" >
		<h2>This election, make your vote count. <a href= " <?php echo esc_url( home_url( ).'#find-your-riding-fullpage' ); ?> "  class="smoothscroll" > <small style="font-size:0.8em; color:#16a085;">Find your riding.</small> </a> </h2>
	
	</div>
</div><!-- row -->

		
		
	</div><!-- container -->





	<div class="container">

<div id="main-grid" class="row">

	<div id="primary" class="content-area-wide col-md-12">
		<main id="main" class="site-main" role="main">

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

		</main> <!-- #main -->
	</div><!-- #primary -->

	<?php //get_sidebar(); ?>

</div><!-- .row -->
</div><!-- .container -->





<?php get_footer(); ?>



