<!-- add header - start -->
<?php require("directives/header.php");
// add menu bar
require("directives/nav_bar.php");
// connect to db
require("directives/database_info.php");?>
<div id="content-container">
<section id="contact" class="contact-section content-section text-center">
  <div class="container">
    <div class="col-lg-12 mx-auto">
      <h2>List of Registered Followers</h2>
      <div class="row">
        <?php
        $query = "SELECT * FROM `followers` ORDER BY `followers`.`id` ASC";
        $result = $db->query($query);
          if ($result = $db->query($query)) {
              while ($user = $result->fetch_assoc()) {
                  echo "<div class=\"col-md-3 content-row\">
                    <div class=\"hovereffect\">
                      <a href=\"follower_userinfo.php?id=".$user['id']."\">
                            <img class=\"img-responsive\" src=\"img/placeholder.png\" alt=\"img\">
                          </a>
                      <a href=\"follower_userinfo.php?id=".$user['id']."\">
                        <div class=\"overlay\">
                          <h2>".$user['username']."</h2>
                        </div>
                      </a>
                    </div>
                  </div>";
              }
              $result->free();
              $db->close();
          } else {
            echo "<div class=\"col-md-3 content-row\">
              <h3>no users exist</h3>
            </div>";
          }
        ?>
      </div>
    </div>
  </div>
</section>
</div>

<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
