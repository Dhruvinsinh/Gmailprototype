<html>
<body style="background-image:url('pic.png')">
<form>
search bodycontent
<input type="text" name="search"/>
<input type="submit" name="s1" value="search"/>
</form>
<form>
from and to
<input type="text" name="from"/>
<input type="text" name="to"/>
<input type="submit" name="s2" value="search"/>
</form>
</html>
<?php
session_start();
if(!isset($_SESSION['id'])){
	header("Location:index.html");
}
if(isset($_GET['s1']))
{
$search=$_GET['search'];
$id=$_SESSION['id'];
$name=$_SESSION['name'];
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"exam");
$result=mysqli_query($conn,"select * from $name where body_content like \"%$search%\"");
echo "<table><tr><td>from</td><td>to</td><td>content</td></tr>";
while($row=mysqli_fetch_assoc($result))
{
$f=$row['from_p'];
		$t=$row['to_p'];
		$b=$row['body_content'];
		echo "<tr><td>$f</td><td>$t</td><td>$b</td></tr>";
}
}
if(isset($_GET['s2']))
{
$f=$_GET['from'];

$t=$_GET['to'];
$id=$_SESSION['id'];
$name=$_SESSION['name'];
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"exam");
$result=mysqli_query($conn,"select * from $name where from_p=\"$f\" and to_p=\"$t\"");
echo "<table><tr><td>from</td><td>to</td><td>content</td></tr>";
while($row=mysqli_fetch_assoc($result))
{
$f=$row['from_p'];
		$t=$row['to_p'];
		$b=$row['body_content'];
		echo "<tr><td>$f</td><td>$t</td><td>$b</td></tr>";
}
}
?>
