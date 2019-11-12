<!-- add header - start -->
<?php require("directives/header.php"); ?>
<!-- add menu bar -->
<?php require("directives/nav_bar.php"); ?>

<!-- template for login page -->
<div id="content-container">
<section id="contact" class="contact-section content-section text-center">
  <div class="container">
    <div class="col-lg-8 mx-auto">
      <?php
      if (isset($_SESSION['valid_member']) || isset($_SESSION['valid_visitor']))
      {?>
          <h2>Already logged in!</h2>
          <p>You are already logged in! Please <a href="logout.php">log out</a> if you would like to log in to another account.</p>
      <?php
      } else {
      ?>
      <h2>Sign In</h2>
        <p>Please select your account type
        </p>
        <div class="container-contact1-form-btn">
          <div class="row">
            <div class="col-md-6 content-row">
              <form action="follower_member_authenticate.php">
                <button class="btn btn-default btn-sm btn-anim-i" href="follower_member_authenticate.php">
                  <span>
                    Follower Sign In
                  </span>
                </button>
              </form>

            </div>
            <div class="col-md-6 content-row">
              <form action="photographers_authenticate.php">
                <button class="btn btn-default btn-sm btn-anim-i" href="photographers_authenticate.php">
                  <span>
                    Photographer Sign In
                  </span>
                </button>
              </form>
            </div>
          </div>
        </div>
        <p>Don't have an account? <a href="sign_up.php">Sign up</a></p>
      <?php
      }
      ?>
    </div>


  </div>
</section>
</div>

<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
