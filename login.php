<?php
$name=$_POST['name'];

$pass=$_POST['pass'];
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"exam");
	$result=mysqli_query($conn,"select * from user where name=\"$name\" and pass=\"$pass\"");
	$status=0;
	while($row=mysqli_fetch_assoc($result)){
		$status=1;
		$id=$row['id'];
		session_start();
		$_SESSION['name']=$name;
		$_SESSION['id']=$id;
		break;
	}
	if($status==1){
		header("Location:contact.php");
	}
	else{
		header("Location:index.html");
	}
?>
