<!-- add header - start -->
<?php require("directives/header.php");
// add menu bar
require("directives/nav_bar.php");
// connect to db
require("directives/database_info.php");
?>

<?php

// start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['valid_creator'])) {
        echo "<div id=\"content-container\">
        <div class=\"container\">
        <div class=\"col-lg-12 mx-auto\">
        <h2>Already logged in!</h2>
          <p>You are already logged in! Please <a href=\"logout.php\">log out</a> before logging into your account.</p>
        </div>
        </div>
        </div>";
        require("includes/footer.php");
        exit;
}

if (!isset($_SESSION['valid_follower'])) {

    // if the form was submitted
    if(isset($_POST['submit'])) {
        // check if each form input was filled, read values from $_POST if not, make the variable and empty string

        if(isset($_POST['password'])) {
            $password = $_POST['password'];
            $password = hash("sha256", $password);
        }
        else {
            $password = '';
        }

        if(isset($_POST['username'])) {
            $username = ($_POST['username']);
        }
        else {
            $username = '';
        }


        // Perform database query
        $query = "SELECT * FROM followers WHERE `username`=\"".$username."\" AND `password`=\"".$password."\";";
        // check for results
        $result = $db->query($query);
        if($result->num_rows == 1){
          $_SESSION['valid_follower'] = $_POST['username'];
          echo "logged in succesfully";
        } else {
           echo "<div id=\"content-container\">
           <div class=\"container\">
           <div class=\"col-lg-12 mx-auto\">
           <h2>Invalid login info, please try again</h2>
           </div>
           </div>
           </div>";
        }

        if ($db->connect_error)  {
            die('Connect Error: ' . $db->connect_error);
        }

        // Close database connection
        $db->close();

    }
}

if (isset($_SESSION['valid_follower'])) {
    //autheticated correctly
    if (isset($_SESSION['callback_URL'])) {
        // redirect to index TODO redirect to current page
        unset($_SESSION['callback_URL']);
        header('Location:index.php');
        exit();
    } else {
        echo "<div id=\"content-container\">
        <div class=\"container\">
        <div class=\"col-lg-12 mx-auto\">
        <h2>You are now logged in</h2>
        </div>
        </div>
        </div>";
    }
} else {
    //did not authenticate yet or failed previous attempt
    //show form
    ?>
    <div id="content-container">
      <div class="container">
        <div class="col-lg-12 mx-auto">
            <section id="contact" class="contact-section content-section text-center">
              <div class="container">
                <div class="col-lg-10 mx-auto">
                  <form class="form-wrap validate-form mx-auto" name="input" action="follower_member_authenticate.php" method="post">
                      <h2>Follower Sign In</h2>

                      <div class="input-wrap validate-input" data-validate="Username is needed!">
                        <input class="input-style" type="username" name="username" id="usernameInput" required>
                        <span class="focus-input2" data-placeholder="USERNAME"></span>
                      </div>

                      <div class="input-wrap validate-input" data-validate="Password is needed!">
                        <input class="input-style" type="password" name="password" id="usernameInput" required>
                        <span class="focus-input2" data-placeholder="PASSWORD"></span>
                      </div>

                      <div class="container-contact1-form-btn">
                        <button class="btn btn-default btn-sm btn-anim-i" type="submit"  name="submit" value="Submit">
                          <span>
                            Submit
                          </span>
                        </button>
                      </div>
                      <p>Don't have an account? <a href="sign_up.php">Sign up</a></p>
                      <p>Not a follower? <a href="creator_member_authenticate.php">Log in as a Photographer instead</a></p>
                  </form>
                </div>
              </div>
            </section>
        </div>
      </div>
    </div>
<?php
}
//add footer - close
require("directives/footer.php"); ?>
