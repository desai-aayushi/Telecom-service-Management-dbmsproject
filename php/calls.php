<?php 
  session_start();
  $cid=$_SESSION['cid'];
  $pianid=$_SESSION['planid'];
  echo $planid;
  require('connection.php');
  $sql="call change('$cid',$planid)";
  $result=mysqli_query($conn,$sql);
 ?>