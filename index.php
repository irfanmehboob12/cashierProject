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

function setEventId(event_id){

  var link = document.getElementById("btn1");
  link.setAttribute("href", "delete.php?userid="+event_id);

  
}
 
function setEventId2(event_id){
  
  

document.getElementById("myForm").action = "update_form.php?userid="+event_id;
//window.location.href='index.php?userid='+event_id;

return false;
}
function showAlert()
 {
 var elem= document.getElementById("add-alert"); 
 link.setAttribute("display", "inline-block");
}


 function submitform()
 {
 var id= document.getElementById("custid").value; 
 window.location.href='update_form.php?userid='+id;
 alert(id);
  
   
 }
 function submit()
 {
  
 var x1=document.getElementById("x1").value; 
 var x2= document.getElementById("x2").value;
 var x3= document.getElementById("x3").value; 
 var x4= document.getElementById("x4").value; 
 var x5=document.getElementById("x5").value; 
//alert(x1+" "+x2+" "+x3+" "+x4+" "+x5);

    var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
    var name = document.getElementById('x2').value;
    var date=  document.getElementById('x1').value;
    

   if((x1==""  || x1=="yyyy/mm/dd") || (x2=="" || x2=="Account Name" )|| (x3=="" || x3=="Description") || (x4=="" || x4=="Amount") || (x5=="" || x5=="Income/Expense") || !regName.test(name) || !isValidDate(date))
   {
    document.getElementById("demo").innerHTML="Note: All fields must be filled correctly, no field should be empty. "; 
   //alert("Note: All fields must be filled correctly.");
      //window.load("index.php");
      
   }
  
 else
 {

  document.getElementById("form").submit(); 
 }
   
   
 }
 

 function validate(){
    var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
    var name = document.getElementById('x2').value;
    //alert(name);
    if(!regName.test(name)){
        alert('Please enter your full name (first & last name).');
        document.getElementById('x2').focus();
        return false;
    }else{
        //alert('Valid name given.');
        return true;
    }
}

function isValidDate(date) {
 
 // Date format: YYYY-MM-DD
 var datePattern = /^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;

 // Check if the date string format is a match
 var matchArray = date.match(datePattern);
 if (matchArray == null) {
     return false;
 }

 // Remove any non digit characters
 var dateString = date.replace(/\D/g, ''); 

 // Parse integer values from the date string
 var year = parseInt(dateString.substr(0, 4));
 var month = parseInt(dateString.substr(4, 2));
 var day = parseInt(dateString.substr(6, 2));

 // Define the number of days per month
 var daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

 // Leap years
 if (year % 400 == 0 || (year % 100 != 0 && year % 4 == 0)) {
     daysInMonth[1] = 29;
 }

 if (month < 1 || month > 12 || day < 1 || day > daysInMonth[month - 1]) {
     return false;
 }
 return true;
}

function validateAmount()
{
  
  var amount = document.getElementById('x4').value;
  alert(typeof 1234);
     if(typeof amount === 'string')
     {
      alert("Enter an Amount in integer value(e.g; 32347)");

      document.getElementById('x4').focus();
       return false;


     }
     else
     {
      return true;

     }


}


