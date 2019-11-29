<!-- add header - start -->
<?php require("directives/header.php");
// add menu bar
require("directives/nav_bar.php");
// connect to db
require("directives/database_info.php");?>
<div id="content-container">
<section id="contact" class="contact-section content-section text-center">
  <div class="container">
    <div class="col-lg-12 mx-auto">
      <h2>Photo location search</h2>
      <div class="row">
        <div class="col-lg-8 mx-auto">
            <p>Filter by:
              <select name="filter_choice" id="filter_choice">
                <option value="parks" <?php if(isset($_POST['filter_choice'])){
                  if($_POST['filter_choice'] == 'parks') echo"selected";
                } else {
                  echo"selected";
                } ?>>Parks</option>
                <option value="public_arts" <?php if(isset($_POST['filter_choice'])){
                  if($_POST['filter_choice'] == 'public_arts') echo"selected";
                }?>>Art</option>
              </select>
              <input  id="search_string" type="text" name="search_string" value="<?php echo isset($_POST['search_string']) ? $_POST['search_string'] : '' ?>" >
              <button onclick="location_lookup(1)" type="submit"  name="submit" value="submit">Search</button>
          </p>
        </div>
      </div>
      <div class="row" >
        <table class="xlTable" id="locations"></table>
      </div>
      <div class="row">
          <div>
            Display
            <select onchange="location_lookup(1);" onfocus="this.selectedIndex = -1;" name="pagination_limit" id="pagination_limit">
              <option value="5">5</option>
              <option value="10">10</option>
            </select>
          </div>
          <div style="margin-left: 10px;" id="pagination_control">
          </div>
      </div>
      </div>
    </div>
  </div>
</section>
</div>
<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
