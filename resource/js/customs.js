var getOrder = function(){
	var template = $("#getOrder").html();
	$.ajax('/exchange/order').done(function (data) {
		$.each(data.result, function(i,v){

			$("#order #item-"+i+" td:nth-child(1)").html(v.MarketName);
			$("#order #item-"+i+" td:nth-child(2)").html(v.Ask);
			$("#order #item-"+i+" td:nth-child(3)").html(v.Bid);
		})
	});
};

var getSell = function(){

};

var getBuy = function(){

}

var sendBuy = function(){

};

var sendSell = function(){

};

var updateChart = function(){

};

var getMyOrder = function(){

};


var chart =	function(){
		$.getJSON('/ohlcv.json', function (data) {

		    // split the data set into ohlc and volume
		    var ohlc = [],
		        volume = [],
		        dataLength = data.length,
		        // set the allowed units for data grouping
		        groupingUnits = [[
		            'week',                         // unit name
		            [1]                             // allowed multiples
		        ], [
		            'month',
		            [1, 2, 3, 4, 6]
		        ]],

		        i = 0;

		    for (i; i < dataLength; i += 1) {
		        ohlc.push([
		            data[i][0], // the date
		            data[i][1], // open
		            data[i][2], // high
		            data[i][3], // low
		            data[i][4] // close
		        ]);

		        volume.push([
		            data[i][0], // the date
		            data[i][5] // the volume
		        ]);
		    }


		    // create the chart
		    Highcharts.stockChart('containerChart', {

		        rangeSelector: {
		            selected: 1
		        },

		        title: {
		            text: 'AAPL Historical'
		        },

		        yAxis: [{
		            labels: {
		                align: 'right',
		                x: -3
		            },
		            title: {
		                text: 'OHLC'
		            },
		            height: '60%',
		            lineWidth: 2,
		            resize: {
		                enabled: true
		            }
		        }, {
		            labels: {
		                align: 'right',
		                x: -3
		            },
		            title: {
		                text: 'Volume'
		            },
		            top: '65%',
		            height: '35%',
		            offset: 0,
		            lineWidth: 2
		        }],

		        tooltip: {
		            split: true
		        },

		        series: [{
		            type: 'candlestick',
		            name: 'AAPL',
		            data: ohlc,
		            dataGrouping: {
		                units: groupingUnits
		            }
		        }, {
		            type: 'column',
		            name: 'Volume',
		            data: volume,
		            yAxis: 1,
		            dataGrouping: {
		                units: groupingUnits
		            }
		        }]
		    });
		});
	};

var catal = function(){
	var buyAmount = $(".buyForm [name=amount]");
	var buyTotals = $(".buyForm [name=totals]");
	var buyPrices = $(".buyForm [name=prices]");

	buyAmount.on("input", function(){
		buyTotals.val(buyAmount * buyPrices);
	});

	buyTotals.on("input", function(){
		buyAmount.val(buyTotals / buyPrices);
	});
};

jQuery(document).ready(function(){
	getOrder();
	setInterval(getOrder, 5000);
	catal();
});