<?php
// connect to db
require("directives/database_info.php");

$search_string = $_POST['search_string'];
$filter_choice = $_POST['filter_choice'];
$pagination_limit = $_POST['pagination_limit'];
$page_number = $_POST['page_number'];
if(strlen($search_string) > 0){



  // establish sql string to be queried
  $finalWhereString = "parks.Name=".'"'.$search_string.'"';
  $toBe_searched_string = '"'.$search_string."%".'"';
  $fromString = $filter_choice;
  if ($fromString == "") $fromString = "*";
  $whereString = "";
  if($filter_choice == "parks") {
    $whereString = "Name";
    $selectCount = "ParkID";
  } else if ($filter_choice == "public_arts") {
    $whereString = "SiteName";
    $selectCount = "RegistryID";
  }

  //retrive count for use of pagination
  $countsql = "SELECT COUNT($selectCount) FROM $fromString WHERE $whereString LIKE $toBe_searched_string";
  // echo $countsql;
  $query = mysqli_query($db, $countsql);
  $rows = mysqli_fetch_row($query);
  $total_rows = $rows[0];
  // echo $total_rows;

  $last_page = ceil($total_rows/$pagination_limit);
  if($last_page < 1) {
    $last_page = 1;
  }
  $limit = 'LIMIT ' .($page_number - 1) * $pagination_limit .',' .$pagination_limit;
  // echo $last_page;

  $sql = "SELECT * FROM $fromString WHERE $whereString LIKE $toBe_searched_string $limit"; // final sql statement
  // echo "SQL STMT: ".$sql."<br /><br /><br />";

  //query result
  if ($result = $db->query($sql)) {
    $dataString = "";

    if($filter_choice == "parks") { // show parks list
      // $dataString = "parks|";
      while ($data = $result->fetch_assoc()){
        $name = $data['Name'];
        $address = $data['StreetNumber']." ".$data['StreetName']." ".$data['EWStreet']." ".$data['NSStreet']." ".$data['NeighbourhoodName'];
        $url = $data['NeighbourhoodURL'];
        $dataString .= $name.'%$%'.$address.'%$%'.$url.'|%$%|';
      }
      echo $dataString;
    } else if ($filter_choice == "public_arts") { //show the public arts list
      while ($data = $result->fetch_assoc()){
        $name = $data['SiteName'];
        $address = $data['SiteAddress'];
        $status = $data['Status'];
        $url = $data['PhotoURL'];
        $dataString .= $name.'%$%'.$address.'%$%'.$status.'%$%'.$url.'|%$%|';
      }
      echo $dataString;
    }

  }
  echo "^^lp".$last_page;
} else {
  echo "";
}
?>
