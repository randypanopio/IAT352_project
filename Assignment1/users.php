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
        <p>filter by </p>
        <form>
          <div class=" filter-dropdown">
            <div class="input-wrap validate-input">
              <select onchange="this.form.submit()" class="dropdown" name="gender">
                <option value="" disabled selected>GENDER</option>
                <option value="all">
                  All
                </option>
                <option value="male">
                  Male
                </option>
                <option value="female">
                  Female
                </option>
                <option value="other">
                  Other
                </option>
              </select>
            </div>
          </div>
        </form>
      </div>


      <div class="row">
        <?php

        ?>
        <br />
        <br />
      </div>


      <div class="row">
        <?php
          //TODO sort array alphabetically
            // display correct filtered list or display default
            if(isset($_GET["gender"])){
              $gender=$_GET["gender"];
              displayUsers($gender);
            } else {
              if (filesize("members.txt") > 0) {
                displayUsers("all");
              } else {
                echo "<div class=\"col-md-3 content-row\">
                  <h3>no users exist</h3>
                </div>";
              }
            }

            // display users, filter if needed
            function displayUsers($gender) {
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

              if($gender == "all"){
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
              } else if ($gender == "male"){
                foreach($usersSortedArray as $user){
                  if($user[3] == "Male"){
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
                }
              } else if ($gender == "female") {
                foreach($usersSortedArray as $user){
                  if($user[3] == "Female"){
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
                }
              } else if ($gender == "other") {
                foreach($usersSortedArray as $user){
                  if($user[3] == "Other"){
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
                }
              } else {
                echo "oops something went wrong";
              }
            }
        ?>
      </div>
    </div>


  </div>
</section>
</div>

<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
