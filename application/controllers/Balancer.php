<?php
defined('BASE_ADMIN') OR exit('No direct script access allowed');
include "Admin.php";
class Balancer extends Admin {
	public function __construct()
	{
		parent::__construct();
		
	}
	public function index(){
		
		$data = $this->db->query("select * from balancer")->result();
		return $this->views->layout("balancer/dashboard",["data" => $data]);
	}

	public function created($id=false){
		$data = [];
		if($this->input->post("submit") == 1){


				$account_id = $this->input->post("account_id");
				$coind_symbol = $this->input->post("coind_symbol");
				$balancer_private = $this->input->post("balancer_private");
				$balancer_trader = $this->input->post("balancer_trader");
				$balancer_created = $this->input->post("balancer_created");
				$balancer_updated = $this->input->post("balancer_updated");
			


			if(intval($id) == 0){
				$this->db->query("insert into balancer (account_id, coind_symbol, balancer_private, balancer_trader, balancer_created, balancer_updated) VALUES ('".$account_id."', '".$coind_symbol."', '".$balancer_private."', '".$balancer_trader."', '".$balancer_created."', '".$balancer_updated."')");
				$this->go(admin_url('balancer/index'),["msg" => "Tạo thành công"]);
			}else{
				$this->db->query("update balancer set account_id = '".$account_id."', coind_symbol = '".$coind_symbol."', balancer_private = '".$balancer_private."', balancer_trader = '".$balancer_trader."', balancer_created = '".$balancer_created."', balancer_updated = '".$balancer_updated."' where balancer_id='".$id."'");
				$this->go(admin_url('balancer/index'),["msg" => "Cập nhập thành công"]);
			}

			
		}
		if(intval($id) > 0){
			$data = $this->db->query("select * from balancer where balancer_id = '".$id."'")->row();
		}
		return $this->views->layout("balancer/created",["data" => $data,"id" => $id]);
	}

	public function delete($id=false){
		if(intval($id) > 0){
			$data = $this->db->query("delete * from balancer where balancer_id = '".$id."'");
		}
		$this->go(admin_url('balancer/index'),["msg" => "Xóa thành công"]);
	} 
}