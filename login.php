<?php
include "config.php";
if(!isset($_SESSION['login'])){
if(isset($_POST['Login_button'])){

    $email =$_POST['email'];
    $password =$_POST['password'];

        if ($email!= "" && $password != ""){
        session_start();
        $sql_query = "select * from Customer where customer_email='".$email."' and cus_password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);
if ($email===$row['Customer_email'] && $password===$row['cus_password']){
$_SESSION["login"] =true;
$_SESSION["id"] =$row['Customer_id'];
$_SESSION["name"] =$row['Customer_name'];
$_SESSION["phone"]=$row['Customer_phone'];
$_SESSION["email"] = $row['Customer_email'];
$_SESSION["DOB"] = $row['DOB'];
  header('Location: main.php');
}else {
  header('Location: index.html');
}

    }
}
}
else {
header('Location: main.php');
}
