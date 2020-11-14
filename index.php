<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['login'])){
header('Location: main.php');
exit;
}
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Gayathri:wght@700&display=swap" rel="stylesheet">
    <script src="Js/main.js"></script>
    <title>Login page </title>
  </head>
  <body>
    <div class="mainframe">

      <div class="leftframe">

      </div>

      <div class="rightframe">
        <form id="loginform" action="login.php" method="post">
          <h3 id="signup">Sign up</h3>
          <h3 class="signin1">Sign in</h3>
          <h4 id="create_ac">Or create account</h4>
          <input class="Username_input"type="email" name="email" placeholder="Eamil" required>
          <input class="password_input"type="password" name="password" placeholder="Password" required>
          <button class="login_button" type="Submit" name="Login_button">Login</button>

        </form>


        <form  id="registration" action="register.php" method="post">
          <h3 id="signin" >Sign in</h3>
          <h3 class="signup1" >Sign up</h3>
          <h4 id="login">Or Login</h4>
          <input class="Rname_input"type="text" name="name" placeholder="Full Name" required>
          <input class="email_input"type="email" name="email" placeholder="Email" required>
          <input class="phone" type="tel" name="phone" placeholder="Phone number Ex.60123456789" pattern="[0-9]{11}" required>
          <input class="DOB"type="date" name="DOB" value="2020-09-21" required>
          <input class="Rpassword_input"type="password" name="password" placeholder="Password" required>
          <button class="re_button" type="Submit" name="re_button">registr</button>
        </form>
    </div>

  </div>

<script src="Js/main.js"></script>
  </body>
</html>
