<!-- add header - start -->
<?php require("directives/header.php");
// add menu bar
require("directives/nav_bar.php");
// connect to db
require("directives/database_info.php");?>

<?php
 if (isset($_SESSION['valid_creator']) && ($_GET['id']) == $_SESSION['logID']) {
 } else {
   header("Location: index.php");
 }
 ?>
<div id="content-container">
  <div class="container">
    <div class="col-lg-12 mx-auto">
      <!-- TODO be able to change user settings -->
      <div class="row">
        <?php
            if (isset($_GET['id']) && is_numeric($_GET['id']) ) {

                $userID = ($_GET['id']);
                // $_COOKIE['viewed_profile_id'] = $userID;
                $user_info_query = "SELECT * FROM `photographers` WHERE id=".$userID.";";
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
                $user_posts_query = "SELECT * FROM posts WHERE user_id=".$userID;
                $user_posts_result = $db->query($user_posts_query);

                echo "<div class='container'>
                <h2>Posts</h2>";
                if ($user_posts_result) {
                    // if this user has any posts
                    if (($user_posts_result->num_rows) > 0) {

                        // show them all
                        while ($post = $user_posts_result->fetch_assoc()) {
                            echo "<div class='post-container'>
                                <div class='post-contents'>
                                    <b>".$post['title']."</b>
                                    <p>Posted on ".$post['date']."</p>
                                    <br />
                                    <p>".$post['content']."</p>
                                    <hr />
                                </div>
                            </div>";
                        }
                        echo "</div>";
                    } else {
                        echo "<p>This user has no comments!</p>";
                    }
                }
                $db->close();
            } else {
                echo "<h1 class=\"main-header\">User not found</h1>";
            }
        ?>
        <div class="container">
          <section id="contact" class="contact-section content-section">
                <h2>Post a comment</h2>
                <form class="form-wrap validate-form" name="input" action="create_post.php" method="post">
                  <input type="hidden" name="viewed_profile_id" value="<?php echo $userID ?>">
                  <div class="input-wrap validate-input" data-validate="Name is needed!">
                    <input class="input-style" type="text" name="title" required>
                    <span class="focus-input2" data-placeholder="TITLE"></span>
                  </div>

                  <div class="input-wrap validate-input" data-validate="Message is needed">
                    <textarea class="input-style" name="content" required></textarea>
                    <span class="focus-input2" data-placeholder="MESSAGE"></span>
                  </div>

                  <div class="container-contact1-form-btn">
                    <button class="btn btn-default btn-sm btn-anim-i">
                      <span>
                        Send Message
                      </span>
                    </button>
                  </div>
                </form>
          </section>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
