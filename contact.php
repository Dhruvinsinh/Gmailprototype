<html>
<body style="background-image:url('pic.png')">

<?php
session_start();
if(!isset($_SESSION['id'])){
	header("Location:index.html");
}
?>
<form action="logout.php">
<input type="submit" value="logout"/>
</form>
<form action="mail.php">
<input type="submit" value="compose"/>
</form>
<form action="search.php">
<input type="submit" value="search"/>
</form>
<form action="send.php">
<input type="submit" value="sent"/>
</form>
<form action="recv.php">
<input type="submit" value="inbox"/>
</form>
<?php
$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"exam");
	$result=mysqli_query($conn,"select * from user");
	echo "<table><tr><td>id</td><td>name</td></tr>";
	while($row=mysqli_fetch_assoc($result))
	{
		$uid=$row['id'];
		$nameu=$row['name'];
		echo "<tr><td>$uid</td><td>$nameu</td></tr>";
	}
?>
</body>
</html>
