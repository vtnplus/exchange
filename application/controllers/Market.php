<?php
use Apps\Programs\Base;
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends Base {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->views->set_layout("layout/wallet");
		

	}
}