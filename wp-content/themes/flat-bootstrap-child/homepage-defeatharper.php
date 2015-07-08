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

	<div class="row top-section centered clearfix ">
		<!-- <h2 >Most Canadians did not vote for Stephen Harper's Conservatives</h2> 
		<br/>-->
			<div class="col-md-6 center-block pie-charts">
				<center>
				<h3 style= "text-align: center;">In 2011 Canadians voted for parties from the left, centre and right.</h3>
				<br>
				<canvas id="chart-01"  height="300" width="500">This graphic shows that 39% voted Conservative while 31% voted NDP, 12% voted Liberal, 12% voted Bloc Quebequois, and 4% voted Green. </canvas>
				</center>
				
			</div>

			<div class="col-md-6  center-block pie-charts">
				<center>
				<h3 style= "text-align: center;" >The majority of us did not vote for Stephen Harper or the Conservatives.</h3>
				<br>
				<canvas id="chart-02"  height="300" width="500">This graphic shows that 61% of voters voted for centre or progressive parties.</canvas>
				</center>
				
			</div>
	</div><!-- row -->


<div class="row section clearfix">
	<div class="col-lg-12 content-area-wide">
		<p>The Conservatives won in over half the ridings in Canada because we split our votes among the other parties.</p>
		<p>The Conservatives got 39% of the vote but 100% of the power.</p>
	</div>
</div><!-- row -->







</div><!-- contianer -->





<aside id="find-your-riding-fullpage" class="widget find-your-riding-fullpage">
	<div class="container">


		<h2 class="widget-title">How many votes it will take to defeat your local Conservative?</h2>
		<div class="textwidget">
		<div class="row widget_text section centered clearfix  find-your-riding-fullpage">
		<div class="col-lg-8 col-lg-offset-2">
		



		<!-- test from represent nother demo site. -->
    <h3>
       <span class="hidden-xxs">Find your riding</span><!-- <span class="visible-xxs"> </span>-->
    </h3>
    <form class="form-inline  find-your-riding-fullpage" role="form">
      <label class="sr-only" for="address">Enter an address</label>
      <input type="text" class="form-control input-lg find-your-riding-fullpage" id="address" placeholder="Enter an address">
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

		<!-- <div class="row section clearfix">
			<div class="col-lg-8 col-lg-offset-2  content-area-wide">
				<h3 id="click600People" class="hvr-push section centered clearfix yellowBackground">What if one in 600 people voted differently?<br>(click to find out)</h3>
			</div>
		</div> --> 

		
		
		<div class="row clearfix" >
		<div class="col-lg-12  pie-charts" id="if600voteddifferently"><!-- initiallyHidden -->
		<h3 id="click600People" class=" centered clearfix ">What if one in 20 or even one in 50 people voted differently?</h3>
		<p>If everyone votes exactly as they did in 2011, Harper’s Conservatives will get another majority. If a small percentage of Canadians vote for their second choice non-Conservative candidate, the picture could look very different.</p><br>
		


		  <div class="col-md-6 center-block pie-charts">
				<center>
				<h3 style= "text-align: center;">1 in 50</h3>
				<br>
				<canvas id="chart-03"  height="300" width="500">This graphic shows that 39% voted Conservative while 31% voted NDP, 12% voted Liberal, 12% voted Bloc Quebequois, and 4% voted Green. </canvas>
				</center>
				<p style="test-align:left;">If 1 in 50 voters, spaced evenly across the country, change their vote to the party most likely to beat the local Conservative then the Conservatives will have a minority government and will be forced to work with other parties.</p>
			</div>

			<div class="col-md-6  center-block pie-charts">
				<center>
				<h3 style= "text-align: center;" >1 in 20</h3>
				<br>
				<canvas id="chart-04"  height="300" width="500">This graphic shows that 61% of voters voted for centre or progressive parties.</canvas>
				</center>
				<p style="test-align:left;">If 1 in 20 voters, spread evenly across the country, change their vote to the party most likely to defeat the local Conservative candidate then the NDP will form a minority government.</p>
			</div>
		</div><!-- col-lg-12-->
		</div><!-- row -->

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



