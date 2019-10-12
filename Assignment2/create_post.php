<!-- add header - start -->
<?php
// require("directives/header.php");
// // add menu bar
// require("directives/nav_bar.php");
// connect to db
require_once("directives/database_info.php");

// TODO bind user to each post
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// if not logged in redirect
if (isset($_SESSION['valid_follower']) || isset($_SESSION['valid_creator']) ) {
  $user_id = $_POST['viewed_profile_id'];
  $title = !empty($_POST['title']) ? $_POST['title'] : "";
  $content = !empty($_POST['content']) ? $_POST['content'] : "";

  // Prepared statement
  if (!($stmt = $db->prepare("INSERT INTO  `posts`(`user_id`, `title`, `content`, `date`) VALUES (?, ?, ?, NOW())"))) {
      echo "Prepare failed: (" . $db->errno . ") " . $db->error;
  }

  $stmt->bind_param('iss', $user_id, $title, $content);

  // // execute database query
  if ($stmt->execute()) {
      $stmt->close();
      header("Location: creator_userinfo.php?id=".$user_id);
  } else {
    header("Location: creator_userinfo.php?id=".$user_id);
  }



  //Close database connection
} else {
  header("Location: log_in.php");
  exit;
}

?>
