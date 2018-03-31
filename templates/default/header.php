
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">BTCRIP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav navbar-home mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo router("exchange");?>">Exchanges</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo router("wallet");?>">Wallet</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo router("market");?>">Markets</a>
      </li>

    </ul>
    <div class="form-inline">
        <?php if(is_login()){ ?>
        <div class="txt-text">
        <b>Tradding Balancer</b>
      </div>
        <div class="txt-text">
        0.00001 BTC<br>
        0.00001 USDT
      </div>
      <div class="txt-text">
        Your Balance : 0.00001 BTC<br>
        Your Balance : 0.00001 USDT
      </div>
      <a class="btn btn-outline-primary" type="button" style="margin-right: 15px;"><?php echo $this->views->lang("settings");?></a>
      <a class="btn btn-outline-secondary" href="<?php echo router("logout");?>" type="button"><?php echo $this->views->lang("signout");?></a>  
      <?php }else{ ?>
      <a class="btn btn-outline-primary" type="button" href="<?php echo router("login");?>" style="margin-right: 15px;"><?php echo $this->views->lang("login");?></a> 
        <a class="btn btn-outline-secondary" type="button" href="<?php echo router("register");?>"><?php echo $this->views->lang("register");?></a>
      <?php } ?>
        
    </div>
  </div>
</nav>