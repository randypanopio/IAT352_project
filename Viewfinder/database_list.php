<?php
// connect to db
require("directives/database_info.php");

$search_string = $_POST['search_string'];
$filter_choice = $_POST['filter_choice'];
if(strlen($search_string) > 0){

  // establish sql string to be queried
  $finalWhereString = "parks.Name=".'"'.$search_string.'"';
  $toBe_searched_string = '"'.$search_string."%".'"';
  $fromString = $filter_choice;
  if ($fromString == "") $fromString = "*";
  $whereString = "";
  if($filter_choice == "parks") {
    $whereString = "Name";
  } else if ($filter_choice == "public_arts") {
    $whereString = "SiteName";
  }
  $sql = "SELECT * FROM $fromString WHERE $whereString LIKE $toBe_searched_string"; // final sql statement
  // echo "SQL STMT: ".$sql."<br /><br /><br />";

  //query result
  if ($result = $db->query($sql)) {
    if($filter_choice == "parks") { // show parks list
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
    } else if ($filter_choice == "public_arts") { //show the public arts list
      echo "<table class=\"xlTable\"><tr>";
      echo "<th>Site Name</th>";
      echo "<th>Address</th>";
      echo "<th>Status</th>";
      echo "<th>Website URL</th>";
      // echo "<th>Image URL</th>";
      echo "</tr>";
      while ($data = $result->fetch_assoc()){
        // if(!is_null($data.['SiteName'])){ //display only labeled sites
          echo "<tr>";
          echo "<td>".$data['SiteName']."</td>";
          echo "<td>".$data['SiteAddress']."</td>";
          echo "<td>".$data['Status']."</td>";
          echo "<td><a href=\"".$data['URL']."\"  target=\"_blank\">Link</a></td>";
          // echo "<td><a href=\"".$data['PhotoURL']."\"  target=\"_blank\">Link</a></td>";
          echo "</tr>";
        // }
      }
    }
    echo "</table>";
  } else {
    echo "<h2>Failed to fetch result</h2><br />";
  }
} else {
  echo "<p></p>";
}
?>
