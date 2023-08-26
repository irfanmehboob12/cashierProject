<?php
include('dbconnection.php');
include('index.php');
$sdate =$_POST['sdate'];
$edate =$_POST['edate'];
$name=$_POST['name'];
$transtype=$_POST['transtype'];

 if($sdate!='yyyy/mm/dd' && $edate!='yyyy/mm/dd'  && $name!='Account Name' && ($transtype=='Income' || $transtype=='Expense'))
{

$sql="select * from transactions where ('$sdate'<date && '$edate'>date) && AccountName LIKE '%$name%' && transType LIKE '%$transtype%' ;";
$balance=0;
$transactions=mysqli_query($conn, $sql);
if($transactions)
{
    
    while ($data= mysqli_fetch_assoc($transactions)){
        echo '<tr>
<td>'.$data["date"].'</td>
<td>'.$data["AccountName"].'</td>
<td>'.$data["Description"].'</td>
<td>'.$data["Amount"].'</td>
<td>'.$data["transType"].'</td>
<td>'.$balance.'</td>
<td><a class="btn btn-primary"href="update.php?userid='.$data["tid"].'">Edit</a> <a  class="btn btn-danger" href="delete.php?userid='.$data["tid"].'">Del</a></td>


</tr>';
    }
  
}





}


?>