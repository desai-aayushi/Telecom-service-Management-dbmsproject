<?php 
  require('connection.php');
  $query='Select * From voucher ';
  $result=mysqli_query($conn,$query);
  
?>


<!DOCTYPE html>
<html>
<head>
	<title>VOUCHERS</title>
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
    <h1 align="center">VOUCHERS</h1><br>
    
    
  
    <?php 

      while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
    ?>
      
      <div class="card card-body bg-light" align="center">
        
            <p><b>VOUCHER ID: </b><?php echo $rows['VOUCHER_ID'];?></p>
            <?php $voucherid=$rows['VOUCHER_ID']; ?>
            <p><b>VOUCHER NAME: </b><?php echo $rows['VOUCHER_NAME'];?></p>
            <p><b>VALIDITY(DAYS): </b><?php echo $rows['VALIDITY(DAYS)'];?></p>
            <p><b>BOOSTER: </b><?php echo $rows['BOOSTER'];?></p>
            <p><b>VOUCHER_AMOUNT: </b><?php echo $rows['VOUCHER_AMOUNT'];?></p>
 
           <p> <a type="Button" class="btn btn-primary" href='<?php echo"vapply.php?voucherid=$voucherid" ?>'  id="apply" type="Submit"  style="width: 250px;">APPLY</a><br> </p>              
      </div>
            <br><br>  
    <?php
      }
    ?>


</body>
</html>