<?php
session_start();
if(!isset($_SESSION['id'])){
	header("Location:index.html");
}
session_destroy();
header("Location:index.html");
?>
