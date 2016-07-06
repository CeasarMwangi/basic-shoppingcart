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
    <div class="container">
    <?php 
    require_once("core/config.php");
      if(isset($_SESSION)){
        if(isset($_GET['action']) && isset($_GET['id'])){
          $in_array = array("add");
          $id = intval($_GET['id']);
          if(in_array($_GET['action'], $in_array) && $id > 0){
            $c = 0;
            try{
              $sql = "SELECT * FROM products WHERE id=:id AND stock > 0";
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(":id", $id);
              $stmt->execute();
              $c = $stmt->rowCount();
            }catch(PDOException $e){

            }

            if($c == 1 ){
              if(isset($_SESSION['cart'][$id]['quantity'])){
                $_SESSION['cart'][$id]['quantity']++;
                //echo count($_SESSION['cart']);
                //var_dump($_SESSION['cart']);
                foreach ($_SESSION['cart'] as $product_key => $product) {
                  //echo $product_key . " - ".$product['quantity'] ."<br>";
                  
                }
              }else{
                $_SESSION['cart'][$id]['quantity'] = 1;
                //echo $_SESSION['cart'][$id]['quantity'];
                //var_dump($_SESSION['cart']);
                //echo count($_SESSION['cart']);

              }

            }
          }
        }
              if(isset($_SESSION['cart'])){
                $checkout = "<a href='checkout.php'>Check out</a>";
              $message = count($_SESSION['cart']) ." (Items) ".$checkout;
            }else{
              $message = "Your cart is empty";
            }
        
      }else{
        $message = "Your cart is empty";
      }

    ?>
    <p><span class="glyphicon glyphicon-shopping-cart" style="font-size:20px; padding-right: 7px;" aria-hidden="true"></span><?php echo $message; ?></p>
    </div>

    <!-- Main container -->
    <div class="container">
    <?php
      
      require("core/load_products.php");


    ?> 
      <div class="row">
      <?php if(count($products) != 0){
          foreach ($products as $product) {
        
        ?>
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="<?php echo $product->image; ?>" alt="...">
            <div class="caption">
              <h3><?php echo $product->title; ?></h3>
              <p><?php echo $product->description; ?></p>
              <h6>Price : Ksh <?php echo $product->price; ?></h6>
              <p><a href="index.php?action=add&id=<?php echo $product->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
            </div>
          </div><!-- /thumbnail -->
        </div><!-- /col-md-3 -->
        <?php }
          }else{ ?>

            <p>There are no products available</p>

          <?php } ?>

      </div>

      <footer>
        <p>&copy; 2015 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


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
