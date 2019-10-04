<!-- add header - start -->
<?php require("directives/header.php"); ?>
<!-- add menu bar -->
<?php require("directives/nav_bar.php"); ?>

<div id="content-container">
    <?php
        // detect form submission
        if (isset($_POST['submit'])) {

          // post values & set default if empty
          $name = !empty($_POST['name']) ? $_POST['name'] : "";
          $occupation = !empty($_POST['occupation']) ? $_POST['occupation'] : "";
          $gender = !empty($_POST['gender']) ? $_POST['gender'] : "";
          $email = !empty($_POST['email']) ? $_POST['email'] : "";
          $password = !empty($_POST['password']) ? $_POST['password'] : "";
          $bio = !empty($_POST['bio']) ? $_POST['bio'] : "";
        } else {
          $name = "";
          $occupation = "n/a";
          $gender = "n/a";
          $email = "n/a";
          $password = "";
          $bio = "n/a";
        }

        $file = "members.txt";
        $indexer = " |@%| ";
        if($handle = fopen($file, "a")){
          // display user info after created
          echo "<div class=\"container content-box\">
            <div class=\"col-lg-4 mx-auto\">
            <h3>Form was submitted</h3>
            <p>account was created</p>
            <p>Name: ".$name."<br />Gender: ".$gender."<br />Occupation: ".$occupation."<br /> Email: ".$email."<br />Bio: ".$bio."</p>
            </div>
            </div>";
          echo "<div id=\"sign-up-results\">
              </div>";
          echo "</br>";

          // string to be written about user info after sign up
          $content = $name.$indexer.$occupation.$indexer.$gender.$indexer.$email.$indexer.$password.$indexer.$bio;
          $toWrite = $content;
          //prevent writing new line (new user) if no existing user exists
          if(filesize($file) > 0) {
            //generate id for each user
            $usersArray = explode("\n", file_get_contents($file));
            $last= end($usersArray);
            $lastUser = explode($indexer, $last);
            $lastUserID = $lastUser[0];
            //add id to new users
            $toWrite = "\n".($lastUserID+1).$indexer.$content;
          } else {
            //create first user
            $toWrite = "1".$indexer.$content;
          }
          fwrite($handle,$toWrite);
          fclose($handle);
        } else {
          echo "made new file";
          $file = "members.txt";
          file_put_contents($file, $content);
          fclose($handle);
        }
    ?>
</div>

<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
