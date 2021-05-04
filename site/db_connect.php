<?php
//database login credentials
//host name
//function for opening database connection
function open_conn()
{
$hn = 'localhost';
//databasename
$db = 'ajonatha';
//username
$un = 'root';
$pw = '';

//Connect to SQL database
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

return $conn;
}

//function for closing database connection
function close_conn($conn)
{
  $conn -> close();
}

?>
