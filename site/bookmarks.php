<?php
include_once "header.php";
include_once "db_connect.php";
echo '<div class="container">';
echo '<div class="row">';
include_once "nav.php";

echo '<div id="content" class="col-lg-6">
  <h2>All Saved Bookmarks:</h2>';

  $conn = open_conn();


    //ALL PAGE QUERIES:
    //Building the query for the results we want.
    //tags page will list all saved tags
  $query = "SELECT save_date, post_date, acct_handle, content, tweet_acct_url, url FROM tweet
  JOIN bookmark ON bookmark.tweet_id=tweet.tweet_id
  ORDER BY save_date DESC";
  $handle_link = "SELECT tweet_acct_url FROM tweet";
  $handle_query = "SELECT acct_handle FROM tweet";

  include_once "nav.php";

  //run query
  $result = $conn->query($query);
  $account = $conn->query($handle_query);
  $acct_link = $conn->query($handle_link);
  //check queries
  $result = $conn->query($query);
  if (!$result) die($conn->error);
  $rows = $result->num_rows;

  //Get and print out each row that matches query from the database
  while ($row = $result->fetch_assoc()) {
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
