<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['login'])) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles3.css">
    <link rel="stylesheet" href="Css/styles.css">
    <title>Admin</title>
</head>

<body>
<!---->
<!--<div class="admin_top">-->
<!---->
<!--    <a href="#">  <p class="p1"> <strong>EasyTrain</strong> </p>     </a>-->
<!--    <p class="p2">  <strong> <span> Ad</span> 1231 </strong>    </p>-->
<!--    <a href="logout.php"><p class="p3"> Log Out </p></a>-->
<!---->
<!--</div>-->
<!---->
<!---->
<!--<div class="navigate">-->
<!--    <a href="view_schedule.html"> View Schedule </a>-->
<!--    <a href="add_train.html"> Add Train </a>-->
<!--    <a href="#contact"> Remove Train </a>-->
<!---->
<!--</div>-->


<?php
include "nav.html";
include 'config.php';

$sql = "SELECT * FROM Route";
$result = $con->query($sql);
$result1 = $con->query($sql);

?>
<div class="schedule">

    <form class="form" method="post" action="">

        <p>Departure: &nbsp; <select class="dep" name="dep" required>
                // output data of each row
                <?php   while($row = $result->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['Depature']?>"> <?php echo $row['Depature'] ?></option>
               <?php } ?>
            </select>
        </p>

        <p>Destination:  <select class="arr" name="arr" required>
                <?php   while($row1 = $result1->fetch_assoc()) {
                    ?>
                <option value="<?php echo $row1['Arrival']?>"> <?php echo $row1['Arrival']?> </option>
                <?php
                }
                ?>
            </select>

        </p>
        <p><select style="margin-left: 80px" class="opt" name="tnum" required>
                <option  value="1" selected disabled hidden>ticket No</option>
                <?php
                for ($i=1; $i <=10 ; $i++) {
                    echo "<option value=$i>$i</option>";
                }
                ?>
            </select></p>
        <p> Date: &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <input style="border-radius: 15px" name="date" type="date" placeholder="Date" required></p>


        <button class="btna" type="submit" name="search" >Search</button>

    </form>

</div>
<?php
    if (isset($_POST['search'])) {
        include 'config.php';
        $chosenDep=$_POST['dep'];
        $chosenArr=$_POST['arr'];
        $tnum=$_POST['tnum'];
        if (isset($_SESSION['tnum'])) {
            $_SESSION['tnum'] = $tnum;
        } else {
            $_SESSION['tnum'] =$tnum;
        }
        $sql_query = "select *from Route where Depature='$chosenDep' AND Arrival='$chosenArr'";
        $result = mysqli_query($con,$sql_query);
        while($row = mysqli_fetch_assoc($result)) {
            $id=$row['Route_id'];
            $dep=$row['Depature'];
            $arr=$row['Arrival'];
            $dep_time=$row['Departure_time'];
            $arr_time=$row['Arrival_time'];
            $price=$row['Price'];
            echo"<div class='Route'>
       <form class='routeform' action='payment.php' method='POST'>
			 <input style='display:none' type='text' name='id'  value=$id>
				 <input class='from' type='text' name='from'  value=$dep READONLY>
         <span class='fax'> > </span>
				 <input class='to' type='text' name='to'  value=$arr READONLY >
				 <input class='deptime' type='text' name='deptime'  value=$dep_time READONLY >
				  <input class='arrtime' type='text' name='arrtime'  value=$arr_time READONLY >
					<span class='pricetag'>Price </span>
				 <input class='price' type='text' name='price'  value=$price READONLY >
         <button class='selectRouteBtn' type='submit' name='selectRoute'>Select</button>
       </form>
     </div>";
        }
    }
?>
</body>
</html>