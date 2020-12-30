<?php 
  require('connection.php');
  session_start();
  $cid=$_SESSION['cid'];
  $planid=$_GET['planid'];

  $query="SELECT changeplan('$cid','$planid') ";
  $result=mysqli_query($conn,$query);
 
?>

<!DOCTYPE html>
<html>
<head>
	<title>PLAN CHANGE</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
        <li class="nav-item">
                    <a class="nav-link" href="voucher.php">Vouchers</a>         
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
            <li class="nav-item">
              <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>   LOG OUT</a>
            </li>
          </ul>  

          </div>
    </nav>
<br>

<h3 align="center">PLAN CHANGED SUCCESSFULLY!!</h3>
<h5 align="center">Your Plan Details</h5> 
<?php 
$queryp="SELECT PLAN_NAME,DURATION,AMOUNT FROM plans where PLAN_ID='$planid'";
$resultp=mysqli_query($conn,$queryp);
      while($rows=mysqli_fetch_array($resultp,MYSQLI_ASSOC))
      {
    ?>
    <div class="card card-body bg-light" align="center">
        
            <p><b>CUSTOMER ID:</b><?php echo $cid?></p>
            <p><b>PLAN ID:  </b><?php echo $planid ?></p>
            <p><b>PLAN NAME: </b><?php echo $rows['PLAN_NAME']?></p>
           	 <p><b>PLAN NAME: </b><?php echo $rows['DURATION']?></p>
            <p><b>PLAN NAME: </b><?php echo $rows['AMOUNT']?></p>
            
                         
      </div>
            <br><br>  

            <?php
      }
    ?>
         
   
    

</body>
</html>
