// party colours

var conBlue = '#0071BC';
var ndpOrng = '#F7931E';
var libRed  = '#FF0000';
var bqBlue  = '#00FFFF';
var grnGrn  = '#006837';
var neutralColor = '#F7E3A4';



// var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	// var barChartData = {
	// 	labels : ["January","February","March","April","May","June","July"],
	// 	datasets : [
	// 		{
	// 			fillColor : "rgba(220,220,220,0.5)",
	// 			strokeColor : "rgba(220,220,220,0.8)",
	// 			highlightFill: "rgba(220,220,220,0.75)",
	// 			highlightStroke: "rgba(220,220,220,1)",
	// 			//data:[4,2,4,3,57,9,12]
	// 			data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
	// 		},
	// 		{
	// 			fillColor : "rgba(151,187,205,0.5)",
	// 			strokeColor : "rgba(151,187,205,0.8)",
	// 			highlightFill : "rgba(151,187,205,0.75)",
	// 			highlightStroke : "rgba(151,187,205,1)",
	// 			//data:[11,13,45,3,55,6]
	// 			data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
	// 		}
	// 	]

	// }

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
      canvasBordersWidth : 3,
      canvasBordersColor : "black",
      graphTitle : "",
      //legend : true,
      inGraphDataShow : true,
      inGraphDataFontSize : 18,
      inGraphDataFontColor : "black",
      inGraphDataAlign : "center",
      inGraphDataRadiusPosition : 3,
      inGraphDataPaddingRadius :[+10,0,0,-12,-6],
      animationEasing: "linear",
     // annotateDisplay : true,
      spaceBetweenBar : 2,
      graphTitleFontSize: 18,
      responsive:true,
      maintainAspectRatio : true,
      responsiveMinWidth : 250,
      inGraphDataTmpl : "<%= v1+' '+Math.floor(v2)+'%' %>",
       segmentStrokeColor: "transparent" 

}
var opt2 = {
      animationStartWithDataset : startWithDataset,
      animationStartWithData : startWithData,
      animateRotate : true,
      animateScale : false,
      animationByData : false,
      animationSteps : 60,
      canvasBorders : false,
      canvasBordersWidth : 3,
      canvasBordersColor : "black",
      graphTitle : "",
      //legend : true,
      inGraphDataShow : true,
      inGraphDataFontSize : 18,
      inGraphDataFontColor : "black",
      inGraphDataAlign : "center",
      inGraphDataRadiusPosition : 3,
      inGraphDataPaddingRadius :[0,-50],
      animationEasing: "linear",
     // annotateDisplay : true,
      spaceBetweenBar : 2,
      graphTitleFontSize: 18,
      responsive:true,
      maintainAspectRatio : true,
      responsiveMinWidth : 250,
      inGraphDataTmpl : "<%= v1+' '+Math.floor(v2)+'%' %>",
       segmentStrokeColor: "transparent" 

}

var opt3 = {
      animationStartWithDataset : startWithDataset,
      animationStartWithData : startWithData,
      animateRotate : true,
      animateScale : false,
      animationByData : false,
      animationSteps : 60,
      canvasBorders : false,
      canvasBordersWidth : 3,
      canvasBordersColor : "black",
      graphTitle : "",
      legend : false,
      inGraphDataShow : true,
      inGraphDataFontSize : 18,
      inGraphDataFontColor : "black",
      inGraphDataAlign : "center",
      //inGraphDataRadiusPosition : 10,
      inGraphDataPaddingRadius :[0,-60,-50,-30,-10],
      //inGraphDataPaddingRadius :[-35,-70],
      animationEasing: "linear",
      //annotateDisplay : true,
      spaceBetweenBar : 2,
      graphTitleFontSize: 18,
      responsive:true,
      maintainAspectRatio : true,
      responsiveMinWidth : 250,
      inGraphDataTmpl : "<%= Math.floor(v2) + ' ' + v1 %>",
       segmentStrokeColor: "transparent" 

}


	var mydata1 = [
	{
		value : 39,
		color: "#3333CC",
    title : "CON"
	},
	{
		value : 31,
		color: "#F15A24",
    title : "NDP"
	},
	{
		value : 12,
		color: "#FF0000",
    title : "LIB"
	},
	{
		value : 4,
		color: "#00A14B",
    title : "GRN"
	},
	{
		value : 6,
		color: "#29ABE2",
    title : "BQ"
	}
];

var mydata2 = [
	{
		value : 39,
		color: "#3333CC",
    title : "Conservative"
	},
	{
		value : 61,
		color: "#F7E3A4",
    title : "Centre and Progressive"
	}
];

// 1 in 50 seats
var mydata3 = [
  {
    value : 145,
    color: conBlue,
    title : "Conservative seats"
  },
  {
    value : 128,
    color: ndpOrng,
    title : "NDP seats"
  },
  {
    value : 60,
    color: libRed,
    title : "Liberal seats"
  },
  {
    value : 1,
    color: grnGrn,
    title : "Green seats"
  },
  {
    value : 4,
    color: bqBlue,
    title : "Bloc seats"
  }
];

