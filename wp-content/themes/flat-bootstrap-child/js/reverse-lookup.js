(function($) {
        $(document).ready(function() {

            // This example displays an address form, using the autocomplete feature
            // of the Google Places API to help users fill in the information.
            var geocoder;
            var autocomplete;

            initialize();



            function initialize() {

               
                // geocoder will look up address or latlong
                geocoder = new google.maps.Geocoder();

                $("#addressSubmit").click(function() {
                    geocodeAddress();
                });

                // Create the autocomplete object, restricting the search
                // to geographical location types.
                var input = document.getElementById('autocomplete');
                var options = {
                    types: ['geocode'],
                    componentRestrictions: {
                        country: 'ca'
                    }
                };
                autocomplete = new google.maps.places.Autocomplete(
                    /** @type {HTMLInputElement} */
                    (input), options);
                // When the user selects an address from the dropdown,
                // populate the address fields in the form.
                // google.maps.event.addListener(autocomplete, 'place_changed', function() {

                //   geocodeAddress();
                // });
            }




            function geocodeAddress() {
               
                var address = document.getElementById("autocomplete").value;

                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {

                        getTheRiding(results[0].geometry.location);

                    } else {
                        console.log("Geocode was not successful for the following reason: " + status);
                        showError(status);
                    }
                });
            }

            function getTheRiding(latlong) {



                var ll = latlong.lat() + ',' + latlong.lng();

                //var theRidingWindow = window.open('http://represent.opennorth.ca/boundaries/federal-electoral-districts-next-election/?contains=' + ll ,'theRiding');
                var url = 'http://represent.opennorth.ca/boundaries/federal-electoral-districts-next-election/?contains=' + ll;
                //window.open(url);

                var jqxhr = $.getJSON(url, function() {
                        //console.log( "success" );
                    })
                    .done(function(data) {

                        //var theRiding = data['objects'][0].name;

                        try {
                            var theRiding = data['objects'][0].name;
                            var theRidingNumber = data['objects'][0].external_id;
                           
                            //location.replace("http://www.donbooth.ca/ridings/" + theRiding);
                            openRidingPage(theRidingNumber);
                        } catch (err) {
                            $("<p class='error'>Cannot find a riding for the location. Please try another address.</p>").insertAfter("#autocomplete");
                            //alert(err);
                        }
                        //console.log( "second success" );
                    })
                    .fail(function() {
                        console.log("error fail");
                        $("<p class='error'>Cannot find a riding for the location. Please try another address.</p>").insertAfter("#autocomplete");
                    })
                    .always(function() {
                        console.log("complete always");
                    });

                // Perform other work here ...

                // Set another completion function for the request above
                jqxhr.complete(function() {
                    console.log("second complete jqxhr");
                });

                //'http://represent.opennorth.ca/boundaries/federal-electoral-districts-next-election/?contains=45.524,-73.596'
            }

            function showError(error)
            {
               $("<p class='error'>Cannot find a riding for that location. Please try another address." + error + " .</p>").insertAfter("#autocomplete");
            }

            function openRidingPage(theRidingNumber)
            {
              
               //$('#goToRiding').click();
              window.location.replace("http://www.donbooth.ca/riding/" + theRidingNumber); 
            }

        });
        }(jQuery));// END! jQuery.

