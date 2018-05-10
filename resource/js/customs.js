var getOrder = function(){
	
	
	$.ajax('/exchange/order/'+coinbase+'/'+symbol).done(function (data) {
		
		totals = 0;

		$("#sell td").html("");
		$.each(data.sell, function(i,v){
			totals = parseFloat(totals) + parseFloat(v.trade_amount * v.trade_prices);
			$("#sell #item-"+i+" td.amount").html(MarkNumber(v.trade_amount));
			$("#sell #item-"+i+" td.prices").html(MarkNumber(v.trade_prices));
			$("#sell #item-"+i+" td.totals").html(MarkNumber(totals));
		});

		totals = 0;

		$.each(data.buy, function(i,v){
			totals = parseFloat(totals) + parseFloat(v.trade_amount * v.trade_prices);

			$("#buy #item-"+i+" td.amount").html(MarkNumber(v.trade_amount));
			$("#buy #item-"+i+" td.prices").html(MarkNumber(v.trade_prices));
			$("#buy #item-"+i+" td.totals").html(MarkNumber(totals));
		})
	});
};

var MarkNumber = function(text){
	return new Intl.NumberFormat("en-US", {useGrouping: false, minimumFractionDigits: 2, maximumFractionDigits: 7}).format(text);
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

	$.ajax('/exchange/myorder/'+coinbase+'/'+symbol).done(function (data) {
		
		totals = 0;

		var html = "";
		$.each(data, function(i,v){
			totals = totals + (v.trade_amout * v.trade_prices);
			html += '<tr><td></td><td></td><td></td><td></td></tr>';
		});
		$("#myorder tbody").html(html);
		
	});

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
	$("form.buyForm input[name=amount]").on("input change", function(){
		var balancer = MarkNumber($("form.buyForm").attr("data-balancer"));
		var prices = MarkNumber($("form.buyForm input[name=prices]").val());
		$("form.buyForm input[name=totals]").val(prices * $(this).val());
	});

	$("form.buyForm input[name=prices]").on("input change", function(){
		var balancer = MarkNumber($("form.buyForm").attr("data-balancer"));
		var amount = MarkNumber($("form.buyForm input[name=amount]").val());
		$("form.buyForm input[name=totals]").val(amount * $(this).val());
	});

};


var saveOrder = function(prices, amount, type){
	var tym = "";
	if(type == "sell"){
		tym = "sell";
	}else if(type == "buy"){
		tym = "buy";
	}

	if(!tym || prices || amount) {
		alert("Error");
		return false;
	}

	$.ajax({
        url: "/exchange/submit",
        type: "post",
        data: {symbol : symbol, coinbase : coinbase, prices : prices, amount : amount}
    }).done(function(data){
    	alert(data);
    });
};

var sellprofucts = function(){
	$("#btnSell").on("click", function(){
		var form = $(this).parent().find("form.sellForm");
		var prices = form.find("input[name=prices]").val();
		var amount = form.find("input[name=amount]").val();
		saveOrder(prices, amount,"sell");
		form.find("input[name=prices]").val("");
		form.find("input[name=amount]").val("");
		form.find("input[name=totals]").val("");
	});
};
var buyprofucts = function(){
	$("#btnBuy").on("click", function(){
		var form = $(this).parent().find("form.buyForm");
		var prices = form.find("input[name=prices]").val();
		var amount = form.find("input[name=amount]").val();
		saveOrder(prices, amount,"buy");
		form.find("input[name=prices]").val("");
		form.find("input[name=amount]").val("");
		form.find("input[name=totals]").val("");
	});
};

var buySellClick = function(){
	$("#sell tr").on("click", function(){
		
		var amount = $(this).find("td.amount").text();
		var prices = MarkNumber($(this).find("td.prices").text());
		var totals = MarkNumber($(this).find("td.totals").text());
		var balancer = MarkNumber($("form.buyForm").attr("data-balancer"));
		
		var arm = 0;
		if(balancer > totals){
			arm = amount;
		}else{
			arm = MarkNumber(balancer / prices);
		}


		$("form.buyForm input[name=amount]").val(arm);
		$("form.buyForm input[name=prices]").val(prices);
		$("form.buyForm input[name=totals]").val(totals);

		$("#buy tr:eq( "+$(this).index()+" )").click();
	});

	$("#buy tr").on("click", function(){
		
		var amount = MarkNumber($(this).find("td.amount").text());
		var prices = MarkNumber($(this).find("td.prices").text());
		var totals = MarkNumber($(this).find("td.totals").text());

		$("form.sellForm input[name=amount]").val(amount);
		$("form.sellForm input[name=prices]").val(prices);
		$("form.sellForm input[name=totals]").val(totals);
		//$("#sell tr:eq( "+$(this).index()+" )").click();
	});

	//$("#sell tr:nth-child( 1 )").click();
};


jQuery(document).ready(function(){
	buySellClick();
	sellprofucts();
	buyprofucts();
	getOrder();
	setInterval(getOrder, 5000);


	getMyOrder();
	catal();
});