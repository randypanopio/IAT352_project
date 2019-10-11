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

                $user_info_query = "SELECT * FROM `creator` WHERE id=".$userID.";";
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
            }

            else {
                echo "<h1 class=\"main-header\">User not found</h1>";
            }
        ?>
      </div>
    </div>
  </div>
</div>
<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
