<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['valid_creator']) || isset($_SESSION['valid_member'])) {
    unset($_SESSION['valid_creator']);
    unset($_SESSION['valid_member']);
    echo "<h2>You have been logged out.</h2>";
} else {
    echo "<h2>Your session has expired.</h2>";
}

header('Location:'.$_SESSION['callback_URL']);

//session_destroy();

?>
