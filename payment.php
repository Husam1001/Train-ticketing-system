<?php
session_start();
if (!isset($_SESSION['login'])) {
	header('Location: index.php');
	exit;
}
if(isset($_POST['selectRoute'])){
$id=$_POST['id'];
$from=$_POST['from'];
$to=$_POST['to'];
$dep_time=$_POST['deptime'];
$arr_time=$_POST['arrtime'];
$price=$_POST['price'];
$tnum=$_SESSION['tnum'];
$totalprice=$price*$tnum;
$priceInclueTax=$totalprice+$totalprice*0.05;
}
 ?>
 <?php
 if (isset($_POST['makepayment'])) {
	 echo "<script>alert('congratulations booking made successfully');</script>";
	 $cardname=$_POST['cardname'];
	 include 'controller.php';
     $Id=$_POST['ids'];
     $Price=$_POST['prices'];
     $tnum=$_SESSION['tnum'];
     $totalprice=$Price*$tnum;
     $priceInclueTax=$totalprice+$totalprice*0.05;
 $resid=generateresid();
 book($resid,$tnum,$_SESSION['id']);
 makepayment($cardname,$priceInclueTax,$resid);
if (addticket($Id,$resid,$tnum)){
	  echo "<script>alert('congratulations booking made successfully');</script>";
		header('Location: main.php');
}
 }
	?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="Css/style2.css">
   </head>
   <body>
  <?php include 'nav.html';?>

  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="payment.php" method="post">
          <div class="row">
            <div class="col-50">
              <h3>Payment</h3>
              <label for="fname">Accepted Cards</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" placeholder="John Doe">
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
              <div class="row">
                <div class="col-50">
                  <label for="expdate">Exp Date</label>
                  <input type="date" id="expdate" name="expdate" >
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv" placeholder="352">
                  <input type="hidden" name="ids" value="<?php echo $id; ?>">
                  <input type="hidden" name="prices" value="<?php echo $price; ?>">
                </div>
              </div>
            </div>
          </div>
          <input class="btn" type="submit" value="Continue to checkout" name="makepayment">
        </form>
      </div>
    </div>
    <div class="col-25">
      <div class="container">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-ticket"></i> <b><?php echo $tnum?></b></span></h4>
        <p><a >Price per unit</a> <span class="price"><?php echo $price; ?></span></p>
        <p><a >Tax</a> <span class="price"><?php echo $totalprice*0.05;?></span></p>
        <hr>
        <p>Total <span class="price" style="color:black"><b><?php echo $priceInclueTax; ?></b></span></p>
      </div>
    </div>
  </div>
   </body>
 </html>
