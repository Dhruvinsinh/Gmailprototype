<html>
<body style="background-image:url('pic.png')">
<?php
session_start();
if(!isset($_SESSION['id'])){
	header("Location:index.html");
}
$id=$_SESSION['id'];
$name=$_SESSION['name'];
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"exam");
$result=mysqli_query($conn,"select * from $name where category=\"sent\" order by date_m DESC");
$counter=0;
echo "<table><tr><td>from</td><td>to</td><td>content</td></tr>";
while($row=mysqli_fetch_assoc($result))
{
	if($counter<5){
		$f=$row['from_p'];
		$t=$row['to_p'];
		$b=$row['body_content'];
		echo "<tr><td>$f</td><td>$t</td><td>$b</td></tr>";
		$counter=$counter+1;
	}
}
?>
