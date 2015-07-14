<?php

/*
Plugin Name: Defeat Harper Voter Survey Admin Page

Description: adds a page where users can fill out voter survey forms.
Version: 1.0
Author: Don Booth
Author URI: http://www.donbooth.ca
License: GPL2
*/

add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
	add_menu_page( 'Voter Survey', 'Voter Survey', 'read', 
		'dh_voter_survey_admin/dh_voter_survey_admin.php', 'dh_voter_survey', 'dashicons-chart-area', 1  );
}

function dh_voter_survey(){
	?>
	<div class="wrap">
		<h2>Defeat Harper Voter Survey</h2>
		<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 7, 'title' => false, 'description' => false ) ); ?>
	</div>
	<?php

}