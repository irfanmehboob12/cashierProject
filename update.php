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
$result = mysqli_query($conn,"SELECT * FROM transactions WHERE tid='" . $_GET['userid'] . "'");
$row= mysqli_fetch_array($result);
?>


<body>
<div  style="margin-top:10px;margin-left:100px;width: 1200px;height:200px; background-color:#f1f1f1;">    
<form  action="update_form.php?userid=<?php echo $_GET['userid']; ?>" method="post" >
<h6 style="margin-left:50px;margin-top:20px; position:absolute;">Trasaction Form</h6>
<div  style="width:150px;margin-left:50px;margin-top:50px;position:absolute;display:inline-block " class="mb-3">

<input name="date1" value="<?php echo $row['date']; ?>" type="text" class="form-control" value="yyyy/mm/dd" id="exampleInputEmail1" aria-describedby="emailHelp">

</div>
<div style="width:170px;position:absolute;margin-left:250px;margin-top:50px;display:inline-block" class="mb-3">

<input name="accountname1" value="<?php echo $row['AccountName']; ?>" type="text" class="form-control" value="Account Name" id="exampleInputPassword1">
</div>
<div style="width:150px;position:absolute;margin-left:450px;margin-top:50px;display:inline-block" class="mb-3">

<input name="description1" value="<?php echo $row['Description']; ?>" type="text" class="form-control" value="Description" id="exampleInputPassword1">
</div>
<div style="width:150px;position:absolute;margin-left:650px;margin-top:50px;display:inline-block" class="mb-3">
<input name="amount1" value="<?php echo $row['Amount']; ?>" type="text" class="form-control"  value="Amount" id="exampleInputPassword1">
</div>

<select   name="transactiontype1" style="width:170px;position:absolute;margin-left:850px;margin-top:50px;display:inline-block" class="form-select" aria-label="Default select example">
<option selected><?php echo $row['transType']; ?></option>
<option value="Income" >Income</option>
<option value="Expense">Expense</option>

</select>

<button style="position:absolute;margin-top:50px;margin-left:1050px;display:inline-block" type="submit" class="btn btn-primary">UPDATE</button>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>

 
</html>