function validateDate()
{
  var date = document.getElementById('x1').value;
   if(!isValidDate(date))
   {
       alert("Enter Date ( YYYY - MM - DD )");

       document.getElementById('x1').focus();
        return false;
    }else{
        //alert('Valid name given.');
        return true;
    }

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
    
    <input id="x1" onclick=" validateDate()" name="date" type="text" class="form-control" value="yyyy/mm/dd" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div style="width:150px;position:absolute;margin-left:250px;margin-top:50px;display:inline-block" class="mb-3">
    
    <input  id="x2" onclick="validate()" name="accountname" type="text" class="form-control" value="Name" id="exampleInputPassword1">
  </div>
  <div style="width:150px;position:absolute;margin-left:450px;margin-top:50px;display:inline-block" class="mb-3">
    
    <input id="x3"   name="description" type="text" class="form-control" value="Description" id="exampleInputPassword1">
  </div>
  <div style="width:150px;position:absolute;margin-left:650px;margin-top:50px;display:inline-block" class="mb-3">
    <input  id="x4" onclick="validateAmount()" name="amount" type="text" class="form-control"  value="Amount" id="exampleInputPassword1">
  </div>

  <select id="x5"   name="transactiontype" style="width:170px;position:absolute;margin-left:850px;margin-top:50px;display:inline-block" class="form-select" aria-label="Default select example">
  <option selected>Income/Expense</option>
  <option value="Income">Income</option>
  <option value="Expense">Expense</option>
  
</select>
  <p style="margin-left:50px;position:absolute;font-weight:bold; margin-top:100px; font-size: 17px;color:red;" id="demo"></p>
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
    
    <input name="name" type="text" class="form-control" value="Account" id="exampleInputPassword1">
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Transaction</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>If you want to Add Trasaction, then Press Ok.</P>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="btn5" name="addbutton"onclick="submit()" type="button" class="btn btn-primary">OK</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel1">Delete Transaction</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>If you want to Delete Trasaction, then Press Ok.</P>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a  type="button" id="btn1" class="btn btn-primary">OK</a>
      </div>
    </div>
  </div>
</div>

 <?php  
 
 
//$result = mysqli_query($conn,"SELECT * FROM transactions WHERE tid='" . $_GET['userid'] . "'");
//$row= mysqli_fetch_array($result);
//echo $row['tid'];
//echo  $_GET['userid'];
?>
 <div   style="" class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog position-relative ">
   <div  style="height:300px;width:1200px;" class="modal-content position-absolute top-50 start-50 translate-middle-x">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel2">Update Transaction</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
  <form id="myForm" action="" method="post" >
<h6 style="margin-left:50px;margin-top:20px; position:absolute;">Trasaction Form</h6>
<div  style="width:150px;margin-left:50px;margin-top:50px;position:absolute;display:inline-block " class="mb-3">

<input name="date" placeholder="yyyy/mm/dd" type="text" class="form-control" value="yyyy/mm/dd" id="exampleInputEmail1" aria-describedby="emailHelp">

</div>
<div style="width:170px;position:absolute;margin-left:250px;margin-top:50px;display:inline-block" class="mb-3">

<input name="accountname" placeholder="Name" type="text" class="form-control" value="Account Name" id="exampleInputPassword1">
</div>
<div style="width:150px;position:absolute;margin-left:450px;margin-top:50px;display:inline-block" class="mb-3">

<input name="description" placeholder="Description" type="text" class="form-control" value="Description" id="exampleInputPassword1">
</div>
<div style="width:150px;position:absolute;margin-left:650px;margin-top:50px;display:inline-block" class="mb-3">
<input name="amount" placeholder="Amount" type="text" class="form-control"  value="Amount" id="exampleInputPassword1">
</div>

<select   name="transactiontype" style="width:170px;position:absolute;margin-left:850px;margin-top:50px;display:inline-block" class="form-select" aria-label="Default select example">
<option selected>Income/Expense</option>
<option value="Income" >Income</option>
<option value="Expense">Expense</option>

</select>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button  type="submit" id="btn3" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
</form>
 




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

$id=1;
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
<td><a class="btn btn-primary" onclick="setEventId2('.$data['tid'].')"  data-bs-toggle="modal" data-bs-target="#exampleModal2"  href="">Edit</a> <a id='.$data["tid"].' onclick="setEventId('.$data["tid"].')"  data-bs-toggle="modal" data-bs-target="#exampleModal1" class="btn btn-danger" href="delete.php?userid='.$data["tid"].'">Del</a></td>


</tr>';
$rbalance=$rbalance+$balance;
$id=$id+1;
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$('#btn5').click(function() {
    $('#exampleModal').modal('hide');
});



$('#x1,#x2,#x3,#x4').click(function() {
  $(this).attr("value","");
});





</script>




</body>
</html>