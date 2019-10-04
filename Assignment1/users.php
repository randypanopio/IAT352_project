<!-- add header - start -->
<?php require("directives/header.php"); ?>
<!-- add menu bar -->
<?php require("directives/nav_bar.php"); ?>

<div id="content-container">
<section id="contact" class="contact-section content-section text-center">
  <div class="container">
    <div class="col-lg-12 mx-auto">
      <h2>List of Users</h2>
      <div class="row">
        <?php
          //TODO sort array alphabetically
            if (filesize("members.txt") > 0) {
                $usersSortedArray = array();

                // load users
                $file = file_get_contents("members.txt");

                // create an array of each user by splitting it every new line
                $usersArray = explode("\n", $file);

                foreach ($usersArray as $user) {
                    // split each user into an array of fields and add it to an array
                    $indexer =" |@%| ";
                    $user = explode($indexer, $user);
                    array_push($usersSortedArray, $user);

                }
                // display list of users
                foreach($usersSortedArray as $user){
                  echo "<div class=\"col-md-3 content-row\">
                    <div class=\"hovereffect\">
                      <a href=\"userinfo.php?id=".$user[0]."\">
                            <img class=\"img-responsive\" src=\"img/placeholder.png\" alt=\"img\">
                          </a>
                      <a href=\"userinfo.php?id=".$user[0]."\">
                        <div class=\"overlay\">
                          <h2>$user[1]</h2>
                        </div>
                      </a>
                    </div>
                  </div>";
                }
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
