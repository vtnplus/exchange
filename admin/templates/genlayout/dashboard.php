<div class="card">
	<div class="card-body">
		<h3><?php $this->views->lang("{{database}}_dashboard");?> <div class="pull-right">
			<button class="btn btn-sm btn-info"><?php $this->views->lang("delete");?></button>
			<a class="btn btn-sm btn-primary" href="{{URLCREATE}}"><?php $this->views->lang("created");?></a></div></h3>
		<table class="table table-hover">
			<thead>
				<th style="width: 50px;"></th>
				{{header}}
				<th></th>
			</thead>
			<tbody>
				<?php foreach ($data as $key => $value) { ?>
				<tr>
				<td><input type="checkbox" name="{{prekey}}[]" value="<?php echo $value->{{prekey}};?>"></td>
				{{content}}
				<td class="text-right"><a class="btn btn-info btn-sm" href="{{URLEDIT}}"><?php $this->views->lang("edit");?></a> <a class="btn btn-info btn-sm" href="{{URLDELETE}}"><?php $this->views->lang("delete");?></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>