// party colours
var conBlue = '#0071BC';
var ndpOrng = '#F7931E';
var libRed  = '#FF0000';
var bqBlue  = '#00FFFF';
var grnGrn  = '#006837';
var neutralColor = '#F7E3A4';

// //  BC
// var ConVotes = [27.96, 34.13,27];
// var LibVotes  = [38,29.3,23.5];
// var NDPVotes = [21.73,21.96,40];
// var GrnVotes = [9.63,13.53,9.5];
// var titleOfChart = "British Columbia";

// //  Alberta
// var ConVotes = [56.5, 47.8,44.0];
// var LibVotes  = [22.6,22.3,17.0];
// var NDPVotes = [13.2,21.7,34.0];
// var GrnVotes = [5.3,13.5,5.0];
// var titleOfChart = "Alberta";

// //  Sask/Man
// var ConVotes = [43.7, 40.7,33.5];
// var LibVotes  = [34.7,35.0,28.5];
// var NDPVotes = [16.7,18.0,33.0];
// var GrnVotes = [4.3,6.0,5.0];
// var titleOfChart = "Saskatchewan and Manitoba";

// //  Ontario
// var ConVotes = [37.5, 35.7,32.0];
// var LibVotes  = [38.1,33.1,32.0];
// var NDPVotes = [16.7,25.2,31.0];
// var GrnVotes = [5.8,5.1,5.0];
// var titleOfChart = "Ontario";

// //  Quebec
// var ConVotes = [20.3, 14.7,13.0];
// var LibVotes  = [25.6,25.6,23.5];
// var NDPVotes = [29.9,38.3,35.5];
// var GrnVotes = [4.3,3.5,4.0];
// var BlocVotes = [19.0,16.6,24.0];
// var titleOfChart = "Quebec";


