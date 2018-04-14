<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Base;
class Exchange extends Base {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->views->set_layout("layout/static-exchange");
		$this->views->set_globals(["coind" => $this->api("coind")]);
		

	}



	public function index(){
		$data = $this->api("exchange/order");
		return $this->views->layout("exchange/dashboard",["data" => $data]);
	}

	public function trade($coinbase, $symbol){
		$data = $this->api("exchange/order");
		$balancer = $this->api("wallet/balancer",["symbol" => $symbol,"basecoins" => $coinbase]);

		$this->views->set_globals(["coinbase" => $coinbase, "symbol" => $symbol,"balancer" => $balancer]);
		return $this->views->layout("exchange/trade",["data" => $data,"coinbase" => $coinbase, "symbol" => $symbol,"balancer" => $balancer]);
	}
}