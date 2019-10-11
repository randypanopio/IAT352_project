<!-- add header - start -->
<?php require("directives/header.php");
// add menu bar
require("directives/nav_bar.php");
// connect to db
require("directives/database_info.php");
?>
<div id="content-container">
  <div class="container">
    <div class="col-lg-12 mx-auto">
      <div class="row">
<?php

// start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['valid_follower'])) {
        echo "<h1 class=\"center-text\">Already logged in!</h1>
            <p>You are already logged in! Please <a href=\"logout.php\">log out</a> before logging into your account.</p>";
        require_once("includes/footer.php");
        exit;
}

if (!isset($_SESSION['valid_creator'])) {

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
        $query = "SELECT * FROM creator WHERE `username`=\"".$username."\" AND `password`=\"".$password."\";";
        // check for results
        $result = $db->query($query);

        echo $query;

        echo $result->num_rows;

        if($result->num_rows == 1){
          $_SESSION['valid_creator'] = $_POST['username'];
          echo "logged in succesfully";
        } else {
           echo "<h2>Invalid login info, please try again</h2>";
        }

        // if ($result) {
        //     // visitor's name and password combination are correct
        //     // do whatever matching is necessary - against the DB here
        //     if($conn->$num_rows($result) == 1) {
        //       echo "logged in";
        //       // echo $_SESSION['valid_creator'];
        //       $_SESSION['valid_creator'] = $_POST['username'];
        //     } else {
        //       echo "fail";
        //     }
        //
        //       // header('Location: info_success.php');
        // } else {
        //     echo "<h1>Invalid login info, please try again</h1>";
        // }

        if ($db->connect_error)  {
            die('Connect Error: ' . $db->connect_error);
        }

        // Close database connection
        $db->close();

    }
}

if (isset($_SESSION['valid_creator'])) {
    //autheticated correctly
    if (isset($_SESSION['callback_URL'])) {
        // redirect to index TODO redirect to current page
        unset($_SESSION['callback_URL']);
        // header('Location:index.php');
        exit();
    } else {
        echo "<h2>You are now logged in.</h2>";
    }
}

else {
    //did not authenticate yet or failed previous attempt
    //show form
    ?>
    <div id="content-container">
        <form name="input" action="creator_member_authenticate.php" method="post">
            <h2 class="center-text">Content Creator Sign In</h2>

            <input class="form-input" type="username" name="username" id="usernameInput" placeholder="Username" required>

            <input class="form-input" type="password" name="password" id="passwordInput" placeholder="Password" required>

            <input class="form-button button-grey" name="submit" type="submit" value="Submit">
            <p>Don't have an account? <a href="sign_up.php">Sign up</a></p>
            <p>Not a content creator? <a href="regular_member_authenticate.php">Log in as a follower instead</a></p>
        </form>
    </div>

  </div>
</div>
</div>
</div>
<?php
}
//add footer - close
require("directives/footer.php"); ?>
