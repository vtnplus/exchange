<div class="card">
	<div class="card-body">
	<h3>Controller Contents <div class="pull-right"><button class="btn btn-primary">Submit</button></div></h3>
	<hr>
	<form action="<?php echo admin_url("balancer/created//$id");?>" method="post" accept="UTF-8">
	<div class="form-group row">
    <label for="input_account_id" class="col-sm-2 col-form-label">account_id</label>
    <div class="col-sm-10">
      <input type="number" name="account_id" class="form-control" id="input_account_id" placeholder="account_id" value="<?php echo $data->account_id;?>">
    </div>
  </div><div class="form-group row">
    <label for="input_coind_symbol" class="col-sm-2 col-form-label">coind_symbol</label>
    <div class="col-sm-10">
      <input type="number" name="coind_symbol" class="form-control" id="input_coind_symbol" placeholder="coind_symbol" value="<?php echo $data->coind_symbol;?>">
    </div>
  </div><div class="form-group row">
    <label for="input_balancer_private" class="col-sm-2 col-form-label">balancer_private</label>
    <div class="col-sm-10">
      
    </div>
  </div><div class="form-group row">
    <label for="input_balancer_trader" class="col-sm-2 col-form-label">balancer_trader</label>
    <div class="col-sm-10">
      
    </div>
  </div><div class="form-group row">
    <label for="input_balancer_created" class="col-sm-2 col-form-label">balancer_created</label>
    <div class="col-sm-10">
      
    </div>
  </div><div class="form-group row">
    <label for="input_balancer_updated" class="col-sm-2 col-form-label">balancer_updated</label>
    <div class="col-sm-10">
      
    </div>
  </div>
	<button type="submit" name="submit" value="1" class="btn btn-info">Submit</button>
	</form>
	</div>
</div>