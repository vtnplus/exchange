<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Base;
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

	public function info($coind=""){
		$coind = $this->api("coind");

		return $this->views->layout("wallet/dashboard",["coind" => $coind]);
	}
}