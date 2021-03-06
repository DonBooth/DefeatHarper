/*! jquery.findyourrep.ca 2014-10-15 Copyright (c) 2014 James McKinney, Open North Inc. <james@opennorth.ca> under a BSD3 License.*/ !
/* modified by Don Booth to find electoral district (riding) May 18, 2015 */

function() {
    $.findYourRep.represent = function(a) {
            var b = new $.Deferred,
                c =
                "https://represent.opennorth.ca/representatives/?limit=0&callback=?",
                d = {};
            return $.findYourRep.geocodeOrResolveImmediately(a).done(function(a) {
                d.point = a.latitude + "," + a.longitude, $.findYourRep
                    .apiCall(c, d).done(function(a) {
                        b.resolve(a.objects)
                    })
            }), b
        }, $.findYourRep.getTemplateContext = function(a) {
            return {
                details: a.elected_office + ", " + a.district_name,
                photoUrl: a.photo_url,
                resultUrl: a.url || a.source_url,
                name: a.name,
                distric_name: a.distric_name,
                elected_office: a.elected_office,
                source_url: a.source_url,
                party_name: a.party_name,
                email: a.email,
                url: a.url
            }
        }, $.findYourRep.formTemplate =
        "<div class='find-your-rep fyr-container' id='fyr{{ idx }}' data-apis='{{ apis }}'><h3>{{ title }}</h3><p>{{ text }}</p><div class='fyr-controls'><textarea placeholder='Enter your address'>{{ defaultValue }}</textarea><button class='fyr-submit'>{{ action }}</button></div><small>Powered by <a href='http://represent.opennorth.ca'>Represent</a></small></div>",
        $.findYourRep.resultsTemplate =
        "<div class='fyr-results'><h3>Your Representatives</h3><div class='fyr-represent cf' style='display:none;'><ul class='fyr-reps'></ul></div><a href='#' class='fyr-back'>&laquo; start over</a><small>Powered by <a href='http://represent.opennorth.ca'>Represent</a></small></div>"
}(this);