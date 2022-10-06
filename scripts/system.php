<?php

/* =============================================*
 * system wide scripts                          *
 * =============================================*
 * File     : system.php                        *
 * Used  by :                                   *
 * ---------------------------------------------*/

// Database username password
$servername = "localhost";
$username = "malith";
$password = "Lamayage 2";


function test_input($data)
{
    $data = trim($data);            // Strip unnecessary characters (extra space, tab, newline)
    $data = stripslashes($data);    // Remove backslashes (\) from the user input
    $data = htmlspecialchars($data);// converts special characters to HTML entities
    return $data;
}


function get_school_db_from_web($school_web)
{
    $web = preg_replace('/-+/', '_', $school_web);
    $web .= "_db";
    return $web;
}

?>
