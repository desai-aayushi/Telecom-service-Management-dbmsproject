<?php include('connection.php'); ?>

<?php
  session_start();
  if(isset($_POST['submit']))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from customer where mobile_no='$username' and password='$password'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    
    if($username==$row[2] && $password==$row[9])
    {
      $_SESSION['cid']=$row[0];
	     //echo $_SESSION['cid'];
      header('location:customer.php');
    }
    else
    {
      echo "<script> alert('Wrong user information try again!')</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Tele App</title>
    <link rel="stylesheet" href="../css/login.css">
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
            <li class="nav-item">
              <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>   LOG OUT</a>
            </li>
          </ul>  



      </div>
    </nav>
        
  
    <br><br><br><br>
<div class="container">
<div class="wrapper">
	<form action="" method="post" name="Login_Form" class="form-signin">  
      
        <input type="text" class="form-control" name="username" placeholder="Enter Your Mobile Number" required="" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        <button class="btn btn-lg btn-primary btn-block"  name="submit" value="Login" type="Submit">Login</button><br>
       <a href="newconnection.php"><p align="center">new connection?</p></a> 
    </form>
</div>
</div>    
</body>
</html>