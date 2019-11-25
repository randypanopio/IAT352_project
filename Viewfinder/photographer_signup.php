<!-- add header - start -->
<?php require("directives/header.php"); ?>
<!-- add menu bar -->
<?php require("directives/nav_bar.php"); ?>

<div id="content-container">

<!-- template for sign up page -->
<section id="contact" class="contact-section content-section text-center">
  <div class="container">
    <div class="col-lg-8 mx-auto">
      <h2>Photographer Sign Up</h2>
      <form class="form-wrap validate-form mx-auto" name="input" action="photographer_submit_signup.php" method="post">

        <div class="input-wrap validate-input" data-validate="Username is needed!">
          <input class="input-style" type="text" name="username" required>
          <span class="focus-input2" data-placeholder="USERNAME"></span>
        </div>

        <div class="input-wrap validate-input" data-validate="Valid email is needed!">
          <input class="input-style" type="text" name="email" required>
          <span class="focus-input2" data-placeholder="EMAIL"></span>
        </div>

        <div class="input-wrap validate-input" data-validate="Password is needed!">
          <input class="input-style" type="password" name="password" required>
          <span class="focus-input2" data-placeholder="PASSWORD"></span>
        </div>

        <div class="input-wrap validate-input" data-validate="Name is needed!">
          <input class="input-style" type="text" name="name">
          <span class="focus-input2" data-placeholder="NAME"></span>
        </div>

        <div class="input-wrap validate-input" data-validate="Valid input is needed!">
          <select class="dropdown" name="genre">
            <option value="" disabled selected>GENRE</option>
            <option value="Hobby">
              Hobby
            </option>
            <option value="Wedding">
              Wedding
            </option>
            <option value="Event">
              Event
            </option>
            <option value="Portrait">
              Portrait
            </option>
            <option value="Product">
              Product
            </option>
            <option value="Fashion/Design">
              Fashion/Design
            </option>
            <option value="Architecture">
              Architecture
            </option>
            <option value="Photojournalist">
              Photojournalist
            </option>
            <option value="Stock">
              Stock
            </option>
            <option value="Other">
              Other
            </option>
          </select>
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
