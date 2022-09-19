<?php include 'db.php';

// Start the session
session_start();

// define variables and set to empty values
$school_name = $school_place = "";
$school_name_error = $school_place_error = "";
$table_found = "";
$submit_pressed = 0;
$address_passed = 0;
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

    if ($school_name != "" && $school_place != "" && $school_web != "")
    {
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, "school_db");

        // Check connection
        if (!$conn)
        {
            die("Connection failed here: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO schools (school, place, school_web)
            VALUES ('$school_name', '$school_place', '$school_web')";

        if (mysqli_query($conn, $sql))
        {
            //$last_id = mysqli_insert_id($conn);
            //$_SESSION["user_id"] = $last_id;
        }
        else
        {
            echo '<script type="text/javascript">
            window.onload = function () { alert("Data Error!\nPlease try again later"); }
            </script>';

            header("Location: index.html");

            // ****** save below messsage in error log
            //echo "Error: school registration failed" . $sql . "<br>" . mysqli_error($conn);
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
<!DOCTYPE html>
<html class="" lang="en-US">

<head>
<title>පාසලේ තොරතුරු</title>
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

<h2>පාසලේ තොරතුරු ඇතුලත් කිරීම</h2>

<form method="post" action="register_admin.php">
<table style="margin:0 auto;">
<tbody>
<tr>
<td style="text-align:left">පාසල</td>
<td style="text-align:left"><?php echo $school_name?></td>
<td></td>
</tr>
<tr>
<td style="text-align:left">ස්ථානය</td>
<td style="text-align:left"><?php echo $school_place?></td>
<td></td>
</tr>
<tr>
<td style="text-align:left">වෙබ් ලිපිනය</td>
<td style="text-align:left"><?php echo $school_web?>.school.website</td>
<td></td>
</tr>
<tr>
<td style="text-align:left">රට</td>
<td style="text-align:left">
<select>
<option value="1">Sri Lanka</option>
</select>
</td>
<td style="text-align:left"><span id="address_error" style="color:red"></span></td>
</tr>

<tr>
<td style="text-align:left">ලිපිනය</td>
<td><input type="text" name="address" id="address"></td>
<td style="text-align:left"><span id="address_error" style="color:red"></span></td>
</tr>
<tr>
<td style="text-align:left">දුරකතන අංකය</td>
<td><input type="text" name ="telephone" id="telephone"></td>
<td style="text-align:left"><span id="telephone_error" style="color:red"></span></td>
</tr>
<tr>
<td style="text-align:left">විද්‍යුත් තැපෑල</td>
<td><input type="text" name="email" id="email"></td>
<td style="text-align:left"><span id="email_error" style="color:red"></span></td>
</tr>
<!--
<tr>
<td style="text-align:left">පවතින වෙබ් ලිපිනය</td>
<td><input type="text" name="web" id="web"></td>
<td style="text-align:left"><span id="web_error" style="color:red"></span></td>
</tr>
<tr>
<td></td>
<td id="message">
</td>
<td></td>
</tr>
-->
<tr>
<td></td>
<td id="submitbtn" style="text-align:right;"><input type="submit" value="සුරකින්න"></td> <!-- from script -->
<td></td>
</tr>
</tbody>
</table>
<input type="hidden" name="school_web" id="school_web" value="<?php echo $school_web ?>">
</form>

<br><br><br><br>

<span id="school_table"></span>

<p id="web_error"></p>
<p><?php echo $table_found;?></p>

</div> <!-- center content -->

<!-- footer -->
<span id="footer"></span>

<script>
var text_school_name = document.getElementById("school_name").value;
set_school_name(text_school_name);
var text_school_place = document.getElementById("school_place").value;
set_school_name_place(text_school_place);
check_web(document.getElementById("web").value);
footer_view();
</script>

</body>
</html>