function DrawTheChart(ChartData,ChartOptions,ChartId,ChartType){
eval('var myLine = new Chart(document.getElementById(ChartId).getContext("2d")).'+ChartType+'(ChartData,ChartOptions);document.getElementById(ChartId).getContext("2d").stroke();')
}

        
    
        function MoreChartOptions() {}
        var ChartData = {
            labels: [
                "February", "April", "June"
            ],
            datasets: [{
                //fillColor: conBlue,//"rgba(37,116,168,0.1)",
                strokeColor: conBlue,//"rgba(37,116,168,1)"
                //pointColor: "rgba(37,116,168,1)",
                //markerShape: "circle",
                //pointStrokeColor: "rgba(255,255,255,1.00)",
                data: voterHistory.ConVotes,
                title: "Conservative"
            }, {
                //fillColor: "rgba(204,46,59,0.1)",
                strokeColor: libRed,//"rgba(204,46,59,1)"
                //pointColor: "rgba(204,46,59,1)",
                //markerShape: "circle",
                //pointStrokeColor: "rgba(255,255,255,1.00)",
                data: voterHistory.LibVotes,
                title: "Liberal"
            },
            {
                //fillColor: "rgba(204,46,59,0.1)",
                strokeColor: ndpOrng,//"rgba(204,46,59,1)"
                //pointColor: "rgba(204,46,59,1)",
                //markerShape: "circle",
                //pointStrokeColor: "rgba(255,255,255,1.00)",
                data: voterHistory.NDPVotes,
                title: "NDP"
            },
            {
                //fillColor: "rgba(204,46,59,0.1)",
                strokeColor: grnGrn,//"rgba(204,46,59,1)"
                //pointColor: "rgba(204,46,59,1)",
                //markerShape: "circle",
                //pointStrokeColor: "rgba(255,255,255,1.00)",
                data: voterHistory.GrnVotes,
                title: "Green"
            },
            {
                //fillColor: "rgba(204,46,59,0.1)",
                strokeColor: bqBlue,//"rgba(204,46,59,1)"
                //pointColor: "rgba(204,46,59,1)",
                //markerShape: "circle",
                //pointStrokeColor: "rgba(255,255,255,1.00)",
                data: voterHistory.BlocVotes,
                title: "Bloc"
            },]
        };

        ChartOptions = {
            canvasBackgroundColor: 'rgba(255,255,255,0.01)',
            // spaceLeft: 12,
            // spaceRight: 12,
            // spaceTop: 12,
            // spaceBottom: 12,
            // canvasBorders: false,
            // canvasBordersWidth: 0,
            // canvasBordersStyle: "solid",
            // canvasBordersColor: "rgba(0,0,0,1)",
            // yAxisMinimumInterval: 'none',
            // scaleShowLabels: true,
            // scaleShowLine: true,
            // scaleLineStyle: "solid",
            // scaleLineWidth: 1,
            // scaleLineColor: "rgba(0,0,0,0.6)",
            // scaleOverlay: false,
            // scaleOverride: false,
            // scaleSteps: 10,
            // scaleStepWidth: 10,
            // scaleStartValue: 0,
            legend: true,
            // maxLegendCols: 5,
             legendBlockSize: 15,
            //legendFillColor: 'rgba(255,255,255,0.00)',
            legendColorIndicatorStrokeWidth: 4,
            // legendPosX: -2,
            // legendPosY: 4,
            // legendXPadding: 0,
            // legendYPadding: 0,
            legendBorders: false,
            // legendBordersWidth: 1,
            // legendBordersStyle: "solid",
            // legendBordersColors: "rgba(102,102,102,1)",
            // legendBordersSpaceBefore: 5,
            // legendBordersSpaceLeft: 5,
            // legendBordersSpaceRight: 5,
            // legendBordersSpaceAfter: 5,
            // legendSpaceBeforeText: 5,
            // legendSpaceLeftText: 5,
            // legendSpaceRightText: 5,
            // legendSpaceAfterText: 5,
            // legendSpaceBetweenBoxAndText: 5,
            // legendSpaceBetweenTextHorizontal: 5,
            // legendSpaceBetweenTextVertical: 5,
            // legendFontFamily: "'Open Sans'",
            // legendFontStyle: "normal normal",
            // legendFontColor: "rgba(0,0,0,1)",
            // legendFontSize: 15,
            // showYAxisMin: false,
            // rotateLabels: "smart",
            // xAxisBottom: true,
            // yAxisLeft: true,
            // yAxisRight: false,
            // graphTitleSpaceBefore: 5,
            // graphTitleSpaceAfter: 5,
            graphTitle: voterHistory.titleOfChart,
            // graphTitleFontFamily: "'Open Sans'",
            // graphTitleFontStyle: "normal normal",
            graphTitleFontColor: "rgba(52,152,219,1)",
            graphTitleFontSize: 26,
            // graphSubTitleSpaceBefore: 0,
            // graphSubTitleSpaceAfter: 5,
            graphSubTitle: "Rough average of polls from Election Almanac",
            // graphSubTitleFontFamily: "'Open Sans'",
            // graphSubTitleFontStyle: "normal normal",
            graphSubTitleFontColor: "rgba(102,102,102,1)",
            graphSubTitleFontSize: 16,
            // scaleFontFamily: "'Open Sans'",
            // scaleFontStyle: "normal normal",
            // scaleFontColor: "rgba(0,0,0,1)",
            // scaleFontSize: 12,
            // pointLabelFontFamily: "'Open Sans'",
            // pointLabelFontStyle: "normal normal",
            // pointLabelFontColor: "rgba(102,102,102,1)",
            // pointLabelFontSize: 12,
            // angleShowLineOut: true,
            // angleLineStyle: "solid",
            // angleLineWidth: 1,
            // angleLineColor: "rgba(0,0,0,0.1)",
            // percentageInnerCutout: 50,
            // scaleShowGridLines: true,
            // scaleGridLineStyle: "solid",
            // scaleGridLineWidth: 1,
            // scaleGridLineColor: "rgba(0,0,0,0.1)",
            // scaleXGridLinesStep: 1,
            // scaleYGridLinesStep: 3,
            // segmentShowStroke: true,
            // segmentStrokeStyle: "solid",
            // segmentStrokeWidth: 2,
            // segmentStrokeColor: "rgba(255,255,255,1.00)",
            // datasetStroke: true,
            datasetFill: false,
            // datasetStrokeStyle: "solid",
            // datasetStrokeWidth: 2,
            bezierCurve: true,
            bezierCurveTension: 0.2,
            // pointDotStrokeStyle: "solid",
            // pointDotStrokeWidth: 1,
            // pointDotRadius: 3,
            pointDot: false,
            barShowStroke: false,
            // barBorderRadius: 0,
            // barStrokeStyle: "solid",
            // barStrokeWidth: 1,
            // barValueSpacing: 15,
            // barDatasetSpacing: 0,
            // scaleShowLabelBackdrop: true,
            // scaleBackdropColor: 'rgba(255,255,255,0.01)',
            // scaleBackdropPaddingX: 2,
            // scaleBackdropPaddingY: 2,
            // animation: true,
            // //responsive settings:
            responsive:true,
            maintainAspectRatio : true,
            responsiveMinWidth : 300,
             onAnimationComplete: function() {
                MoreChartOptions()
            }
        };
        DrawTheChart(ChartData, ChartOptions, "voter-history-chart", "Line");
    