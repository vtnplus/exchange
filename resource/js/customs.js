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

jQuery(document).ready(function(){
	getOrder();
	setInterval(getOrder, 5000);
});