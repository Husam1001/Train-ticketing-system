<?php
function book($resid,$tnum,$cusid){
 include 'config.php';
 $sql_query = "INSERT INTO Resarvation (r_id,ticket_quantity,cust_id)  
VALUES ($resid,$tnum,$cusid)";
  if(mysqli_query($con,$sql_query)){
    return true;
  }else {
    return false;
  }

}
function makepayment($cardname,$Total,$resid)
{
    include 'config.php';
    $sql_query = "INSERT INTO Payment (card_owner,total,re_id) VALUES ('$cardname',$Total,$resid)";
    $errors = array();
    if (mysqli_query($con, $sql_query)) {
        return true;
    } else {
        array_push($errors, mysqli_error($con));
    }

    if (count($errors) > 0) {
        print_r($errors);

    }
}

function addticket($routeid,$resid,$recordnum){
  include 'config.php';
  $sql_query = "INSERT INTO Ticket (rout_id,reserve_id)  
VALUES ($routeid, $resid)";
  $errors = array();
   for ($i=0; $i <$recordnum ; $i++) {
     if (mysqli_query($con,$sql_query)) {
     }
     else {
         array_push($errors,mysqli_error($con));
     }
   }
   if (count($errors)>0) {
     print_r($errors);
   }
}

function generateresid(){
include 'config.php';
$id=rand(1,9999999);
$idlist = array();
$sql_query = "select r_id from Resarvation";
$result = mysqli_query($con,$sql_query);
while($row = mysqli_fetch_assoc($result)) {
  array_push($idlist,$row['r_id']);
}
if (!in_array($id, $idlist))
  {
   return $id;
 }else {
   generateresid();
 }
}
 ?>
