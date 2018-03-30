<div class="card">
	<div class="card-body">
		<h3><?php $this->views->lang("account_dashboard");?> <div class="pull-right">
			<button class="btn btn-sm btn-info"><?php $this->views->lang("delete");?></button>
			<a class="btn btn-sm btn-primary" href="<?php echo admin_url("account/created/");?>"><?php $this->views->lang("created");?></a></div></h3>
		<table class="table table-hover">
			<thead>
				<th style="width: 50px;"></th>
				<th><?php $this->views->lang("account_email");?></th>
				<th><?php $this->views->lang("account_password");?></th>
				<th><?php $this->views->lang("account_status");?></th>
				<th><?php $this->views->lang("account_node");?></th>
				
				<th></th>
			</thead>
			<tbody>
				<?php foreach ($data as $key => $value) { ?>
				<tr>
				<td><input type="checkbox" name="account_id[]" value="<?php echo $value->account_id;?>"></td>
				<td><?php echo $value->account_email;?></td>
				<td><?php echo $value->account_password;?></td>
				<td><?php echo $value->account_status;?></td>
				<td><?php echo $value->account_node;?></td>
				
				<td class="text-right"><a class="btn btn-info btn-sm" href="<?php echo admin_url("account/created/".$value->account_id);?>"><?php $this->views->lang("edit");?></a> <a class="btn btn-info btn-sm" href="<?php echo admin_url("account/delete/".$value->account_id);?>"><?php $this->views->lang("delete");?></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>