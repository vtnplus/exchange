<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Base;
class Exchange extends Base {
	private $_api_url = "http://localhost/api/exchange";
	private $api = null;
	public function __construct()
	{
		parent::__construct();
		$this->views->set_layout("layout/exchange");
		$this->api = new Apps\Programs\Apiclient;

	}

	public function index(){
		$data = $this->api->get($this->_api_url."/order");
		return $this->views->layout("exchange/dashboard",["data" => $data["result"]]);
	}

	public function order(){
		return $this->views->json($this->api->get($this->_api_url."/order"));
	}
}