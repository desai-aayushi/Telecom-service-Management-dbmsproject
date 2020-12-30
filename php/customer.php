
<?php include('connection.php'); ?>
<?php
  session_start();
  $cid=$_SESSION['cid'];
  $sql="call customerplandetail('$cid')";
  $result=mysqli_query($conn,$sql);
 ?>


<!DOCTYPE html>
<html>
<head>
	
  <title>My Tele App</title>

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
    <h1 align="center">Customer Details</h1>
    <div class="card card-body bg-light" align="center">
      <h1 align="center">Your Plan Details</h1><br><br>
      <div class="row">
          <div class=col-md-6>
            <h4>Plan Details</h4>
            <?php 
              while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
              {
            ?>
                <p><b>CUSTOMER ID:</b><?php echo $cid;?></p>
                <p><b>PLAN ID: </b><?php echo $rows['plan_id'];?></p>
                <p><b>PLAN NAME: </b><?php echo $rows['plan_name'];?></p>
                <p><b>DURATION: </b><?php echo $rows['duration'];?></p>
                <p><b>PLAN AMOUNT: </b><?php echo $rows['amount'];?></p>
                <?php $service=$rows['service_type_name']; ?>
                <p><b>SERVICE TYPE: </b>
                <?php echo $rows['service_type_name'];?></p>
            <?php
              }
              $result->free_result();
               mysqli_next_result($conn);
            ?>
            <a type="Button" class="btn btn-primary" href='<?php echo"change$service.php" ?>' id ="apply" type="Submit">CHANGE PLAN
            </a>
            </div>
         

          <div class=col-md-6>
            
            <h4>Services in Your Plan</h4>
            <?php 
            $query="call customerservices('$cid')";
            $queryresult=mysqli_query($conn,$query);
            while($rows=mysqli_fetch_array($queryresult,MYSQLI_ASSOC))
            {
            ?>
              <p><b>Conference Call: </b><?php echo $rows['conference'];?></p>
              <p><b>Roaming: </b><?php echo $rows['roaming'];?></p>
              <p><b>Internet Pack: </b><?php echo $rows['internet_pack'];?></p>
              <p><b>STD-ISD: </b><?php echo $rows['std_isd'];?></p>
              <p><b>SMS: </b><?php echo $rows['sms'];?></p>
            <?php
              }
            ?> 
            
          </div><br> 
          
      </div><br><br>
      <p><a href="callhistory.php">call history</a></p>
      <p><a href="paymenthistory.php">payment history</a></p>
      <p><a href="userapp.php">your application</a></p>
         

    </div>
</body>
</html>