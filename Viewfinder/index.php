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
          <h1 class="brand-heading">Welcome to Viewfinder!</h1>
          <p class="">Viewfinder lets you search up your next perfect shooting location and learn about other photographers</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- TODO
- replace all "creators" context to "photographers"
- create AJAX favourites list of each searched item
- create saved list page
 -->
<!-- content -->
<section id="projects" class="content-section text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-12 content-row map-card">
        <div class="hovereffect">
          <a href="search_locations.php">
                <img class="img-responsive" src="img/samplemap.jpg" alt="">
              </a>
          <a href="search_locations.php">
            <div class="overlay">
              <h2>Search Locations</h2>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 content-row">
        <div class="hovereffect">
          <a href="photographer_members.php">
                <img class="img-responsive" src="img/cam2.png" alt="">
              </a>
          <a href="photographer_members.php">
            <div class="overlay">
              <h2>View Photographer Members</h2>

            </div>
          </a>
        </div>
      </div>
      <div class="col-md-4 content-row">
        <div class="hovereffect">
          <a href="follower_members.php">
                <img class="img-responsive" src="img/cam1.png" alt="">
              </a>
          <a href="follower_members.php">
            <div class="overlay">
              <h2>View Follower Members</h2>

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
