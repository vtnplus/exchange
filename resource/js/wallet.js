var walletHistory = function(){
	$.ajax('/wallet/history/'+symbol).done(function (data) {
		$("#loadHistory").html(data);
	});
};


jQuery(document).ready(function(){
	walletHistory();
	setInterval(walletHistory, 60000);
});