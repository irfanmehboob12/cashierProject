<?php


include('dbconnection.php');

function test_input($data) {   //input validation
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accountname = test_input($_POST["accountname"]);
        $transtType = $_POST["transactiontype"];
        $description= test_input($_POST["description"]);
        $date= test_input($_POST["date"]);
        $amount = test_input($_POST["amount"]);
      }

      /*echo $accountname;
      echo $transtType;
      echo $description;
      echo $date;
      echo $amount;

    //echo $accountname;*/
     

$sql =" INSERT INTO transactions (tid,AccountName, Description, amount,transType,date)
VALUES ('','$accountname','$description' ,'$amount','$transtType','$date');";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  ?>

