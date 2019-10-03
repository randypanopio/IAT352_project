<!-- add header - start -->
<?php require("directives/header.php"); ?>
<!-- add menu bar -->
<?php require("directives/nav_bar.php"); ?>

<div id="content-container-welcome">

<section id="contact" class="contact-section content-section text-center">
  <div class="container">
    <div class="col-lg-8 mx-auto">
      <h2>Member Sign Up</h2>
      <form class="form-wrap validate-form mx-auto" name="input" action="submit_signup.php" method="post">

        <div class="input-wrap validate-input" data-validate="Name is needed!">
          <input class="input-style" type="text" name="name">
          <span class="focus-input2" data-placeholder="NAME"></span>
        </div>

        <div class="input-wrap validate-input" data-validate="Valid input is needed!">
          <input class="input-style" type="text" name="occupation">
          <span class="focus-input2" data-placeholder="OCCUPATION"></span>
        </div>

        <div class="input-wrap validate-input" data-validate="Valid email is needed!">
          <input class="input-style" type="text" name="email">
          <span class="focus-input2" data-placeholder="EMAIL"></span>
        </div>

        <div class="input-wrap validate-input" data-validate="Password is needed!">
          <input class="input-style" type="password" name="password">
          <span class="focus-input2" data-placeholder="PASSWORD"></span>
        </div>

        <div class="input-wrap validate-input" data-validate="Bio is needed">
          <textarea class="input-style" name="bio"></textarea>
          <span class="focus-input2" data-placeholder="BIO"></span>
        </div>

        <div class="container-contact1-form-btn">
          <button class="btn btn-default btn-sm btn-anim-i" type="submit"  name="submit" value="Submit">
            <span>
              Submit
            </span>
          </button>
        </div>
      </form>
    </div>


  </div>
</section>
</div>

<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
