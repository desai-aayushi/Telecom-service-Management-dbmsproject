<?php include('connection.php')?>
<?php
session_start();
$cname="";
$mobileno="";
$street="";
$city="";
$state="";
$kyc="";
if (isset($_POST['proceed'])) {
  
  $cname = mysqli_real_escape_string($conn, $_POST['name']);
  $mobileno = mysqli_real_escape_string($conn, $_POST['mobileno']);
  $street = mysqli_real_escape_string($conn, $_POST['street']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $state = mysqli_real_escape_string($conn, $_POST['state']);
  $kyc = mysqli_real_escape_string($conn, $_POST['kycno']);  

$sql=mysqli_query($conn,"call newcustomer('$cname','$mobileno','$street','$city','$state')");
if(mysqli_errno($conn) == 1062){
      echo"<script>alert('CUSTOMER ALREADY EXIST TRY NEW NUMBER!')</script>";
}else
{
    
    echo"<script>alert('CUSTOMER REGISTERED!')</script>"; 
} 

}


  




  
  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register New Connection</title>
    <link rel="stylesheet" href="../css/newconnection.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("input[type='radio']").change(function(){
      if($(this).val()=="yes")
      {
         $("#kycno").show();
      }
      else
      {
        $("#kycno").hide(); 
      }
    });
  });
</script>

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
  

    
      

      <form method="post" action="newconnection.php"  class="form-register">
            <div class="container">
            <div class="wrapper">

            <h1>NEW CONNECTION</h1>
            <P>Enjoy hassle free delievery at your doorstep with the choice of number you desire.</P><br>

            <label for="name" >Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="name" required>
            <input type="text" class="form-control" placeholder="Enter mobile no" name="mobileno" required><br>
            <br>
            <label for="address">Adress</label><br>
            <input type="text" class="form-control" placeholder="Enter Street" name="street" required>
            <input type="text" class="form-control" placeholder="Enter City" name="city" required> 
            <input type="text" class="form-control" placeholder="Enter State" name="state" required><br>      
            I have an Aadhar Card.<br>
            
            <input type="radio" name="kycradio" value="yes">
            YES
            <input type="radio" name="kycradio" value="no">
            NO 
            <br>
            <input style="display:none;" type="text" name="kycno" id="kycno" placeholder="Enter your Aadhar no">
            <br>
            <br>
            Type of Plan <br>
            <input type="radio" name="radio1" value="postpaid">Postpaid <input type="radio"  name="radio1" value="prepaid"> Prepaid
            <br><br>
            <button class="btn btn-lg btn-primary btn-block"  name="proceed" value="proceed" type="Submit">PROCEED</button>    

            </div>    
            </div>
      </form>

</body>
</html>