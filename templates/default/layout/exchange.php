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
      <ul class="nav nav-tabs navtabs-coins">
        <li class="nav-item">
          <a class="nav-link active" href="#">BTC</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">USDT</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">LTC</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">BTCR</a>
        </li>

      </ul>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <table class="table table-hover">
            <thead>
              <th style="border-top:0;">Name</th>
              <th style="border-top:0;">Prices</th>
              <th style="border-top:0;">Vol</th>
            </thead>
            <tbody>
              <tr>
                <td>BTC</td>
                <td>6700</td>
                <td>89</td>
              </tr>

              
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

<script type="text/javascript">
  $(document).ready(function(){
    var windowHeight = $("body").outerHeight();
    var barHeight = $("header").outerHeight();
    var height = windowHeight - barHeight;
    var withs = $(window).width();
    if(withs < 780){
      $(".slidebar").css("margin-left","-100%");
    }else{
      $(".slidebar").css("margin-left","0");
    }
    $(".slidebar").height(height);

    $(".navbar-brand").width("200");
  });
</script>
</body>
</html>