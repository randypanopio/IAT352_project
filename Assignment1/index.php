<!-- IAT 352 Randy Panopio -->

<!-- add header - start -->
<?php require("directives/header.php"); ?>
<!-- add menu bar -->
<?php require("directives/nav_bar.php"); ?>


<div id="content-container">

<section class="content-section text-center">
  <div class="intro-body">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h1 class="brand-heading">Welcome</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- content -->
<section id="projects" class="content-section text-center">
  <div class="container">
    <!-- cards for modules (currentl only users) -->
    <div class="row">
      <div class="col-md-4 content-row">
        <div class="hovereffect">
          <a href="users.php">
                <img class="img-responsive" src="img/placeholder.png" alt="">
              </a>
          <a href="users.php">
            <div class="overlay">
              <h2>Users List</h2>

            </div>
          </a>
        </div>
      </div>

      <div class="col-md-4 content-row">
        <div class="hovereffect">
          <a href="users.php">
                <img class="img-responsive" src="img/placeholder.png" alt="">
              </a>
          <a href="users.php">
            <div class="overlay">
              <h2>Content Creators</h2>

            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
