<?php
defined('BASE_ADMIN') OR exit('No direct script access allowed');
include "Admin.php";
class Tools extends Admin {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
	}
	public function index(){
		$show_database = $this->db->list_tables();
		$field = [];
		if($this->input->get("database")){
			$field = $this->db->list_fields($this->input->get("database"));
		}
		
		return $this->views->layout("tools/dashboard",["database" => $show_database, "field" => $field]);
	}

	public function gendata($arv=""){
		$fields = [];
		if($arv){
			
			$fields = $this->db->field_data($arv);
		}

		
		
		$post = $this->input->post();
		$gen = [];
		$prekey = false;
		$gen_data_field = [];
		foreach ($fields as $key => $value) {
			if($value->primary_key == 1 && !$prekey){
				$prekey = $value->name;
			}
			if(isset($post[$value->name]["render"])){
				$gen[$value->name] = $post[$value->name];
				$gen_data_field[$value->name] = $value;

			}
		}
		$this->genLayout($gen, $arv, $prekey, $gen_data_field);
		$this->genController($gen, $arv, $prekey);
	}


	private function genLayout($arvm,$suppath, $prekey, $gen_data_field){
		
		$folder = VIEWPATH."/".$suppath;
		if(!is_dir($folder)){
			mkdir($folder);
			chmod($folder, 0777);
		}
		

		/*
		Create File
		*/
		$zoomHtml = read_file(VIEWPATH."/genlayout/form.php");

		$html = '';
		foreach ($arvm as $key => $value) {
			$input = $this->geninput($key,$gen_data_field);
			$html .= '<div class="form-group row">
    <label for="input_'.$key.'" class="col-sm-2 col-form-label">'.$key.'</label>
    <div class="col-sm-10">
      '.$input.'
    </div>
  </div>';
		}

		$html = str_replace('{{DATA}}',$html,$zoomHtml);
		$html = str_replace('{{ACTION}}',$suppath.'/created/',$html);

		write_file($folder."/created.php",$html,"wb");

		/*
		Dashboad
		*/

		$html = read_file(VIEWPATH."/genlayout/dashboard.php");

		$header = '';
		$content = '';
		foreach ($arvm as $key => $value) {
			$header .= '<th><?php $this->views->lang("'.$key.'");?></th>'."\n\t\t\t\t";
			$content .= '<td><?php echo $value->'.$key.';?></td>'."\n\t\t\t\t";
		}

		$html = str_replace('{{header}}',$header,$html);
		$html = str_replace('{{content}}',$content,$html);
		$html = str_replace('{{database}}',$suppath,$html);
		$html = str_replace('{{prekey}}',$prekey,$html);

		$html = str_replace(['{{URLEDIT}}','{{URLDELETE}}','{{URLCREATE}}'],['<?php echo admin_url("'.$suppath.'/created/".$value->'.$prekey.');?>','<?php echo admin_url("'.$suppath.'/delete/".$value->'.$prekey.');?>','<?php echo admin_url("'.$suppath.'/created/");?>'],$html);

		write_file($folder."/dashboard.php",$html,"wb");


	}



	private function genController($arvm,$suppath, $prekey){
		$filecontroller = APPPATH."/controllers/".ucfirst($suppath).".php";
		$html = read_file(VIEWPATH."/genlayout/controller.php");
		$insert_field = []; $insert_value =[]; $inputval = []; $update_field = [];
		foreach ($arvm as $key => $value) {
			$insert_field[] = $key;
			$insert_value[] = '\'".$'.$key.'."\'';
			$inputval[] = '$'.$key.' = $this->input->post("'.$key.'");';
			$update_field[] = $key.' = \'".$'.$key.'."\'';
		}
		$html = str_replace('{{ClassName}}',ucfirst($suppath), $html);
		$html = str_replace(['{{suppath}}','{{database}}'],$suppath, $html);
		$html = str_replace('{{prikey}}',$prekey, $html);
		$html = str_replace('{{insert_field}}',implode($insert_field, ', '), $html);
		$html = str_replace('{{insert_value}}',implode($insert_value, ', '), $html);
		$html = str_replace('{{update_field}}',implode($update_field, ', '), $html);

		$html = str_replace('{{INPUTVAL}}',implode($inputval, "\n\t\t\t\t"), $html);
		
		//if(!file_exists($filecontroller)){
			write_file($filecontroller,$html,"wb");
		//}
		
	}


	private function geninput($key,$arv=[]){
		
		if($arv[$key]->type == "varchar"){

			$input = '<input type="text" name="'.$key.'" class="form-control" id="input_'.$key.'" placeholder="'.$key.'" value="<?php echo $data->'.$key.';?>" max-length="'.$arv[$key]->max_length.'">';

		}else if($arv[$key]->type == "int"){
			if($arv[$key]->max_length == 1){

				

				$input = '<div class="form-check form-check-inline"><input type="radio" name="'.$key.'" class="form-check-input" id="inline'.$key.'0" value="0" <?php echo ($data->'.$key.' == 0 ? "selected" : "");?>> <label class="form-check-label" for="inline'.$key.'0">Off</label>
</div>';
				$input .= '<div class="form-check form-check-inline"><input type="radio" name="'.$key.'" class="form-check-input" id="inline'.$key.'1" value="1" <?php echo ($data->'.$key.' == 1 ? "selected" : "");?>> <label class="form-check-label" for="inline'.$key.'1">On</label>
</div>';

			}else{
				$input = '<input type="number" name="'.$key.'" class="form-control" id="input_'.$key.'" placeholder="'.$key.'" value="<?php echo $data->'.$key.';?>">';
			}
		}else if($arv[$key]->type == "text"){
			$input = '<textarea  name="'.$key.'" class="form-control height-500" id="input_'.$key.'" placeholder="'.$key.'" ><?php echo $data->'.$key.';?></textarea>';
		}

		return $input;
	}
}