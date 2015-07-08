(function($) {
  $(window).load(function(){

		$('body').append('<div class="fyr"></div>')
	       .find('div.fyr')
	       .findYourRep({apis: 'represent'});

  });
}(jQuery));