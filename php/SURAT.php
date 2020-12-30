<?php 
  require('connection.php');
  $query="Select * From store_locator s where s.city='SURAT' ";
  $result=mysqli_query($conn,$query);
  $sql="Select e.* From employee e,store_locator s where e.store_id=s.store_id AND s.city='SURAT'";
  $sqlresult=mysqli_query($conn,$sql);
 
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
                    </select>
                </li>
            </div>
        </ul>  
    </div>
</nav>
<br>
<h3 align="center">STORE DETAILS</h3>
<br>
    <?php 

      while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
    ?>
      
      <div class="card card-body bg-light" align="center">
        
            <p><b>STORE_ID: </b><?php echo $rows['STORE_ID'];?></p>
            <p><b>CONTACT_NO: </b><?php echo $rows['CONTACT_NO'];?></p>
            <p><b>STREET: </b><?php echo $rows['STREET'];?></p>
            <p><b>CITY: </b><?php echo $rows['CITY'];?></p>
            <p><b>STATE: </b><?php echo $rows['STATE'];?></p>
 
    </div>
    <?php
    }
    ?>
<br><h3 align="center">Employee Details</h3><br>

    <?php 

      while($row=mysqli_fetch_array($sqlresult,MYSQLI_ASSOC))
      {
    ?>
      
      <div class="card card-body bg-light" align="center">
        
            <p><b>EMPLOYEE_ID: </b><?php echo $row['E_ID'];?></p>
            <p><b>EMPLOYEE_NAME: </b><?php echo $row['ENAME'];?></p>
            <p><b>DESIGNATION: </b><?php echo $row['DESIGNATION'];?></p>
            <p><b>CONTACT: </b><?php echo $row['CONTACT'];?></p>
            
 
    </div>
    <?php
    }
    ?>
</body>
</html>    

            
        
            
