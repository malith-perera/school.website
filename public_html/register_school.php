<?php include 'db.php';

// Start the session
session_start();

// define variables and set to empty values
$school_name = $school_place = $school_web = "";
$school_name_error = $school_place_error = "";
$table_found = "";
$submit_pressed = 0;
$school_web = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["school_name"])) {
        $school_name = test_input($_POST["school_name"]);
    }

    if (!empty($_POST["school_place"])) {
        $school_place = test_input($_POST["school_place"]);
    }

    if (!empty($_POST["school_web"])) {
        $school_web = test_input($_POST["school_web"]);
        $school_web = strtolower($school_web);
    }

    if (!empty($_POST["submit_pressed"])) {
        $submit_pressed = test_input($_POST["submit_pressed"]);
    }
}
?>
<!DOCTYPE html>
<html class="" lang="en-US">

<head>
<title>ලියාපදිංචි කිරීම</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<link rel="icon" href="images/logo.jpg">
<meta name=”viewport” content=”width=device-width, initial-scale=1″>
<meta name="KeyWords" content="school, website, create, register">
<meta name="Description" content="Create a wholy new, full fledge school website for your school or expand your existing school website into a full functional website in few seconds. With this users can make school announcements, mark attendence , generate and view school reports, handle school accounts, hadle school recruitments, keep a good relation with students and parents and many more">
<meta name="author" content="Malith Perera">
<link rel="stylesheet" href="css/style.css" type="text/css"  media="screen, projection">
<script src="js/pages.js"></script>
</head>

<body>
<div style="padding:8px; background-color:#8ec9ff">
<img src="images/logo.png" style="width:200px">
</div>

<div class="centercontent" style="background-color:#f2f0f5; height:850px;">

<div style="display:inline-block; width:100%; text-align:center">

<h2>වෙබ් ලිපිනය ලියාපදිංචි කිරීම</h2>

<!--  -->

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table style="margin:0 auto;">
<tbody>
<tr>
<td style="text-align:left">පාසල</td>
<td><input type="text" name="school_name" id="school_name" oninput="check_name_place();" value="<?php echo $school_name?>"></td>
<td style="text-align:left"><span id="school_name_error" style="color:red"></span></td>
</tr>
<tr>
<td style="text-align:left">ස්ථානය</td>
<td><input type="text" name ="school_place" id="school_place" oninput="check_name_place();" value="<?php echo $school_place?>"></td>
<td style="text-align:left"><span id="school_place_error" style="color:red"></span></td>
</tr>
<tr>
<td style="text-align:left">නව වෙබ් ලිපිනය</td>
<td><input type="text" name="school_web" id="school_web" oninput="check_web(this.value)"></td>
<td style="font-size:1.2em; font-family:arial; text-align:left">.school.website</td>
</tr>
<tr>
<td></td>
<td id="message"> <!-- from script -->
</td>
<td></td>
</tr>
<tr>
<td></td>
<td id="submitbtn"></td> <!-- from script -->
<td></td>
</tr>
</tbody>
</table>
<input type="hidden" name="submit_pressed" value="1"> <!-- used to identify submit button pressed or not before save data -->
</form>

<br><br><br><br>

<span id="school_table"></span>

<p id="web_error"></p>
<p><?php echo $table_found;?></p>

</div> <!-- center content -->

<!-- footer -->
<span id="footer"></span>

<script>
check_name_place();
footer_view();
</script>

<?php
if ($submit_pressed)
{
    if ($school_name != "" && $school_place != "" && $school_web != "")
    {
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, "school_db");

        // Check connection
        if (!$conn)
        {
            die("Connection failed here: " . mysqli_connect_error());
        }

        $sql_select = "SELECT school_id FROM schools WHERE school_web='$school_web'";

        $result = mysqli_query($conn, $sql_select);

        if (!(mysqli_num_rows($result)> 0))
        {
            $sql = "INSERT INTO schools (school, place, school_web, status)
                VALUES ('$school_name', '$school_place', '$school_web', 'u')";

            if (mysqli_query($conn, $sql))
            {
                $last_id = mysqli_insert_id($conn);
                $_SESSION["school_id"] = $last_id;
                $_SESSION["school_name"] = $school_name;
                $_SESSION["school_place"] = $school_place;
                $_SESSION["school_web"] = $school_web;
                header("Location: register_school_info.php");
            }
            else
            {
                echo '<script type="text/javascript">
                window.onload = function () { alert("Data Error!\nPlease try again later"); }
                </script>';

                // ****** save below messsage in error log
                //echo "Error: school registration failed" . $sql . "<br>" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
    else
    {
        echo '<script type="text/javascript">
        window.onload = function () { alert("Something wrong!\nNot all data fields were filled"); }
        </script>';
    }
}
?>

</body>
</html>
