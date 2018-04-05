<?php
use Apps\Programs\Api;
defined('BASEPATH') OR exit('No direct script access allowed');

class Exchange extends Api {

	
	public function index_get()
	{
		return $this->response(["success" => true, "message" => "", "result" => []]);
	}

	public function currencies_get()
	{
		return $this->response(["success" => true, "message" => "", "result" => []]);
	}

	public function sell_post()
	{

		return $this->response(["success" => true, "message" => "", "result" => []]);
	}

	public function buy_post()
	{
		return $this->response(["success" => true, "message" => "", "result" => []]);
	}

	public function order_get()
	{
		$arv = [];
		
		$arv[] = [
			"MarketName" => "BTC-LTC",
			"High" => 0.01350000,
			"Low" => 0.01200000,
			"Volume" => 3833.97619253,
			"Last" => 0.01349998,
			"BaseVolume" => 47.03987026,
			"TimeStamp" => "2014-07-09T07:22:16.72",
			"Bid" => 0.01271001,
			"Ask" => 0.01291100,
			"OpenBuyOrders" => 45,
			"OpenSellOrders" => 45,
			"PrevDay" => 0.01229501,
			"Created" => "2014-02-13T00:00:00",
			"DisplayMarketName" => null
		];

		$arv[] = [
			"MarketName" => "BTC-ETC",
			"High" => 0.01350000,
			"Low" => 0.01200000,
			"Volume" => 3833.97619253,
			"Last" => 0.01349998,
			"BaseVolume" => 47.03987026,
			"TimeStamp" => "2014-07-09T07:22:16.72",
			"Bid" => 0.01271001,
			"Ask" => 0.01291100,
			"OpenBuyOrders" => 45,
			"OpenSellOrders" => 45,
			"PrevDay" => 0.01229501,
			"Created" => "2014-02-13T00:00:00",
			"DisplayMarketName" => null
		];

		$arv[] = [
			"MarketName" => "BTC-ETH",
			"High" => 0.01350000,
			"Low" => 0.01200000,
			"Volume" => 3833.97619253,
			"Last" => 0.01349998,
			"BaseVolume" => 47.03987026,
			"TimeStamp" => "2014-07-09T07:22:16.72",
			"Bid" => 0.01271001,
			"Ask" => 0.01291100,
			"OpenBuyOrders" => 45,
			"OpenSellOrders" => 45,
			"PrevDay" => 0.01229501,
			"Created" => "2014-02-13T00:00:00",
			"DisplayMarketName" => null
		];
		
		return $this->response(["success" => true, "message" => "", "result" => $arv]);
	}


}