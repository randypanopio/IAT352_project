<?php
    require_once("directives/database_info.php");

    // Prepared statement
    if (!($stmt = $db->prepare("INSERT INTO  `followers`(`username`, `email`, `password`)
        VALUES (?, ?, ?)"))) {
        echo "Prepare failed: (" . $db->errno . ") " . $db->error;
    }

    //bind parameters
    $stmt->bind_param('sss', $username, $email, $password);

    // if the form was submitted
    if(isset($_POST['submit'])) {
        // check if each form input was filled,  read values from $_POST if not, make the variable an empty string
        $username = !empty($_POST['username']) ? $_POST['username'] : "";
        $email = !empty($_POST['email']) ? $_POST['email'] : "";
        if(isset($_POST['password'])) {
            $password = $_POST['password'];
            $password = hash("sha256", $password);
        }
        else {
            $password = '';
        }
    }

	// execute database query
    if ($stmt->execute()) {
        echo "Success!\n";
        $stmt->close();
        header('Location: signup_success.php');
    }

    if ($db->connect_error)  {
        die('Connect Error: ' . $db->connect_error);
    }

    //Close database connection
    $db->close();
    ?>
