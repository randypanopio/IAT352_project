<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "randy_panopio";

// create new connection
@$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection succeeded
// if connection failed, skip the rest of PHP code, and print an error
if ($db->connect_error)  {
    die('Connect Error: ' . $db->connect_error);
}
?>
