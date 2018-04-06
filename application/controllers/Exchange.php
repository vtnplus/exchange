<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Base;
class Exchange extends Base {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->views->set_layout("layout/exchange");
		

	}


	



	public function index(){
		$data = $this->api("exchange/order");
		return $this->views->layout("exchange/dashboard",["data" => $data]);
	}

	public function order(){
		return $this->views->json($this->api->get($this->_api_url."/order"));
	}
}