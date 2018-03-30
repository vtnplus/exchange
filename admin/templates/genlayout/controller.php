<?php
defined('BASE_ADMIN') OR exit('No direct script access allowed');
include "Admin.php";
class {{ClassName}} extends Admin {
	public function __construct()
	{
		parent::__construct();
		
	}
	public function index(){
		
		$data = $this->db->query("select * from {{database}}")->result();
		return $this->views->layout("{{suppath}}/dashboard",["data" => $data]);
	}

	public function created($id=false){
		$data = [];
		if($this->input->post("submit") == 1){


				{{INPUTVAL}}
			


			if(intval($id) == 0){
				$this->db->query("insert into {{database}} ({{insert_field}}) VALUES ({{insert_value}})");
				$this->go(admin_url('{{suppath}}/index'),["msg" => "Tạo thành công"]);
			}else{
				$this->db->query("update {{database}} set {{update_field}} where {{prikey}}='".$id."'");
				$this->go(admin_url('{{suppath}}/index'),["msg" => "Cập nhập thành công"]);
			}

			
		}
		if(intval($id) > 0){
			$data = $this->db->query("select * from {{database}} where {{prikey}} = '".$id."'")->row();
		}
		return $this->views->layout("{{suppath}}/created",["data" => $data,"id" => $id]);
	}

	public function delete($id=false){
		if(intval($id) > 0){
			$data = $this->db->query("delete * from {{database}} where {{prikey}} = '".$id."'");
		}
		$this->go(admin_url('{{suppath}}/index'),["msg" => "Xóa thành công"]);
	} 
}