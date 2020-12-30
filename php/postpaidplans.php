<?php 
  require('connection.php');
  $query='Select * From POSTPAIDPLANS ';
  $result=mysqli_query($conn,$query);
  
?>


<!DOCTYPE html>
<html>
<head>
	<title>POSTPAIDPLANS</title>
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
  
    <br>
    <h1 align="center">Available Postpaid Plans</h1><br>
    
    
  
    <?php 

      while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
    ?>
      
      <div class="card card-body bg-light" align="center">
        <div class="row">
          <div class=col-md-6>
            <p><b>PLAN NAME: </b><?php echo $rows['PLAN_NAME'];?></p>
            <p><b>DURATION: </b><?php echo $rows['Duration'];?></p>
            <p><b>PLAN AMOUNT: </b><?php echo $rows['AMOUNT'];?></p>
            <p><b>SERVICE TYPE: </b><?php echo $rows['SERVICE_TYPE_NAME'];?></p>
          </div>
            
          <div class=col-md-6>
            <h5>Available services in plan</h5>
            <p><b>Conference Call: </b><?php echo $rows['CONFERENCE'];?></p>
            <p><b>Roaming: </b><?php echo $rows['ROAMING'];?></p>
            <p><b>Internet Pack: </b><?php echo $rows['INTERNET_PACK'];?></p>
            <p><b>STD-ISD: </b><?php echo $rows['STD_ISD'];?></p>
            <p><b>SMS: </b><?php echo $rows['SMS'];?></p>
          </div>
        </div>
            
      </div>
            <br><br>  
    <?php
      }
    ?>
</body>
</html>