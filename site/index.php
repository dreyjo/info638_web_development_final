<?php
include_once "header.php";
include_once "db_connect.php";
include_once "nav.php";

echo '<div id="content">
  <h2>Most Recent Bookmarks:</h2>';

$conn = open_conn();

//Building the query for the results we want.
//the home/index page will show the 10 most recent
$query = "SELECT save_date, post_date, acct_handle, content FROM tweet
JOIN bookmark ON bookmark.tweet_id=tweet.tweet_id
ORDER BY save_date DESC LIMIT 10";

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
// $conn->close();
close_conn($conn);


?>
    <!-- </div>

  </body>
</html> -->
