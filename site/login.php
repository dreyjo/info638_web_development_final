<?php
include_once "login_header.php";

echo "<div>";
echo
'<div id="logo" class="col-lg-6">
  <h1 class="title", margin-bottom:0>Feather</h1>
  <h2 class="subtitle" class="display-4">A Bookmark Tender</h2>';

echo
'<form method="post" action="login.php">

<p>Username:</p><input type="text" name="name" required=""><br>

<p>Password:-</p><input type="text" name="pass" required=""><br>

<input type="submit" name="submit" value="Login">

<form>';
echo "</div>";

//login connection to database:
include_once "db_connect.php";
$conn = open_conn();

if(isset($_POST['submit']))
{
$user = $_POST['name'];
$pass = $_POST['pass'];

$query = mysqli_query($conn,"SELECT * FROM user where username='$user'and password='$pass'");
$result=mysqli_fetch_array($query);
if($result)
{
echo "You are login Successfully ";
header("location: index.php");   // create my-account.php page for redirection

}
else
{
	echo "failed ";
}
}
close_conn($conn);
 ?>
