<?php
include_once "header.php";
include_once "db_connect.php";
echo '<div class="container">';
echo '<div class="row">';
include_once "nav.php";

echo '<div id="content" class="col-lg-6">
  <h2>Most Recent Bookmarks:</h2>';

$conn = open_conn();

//Building the query for the results we want.


//All query variables:
//the home/index page will show the top 10 most recent
$query = "SELECT save_date, post_date, acct_handle, tweet_acct_url, content, url FROM tweet
JOIN bookmark ON bookmark.tweet_id=tweet.tweet_id
ORDER BY save_date DESC LIMIT 10";
$handle_link = "SELECT tweet_acct_url FROM tweet";
$handle_query = "SELECT acct_handle FROM tweet";

//run query
$result = $conn->query($query);
$account = $conn->query($handle_query);
$acct_link = $conn->query($handle_link);
//check if query worked
if (!$result) die($conn->error);
$rows = $result->num_rows;



//Get and print out each row that matches query from the database
while ($row = $result->fetch_assoc()) {
    //foreach ($row as $value) {
        //echo $value." | ";
      //  echo $handle." | ".$value;
  //  }
    $handle = "<p>"."<a href=".$row["tweet_acct_url"].">".$row["acct_handle"]."</a>"."</p>";
    $content = "<p>".$row["content"]."<p>";
    $dates = "<p>"."<a href=".$row["url"].">"."posted:".$row["post_date"]."</a>"." | "."saved:".$row["save_date"]."</p>";
    echo $handle.$content.$dates;
    echo "<hr>";
}
echo '</div>';
$result->close();
echo '</div>';
echo '</div>';

close_conn($conn);


?>
    <!-- </div>

  </body>
</html> -->
