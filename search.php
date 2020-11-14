<?php
include "config.php";
$dep=$_POST['dep'];
$arr=$_POST['arr'];
$index=0;
$sql = "SELECT * FROM  Route WHERE  Depature = $dep
        AND WHERE Arrival = $arr ";
$sql_query = "select  Depature,Arrival from Route";
$result = mysqli_query($con,$sql_query);


if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
  if (!array_search($row['Depature'],$dep,true)) {
  $dep[$index]=$row['Depature'];
  }
  if (!array_search($row['Arrival'],$arr,true)) {
  $arr[$index]=$row['Arrival'];
}
  $index++;
}
}
 ?>
