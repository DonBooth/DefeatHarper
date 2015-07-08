    
        BC      Feb,      April,  June
        Cons = [27.96, 34.13,27]
        Lib  = [38,29.3,23.5]
        NDP = [21.73,21.96,40]
        Green = [9.63,13.53,9.5]

        AB      Feb,      April,  June
        



        function DrawTheChart(ChartData, ChartOptions, ChartId, ChartType) 
        {
            eval('var myLine = new Chart(document.getElementById(ChartId).getContext("2d")).' + ChartType + '(ChartData,ChartOptions);
            document.getElementById(ChartId).getContext("2d").stroke();')
        }
    
        function MoreChartOptions() {}
        var ChartData = {
            labels: ["January",
                "February", "April", "June", 
            ],
            datasets: [{
                fillColor: "rgba(37,116,168,0.1)",
                strokeColor: "rgba(37,116,168,1)",
                pointColor: "rgba(37,116,168,1)",
                markerShape: "circle",
                pointStrokeColor: "rgba(255,255,255,1.00)",
                data: [65, 8, 90, 81, 56, 55, 40, ],
                title: "2013"
            }, {
                fillColor: "rgba(204,46,59,0.1)",
                strokeColor: "rgba(204,46,59,1)",
                pointColor: "rgba(204,46,59,1)",
                markerShape: "circle",
                pointStrokeColor: "rgba(255,255,255,1.00)",
                data: [21, 48, 40, 19, 96, 27, 100, ],
                title: "2014"
            }, ]
        };

        ChartOptions = {
            canvasBackgroundColor: 'rgba(255,255,255,1.00)',
            spaceLeft: 12,
            spaceRight: 12,
            spaceTop: 12,
            spaceBottom: 12,
            canvasBorders: false,
            canvasBordersWidth: 1,
            canvasBordersStyle: "solid",
            canvasBordersColor: "rgba(0,0,0,1)",
            yAxisMinimumInterval: 'none',
            scaleShowLabels: true,
            scaleShowLine: true,
            scaleLineStyle: "solid",
            scaleLineWidth: 1,
            scaleLineColor: "rgba(0,0,0,0.6)",
            scaleOverlay: false,
            scaleOverride: false,
            scaleSteps: 10,
            scaleStepWidth: 10,
            scaleStartValue: 0,
            legend: true,
            maxLegendCols: 5,
            legendBlockSize: 15,
            legendFillColor: 'rgba(255,255,255,0.00)',
            legendColorIndicatorStrokeWidth: 1,
            legendPosX: -2,
            legendPosY: 4,
            legendXPadding: 0,
            legendYPadding: 0,
            legendBorders: false,
            legendBordersWidth: 1,
            legendBordersStyle: "solid",
            legendBordersColors: "rgba(102,102,102,1)",
            legendBordersSpaceBefore: 5,
            legendBordersSpaceLeft: 5,
            legendBordersSpaceRight: 5,
            legendBordersSpaceAfter: 5,
            legendSpaceBeforeText: 5,
            legendSpaceLeftText: 5,
            legendSpaceRightText: 5,
            legendSpaceAfterText: 5,
            legendSpaceBetweenBoxAndText: 5,
            legendSpaceBetweenTextHorizontal: 5,
            legendSpaceBetweenTextVertical: 5,
            legendFontFamily: "'Open Sans'",
            legendFontStyle: "normal normal",
            legendFontColor: "rgba(0,0,0,1)",
            legendFontSize: 15,
            showYAxisMin: false,
            rotateLabels: "smart",
            xAxisBottom: true,
            yAxisLeft: true,
            yAxisRight: false,
            graphTitleSpaceBefore: 5,
            graphTitleSpaceAfter: 5,
            graphTitle: "Chart Title",
            graphTitleFontFamily: "'Open Sans'",
            graphTitleFontStyle: "normal normal",
            graphTitleFontColor: "rgba(52,152,219,1)",
            graphTitleFontSize: 26,
            graphSubTitleSpaceBefore: 0,
            graphSubTitleSpaceAfter: 5,
            graphSubTitle: "Add SubTitle Here",
            graphSubTitleFontFamily: "'Open Sans'",
            graphSubTitleFontStyle: "normal normal",
            graphSubTitleFontColor: "rgba(102,102,102,1)",
            graphSubTitleFontSize: 16,
            scaleFontFamily: "'Open Sans'",
            scaleFontStyle: "normal normal",
            scaleFontColor: "rgba(0,0,0,1)",
            scaleFontSize: 12,
            pointLabelFontFamily: "'Open Sans'",
            pointLabelFontStyle: "normal normal",
            pointLabelFontColor: "rgba(102,102,102,1)",
            pointLabelFontSize: 12,
            angleShowLineOut: true,
            angleLineStyle: "solid",
            angleLineWidth: 1,
            angleLineColor: "rgba(0,0,0,0.1)",
            percentageInnerCutout: 50,
            scaleShowGridLines: true,
            scaleGridLineStyle: "solid",
            scaleGridLineWidth: 1,
            scaleGridLineColor: "rgba(0,0,0,0.1)",
            scaleXGridLinesStep: 1,
            scaleYGridLinesStep: 3,
            segmentShowStroke: true,
            segmentStrokeStyle: "solid",
            segmentStrokeWidth: 2,
            segmentStrokeColor: "rgba(255,255,255,1.00)",
            datasetStroke: true,
            datasetFill: true,
            datasetStrokeStyle: "solid",
            datasetStrokeWidth: 2,
            bezierCurve: true,
            bezierCurveTension: 0.4,
            pointDotStrokeStyle: "solid",
            pointDotStrokeWidth: 1,
            pointDotRadius: 3,
            pointDot: true,
            barShowStroke: false,
            barBorderRadius: 0,
            barStrokeStyle: "solid",
            barStrokeWidth: 1,
            barValueSpacing: 15,
            barDatasetSpacing: 0,
            scaleShowLabelBackdrop: true,
            scaleBackdropColor: 'rgba(255,255,255,0.75)',
            scaleBackdropPaddingX: 2,
            scaleBackdropPaddingY: 2,
            animation: true,
            onAnimationComplete: function() {
                MoreChartOptions()
            }
        };
        DrawTheChart(ChartData, ChartOptions, "voter-history-chart", "Line");
    