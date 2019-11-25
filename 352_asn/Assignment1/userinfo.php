<!-- add header - start -->
<?php require("directives/header.php"); ?>
<!-- add menu bar -->
<?php require("directives/nav_bar.php"); ?>

<div id="content-container">
  <div class="container">
    <div class="col-lg-12 mx-auto">
      <div class="row">
        <?php
            if (is_numeric($_GET['id'])) {
                $userID = $_GET['id'];
                $file = file_get_contents("members.txt");
                $usersSortedArray = array();
                // create an array of each user by splitting it every new line
                $usersArray = explode("\n", $file);

                foreach ($usersArray as $user) {
                    // split each user's info into an array
                    $indexer =" |@%| ";
                    $user = explode($indexer, $user);
                    array_push($usersSortedArray, $user);
                }

                // set user based on user ID
                $displayedUser = $usersSortedArray[($userID-1)];

                // generate the information to be displayed about the user
                $name = $displayedUser[1];
                $occupation = $displayedUser[2];
                $gender = $displayedUser[3];
                $email = $displayedUser[4];
                $bio = $displayedUser[6];

                echo "<div class=\"col-md-3 content-row\">
                          <img class=\"img-responsive\" src=\"img/placeholder.png\" alt=\"img\">
                      </div>
                      <div class=\"col-md-9 content-row\">
                      <p>
                      Name: ".$name."<br />
                      Occupation: ".$occupation."<br />
                      Gender: ".$gender."<br />
                      Email: ".$email."<br />
                      Bio: ".$bio."
                      </p>
                            </div>";
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
