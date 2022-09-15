 <?php include 'db.php';

// define variables and set to empty values
$school_name = $school_place = "";
$school_name_error = $school_place_error = "";
$table_found = "";
$submit_pressed = 0;
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
        $web = strtolower($web);
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

<h2>පාසල ලියාපදිංචි කිරීම</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table style="margin:0 auto;">
<tbody>
<tr>
<td style="text-align:left">පාසල</td>
<td><input type="text" name="school_name" id="school_name" oninput="set_school_name(this.value);" value="<?php echo $school_name?>"></td>
<td style="text-align:left"><span id="school_name_error" style="color:red"></span></td>
</tr>
<tr>
<td style="text-align:left">ස්ථානය</td>
<td><input type="text" name ="school_place" id="school_place" oninput="set_school_name_place(this.value);" value="<?php echo $school_place?>"></td>
<td style="text-align:left"><span id="school_place_error" style="color:red"></span></td>
</tr>
<tr>
<td style="text-align:left">වෙබ් ලිපිනය</td>
<td><input type="text" name="web" id="web" oninput="check_web(this.value)"></td>
<td style="font-size:1.2em; font-family:arial; text-align:left">.school.website</td>
</tr>
<tr>
<td></td>
<td id="message">
</td>
<td></td>
</tr>
<tr>
<td></td>
<td id="submitbtn"></td>
<td></td>
</tr>
</tbody>
</table>
<input  type="hidden" name="submit_pressed" value="1"> <!-- used to identify submit button pressed or not before save data -->
</form>

<br><br><br><br>

<span id="school_table"></span>

<p id="web_error"></p>
<p><?php echo $table_found;?></p>

</div> <!-- center content -->

<!-- footer -->
<?php include 'footer.php';
footer_view();
?>

<script>
var text_school_name = document.getElementById("school_name").value;
set_school_name(text_school_name);
var text_school_place = document.getElementById("school_place").value;
set_school_name_place(text_school_place);
check_web(document.getElementById("web").value);
</script>

<?php
if ($school_name != "" && $school_place != "" && $web != "")
{
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn)
    {
        die("Connection failed here: " . mysqli_connect_error());
    }

    if ($submit_pressed == 1)
    {
        $sql = "INSERT INTO schools (school, place, web)
            VALUES ('$school_name', '$school_place', '$web')";

        if (mysqli_query($conn, $sql))
        {
            $last_id = mysqli_insert_id($conn);
            echo "School web address registered successfully. Last inserted ID is: " . $last_id;
        }
        else
        {
            echo "Error: school registration failed" . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}
?>

</body>
</html>
