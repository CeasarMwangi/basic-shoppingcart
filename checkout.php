<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
-->


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <?php 
    require_once("core/config.php");
      if(isset($_SESSION['cart']) ){ ?>
        
        
      
  
    <!-- Main container -->
    <div class="container">
    <?php
      
      require("core/load_cart.php");


    ?> 
      <div class="row">
      <?php if(count($products) != 0){
        $counter = 0;
        ?>
        <table class="table table-hover"> 
        <thead> 
          <tr> <th>#</th> <th>Name</th> <th>Description</th> <th>Price</th> <th>Quantity</th><th>Cost</th></tr> 
        </thead> 

        <tbody>
        <?php
        $total_cost = 0;
          foreach ($products as $product) {
            $counter++;
            $id = $product->id;
            $quantity = $_SESSION['cart'][$id]['quantity'];
            $cost = ($product->price) * $quantity;
            $total_cost += $cost;
            ?>
          <tr> <th scope="row"><?php echo $counter; ?></th> <td><?php echo $product->title; ?></td> <td><?php echo $product->description; ?></td> <td><?php echo $product->price; ?></td><td><?php echo $quantity; ?></td><td><?php echo $cost; ?></td> </tr>
          <?php }
           ?> 
           <tr class="bg-primary"> <th scope="row">Total </th> <td></td> <td></td> <td></td><td></td><td><?php echo $total_cost; ?></td> </tr>
        </tbody>
        </table>
<?php } ?>
      </div><!-- /row -->
      <div class="row">
        <div class="col-md-12">
          <p class="text-center"><a href="core/clear.php">Check Out</a></p>
        </div>
      </div>

      <footer>
        <p>&copy; 2015 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->
<?php }else {?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="text-center bg-danger">Empty cart</p>
      </div>
    </div>
  </div>
<?php } ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="jquery.min.js"><\/script>')</script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    -->
  </body>
</html>
