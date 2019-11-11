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
      <h2>List of Registered Photographers</h2>
      <div class="row">
        <p>filter by </p>
        <form>
          <div class=" filter-dropdown">
            <div class="input-wrap validate-input">
              <select onchange="this.form.submit()" class="dropdown" name="genre">
                <option value="" disabled selected>Genre</option>
                <option value="All">
                  All
                </option>
                <option value="Entertainment">
                  Entertainment
                </option>
                <option value="Gaming">
                  Gaming
                </option>
                <option value="Educational">
                  Educational
                </option>
                <option value="Music">
                  Music
                </option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="row">
        <?php


        if(isset($_GET["genre"])){
          $genre=$_GET["genre"];
          if($genre == "All" || $genre == "") {
            $query = "SELECT * FROM `creators` ORDER BY `creators`.`id` ASC";
          } else {
            $query = "SELECT * FROM creators WHERE genre LIKE '%{$genre}%'";
          }
          $result = $db->query($query);
          if ($result = $db->query($query)) {
              /* fetch associative array */
            while ($user = $result->fetch_assoc()) {
                echo "<div class=\"col-md-3 content-row\">
                  <div class=\"hovereffect\">
                    <a href=\"creator_userinfo.php?id=".$user['id']."\">
                          <img class=\"img-responsive\" src=\"img/placeholder.png\" alt=\"img\">
                        </a>
                    <a href=\"creator_userinfo.php?id=".$user['id']."\">
                      <div class=\"overlay\">
                        <h2>".$user['username']."</h2>
                      </div>
                    </a>
                  </div>
                </div>";
            }

            if(mysqli_num_rows($result) == 0) {
              echo "<div class=\"col-md-3 content-row\">
                <h3>no users exist</h3>
              </div>";
            }
            $result->free();
            $db->close();
            } else {
              echo "<div class=\"col-md-3 content-row\">
                <h3>no users exist</h3>
              </div>";
            }
        } else {
          $query = "SELECT * FROM `creators` ORDER BY `creators`.`id` ASC";
          $result = $db->query($query);
            if ($result = $db->query($query)) {
                /* fetch associative array */
                while ($user = $result->fetch_assoc()) {
                    echo "<div class=\"col-md-3 content-row\">
                      <div class=\"hovereffect\">
                        <a href=\"creator_userinfo.php?id=".$user['id']."\">
                              <img class=\"img-responsive\" src=\"img/placeholder.png\" alt=\"img\">
                            </a>
                        <a href=\"creator_userinfo.php?id=".$user['id']."\">
                          <div class=\"overlay\">
                            <h2>".$user['username']."</h2>
                          </div>
                        </a>
                      </div>
                    </div>";
                }
                $result->free();
                $db->close();
            } else {
              echo "<div class=\"col-md-3 content-row\">
                <h3>no users exist</h3>
              </div>";
            }
        }
        ?>
      </div>
    </div>
  </div>
</section>
</div>

<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
