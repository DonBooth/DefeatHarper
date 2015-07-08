// party colours
var conBlue = '#0071BC';
var ndpOrng = '#F7931E';
var libRed  = '#FF0000';
var bqBlue  = '#00FFFF';
var grnGrn  = '#006837';
var neutralColor = '#F7E3A4';


var startWithDataset =1;
var startWithData =1;

var opt1 = {
      animationStartWithDataset : startWithDataset,
      animationStartWithData : startWithData,
      animateRotate : true,
      animateScale : false,
      animationByData : false,
      animationSteps : 50,
      canvasBorders : false,
      canvasBordersWidth : 0,
      canvasBordersColor : "black",
      graphTitle : "",
      //legend : true,
      inGraphDataShow : true,
      inGraphDataFontSize : 18,
      inGraphDataFontColor : "black",
      inGraphDataAlign : "center",
      inGraphDataRadiusPosition : 2,
      inGraphDataPaddingAngle: [0,0,0,0,0],  // con ndp lib green  shift to right or left
      inGraphDataPaddingRadius :[0,0,0,+30,+60,+90],  // shift in or out.
     // inGraphDataVAlign : "bottom",
      animationEasing: "linear",
     // annotateDisplay : true,
      spaceBetweenBar : 2,
      graphTitleFontSize: 18,
      responsive:true,
      maintainAspectRatio : true,
      responsiveMinWidth : 200,
      inGraphDataTmpl : "<%= v1+' '+Math.floor(v6)+'%' %>",
       segmentStrokeColor: "transparent" 

}
// var opt2 = {
//       animationStartWithDataset : startWithDataset,
//       animationStartWithData : startWithData,
//       animateRotate : true,
//       animateScale : false,
//       animationByData : false,
//       animationSteps : 60,
//       canvasBorders : false,
//       canvasBordersWidth : 3,
//       canvasBordersColor : "black",
//       graphTitle : "",
//       //legend : true,
//       inGraphDataShow : true,
//       inGraphDataFontSize : 18,
//       inGraphDataFontColor : "black",
//       inGraphDataAlign : "center",
//       inGraphDataRadiusPosition : 3,
//       inGraphDataPaddingRadius :[0,-50],
//       animationEasing: "linear",
//      // annotateDisplay : true,
//       spaceBetweenBar : 2,
//       graphTitleFontSize: 18,
//       responsive:true,
//       maintainAspectRatio : true,
//       responsiveMinWidth : 250,
//       inGraphDataTmpl : "<%= v1+' '+Math.floor(v2)+'%' %>",
//        segmentStrokeColor: "transparent" 

// }

// var opt3 = {
//       animationStartWithDataset : startWithDataset,
//       animationStartWithData : startWithData,
//       animateRotate : true,
//       animateScale : false,
//       animationByData : false,
//       animationSteps : 60,
//       canvasBorders : false,
//       canvasBordersWidth : 3,
//       canvasBordersColor : "black",
//       graphTitle : "",
//       legend : false,
//       inGraphDataShow : true,
//       inGraphDataFontSize : 18,
//       inGraphDataFontColor : "black",
//       inGraphDataAlign : "center",
//       inGraphDataRadiusPosition : 3,
//      // inGraphDataPaddingRadius :[-10,-10,-40,-10,-30],
//       inGraphDataPaddingRadius :[-35,-70],
//       animationEasing: "linear",
//       //annotateDisplay : true,
//       spaceBetweenBar : 2,
//       graphTitleFontSize: 18,
//       responsive:true,
//       maintainAspectRatio : true,
//       responsiveMinWidth : 250,
//       inGraphDataTmpl : "<%= Math.floor(v2) + ' ' + v1 %>",
//        segmentStrokeColor: "transparent" 

// }


	var mydata1 = [
	{
		//value : conVotes,
    value : dh_voteResultsByParty.conVotes,
		color: conBlue,
    title : "CON"
	},
	{
		value : dh_voteResultsByParty.ndpVotes,
		color: ndpOrng,
    title : "NDP"
	},
	{
		value : dh_voteResultsByParty.libVotes,
		color: libRed,
    title : "LIB"
	},
	{
		value : dh_voteResultsByParty.grnVotes,
		color: grnGrn,
    title : "GRN"
	},
	{
		value : dh_voteResultsByParty.bqVotes,
		color: bqBlue,
    title : "BQ"
	},
  {
    value : dh_voteResultsByParty.other,
    color: neutralColor,
    title : "other"
  }

];



// var mydata2 = [
// 	{
// 		value : 39,
// 		color: "#3333CC",
//     title : "Conservative"
// 	},
// 	{
// 		value : 61,
// 		color: "#F7E3A4",
//     title : "Centre and Progressive"
// 	}
// ];


// var mydata3 = [
//   {
//     value : 149,
//     color: conBlue,
//     title : "Conservative Seats"
//   },
//   {
//     value : 159,
//     color: '#F7E3A4',
//     title : "Centre and Progressive Seats"
//   }
// ];

window.onload = function(){

(function($) {
  $(document).ready(function(){
      //remove where value is 0
      mydata1 = $.grep(mydata1, function(e){ 
         return e.value != 0; 
      });
     });
}(jQuery));


		//var ctx1 = document.getElementById("chart-01").getContext("2d").Pie(mydata2,opt1);
		//window.myBar = new Chart(ctx1).Bar(barChartData, {
		//	responsive : true, maintainAspectRatio : true
		//});
		var myPie1 = new Chart(document.getElementById("chart-01").getContext("2d")).Pie(mydata1,opt1);
		// var myPie2 = new Chart(document.getElementById("chart-02").getContext("2d")).Pie(mydata2,opt2);
  //   var myPie3 = new Chart(document.getElementById("chart-03").getContext("2d")).Pie(mydata3,opt3);
		//var myPie = new Chart(document.getElementById("chart-03").getContext("2d")).Pie(mydata2,opt3);
		// var ctx2 = document.getElementById("chart-02").getContext("2d");
		// window.myBar = new Chart(ctx2).Line(barChartData, {
		// 	responsive : true, maintainAspectRatio : true
		// });
		
	}