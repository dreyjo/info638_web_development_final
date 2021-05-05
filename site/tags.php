<?php
  include_once "header.php";
  include_once "db_connect.php";
  echo '<div class="container">';
  echo '<div class="row">';
  include_once "nav.php";

  echo '<div id="content" class="col-lg-6">
    <h2>All Saved Tags:</h2>';


$conn = open_conn();

  //ALL PAGE QUERIES:
  //Building the query for the results we want.
  //tags page will list all saved tags
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
  echo '</div>';
  $result->close();
  echo '</div>';
  echo '</div>';

  close_conn($conn);

?>
