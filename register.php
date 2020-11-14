<?php
include "config.php";
$name=$_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$DOB=$_POST['DOB'];
$password_1=$_POST['password'];
$errors = array();
if(!isset($_SESSION['login'])){
if (isset($_POST['re_button'])) {
  $user_check_query = "SELECT * FROM Customer WHERE Customer_email='$email' OR Customer_phone='$phone' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);
print_r($user);
echo $name;
echo $email;
echo $phone;
echo $DOB;
echo $password_1;
  if ($user){
    if ($user['Customer_email'] === $email) {
      array_push($errors, "Email already exists");
    }

    if ($user['Customer_phone'] === $phone) {
      array_push($errors, "Phone already exists");
    }
  }
  if (count($errors)== 0) {
$password =$password_1;
  	$query = "INSERT INTO Customer (Customer_name,Customer_email,Customer_phone,cus_password,DOB)
  			  VALUES('$name','$email','$phone','$password','$DOB')";

    if (mysqli_query($con, $query)) {
 header('Location: index.php');
}

  }else {
    	 header('location: index.html');
  }
}
}else {
 header('Location: main.php');
}
