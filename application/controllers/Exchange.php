<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Base;
class Exchange extends Base {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->views->set_layout("layout/static-exchange");
		//$this->views->set_globals([]);
		

	}



	public function index(){
		$this->go("exchange/trade/BTC/PIRL");
	}

	public function trade($coinbase, $symbol){
		$data = $this->api("exchange/order",["symbol" => $symbol,"basecoins" => $coinbase]);
		$balancer = $this->set_login()->api("wallet/balancer",["symbol" => $symbol,"basecoins" => $coinbase]);
		
		$this->views->set_globals(["coinbase" => $coinbase, "symbol" => $symbol,"balancer" => $balancer,"coind" => $this->api("coind",["basecoins" => $coinbase])]);
		
		return $this->views->layout("exchange/trade",["title" => $coinbase."-".$symbol." Trader", "data" => $data,"coinbase" => $coinbase, "symbol" => $symbol,"balancer" => $balancer]);
	}

	public function order($coinbase, $symbol){
		$data = $this->api("exchange/order",["symbol" => $symbol,"basecoins" => $coinbase]);
		return $this->views->json($data);
	}

	public function myorder($coinbase, $symbol){
		$data = $this->api("exchange/myorder",["symbol" => $symbol,"basecoins" => $coinbase]);
		return $this->views->json($data);
	}

	public function submit(){

	}
}