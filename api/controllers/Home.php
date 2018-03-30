<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Api;
class Home extends Api {

	
	public function index_get()
	{
		  $this->response($this->db->get('account')->result());
	}
}
