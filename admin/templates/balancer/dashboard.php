<div class="card">
	<div class="card-body">
		<h3><?php $this->views->lang("balancer_dashboard");?> <div class="pull-right">
			<button class="btn btn-sm btn-info"><?php $this->views->lang("delete");?></button>
			<a class="btn btn-sm btn-primary" href="<?php echo admin_url("balancer/created/");?>"><?php $this->views->lang("created");?></a></div></h3>
		<table class="table table-hover">
			<thead>
				<th style="width: 50px;"></th>
				<th><?php $this->views->lang("account_id");?></th>
				<th><?php $this->views->lang("coind_symbol");?></th>
				<th><?php $this->views->lang("balancer_private");?></th>
				<th><?php $this->views->lang("balancer_trader");?></th>
				<th><?php $this->views->lang("balancer_created");?></th>
				<th><?php $this->views->lang("balancer_updated");?></th>
				
				<th></th>
			</thead>
			<tbody>
				<?php foreach ($data as $key => $value) { ?>
				<tr>
				<td><input type="checkbox" name="balancer_id[]" value="<?php echo $value->balancer_id;?>"></td>
				<td><?php echo $value->account_id;?></td>
				<td><?php echo $value->coind_symbol;?></td>
				<td><?php echo $value->balancer_private;?></td>
				<td><?php echo $value->balancer_trader;?></td>
				<td><?php echo $value->balancer_created;?></td>
				<td><?php echo $value->balancer_updated;?></td>
				
				<td class="text-right"><a class="btn btn-info btn-sm" href="<?php echo admin_url("balancer/created/".$value->balancer_id);?>"><?php $this->views->lang("edit");?></a> <a class="btn btn-info btn-sm" href="<?php echo admin_url("balancer/delete/".$value->balancer_id);?>"><?php $this->views->lang("delete");?></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>