var mydata4 = [
  {
    value : 123,
    color: conBlue,
    title : "Conservative seats"
  },
  {
    value : 137,
    color: ndpOrng,
    title : "NDP seats"
  },
  {
    value : 73,
    color: libRed,
    title : "Liberal seats"
  },
  {
    value : 1,
    color: grnGrn,
    title : "Green seats"
  },
  {
    value : 4,
    color: bqBlue,
    title : "Bloc seats"
  }
];

// National
// $regional_votes = array(
// ConVotes => [32.4,33.8,29.5],
// LibVotes  => [33.3,30.2,25.3],
// NDPVotes => [22.7,22.3,33.4],
// GrnVotes => [5.2,7.6,5.4],
// BlocVotes => [32.4,4.4,5.6],


var LineChartData = {
            labels: [
                "February", "April", "June"
            ],
            datasets: [{
                //fillColor: conBlue,//"rgba(37,116,168,0.1)",
                strokeColor: conBlue,//"rgba(37,116,168,1)"
                //pointColor: "rgba(37,116,168,1)",
                //markerShape: "circle",
                //pointStrokeColor: "rgba(255,255,255,1.00)",
                data: [32.4,33.8,29.5],
                title: "Conservative"
            }, {
                //fillColor: "rgba(204,46,59,0.1)",
                strokeColor: libRed,//"rgba(204,46,59,1)"
                //pointColor: "rgba(204,46,59,1)",
                //markerShape: "circle",
                //pointStrokeColor: "rgba(255,255,255,1.00)",
                data: [33.3,30.2,25.3],
                title: "Liberal"
            },
            {
                //fillColor: "rgba(204,46,59,0.1)",
                strokeColor: ndpOrng,//"rgba(204,46,59,1)"
                //pointColor: "rgba(204,46,59,1)",
                //markerShape: "circle",
                //pointStrokeColor: "rgba(255,255,255,1.00)",
                data: [22.7,22.3,33.4],
                title: "NDP"
            },
            {
                //fillColor: "rgba(204,46,59,0.1)",
                strokeColor: grnGrn,//"rgba(204,46,59,1)"
                //pointColor: "rgba(204,46,59,1)",
                //markerShape: "circle",
                //pointStrokeColor: "rgba(255,255,255,1.00)",
                data: [5.2,7.6,5.4],
                title: "Green"
            },
            {
                //fillColor: "rgba(204,46,59,0.1)",
                strokeColor: bqBlue,//"rgba(204,46,59,1)"
                //pointColor: "rgba(204,46,59,1)",
                //markerShape: "circle",
                //pointStrokeColor: "rgba(255,255,255,1.00)",
                data: [32.4,4.4,5.6],
                title: "Bloc"
            },]
        };

var LineChartOptions = {
            canvasBackgroundColor: 'rgba(255,255,255,0.01)',
            
            legend: true,
            
             legendBlockSize: 15,
            
            legendColorIndicatorStrokeWidth: 4,
           
            legendBorders: false,
           
            graphTitle: "National Voter Polls",
       
            graphTitleFontColor: "rgba(52,152,219,1)",
            graphTitleFontSize: 26,
          
            graphSubTitle: "Rough average of polls from Election Almanac",
      
            graphSubTitleFontColor: "rgba(102,102,102,1)",
            graphSubTitleFontSize: 16,
    
            datasetFill: false,
           
            bezierCurve: true,
            bezierCurveTension: 0.2,
           
            pointDot: false,
            barShowStroke: false,
           
            // //responsive settings:
            responsive:true,
            maintainAspectRatio : true,
            responsiveMinWidth : 300,
             
            };






window.onload = function(){




		//var ctx1 = document.getElementById("chart-01").getContext("2d").Pie(mydata2,opt1);
		//window.myBar = new Chart(ctx1).Bar(barChartData, {
		//	responsive : true, maintainAspectRatio : true
		//});
		var myPie1 = new Chart(document.getElementById("chart-01").getContext("2d")).Pie(mydata1,opt1);
		var myPie2 = new Chart(document.getElementById("chart-02").getContext("2d")).Pie(mydata2,opt2);
   // var myPie3 = new Chart(document.getElementById("chart-03").getContext("2d")).Pie(mydata3,opt3);
    //var myPie4 = new Chart(document.getElementById("chart-04").getContext("2d")).Pie(mydata4,opt3);
    var myLine  = new Chart(document.getElementById("national-line-chart").getContext("2d")).Line(LineChartData,LineChartOptions);
                      //Chart(document.getElementById(ChartId).getContext("2d")).'+ChartType+'(ChartData,ChartOptions);document.getElementById(ChartId).getContext("2d").stroke();')


		//var myPie = new Chart(document.getElementById("chart-03").getContext("2d")).Pie(mydata2,opt3);
		// var ctx2 = document.getElementById("chart-02").getContext("2d");
		// window.myBar = new Chart(ctx2).Line(barChartData, {
		// 	responsive : true, maintainAspectRatio : true
		// });
		
	}