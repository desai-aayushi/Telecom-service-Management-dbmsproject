<?php 
  require('connection.php');
  $query='Select * From plans ';
  $result=mysqli_query($conn,$query);
  mysqli_close($conn);
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


</head>
<body>



<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
      
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="customer.php"><i class="fa fa-home" aria-hidden="true"></i>     Home</a>
        </li>
        
        <li  class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="postpaiddrop" data-toggle="dropdown">Prepaid</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="../html/prepaid.html">Online Recharge</a>
                        <a class="dropdown-item" href="postpaidplans.php">Plans&amp;Services</a>
        </div>    
        </li>
        
        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="postpaiddrop" data-toggle="dropdown">Postpaid</a>
                 <div class="dropdown-menu">
                    <a class="dropdown-item" href="../html/postpaid.html">Bill Pay</a>
                    <a class="dropdown-item" href="prepaidplans.php">Plans&amp;Services</a>
        </div>
        </li>
        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="applicationdrop" data-toggle="dropdown">Applications</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Available Applications</a>
                    <a class="dropdown-item" href="#">Your Applications</a>
                </div>
        </li>           
      </ul>
    </nav>

<div class="card card-body bg-light" align="center">
    <?php 

      while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
      	?>
      		<p><b>PLAN NAME: </b><?php echo $rows['PLAN_NAME'];?></p>
            <p><b>DURATION: </b><?php echo $rows['DURATION'];?></p>
            <p><b>PLAN AMOUNT: </b><?php echo $rows['AMOUNT'];?></p><br>
            
       <?php
      }
    ?>
</div>
</body>
</html>
            

      
    
    