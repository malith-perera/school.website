<?php // Start the session
session_start();

$user_id = 0;
$user_type = "";

if(!empty($_SESSION))
{
    $user_id = $_SESSION["user_id"];

    $theme = $_SESSION["theme"];
    $school_name = $_SESSION["school_name"]; // used to identify where user login from
    $name = $_SESSION["name"];
    $fname = $_SESSION["fname"];

    if(!empty($_SESSION["user_type"]))
    {
        $user_type = $_SESSION["user_type"];
    }
}
else {
    $theme = "theme1";
}

include '../tmpl/' . $theme . '/contact_school_tmpl.php';
?>
