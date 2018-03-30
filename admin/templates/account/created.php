<div class="card">
	<div class="card-body">
	<h3>Controller Contents <div class="pull-right"><button class="btn btn-primary">Submit</button></div></h3>
	<hr>
	<form action="<?php echo admin_url("account/created//$id");?>" method="post" accept="UTF-8">
	<div class="form-group row">
    <label for="input_account_email" class="col-sm-2 col-form-label">account_email</label>
    <div class="col-sm-10">
      <input type="text" name="account_email" class="form-control" id="input_account_email" placeholder="account_email" value="<?php echo $data->account_email;?>" max-length="255">
    </div>
  </div><div class="form-group row">
    <label for="input_account_password" class="col-sm-2 col-form-label">account_password</label>
    <div class="col-sm-10">
      <input type="text" name="account_password" class="form-control" id="input_account_password" placeholder="account_password" value="<?php echo $data->account_password;?>" max-length="255">
    </div>
  </div><div class="form-group row">
    <label for="input_account_status" class="col-sm-2 col-form-label">account_status</label>
    <div class="col-sm-10">
      <div class="form-check form-check-inline"><input type="radio" name="account_status" class="form-check-input" id="inlineaccount_status0" value="0" <?php echo ($data->account_status == 0 ? "selected" : "");?>> <label class="form-check-label" for="inlineaccount_status0">Off</label>
</div><div class="form-check form-check-inline"><input type="radio" name="account_status" class="form-check-input" id="inlineaccount_status1" value="1" <?php echo ($data->account_status == 1 ? "selected" : "");?>> <label class="form-check-label" for="inlineaccount_status1">On</label>
</div>
    </div>
  </div><div class="form-group row">
    <label for="input_account_node" class="col-sm-2 col-form-label">account_node</label>
    <div class="col-sm-10">
      <textarea  name="account_node" class="form-control height-500" id="input_account_node" placeholder="account_node" ><?php echo $data->account_node;?></textarea>
    </div>
  </div>
	<button type="submit" name="submit" value="1" class="btn btn-info">Submit</button>
	</form>
	</div>
</div>