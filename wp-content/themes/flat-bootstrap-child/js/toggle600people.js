



(function($) {
  $(document).ready(function(){
  
	$( "#click600People" ).click(function() {
			  $( "#if600voteddifferently" ).toggle( "slow", function()
			  {

			  	var myPie3 = new Chart(document.getElementById("chart-03").getContext("2d")).Pie(mydata3,opt3);
			  	if(typeof myPie3 == 'undefined')
			  	{
			  		console.log('we don\'t have myPie3');
			  		//var myPie3 = new Chart(document.getElementById("chart-03").getContext("2d")).Pie(mydata3,opt3);
			  	}
			  }



			   );
			  
			});

 });
}(jQuery));



