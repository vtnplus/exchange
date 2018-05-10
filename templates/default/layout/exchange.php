<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>{{TITLE}}</title>
    <script type="text/javascript" src="<?php echo resource("js/app.js");?>"></script>
    <script type="text/javascript" src="<?php echo resource("js/customs.js");?>"></script>
    <link href="<?php echo base_url("templates/default/css/app.css");?>" rel="stylesheet">
    
    
  </head>

<body>
<header>
<?php include __DIR__."/../header.php";?>
</header>

<div class="container-fluid">
    <div class="row">
    <nav class="sidebar col-lg-2 col-sm-hidden">
      <form class="bd-search d-flex align-items-center">
          <input class="form-control" placeholder="Enter keyword">
      </form>
      

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <table class="table table-hover">
            <thead>
              <th style="border-top:0;">Name</th>
              <th style="border-top:0;">Prices</th>
              <th style="border-top:0;">Vol</th>
            </thead>
            <tbody>
              <?php foreach ($coind as $key => $value) { ?>
              <tr>
                <td><a href="<?php echo router("exchange/trade/BTC/".$value["symbol"]);?>"><?php echo $value["symbol"];?></a></td>
                <td>6700</td>
                <td>89</td>
              </tr>
              <?php } ?>
              
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
      </div>

      
      <div class="nodesmall"></div>
    </nav>
    <main class="col-md-12 col-lg-10" style="margin-top:15px;">
    <?php alert();?>
    <?php echo $data;?>

    <footer>
      <?php include __DIR__."/../footer.php";?>
    </footer>
    </main>
</div>


</body>
</html>