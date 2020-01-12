<html>
<body style="background-image:url('pic.png')">
<form>
<input type="text" name="from" placeholder="from"/><br>
<input type="text" name="to"  placeholder="to"/><br>
<textarea name="bodycontent"></textarea><br>
<input type="submit" name="c" value="compose"/><br>
</form>
</html>
<?php
session_start();
if(!isset($_SESSION['id'])){
	header("Location:index.html");
}
$id=$_SESSION['id'];
$name=$_SESSION['name'];
if(isset($_GET['c']))
{
	$from=$_GET['from'];
	if($from==$name)
	{
	$to=$_GET['to'];
	
	$content=$_GET['bodycontent'];
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"exam");
	$date=date("Y/m/d");
	$result=mysqli_query($conn,"insert into $to values ('inbox',\"$from\",\"$to\",\"$content\",\"$date\")");
	$result=mysqli_query($conn,"insert into $from values ('sent',\"$from\",\"$to\",\"$content\",\"$date\")");
	}
	else
	{
		echo "wrong from";
	}
}
?>
