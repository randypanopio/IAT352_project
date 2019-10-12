<!-- add header - start -->
<?php require("directives/header.php");
// add menu bar
require("directives/nav_bar.php");
// connect to db
require("directives/database_info.php");?>

<div id="content-container">
  <div class="container">
    <div class="col-lg-12 mx-auto">
      <div class="row">
        <?php
            if (isset($_GET['id']) && is_numeric($_GET['id']) ) {
                $userID = ($_GET['id']);

                $user_info_query = "SELECT * FROM `creators` WHERE id=".$userID.";";
                $user_result = $db->query($user_info_query);
                if($user_result) {
                  $user = $user_result->fetch_array(MYSQLI_ASSOC);

                  echo "<div class=\"col-md-3 content-row\">
                            <img class=\"img-responsive\" src=\"img/placeholder.png\" alt=\"img\">
                        </div>
                        <div class=\"col-md-9 content-row\">
                        <p>
                        Username: ".$user['username']."<br />
                        Name: ".$user['name']."<br />
                        Genre: ".$user['genre']."<br />
                        Email: ".$user['email']."<br />
                        Bio: ".$user['bio']."
                        </p>
                              </div>";
                }

                // display posts
                $user_posts_query = "SELECT * FROM posts WHERE user_id=".$userID." ORDER BY date DESC;";
                $user_posts_result = $db->query($user_posts_query);

                if ($user_posts_result || true) {

                    echo "<div id='user-posts' class='container'>
                    <h1 id='user-posts-header'>Posts</h1>";

                    // if this user has any posts
                    if ($user_posts_result->num_rows > 0) {

                        // show them all
                        while ($post = $user_posts_result->fetch_assoc()) {
                            echo "<div class='post-container'>
                                <div class='post-info'>
                                    <div class='post-info-left'>
                                        <img class='user-profile-pic' src='img/user_icon.png' alt='User Profile Picture'>
                                        <div class='user-name'>".$user['name']."</div>
                                    </div>

                                    <div class='post-info-right'>
                                        <div class='time-posted'>Posted on ".$post['date']."</div>
                                    </div>
                                </div>

                                <div class='post-contents'>
                                    <b>".$post['title']."</b>
                                    <p>".$post['content']."</p>
                                </div>
                            </div>";
                        }
                        echo "</div>";
                    } else {
                        echo "<p>This user has no posts!</p>";
                    }
                }
            } else {
                echo "<h1 class=\"main-header\">User not found</h1>";
            }
        ?>
      </div>
    </div>
  </div>
</div>
<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
