 <?php
// Check database username password
$servername = "localhost";
$username = "malith";
$password = "Lamayage 2";
$dbname = "school_db";

// Start the session
session_start();

function test_input($data) {
    $data = trim($data);            // Strip unnecessary characters (extra space, tab, newline)
    $data = stripslashes($data);    // Remove backslashes (\) from the user input
    $data = htmlspecialchars($data);// converts special characters to HTML entities
    return $data;
}

// define variables and set to empty values
$school_name = $school_place = $address_pass = "";
$school_name_error = $school_place_error = $address_pass_error = "";
$table_found = "";
$submit_pressed = 0;
$address_pass_error = "";
$address_passed = 0;
$web = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["school_name"])) {
        $school_name_error = "පාසලේ නම අවශ්‍යයි";
    } else {
        $school_name = test_input($_POST["school_name"]);
    }

    if (empty($_POST["school_place"])) {
        $school_place_error = "පාසල පිහිටි ප්‍රදේශය අවශ්‍යයි";
    } else {
        $school_place = test_input($_POST["school_place"]);
    }

    if (empty($_POST["web"])) {
        $web_error = "වෙබ් ලිපිනය අවශ්‍යයි";
    } else {
        $web = test_input($_POST["web"]);
    }

    $submit_pressed = test_input($_POST["submit_pressed"]);
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
<meta name="KeyWords" content="hettipola, mahindodaya, maha, vidyalaya, school, sri lanka, kurunegala, north western province, wayamba">
<meta name="Description" content="හෙට්ටිපොල මහින්දෝදය මහා විද්‍යාලීය වෙබ් අඩවිය. ">
<meta name="author" content="Malith Perera">
<link rel="stylesheet" href="css/style.css" type="text/css"  media="screen, projection">
<script src="js/pages.js"></script>
</head>

<body onload="footer()">
<div style="padding:8px; background-color:#8ec9ff">
<img src="images/logo.png" style="width:200px">
</div>

<div class="centercontent" style="background-color:#f2f0f5; height:850px;">

<div style="display:inline-block; width:100%; text-align:center">

<h2>පාසල ලියාපදිංචි කිරීම</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table style="margin:0 auto;">
<tbody>
<tr>
<td style="text-align:left">පාසල</td>
<td><input type="text" name="school_name" id="school_name" oninput="set_school_name(this.value); check_web(document.getElementById('web').value);" value="<?php echo $school_name?>"></td>
<td style="text-align:left"><span style="color:red"><?php echo $school_name_error;?></span></td>
</tr>
<tr>
<td style="text-align:left">ස්ථානය</td>
<td><input type="text" name ="school_place" id="school_place" oninput="set_school_name_place(this.value); check_web(document.getElementById('web').value);" value="<?php echo $school_place?>"></td>
<td style="text-align:left"><span style="color:red"><?php echo $school_place_error;?></span></td>
</tr>
<tr>
<td style="text-align:left">වෙබ් ලිපිනය</td>
<td><input type="text" name="web" id="web" oninput="check_web(this.value)"></td>
<td style="font-size:1.2em; font-family:arial; text-align:left">.school.website</td>
</tr>
<tr>
<td></td>
<td id="button_or_error">
<?php
if ($address_passed == 1) {
    echo "<div style='width:100%; text-align:right'><input type='submit' name='register' value='ලියාපදිංචි කරන්න' style='color:green;'></div>";
}
else {
    echo "<div style='width:100%; text-align:center; color:red'>මෙය දැනටමත් ලියාපදිංචි කර ඇත</div>";
}
?>
</td>
<td></td>
</tr>
</tbody>
</table>
<input  type="hidden" name="submit_pressed" value="1"> <!-- used to identify submit button pressed or not before save data -->
</form>

<p id="web_error"></p>
<p><?php echo $table_found;?></p>
<p><?php echo $address_pass_error;?></p>
<p><?php echo $available_schools;?></p>

</div> <!-- center content -->

<!-- footer -->
<span id="footer"></span>

<script>
var text_school_name = document.getElementById("school_name").value;
set_school_name(text_school_name);
var text_school_place = document.getElementById("school_place").value;
set_school_name_place(text_school_place);
</script>

<?php
if ($school_name != "" && $school_place != "") {
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed here: " . mysqli_connect_error());
    }

    // Search web address exist
    $sql = "SELECT school, place FROM schools WHERE web = '$web'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $address_passed = 0;
    } else {
        $sql2 = "SELECT web, email, telephone, country_id, school_ref, description FROM schools WHERE school = '$school_name' AND place = '$school_place'";

        $result2 = mysqli_query($conn, $sqli2);

        if (mysqli_num_rows($result2) > 0) {
            $table_body_text = "";
            $found = 0;

            // output data of each row
            while($row2 = mysqli_fetch_assoc($result2)) {
                if ($row2["place"] == $school_place) {
                    $table_body_text .= "<tr><td>" . $school_name . "</td><td>" . $row2["place"]. "</td><td>" . $row2["web"] . "</td></tr>";
                    $found = 1;
                }
            }

            if ($found == 1) {
                $available_schools = "<div>මෙම පාසල කලින් ලියාපදිංචි කර ඇත්දැයි බලන්න</div><table><thead><tr><th>පාසල</th><th>ප්‍රදේශය</th><th>වෙබ් ලිපිනය</th></tr></thead><tbody>" . $table_body_text . "</tbody></table>";
            }
        }

        $address_passed = 1;

        if ($submit_pressed == 1) {
            $sql = "INSERT INTO schools (school, place, web)
            VALUES ('$school_name', '$school_place', '$web')";

            if (mysqli_query($conn, $sql)) {
                $last_id = mysqli_insert_id($conn);
                echo "School web address registered successfully. Last inserted ID is: " . $last_id;
                } else {
                echo "Error: school registration failed" . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
}

mysqli_close($conn);
?>
</body>
</html>
