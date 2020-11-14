<?php
if (isset($_POST['addTrain'])){
    include "config.php";
    $depv=$_POST['dep'];
    $arrv=$_POST['arr'];
    $dep_timev=$_POST['dep_time'];
    $arr_timev=$_POST['arr_time'];
    $pricev=$_POST['price'];
    $date=$_POST['date'];
    $sql_query = "insert into Route (Depature,Arrival,Departure_time,Arrival_time,price,Date) values ('$depv','$arrv','$dep_timev','$arr_timev','$pricev','$date')";
    if (mysqli_query($con, $sql_query)) {
        echo "<script>alert('Route added successfully');</script>";
} else {
    echo "Error: " . $sql_query . "<br>" . mysqli_error($con);
}
}

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin</title>
    </head>
<style>
    body{
        background-color: #f1f1f1;
        margin: 0;
    }

    .form{

        height: 200px;
        width: 100vh;
        background-color:rgba(244,67,54,0.9);
        color: honeydew;
        font-weight: bold;
        font-family: san-serif;
        padding-top: 20px;
        padding-left: 20px ;
        margin: auto;
        margin-top: 50px;
        border-radius:20px;
        margin-bottom: 10px;

    }
    .btna{
        border-radius: 21px;
        font-family: Arial;
        color: #ffffff;
        font-size: 16px;
        background: #2b3236;
        padding: 5px;
        border: solid #202629 2px;
        margin-left: 50%;
        margin-top: -40px;
    }
    .btna:hover {
        background: #8b9aa3;
        text-decoration: none;
    }
</style>
    <body>
<div class="schedule">

    <form action="add_train.php" method="POST">

    <p>Departure: &nbsp; <input name="dep" required>


</p>

<p>Destination: <input name="arr" required> </p>

<p> Dep Time: &nbsp;  <input type="time" name="dep_time"  placeholder="Time" required></p>
<p> Arr Time: &nbsp;   <input type="time" name="arr_time" placeholder="Time" required></p>
<p> Date: &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <input type="date" name="date"  placeholder="Date" required></p>
<p> Price: &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<input type="Number" name="price"  placeholder="Price" required></p>
<button type="submit" name="addTrain" >Add</button>
    </form>



    </div>


    </body>
    </html>