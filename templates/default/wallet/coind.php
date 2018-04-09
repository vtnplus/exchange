<script type="text/javascript">
	var symbol = "<?php echo $info["symbol"];?>";
</script>
<div class="row">
	<div class="col-lg-7">
		<div class="card">
			<div class="card-body">
				<h4>Wallet Info [<?php echo $info["symbol"];?>]</h4>
				<?php if($info["balancer_wallet"]){ ?>
				Wallet : <?php echo $info["balancer_wallet"];?><br>
				Balancer : <span id="balancer_private"><?php echo $info["balancer_private"];?></span>
				<?php }else{ ?>
					<a href="<?php echo router("wallet/general/".$info["symbol"]);?>" class="btn btn-sm btn-primary">Create Wallet</a>
				<?php } ?>
				<hr>
				<div class="row">
					
					<div class="col-sm-3 col-xs-12">
						
						<div style="border:1px solid #ddd; width: 130px; height: 130px;"></div>
					</div>
					<div class="col-sm-9 col-xs-12">
						<h4>Withdraw</h4>
						<div class="row">
							<div class="col-lg-4"><input type="text" name="withdraw_amount" id="withdraw_amount" class="form-control"></div>
							<div class="col-lg-8"><input type="text" name="withdraw_wallet" id="withdraw_wallet" class="form-control" placeholder="Wallet"></div>
						</div>
						<br>
						<button class="btn btn-info" id="send_withdraw">Withdraw</button>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>

	<div class="col-lg-5">
		<div class="card">
			<div class="card-body">
				<h4>Trade Wallet Info</h4>
				Private Balancer : <?php echo $info["balancer_private"];?><br>
				Trade Balancer : <?php echo $info["balancer_trader"];?><br>
				<hr>
				Send <?php echo $info["symbol"];?> from private balancer to Trader Balancer before trade
				<hr>
				<input type="text" name="" class="form-control" id="sendtrade_amount"><br>
				<button class="btn btn-info" id="sendtrade">Send Trade Balancer</button>
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

