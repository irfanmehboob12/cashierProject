<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <!-- #region -->
<style>
   .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}


</style>
<?php
include 'dbconnection.php';
?>

<script>
   function submit() {
            let form = document.getElementById("form");
            form.submit();
           // alert("Data stored in database!");
        }
</script>

    </head>
  <body>
 
  <!-- Modal -->






  <div  style="margin-left:100px;width: 1200px;height:800px; background-color:#f1f1f1;">
    <div  style="" Class="container">
    
    <form id="form" action="submit_form.php" method="post" >
    <h6 style="margin-left:50px;margin-top:20px; position:absolute;">Trasaction Form</h6>
  <div  style="width:150px;margin-left:50px;margin-top:50px;position:absolute;display:inline-block " class="mb-3">
    
    <input name="date" type="text" class="form-control" placeholder="yyyy/mm/dd" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div style="width:150px;position:absolute;margin-left:250px;margin-top:50px;display:inline-block" class="mb-3">
    
    <input name="accountname" type="text" class="form-control" placeholder="Account Name" id="exampleInputPassword1">
  </div>
  <div style="width:150px;position:absolute;margin-left:450px;margin-top:50px;display:inline-block" class="mb-3">
    
    <input name="description" type="text" class="form-control" placeholder="Description" id="exampleInputPassword1">
  </div>
  <div style="width:150px;position:absolute;margin-left:650px;margin-top:50px;display:inline-block" class="mb-3">
    <input name="amount" type="text" class="form-control"  placeholder="Amount" id="exampleInputPassword1">
  </div>

  <select  name="transactiontype" style="width:170px;position:absolute;margin-left:850px;margin-top:50px;display:inline-block" class="form-select" aria-label="Default select example">
  <option selected>Income/Expense</option>
  <option value="Income">Income</option>
  <option value="Expense">Expense</option>
  
</select>
  
  <button    onclick=""  data-bs-toggle="modal" data-bs-target="#exampleModal" style="position:absolute;margin-top:50px;margin-left:1050px;display:inline-block" type="button"  class="btn btn-primary">POST</button>
</form>

<hr style="width:76%;text-align:left;margin-left:50px;margin-top:130px;position:absolute;">

<form action="index.php" method="post">
    <h6 style="margin-left:50px;margin-top:150px; position:absolute;">Filter Results</h6>
  <div  style="width:150px;margin-left:150px;margin-top:200px;position:absolute;display:inline-block " class="mb-3">
    
    <input name="sdate" type="text" class="form-control" value="yyyy/mm/dd" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div style="width:150px;position:absolute;margin-left:350px;margin-top:200px;display:inline-block" class="mb-3">
    
    <input name="edate" type="text" class="form-control" value="yyyy/mm/dd" id="exampleInputPassword1">
  </div>
  <div style="width:150px;position:absolute;margin-left:550px;margin-top:200px;display:inline-block" class="mb-3">
    
    <input name="name" type="text" class="form-control" value="Account Name" id="exampleInputPassword1">
  </div>
 

  <select  name="transtype" style="width:170px;position:absolute;margin-left:750px;margin-top:200px;display:inline-block" class="form-select" aria-label="Default select example">
  <option selected>Income/Expense</option>
  <option value="Income">Income</option>
  <option value="Expense">Expense</option>
  
</select>
  
  <button style="position:absolute;margin-top:200px;margin-left:950px;display:inline-block" name="submit" type="submit" class="btn btn-success">Apply</button>
  <button style="position:absolute;margin-top:200px;margin-left:1030px;display:inline-block" type="clear" class="btn btn-danger">Clear</button>

</form>
<hr style="width:76%;text-align:left;margin-left:50px;margin-top:280px;position:absolute;">

<table style="border:none;margin-left:50px;margin-top:300px;position:absolute;width:70%;">
<tr>
<th>Date</th>
<th>Name</th>
<th>Description</th>
<th>Amount</th>
<th>Type</th>
<th>Balance</th>
<th>Action</th>


</tr>

<!-- Button trigger modal -->



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>If you want to Add Trasaction, then Press Ok.</P>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button onclick="submit()" type="button" class="btn btn-primary">OK</button>
      </div>
    </div>
  </div>
</div>

<?php 



function display()
{
    include 'dbconnection.php';
$sdate =$_POST['sdate'];
$edate =$_POST['edate'];
$name=$_POST['name'];
$transtype=$_POST['transtype'];

 if($sdate!='yyyy/mm/dd' && $edate!='yyyy/mm/dd'  && $name!='Account Name' && ($transtype=='Income' || $transtype=='Expense'))
{
 
$sql="select * from transactions where ('$sdate'<date && '$edate'>date) && AccountName LIKE '%$name%' && transType LIKE '%$transtype%' ;";
}
else
{
 if ($sdate!='yyyy/mm/dd' && $edate!='yyyy/mm/dd'&& $name!='Account Name')
{

  $sql="select * from transactions where ('$sdate'<date && '$edate'>date) && AccountName LIKE '%$name%';";
}
else{
if ($sdate!='yyyy/mm/dd' && $edate!='yyyy/mm/dd' && ($transtype=='Income' || $transtype=='Expense'))
{

$sql="select * from transactions where ('$sdate'<date && '$edate'>date) && transType LIKE '%$transtype%';";
}
else 
{
    if ($name!='Account Name' && ($transtype=='Income' || $transtype=='Expense'))
     { 
        $sql="select * from transactions where  AccountName LIKE '%$name%' && transType LIKE '%$transtype%';";
    }
    else
    {
        if ($sdate!='yyyy/mm/dd' && $edate!='yyyy/mm/dd')
        {
            $sql="select * from transactions where ('$sdate'<date && '$edate'>date);";
        }
        else
        {
            if ($name!='Account Name')
            {
                $sql="select * from transactions where  AccountName LIKE '%$name%';";
            }
            else
            {
                $sql="select * from transactions where transType LIKE '%$transtype%';";
            }
     

        }


    }
   


  }


  }
}
/*
else ($sdate!='yyyy/mm/dd' && $edate!='yyyy/mm/dd')
{
 
$sql="select * from transactions where ('$sdate'<date && '$edate'>date);"
}
*/

$rbalance=0;
$balance=0;
$total=0;
$transactions=mysqli_query($conn, $sql);
if($transactions)
{


foreach($transactions as $data )
{
    $total=$total+$data["Amount"];
    if($data["transType"]=='Income')
    {
       $balance=$balance+$data["Amount"];
       
    }
    else
    {
        $balance=$balance-$data["Amount"];
        

    }
echo '<tr>
<td>'.$data["date"].'</td>
<td>'.$data["AccountName"].'</td>
<td>'.$data["Description"].'</td>
<td>'.$data["Amount"].'</td>
<td>'.$data["transType"].'</td>
<td>'.$balance.'</td>
<td><a class="btn btn-primary"href="update.php?userid='.$data["tid"].'">Edit</a> <a onclick="toSubmit1()" class="btn btn-danger" href="delete.php?userid='.$data["tid"].'">Del</a></td>


</tr>';
$rbalance=$rbalance+$balance;
} //end foreach*/
}
echo '<p style="position:absolute;margin-top:550px;margin-left:600px;">'.$total.'</p>';
echo '<p style="position:absolute;margin-top:550px;margin-left:810px;">'.$rbalance.'</p>';
echo '<p style="position:absolute;margin-top:550px;margin-left:510px;">Total</p>';

}// end display function

if(isset($_POST['submit']))
{
   display();
} 
?>

</table>




</div>



 <div>   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</script>



</body>
</html>