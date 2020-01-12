<?php
$name=$_POST['name'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];

if($pass==$repass){
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"exam");
	$result=mysqli_query($conn,"create table IF NOT EXISTS $name(category VARCHAR(20),from_p VARCHAR(20),to_p VARCHAR(20),body_content TEXT,date_m date)");
	if($result>0)
	{
		echo "table created";
	}
	$result=mysqli_query($conn,"insert into user (name,pass) values (\"$name\",\"$pass\")");
	if($result>0){
			header("Location:index.html");
	
	}
}
?>
