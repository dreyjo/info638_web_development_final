<?php
  include_once "header.php";
  include_once "db_connect.php";
  // //database login credentials
  // //host name
  // $hn = 'localhost';
  // //databasename
  // $db = 'ajonatha';
  // //username
  // $un = 'root';
  // $pw = '';

  //$_SESSION

  // //Connect to SQL database
  // $conn = new mysqli($hn, $un, $pw, $db);
  // if ($conn->connect_error) die($conn->connect_error);

$conn = open_conn();

  //Building the query for the results we want.
  //the home/index page will show the 10 most recent
$query = "SELECT name FROM tag";

include_once "nav.php";

  //run query
$result = $conn->query($query);
  //check if query worked
if (!$result) die($conn->error);
$rows = $result->num_rows;

  //Get and print out each row that matches query from the database
while ($row = $result->fetch_assoc()) {
    foreach ($row as $value) {
        echo $value." | ";
    }
    echo "<hr>";
  }

  $result->close();
  // $conn->close();
  close_conn($conn);

?>
