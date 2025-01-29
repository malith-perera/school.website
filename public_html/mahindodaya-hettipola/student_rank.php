<?php include '../../scripts/system.php';

// Start the session
session_start();

$user_id = 0;
$user_type = "";
$mission = $vision = $motto = $history = "";

$school_file = fopen("school_file.txt", "r") or die("Unable to open aim file!"); // webfile - school initial web info

if($school_file)
{
    $mission = trim(fgets($school_file));
    $mission = html_entity_decode($mission);            // https://www.w3schools.com/php/func_string_html_entity_decode.asp
    $vision = trim(fgets($school_file));
    $vision = html_entity_decode($vision);
    $motto = trim(fgets($school_file));
    $motto = html_entity_decode($motto);
    $anthem = trim(fgets($school_file));
    $anthem = html_entity_decode($anthem);
    $history = trim(fgets($school_file));
    $history = html_entity_decode($history);
}

fclose($school_file);

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

include '../tmpl/' . $theme . '/student_rank_tmpl.php';
?>
