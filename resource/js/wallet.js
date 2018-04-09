var walletHistory = function(){
	$.ajax('/wallet/history/'+symbol).done(function (data) {
		$("#loadHistory").html(data);
	});
};


var Withdraw = function(){
	$("#send_withdraw").on("click", function(){
		var withdraw_amount = $("#withdraw_amount").val();
		var withdraw_wallet = $("#withdraw_wallet").val();

		if(withdraw_amount < 0 || !withdraw_amount){
			alert("Enter Emount");
			return false;
		}

		if(!withdraw_amount){
			alert("Enter Wallet");
			return false;
		}

		$.ajax({
	        url: "/wallet/withdraw/",
	        type: "post",
	        data: {symbol : symbol, withdraw_amount : withdraw_amount, withdraw_wallet : withdraw_wallet}
	    }).done(function(data){

	    });
	});
};



var WithdrawTrade = function(){
	$("#sendtrade").on("click", function(){
		var sendtrade_amount = $("#sendtrade_amount").val();
		

		if(sendtrade_amount < 0 || !sendtrade_amount){
			alert("Enter Emount");
			return false;
		}

		

		$.ajax({
	        url: "/wallet/withdraw_trade/",
	        type: "post",
	        data: {symbol : symbol, sendtrade_amount : sendtrade_amount}
	    }).done(function(data){
	    	alert(data);
	    });
	});
};



jQuery(document).ready(function(){
	walletHistory();
	
	Withdraw();
	WithdrawTrade();

	setInterval(walletHistory, 60000);
});