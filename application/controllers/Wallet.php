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
		$data = $this->api("exchange/order");
		return $this->views->layout("wallet/dashboard",["data" => $data]);
	}
}