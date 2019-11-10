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
            <p>Search
              <!-- set php logic to autofill inputs from previous search -->
              <input type="text" name="search_string" value="<?php echo isset($_POST['search_string']) ? $_POST['search_string'] : '' ?>" >

          </p>
            <button type="submit"  name="submit" value="submit">Search</button>
          </form>
        </div>

      </div>
      <div class="">
        <!-- db logic n display -->
        <?php
          //first check if the form has been submitted
          if(isset($_POST['submit'])) {

            $search_string = $_POST['search_string'];

            $finalWhereString = "parks.Name=".'"'.$search_string.'"';
            // final sql statement to be used to query the db
            $sql = "SELECT Name FROM parks WHERE $finalWhereString";
            // $sql = "SELECT * FROM parks INNER JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber INNER JOIN products ON orderdetails.productCode = products.productCode WHERE $finalWhereString";

            echo "SQL Query: <br />".$sql;

            //query result
            if ($result = $db->query($sql)) {
              echo "<h2>Result</h2><br />";

              echo "<table><tr>";
              // create logic to filter out the unchecked column options
              if(isset($_POST['order_number']))echo "<th>Order Number</th>";
              if(isset($_POST['order_date']))echo "<th>Order Date</th>";
              if(isset($_POST['ship_date']))echo "<th>Shipped Date</th>";
              if(isset($_POST['product_name']))echo "<th>Product Name</th>";
              if(isset($_POST['description']))echo "<th>Product Description</th>";
              if(isset($_POST['quantity']))echo "<th>Quantity Ordered</th>";
              if(isset($_POST['price']))echo "<th>Price Each</th>";
              echo "</tr>";

              while ($data = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$data['Name']."</td>";

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
