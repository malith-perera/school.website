<?php
session_start(); // Start the session

$school_info = $web = $keywords = $description = $introduction = "";
$school_name = $school_web = $theme = "";
$user_id = 0;
$user_type = "";

$school_info = fopen("school_info", "r") or die("Unable to open school_info file!"); // school_info - school infomations

if ($school_info) {
    $school_web = trim(fgets($school_info));       // eg: mahindodaya-hettipola
    $school_name = trim(fgets($school_info));      // Mahindodaya
    $keywords = trim(fgets($school_info));
    $description = trim(fgets($school_info));
    $theme = rtrim(fgets($school_info));
}

fclose($school_info); // close file

$_SESSION["school_web"] = $school_web;      // used to identify where user login from
$_SESSION["school_name"] = $school_name;    // used to identify where user login from
$_SESSION["theme"] = $theme;                // used theme by school website

if(!empty($_SESSION["user_id"]))
{
    $user_id = $_SESSION["user_id"];
}

if(!empty($_SESSION["user_type"]))
{
    $user_type = $_SESSION["user_type"];
}

if(!empty($_SESSION["name"]))
{
    $name = $_SESSION["name"];
}

include '../tmpl/' . $theme . '/marks_tmpl.php';
?>
