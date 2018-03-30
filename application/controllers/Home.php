<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Base;
class Home extends Base {

	
	public function index()
	{
		return $this->views->layout('home');
	}
}
