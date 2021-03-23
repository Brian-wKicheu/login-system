<?php
include_once 'dbh.php';

//calling input types from the form(id,name,email,mobile) with their names
//the variable names will be required in insertion, update
$id = $_POST['fid'];
$name = $_POST['fname'];
$email = $_POST['femail'];
$mobile = $_POST['fmobile'];

if(!isset($_POST['fsave'])){//fsave is submit btn name
  header("location: ../index.php");//if fsave is not set go back to index.php file
}else{
  $sql = "INSERT INTO ps4(name, email, mobile) VALUES(?, ?, ?);";//now insert into table ps4
  $stmt = $dbconn-> prepare($sql); //input var $sql together with db $dbconn
  $stmt -> bind_param("sss", $name, $email, $mobile);//now bind var name, email, mobile
  $stmt -> execute();  //now execute them
  header("location: ../index.php");
}
// the above section inserts data into db $dbconn inside the table  called ps4

if(!isset($_POST['fupdate'])){ //fupdate is submit btn name
  header("location: ../index.php"); //if fupdate is not set return to index.php file
}else{
  $sql = "UPDATE ps4 SET name=?, email=?, mobile=? WHERE id=?;";//now update from ps4 table from specified id
  $stmt = $dbconn->prepare($sql);
  $stmt -> bind_param("sssi", $name, $email, $mobile, $id);
  $stmt -> execute();
  header("location: ../index.php");
}
// the above section updates data into db $dbconn inside the table  called ps4

$delete = $_GET['delete'];//delete is submit btn that deletes data from db $dbconn into 
$sql = "DELETE FROM ps4 WHERE id=?;"; //now delete by specifying the  id 
$stmt = $dbconn -> prepare($sql);
$stmt -> bind_param("i", $delete);
$stmt -> execute();
header("location: ../index.php");
// the above section deletes data into db $dbconn inside the table  called ps4
?>
