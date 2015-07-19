(function($) {

$('#frm_field_83_container > label').text('How did you vote in the federal election of 2011? (the last time Harper ran for office)');
$('#frm_field_85_container > label').text('How will you vote in the next federal election? (October 19, 2015)');



$('#frm_field_96_container').css('display', 'none');
//$(window).bind("load", function(){
	$('input[name="item_meta[96]"').val(name_and_number.ridingName); // the value on the form for riding number item_meta[96]
	$('input[name="item_meta[100]"').val(name_and_number.ridingNumber);
//	change the text from "you" to your friend or neighbour


//last vote 83
//next vote 85
// conChange = 103;
// libChange = 104;
// ndpChange =105;
// bqChange = 106;
// grnChange = 107;
// othrChange = 108;


// $('input[name="item_meta[103]"').val(0);
// $('input[name="item_meta[104]"').val(0);
// $('input[name="item_meta[105]"').val(0);
// $('input[name="item_meta[106]"').val(0);
// $('input[name="item_meta[107]"').val(0);
// $('input[name="item_meta[108]"').val(0);

	$( "form" ).submit(function( event ) 
	{		 
		//$('input[name="item_meta[30]"]')
		loser =  $('input[name="item_meta[83]"]:checked','#form_cp96sg').val();
		winner = $('input[name="item_meta[85]"]:checked','#form_cp96sg').val();

		//if( $('input[name="item_meta[85]"]:checked','#form_cp96sg').val() !== $('input[name="item_meta[83]"]:checked').val(),'#form_cp96sg' )
		if(loser != winner)
		{
			//alert(  $('input[name="item_meta[85]"]:checked','#form_cp96sg').val()   + '  ' +     $('input[name="item_meta[83]"]:checked','#form_cp96sg').val()   )   ;

			//loser =  $('input[name="item_meta[83]"]:checked','#form_cp96sg').val();
			//winner = $('input[name="item_meta[85]"]:checked','#form_cp96sg').val();
			//alert(loser + '  ' + winner);
			recordTheLoser(loser);
			recordTheWinner(winner);

			// let the world know that this comes from a riding page.
			$('input[name="item_meta[92]"').val('riding');
			alert($('input[name="item_meta[92]"').val())

			//alert('winner: ' + winner + ' loser: ' +loser);
		}

		
	});

	function recordTheLoser(loser)
	{

		switch(loser) {
	    case 'Conservative':
	        $('input[name="item_meta[103]"').val(-1);
	        break;
	    case 'Liberal':
	        $('input[name="item_meta[104]"').val(-1);
	        break;
	    case 'NDP':
	        $('input[name="item_meta[105]"').val(-1);
	        break;
	    case 'Green':
	         $('input[name="item_meta[107]"').val(-1);
	        break;
	    case 'Bloc':
	       	$('input[name="item_meta[106]"').val(-1);
	        break;
	    case 'Other':
	        $('input[name="item_meta[108]"').val(-1);
	        break;
	    case 'I did not vote':
	        break;
	    default:
	         alert('Please select the party you voted for the last time Stephen Harper ran.')
		}
		
		return;
	}

	function recordTheWinner(winner)
	{

		switch(winner) {
	    case 'Conservative':
	        $('input[name="item_meta[103]"').val(1);
	        break;
	    case 'Liberal':
	        $('input[name="item_meta[104]"').val(1);
	        break;
	    case 'NDP':
	        $('input[name="item_meta[105]"').val(1);
	        break;
	    case 'Green':
	         $('input[name="item_meta[107]"').val(1);
	        break;
	    case 'Bloc':
	       	$('input[name="item_meta[106]"').val(1);
	        break;
	    case 'Other':
	        $('input[name="item_meta[108]"').val(1);
	        break;
	    case 'I will not vote':
	        break;
	    default:
	         alert('Please select the party you intend to vote for.')
		}
		
		return;
	}
			
		
	


})(jQuery);