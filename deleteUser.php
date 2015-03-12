<?php
$connString = "mysql:host=localhost;dbname=TaylorU";
$user ="root";
$pass ="root";
$id=$_POST['userName'];
$sql= "Delete from User where UsrName ='$id'";

$pdo = new PDO($conn, $user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql= "Delete from User where UsrName ='$id'";              

if($pdo->exec($sql !== 0))
    {
      echo "User deleted successfully";
      
    }else
    {
      echo "Unable to delete.";
    }

