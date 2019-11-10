<!-- Top navigation bar -->
<div id="main-menu-bar-container">
    <div id="main-menu-bar">
      <!-- Main navigation bar on all pages -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php">Viewfinder</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php
          require_once("database_info.php");

          if (session_status() == PHP_SESSION_NONE) {
              session_start();
          }
          $_SESSION['callback_URL'] = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

          if(isset($_SESSION['valid_creator']) || isset($_SESSION['valid_follower'])) {
            echo "
            <li class=\"nav-item profile-image-cont\">
              <div class=\"profile-image\" ></div>
            </li>
            ";
          }

          if (isset($_SESSION['valid_creator'])) {
            $query = "SELECT `id`, `username` FROM `creators` WHERE username=\"".($_SESSION['valid_creator'])."\";";
            $result = $db->query($query);
            if ($result) {
                if ($result->num_rows == 1) {
                    $user = $result->fetch_array(MYSQLI_ASSOC);
                    echo "<li class=\"nav-item\">
                      <a class=\"nav-link js-scroll-trigger\">Welcome ".$user['username']."</a>
                    </li>";
                    echo "
                    <li class=\"nav-item\">
                      <a class=\"nav-link js-scroll-trigger\" href=\"logout.php\">Log Out</a>
                    </li>
                    ";
                } else {
                  echo "<li class=\"nav-item\">
                    <a class=\"nav-link js-scroll-trigger\">Welcome User</a>
                  </li>";
                  echo "
                  <li class=\"nav-item\">
                    <a class=\"nav-link js-scroll-trigger\" href=\"logout.php\">Log Out</a>
                  </li>
                  ";
                }
            }
            if ($db->connect_error)  {
                die('Connect Error: ' . $db->connect_error);
            }
            //Close database connection
            $db->close();
          } else if (isset($_SESSION['valid_follower'])){
            $query = "SELECT `id`, `username` FROM `followers` WHERE username=\"".($_SESSION['valid_follower'])."\";";
            $result = $db->query($query);
            if ($result) {
                if ($result->num_rows == 1) {
                    $user = $result->fetch_array(MYSQLI_ASSOC);
                    echo "<li class=\"nav-item\">
                      <a class=\"nav-link js-scroll-trigger\">Welcome ".$user['username']."</a>
                    </li>";
                    echo "
                    <li class=\"nav-item\">
                      <a class=\"nav-link js-scroll-trigger\" href=\"logout.php\">Log Out</a>
                    </li>
                    ";
                } else {
                  echo "<li class=\"nav-item\">
                    <a class=\"nav-link js-scroll-trigger\">Welcome User</a>
                  </li>";
                  echo "
                  <li class=\"nav-item\">
                    <a class=\"nav-link js-scroll-trigger\" href=\"logout.php\">Log Out</a>
                  </li>
                  ";
                }
            }
            if ($db->connect_error)  {
                die('Connect Error: ' . $db->connect_error);
            }
            //Close database connection
            $db->close();
          } else {
          ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="sign_up.php">Create Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="log_in.php">Sign In</a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

</div>
