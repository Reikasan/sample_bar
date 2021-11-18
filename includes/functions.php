<?php
// ERROR
function confirm($result) {
    global $connection;

    if(!$result) {
        die("Query Failed " .mysqli_error($connection));
    }

}

// ESCAPE STRING
function escape($string) {
    global $connection;

    $string = mysqli_real_escape_string($connection, trim($string));
    return $string;
}

// REDIRECT
function redirect($location) {
    header("Location: $location");
    exit;
}

// IF EXIST THEN ECHO IT
function existAndEcho($var) {
    echo "function works";
    if(isset($var)) {
        echo $var;
    }
}


?>