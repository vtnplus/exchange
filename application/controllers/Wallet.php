<?php
use Apps\Programs\Base;
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends Base {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->views->set_layout("layout/wallet");
		$this->api_login();
		$this->views->set_globals(["coind" => $this->api("coind")]);
	}

	public function index(){
		$coind = $this->api("coind");

		return $this->views->layout("wallet/dashboard");
	}

	public function info($symbol=""){
		$coind = $this->api("coind");
		$info = $this->api("wallet/balancer",["symbol" => $symbol]);

		return $this->views->layout("wallet/coind",["coind" => $coind, "info" => $info]);
	}


	public function general($symbol=""){
		$this->api("wallet/general",["symbol" => $symbol]);
		$this->go("wallet/info/".$symbol);
	}


	public function history($symbol=""){
		$data = $this->api("wallet/history",["symbol" => $symbol]);
		return $this->views->block("wallet/history",["data" => $data]);
	}


	public function withdraw(){
		$withdraw = $this->input->post("withdraw");
		$symbol = $this->input->post("symbol");
		$data = $this->api("wallet/withdraw",["symbol" => $symbol, "withdraw" => $withdraw]);
		return $this->views->json($data);
	}

	public function withdraw_trade(){
		$sendtrade_amount = $this->input->post("sendtrade_amount");
		$symbol = $this->input->post("symbol");
		$data = $this->api("wallet/withdraw_trade",["symbol" => $symbol, "sendtrade_amount" => $sendtrade_amount]);
		return $this->views->json([$symbol]);
	}

}