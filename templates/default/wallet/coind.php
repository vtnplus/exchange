<script type="text/javascript">
	var symbol = "<?php echo $info["symbol"];?>";
</script>
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-body">
				<h4>Wallet Info [<?php echo $info["symbol"];?>]</h4>
				<?php if($info["balancer_wallet"]){ ?>
				Wallet : <?php echo $info["balancer_wallet"];?><br>
				Balancer : <?php echo $info["balancer_private"];?>
				<?php }else{ ?>
					<a href="<?php echo router("wallet/general/".$info["symbol"]);?>" class="btn btn-sm btn-primary">Create Wallet</a>
				<?php } ?>
				<div class="row">
					<div class="col"></div>
					<div class="col">
						<h4>QRCODE</h4>
						<div style="border:1px solid #ddd; width: 100px; height: 100px;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="card">
			<div class="card-body">
				<h4>Trade Wallet Info</h4>
				Private Balancer : <?php echo $info["balancer_private"];?><br>
				Trade Balancer : <?php echo $info["balancer_trader"];?><br>
				<hr>
				Send <?php echo $info["symbol"];?> from private balancer to Trader Balancer before trade
				<hr>
				<div class="row">
					<div class="col">
						<input type="text" name="" class="form-control">
					</div>
					<div class="col">
						<button class="btn btn-info">Send Trade Balancer</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<h4>History</h4>
				<table class="table table-hover">
					<thead>
						<th>STT</th>
						<th>Type</th>
						<th>Amount</th>
						<th>Date</th>
						<th>Status</th>
						<th>Login IP</th>
						<th>Method</th>
					</thead>
					<tbody id="loadHistory">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>

	

</div>