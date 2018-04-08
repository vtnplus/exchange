<?php foreach ($data as $key => $value) { ?>
	
<tr>
	<td><?php echo ($key+1);?></td>
	<td><?php echo $this->views->lang($value["history_type"]);?></td>
	<td><?php echo $value["history_amount"];?></td>
	<td><?php echo $value["history_created"];?></td>
	<td><?php echo $value["history_status"];?></td>
	<td><?php echo $value["history_logip"];?></td>
	<td>Method</td>
</tr>

<?php } ?>