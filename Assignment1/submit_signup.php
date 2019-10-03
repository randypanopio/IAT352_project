<!-- add header - start -->
<?php require("directives/header.php"); ?>
<!-- add menu bar -->
<?php require("directives/nav_bar.php"); ?>

<div id="content-container">
    <?php
        // print_r($_POST);


        // detect form submission
        if (isset($_POST['submit'])) {

          // post values & set default if empty
          $name = !empty($_POST['name']) ? $_POST['name'] : "";
          $occupation = !empty($_POST['occupation']) ? $_POST['occupation'] : "";
          $email = !empty($_POST['email']) ? $_POST['email'] : "";
          $password = !empty($_POST['password']) ? $_POST['password'] : "";
          $bio = !empty($_POST['bio']) ? $_POST['bio'] : "";
        } else {
          $name = "";
          $occupation = "";
          $email = "";
          $password = "";
          $bio = "";
        }

        $file = "members.txt";
        $content = $name.",".$occupation.",".$email.",".$password.",".$bio;
        echo "</br>";


        if($handle = fopen($file, "a")){
          echo "<div class=\"container content-box\">
            <div class=\"col-lg-8 mx-auto\">
            <h3>Form was submitted</h3>
            <p>account was created</p>
            <p>Name: ".$name."<br />Occupation: ".$occupation."<br /> Email: ".$email."<br />Bio: ".$bio."</p>
            </div>
            </div>";
          echo "<div id=\"sign-up-results\">


              </div>";
          echo "</br>";
          fwrite($handle, "\n".$content);
          // file_put_contents($file, $content);
          fclose($handle);
        } else {
          echo "made new file";
          $file = "members.txt";
          file_put_contents($file, $content);
          fclose($handle);
        }

        // // write the user info to a text file
        // file_put_contents("memberinfo.txt", $userDataString, FILE_APPEND);
        //
        // // inform the user that the account was added

    ?>
</div>

<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
