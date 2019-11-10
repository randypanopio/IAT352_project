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
          <form name="input" action="database_list.php" method="post">
            <p>Filter by:
              <select name="filter_choice">
                <option value="parks" <?php if($_POST['filter_choice'] == 'parks') echo"selected"; ?>>Parks</option>
                <option value="arts" <?php if($_POST['filter_choice'] == 'arts') echo"selected"; ?>>Art</option>
              </select>

              <!-- set php logic to autofill inputs from previous search -->
              <input type="text" name="search_string" value="<?php echo isset($_POST['search_string']) ? $_POST['search_string'] : '' ?>" >
              <button type="submit"  name="submit" value="submit">Search</button>
          </p>
          </form>
        </div>

      </div>
      <?php
          //db logic n display
          //first check if the form has been submitted
          if(isset($_POST['submit'])) {
            echo "<div class=\"row\">";
            echo "<h3>Results</h3>";
            echo "</div>";
            echo "<div class=\"row\">";

            $search_string = $_POST['search_string'];
            $filter_choice = $_POST['filter_choice'];

            $finalWhereString = "parks.Name=".'"'.$search_string.'"';
            $toBe_searched_string = '"'.$search_string."%".'"';

            $fromString = $filter_choice;
            if ($fromString == "") $fromString = "*";
            // final sql statement to be used to query the db
            $sql = "SELECT * FROM $fromString WHERE Name LIKE $toBe_searched_string";
            echo "SQL STMT: ".$sql."<br /><br /><br />";
            // $sql = "SELECT * FROM parks INNER JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber INNER JOIN products ON orderdetails.productCode = products.productCode WHERE $finalWhereString";

            //query result
            if ($result = $db->query($sql)) {
              echo "<table class=\"xlTable\"><tr>";
              echo "<th>Park Name</th>";
              echo "<th>Address</th>";
              echo "<th>Website URL</th>";
              echo "</tr>";

              while ($data = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$data['Name']."</td>";
                echo "<td>".$data['StreetNumber']." ".$data['StreetName']." ".$data['EWStreet']." ".$data['NSStreet']." ".$data['NeighbourhoodName']."</td>";
                echo "<td><a href=\"".$data['NeighbourhoodURL']."\"  target=\"_blank\">Link</a></td>";

                echo "</tr>";
              }
              echo "</table>";
            } else {
              echo "<h2>Failed to fetch result</h2><br />";
            }

            // close the db connection
            $db->close();
          }
         ?>
      </div>
    </div>
  </div>
</section>
</div>
<!-- add footer - close  -->
<?php require("directives/footer.php"); ?>
