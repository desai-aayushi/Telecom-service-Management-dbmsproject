<?php 
    $conn=mysqli_connect('localhost','root','','telecom company');

    if(mysqli_connect_errno()){
        echo 'Failed to connect to mysql '.mysqli_coonect_errno();
    }
 ?>