<!-- IAT 352 A1 - Randy Panopio -->
<?php
$dbhost = "localhost";
$dbuser = "randy_panopio";
$dbpass = "randy_panopio";
$dbname = "classicmodels";

// create new connection
@$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection succeeded
// if connection failed, skip the rest of PHP code, and print an error
if ($db->connect_error)  {
    die('Connect Error: ' . $db->connect_error);
}

// start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<html>
<head>
<style>
table, th, td {border: 1px solid black;
  border-collapse: collapse;}
</style>
</head>

<body>
  <!-- Build the form for selecting order parameters -->
<form name="input" action="dbquery.php" method="post">
  <h1>Query - A1 - Randy Panopio</h1>
  <table>
    <tr>
    <th><h2>Select Order Parameters</h2></th>
    <th><h2>Select Columns to Display</h2></th>
  </tr>
  <tr>
    <td>
      <p>Order Number
        <!-- If it needs to display a populated drop down list, use this block -->
        <!-- <select name="order_number_input">
          <?php
          $sql = "SELECT * FROM orders";
          $result = $db->query($sql);
            while ($data = $result->fetch_assoc()){
            echo "<option>" . $data['orderNumber'] . "</option>";
            }
          ?>
        </select> -->

        <!-- set php logic to autofill inputs from previous search -->
        <input type="text" name="order_number_input" value="<?php echo isset($_POST['order_number_input']) ? $_POST['order_number_input'] : '' ?>" >

         or<br />
      Order Date (YYYY-MM-DD) <br />
    from: <input type="text" name="date_range_start" value="<?php echo isset($_POST['date_range_start']) ? $_POST['date_range_start'] : '' ?>" /> to <input type="text" name="date_range_end" value="<?php echo isset($_POST['date_range_end']) ? $_POST['date_range_end'] : '' ?>" />
    </p></td>
    <td>
    <input type="checkbox" name="order_number" <?php echo isset($_POST['order_number']) ? 'checked' : ''?>>Order Number<br>
    <input type="checkbox" name="order_date" <?php echo isset($_POST['order_date']) ? 'checked' : ''?>>Order Date<br>
    <input type="checkbox" name="ship_date" <?php echo isset($_POST['ship_date']) ? 'checked' : ''?>>Shipped Date<br>
    <input type="checkbox" name="product_name" <?php echo isset($_POST['product_name']) ? 'checked' : ''?>>Product Name<br>
    <input type="checkbox" name="description" <?php echo isset($_POST['description']) ? 'checked' : ''?>>Product Description <br>
    <input type="checkbox" name="quantity" <?php echo isset($_POST['quantity']) ? 'checked' : ''?>>Quantity Ordered<br>
    <input type="checkbox" name="price" <?php echo isset($_POST['price']) ? 'checked' : ''?>>Price Each<br>
  </td>
  </table>
  <br />
  <button type="submit"  name="submit" value="submit">Search Orders</button>
</form>


<?php
  //first check if the form has been submitted
  if(isset($_POST['submit'])) {

    //create an array of all the column filter options
    $select_values = array();
    if(isset($_POST['order_number']))array_push($select_values,"orders.orderNumber");
    if(isset($_POST['order_date']))array_push($select_values,"orders.orderDate");
    if(isset($_POST['ship_date']))array_push($select_values,"orders.shippedDate");
    if(isset($_POST['product_name']))array_push($select_values,"products.productName");
    if(isset($_POST['description']))array_push($select_values,"products.productDescription");
    if(isset($_POST['quantity']))array_push($select_values,"orderdetails.quantityOrdered");
    if(isset($_POST['price']))array_push($select_values,"orderdetails.priceEach");

    $selectString = "";
    // loop through the filter options to create a string that defines which filter to use for the query string
    foreach ($select_values as $values) {
      $selectString .= $values.",";
    }
    if ($selectString == "") $selectString = "*"; // set a case if its empty, just pull all
    $finalSelectString = substr($selectString,0, -1); //remove the final comma to be used for the SELECT query statement

    //check posted values for the order parameters
    $order_number_input = $_POST['order_number_input'];
    $date_range_start = $_POST['date_range_start'];
    $date_range_end = $_POST['date_range_end'];

    // logic to check if the input values are filled and use the correct WHERE statement if appropriate
    if((!empty($_POST['order_number_input'])) && (!empty($_POST['date_range_start']) && !empty($_POST['date_range_end']))) {
      //if all input are filled out, use all options to filter
      $finalWhereString = "orders.orderNumber=".$order_number_input. " AND " . "orders.orderDate BETWEEN "."'".$date_range_start."'"." AND "."'".$date_range_end."'"."";
    } else if (!empty($_POST['date_range_start']) && !empty($_POST['date_range_end'])) {
      // if BOTH the start date and end date are filled use date range to filter
      $finalWhereString = "orders.orderDate BETWEEN "."'".$date_range_start."'"." AND "."'".$date_range_end."'"."";
    } else if (!empty($_POST['order_number_input'])) {
      // if only order number is used, use this to filter
      $finalWhereString = "orders.orderNumber=".$order_number_input;
    }

    // final sql statement to be used to query the db
    $sql = "SELECT $finalSelectString FROM orders INNER JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber INNER JOIN products ON orderdetails.productCode = products.productCode WHERE $finalWhereString";

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
        // create logic to filter out the unchecked column options
        if(isset($_POST['order_number']))echo "<td>".$data['orderNumber']."</td>";
        if(isset($_POST['order_date']))echo "<td>".$data['orderDate']."</td>";
        if(isset($_POST['ship_date']))echo "<td>".$data['shippedDate']."</td>";
        if(isset($_POST['product_name']))echo "<td>".$data['productName']."</td>";
        if(isset($_POST['description']))echo "<td>".$data['productDescription']."</td>";
        if(isset($_POST['quantity']))echo "<td>".$data['quantityOrdered']."</td>";
        if(isset($_POST['price']))echo "<td>".$data['priceEach']."</td>";
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
</body>
 <html>
