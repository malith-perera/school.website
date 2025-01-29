<?php include 'db.php';

// Start the session
session_start();

// define variables and set to empty values
$school_name = $school_place = "";
$school_name_error = $school_place_error = "";
$table_found = "";
$submit_pressed = 0;
$school_web = "";
$school_id = 0;
$country_id = 0;

$address = "";

// Form values
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (!empty($_POST["country_id"])) {
        $country_id = test_input($_POST["country_id"]);
    }

    if (!empty($_POST["address"])) {
        $address = test_input($_POST["address"]);
    }

    if (!empty($_POST["telephone"])) {
        $telephone = test_input($_POST["telephone"]);
    }

    if (!empty($_POST["email"])) {
        $email = test_input($_POST["email"]);
    }

    if (!empty($_POST["submit_pressed"])) {
        $submit_pressed = test_input($_POST["submit_pressed"]);
    }
}

// Session values
if (!empty($_SESSION["school_name"])) {
    $school_name = test_input($_SESSION["school_name"]);
}

if (!empty($_SESSION["school_place"])) {
    $school_place = test_input($_SESSION["school_place"]);
}

if (!empty($_SESSION["school_web"])) {
    $school_web = test_input($_SESSION["school_web"]);
    $school_web = strtolower($school_web);
}

if (!empty($_SESSION["school_id"])) {
    $school_id = $_SESSION["school_id"];
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

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
<select name="country_id", id="country_id">
<option value="1">Sri Lanka</option>
</select>
</td>
<td style="text-align:left"><span id="address_error" style="color:red"></span></td>
</tr>

<tr>
<td style="text-align:left">ලිපිනය</td>
<td style="text-align:left"><input type="text" name="address" id="address" style="width:20em;"></td>
<td style="text-align:left"><span id="address_error" style="color:red"></span></td>
</tr>
<tr>
<td style="text-align:left">දුරකතන අංකය</td>
<td style="text-align:left"><input type="text" name ="telephone" id="telephone" style="width:20em;"></td>
<td style="text-align:left"><span id="telephone_error" style="color:red"></span></td>
</tr>
<tr>
<td style="text-align:left">විද්‍යුත් තැපෑල</td>
<td style="text-align:left"><input type="text" name="email" id="email" style="width:20em;"></td>
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

        $sql = "UPDATE schools SET country_id='$country_id'";

        if ($address)
        {
            $sql .=  ", address='$address'";
        }

        if ($telephone)
        {
            $sql .= ", telephone='$telephone'";
        }

        if ($email)
        {
            $sql .= ", email='$email'";
        }

        $sql .= " WHERE school_id='$school_id'";

        if (mysqli_query($conn, $sql))
        {
            $_SESSION["school_id"] = $school_id;
            $_SESSION["school_web"] = $school_web;
            header("Location: register_admin.php");
        }
        else
        {
            echo '<script type="text/javascript">
            window.onload = function () { alert("Error!\nPlease try again later"); }
            </script>';

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

</body>
</html>
