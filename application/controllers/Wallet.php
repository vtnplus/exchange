<?php
use Apps\Programs\Base;
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends Base {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->views->set_layout("layout/wallet");
		

	}

	public function index(){
		$coind = $this->api("coind");

		return $this->views->layout("wallet/dashboard",["coind" => $coind]);
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





}