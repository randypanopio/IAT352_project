<!-- add header - start -->
<?php require("directives/header.php"); ?>
<!-- add menu bar -->
<?php require("directives/nav_bar.php"); ?>

<!-- template for login page -->
<div id="content-container">
<section id="contact" class="contact-section content-section text-center">
  <div class="container">
    <div class="col-lg-8 mx-auto">
      <h2>Sign In</h2>
      <form class="form-wrap validate-form mx-auto" name="input" method="get">
        <div class="input-wrap validate-input" data-validate="Valid email is needed!">
          <input class="input-style" type="text" name="email">
          <span class="focus-input2" data-placeholder="EMAIL"></span>
        </div>

        <div class="input-wrap validate-input" data-validate="Password is needed!">
          <input class="input-style" type="password" name="password">
          <span class="focus-input2" data-placeholder="PASSWORD"></span>
        </div>
        <div class="container-contact1-form-btn">
          <button class="btn btn-default btn-sm btn-anim-i">
            <span>
              Login
            </span>
          </button>
        </div>

        <br />
        <br />
        <p>Don't have an account? <a href="sign_up.php">Create an account</a></p>
      </form>
    </div>


  </div>
</section>
</div>

<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
