<?php


include('dbconnection.php');
//include('index.php');
 $id=$_GET['userid'];

 $desc=$_POST['description'];
  $date=$_POST['date'];
 $name=$_POST['name'];
 $amount=$_POST['amount'];
 $transType=$_POST['transtype'];

 $sql = "UPDATE transactions SET AccountName='$name',Description='$desc',date='$date',amount='$amount',transType='$transType' WHERE tid=$id";
 $result = mysqli_query($conn,$sql);
   
   
   if($result)
   {
    header("Location: index.php");


   }

    //$result = mysqli_query($conn,"SELECT * FROM employee WHERE userid='" . $_GET['userid'] . "'");
    //$row= mysqli_fetch_array($result);
?>
