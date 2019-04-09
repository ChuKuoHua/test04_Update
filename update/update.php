<?php
session_start();
$con= new mysqli('localhost','root','','txt') or die (mysqli_error($con));

$id = 0;
$name ='';
$value ='';

if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$result = $con->query("SELECT *FROM commodity WHERE id=$id")
	or die($con ->error());

		$row = $result->fetch_array();
		$name = $row['name'];
		$value = $row['value'];
	
}

if(isset($_POST['update'])){

	$id = $_POST['id'];
	$name = $_POST['name'];
	$value = $_POST['value'];

	$con->query("UPDATE commodity SET name='$name',  value='$value' WHERE id=$id")
	or die($con ->error);

	$_SESSION['message'] = "update success!";
	$_SESSION['msg_type'] = "warning";

	header("Location: test_04.php"); 
}

?>