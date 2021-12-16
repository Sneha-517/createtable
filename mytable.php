<!DOCTYPE html>
<html>
<head>
<title>TABLE CREATION</title>
</head>
<body style = "background-color:powderblue;text-align:center;">
<h1> CREATING TABLE IN MYSQL </h1>
<form action="" method="POST"  >
<h3>Enter Table Name : <input type="text" name="t_name" style="height:25px; width:160px"></h3>
<input type="submit" name="submit" value="submit" style="height:30px; width:100px">
</form>
</body>
</html>

<?php
$conn=mysqli_connect('localhost','root','');     		 	//create connection
if(!$conn)	   				 			//check connection
{								
	echo "error";
}
$sql = "CREATE DATABASE Intern";  			       		 // create database
$conn->query($sql);					     		//connect query	
$n=mysqli_connect('localhost','root','','Intern');	    		//connect database
if(isset($_POST['t_name'])){
$t_name = mysqli_real_escape_string($n,$_POST['t_name']);		//extracting tablename from form
$result = mysqli_query($n,"SHOW TABLES LIKE '".$t_name."'");		
if($result->num_rows == 1)						//check tablename exists or not
{
	echo '<script language = "javascript">';
	echo 'alert("Table exists,Please try again")';
	echo '</script>';
}
else
{
	$query = "CREATE TABLE $t_name (id INT(250) UNSIGNED AUTO_INCREMENT PRIMARY KEY,		
        firstname VARCHAR(30) NOT NULL,lastname VARCHAR(30) NOT NULL,email VARCHAR(50))";         //query to create table with given parameters
	$res = mysqli_query($n,$query);					//excute query			
	echo '<script language = "javascript">';
	echo 'alert("Table Successfully Created")';
	echo '</script>';
}
}
?>
