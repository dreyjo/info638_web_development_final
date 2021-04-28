<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Feather Homepage</title>

    <!--linking Bootsrap-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link href="design/css/bootstrap.min.css" rel="stylesheet">

    <!--linking my stylesheet-->
    <link href="feather.css" rel="stylesheet">
  </head>
  <body>
    <div id="pagelist">
      <h1 class="title">Feather</h1>
      <h2 class="subtitle">A Bookmark Tender</h2>
      <div class="nav">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="bookmarks.php">Bookmarks</a></li>
          <li><a href="tags.php">Tags</a></li>
          <li><a href="about.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content">
      <h2>Most Recent Bookmarks:</h2>
<?php
//database login credentials
//host name
$hn = 'localhost';
//databasename
$db = 'ajonatha';
//username
$un = 'root';
$pw = '';
//$_SESSION

//Connect to SQL database
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

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

$result->close();
$conn->close();


?>
    </div>

  </body>
</html>
