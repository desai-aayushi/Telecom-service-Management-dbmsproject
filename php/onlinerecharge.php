<?php include('connection.php')?>
<?php
session_start();

$mobileno="";
$amount="";
$paymenttype="";
$date="";

if (isset($_POST['pay'])) {
  
  $mobileno = mysqli_real_escape_string($conn, $_POST['Mno']);
  $amount = mysqli_real_escape_string($conn, $_POST['Amt']);
  $paymenttype = mysqli_real_escape_string($conn, $_POST['optradio']);
  $date=date('Y/m/d');
$sql=mysqli_query($conn,"call makepayment('$amount','$paymenttype','$date','$mobileno')");
if($sql){
echo "<script>alert('Payment Successfull')</script>";
}  	

}

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prepaid | ONLINE RECHARGE</title>
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/prepaid.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    function handleSelect(elm)
    {
    window.location = elm.value+".php";
    }
    </script>


</head>
<body>
   
<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="fa fa-home" aria-hidden="true"></i>     Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="postpaiddrop" data-toggle="dropdown">Prepaid</a>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="onlinerecharge.php">Online Recharge</a>
                        <a class="dropdown-item" href="prepaidplans.php">Plans&amp;Services</a>
                        
        </div>    
        </li>
        <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" id="postpaiddrop" data-toggle="dropdown">Postpaid</a>
                 <div class="dropdown-menu">
                    <a class="dropdown-item" href="billpayment.php">Bill Pay</a>
                    <a class="dropdown-item" href="postpaidplans.php">Plans&amp;Services</a>
                    
        </div>
        </li>
        <li class="nav-item">
                    <a class="nav-link" href="app.php">Applications</a>         
        </li>
        <li class="nav-item">
                    <a class="nav-link" href="complaints.php">Complaints</a>         
        </li>
         


          </ul>
          <ul class="nav navbar-nav navbar-right">
            <div style="padding:10px;">
            <li class="nav-item">
              <select name="cityname"  onchange="javascript:handleSelect(this)">
                <option value="0">Store Locator</option>
                <?php 
                $sql="SELECT * FROM store_locator";
                $res=mysqli_query($conn,$sql);
                while($list=mysqli_fetch_array($res,MYSQLI_ASSOC)){
                ?>
                <option value="<?php echo $list['CITY']; ?>"><?php echo $list['CITY']; ?></option> 
                <?php 
                }
                ?>
                </select></div>
            </li>
            
          </ul>  



      </div>
    </nav>
        
  
        
    
   
<br><br>



<div class="row"></div>
<div class="row">
    <div class="col-md-1"></div>
    
    <div class="col-md-3">  
      <img src="../html/billPayHand.png" alt="">
    </div>

    <div class="col-md-6">
   
      <div class="form-group">
        <h1>Online Recharge</h1>
            <form method="post" action="onlinerecharge.php" class="form-billpay">
              <input type="text" class="form-control" name="Mno" placeholder="Enter Your Mobile Number" required><br>
              <input type="text" class="form-control" name="Amt" placeholder="Enter Amount" required><br>
              <label for="pay-type">Payment Type:</label><br>
              <div class="form-check-inline">
                <label class="form-check-label" for="radio1">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="NETBANKING" checked>NETBANKING
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label" for="radio2">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="WALLET">WALLET
                </label>
              </div>
              <div class="form-check-inline">
                <label class="from-check-inline" for="radio3">
                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="PAYTM">PAYTM
                </label>
              </div>
              <br>
              <button class="btn btn-lg btn-primary btn-block"  name="pay" value="pay" type="Submit">Pay</button>
            </form>    
    </div>
  </div>
</div>


</body>
</html>