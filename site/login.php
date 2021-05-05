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

<input type="submit" value="Login">

<form>';
echo "</div>";
 ?>
