 <?php include 'db.php';

// Start the session
session_start();

// define variables and set to empty values
$admition_no_error = $fname_error = $lname_error = $grade_error = $class_name_error = $password_error = $login_error = "";
$admition_no = $fname = $lname = $grade = $class_name = $password_input = "";

$email_error = "";
$submit_pressed = "";

// Form values
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["submit_pressed"])) {
        $submit_pressed = test_input($_POST["submit_pressed"]);
    }
}

// Session values
if (!empty($_SESSION["school_web"])) {
    $school_web = test_input($_SESSION["school_web"]);
    $school_web = strtolower($school_web);
}


if (!empty($_SESSION["school_web"])) {
    $school_id = test_input($_SESSION["school_id"]);
}


if ($submit_pressed)
{
    if ($password != "")
    {
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, "user_db");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO users (username, password, user_type)
            VALUES ('$school_web', '$password', 'a')";

        if (mysqli_query($conn, $sql))
        {
            header("Location: http://primary-hettipola.school.website");
        }
        else
        {
            echo '<script type="text/javascript">
            window.onload = function () { alert("Something Wrong!\nPlease try again later"); }
            </script>';

            // ****** save below messsage in error log
            //echo "Error: school registration failed" . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}


?>
<!DOCTYPE html>
<html class="" lang="en-US">

<head>
<title>පාලක ලියාපදිංචි වීමකිකිරීම</title>
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

<body>
<div style="padding:8px; background-color:#8ec9ff">
<img src="images/logo.png" style="width:200px">
</div>

<div class="centercontent" style="background-color:#f2f0f5; height:850px;">
<div style="display:inline-block; width:100%; text-align:center">

<h2>පාලක ලියාපදිංචි කිරීම</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table style="margin:0 auto;">
<tbody>
<tr>
<td style="text-align:left;">පරිශීලක නම</td>
<td style="text-align:left;">
<?php
echo $school_web;
?>
</td>
<td></td>
</tr>
<tr>
<td style="text-align:left">මුරපදය</td>
<td><input type="password" id="password" name="password" oninput="check_password();"></td>
<td><span class="login_err"><?php echo $password_error;?></span></td>
</tr>
<tr>
<td style="text-align:left">මුරපදය නැවතත්</td>
<td><input type="password" id="password2" name="password2" oninput="check_password();"></td>
<td><span class="login_err"><?php echo $password_error;?></span></td>
</tr>
<tr>
<td id="message" colspan="3"></td>
</tr>
<tr>
<td></td>
<td id="submitbtn"><div style='width:100%; text-align:right'><input type='submit' name='registerbtn' value='ලියාපදිංචි කරන්න' disabled></div></td> <!-- from script -->
<td></td>
</tr>
</tbody>
</table>
<input  type="hidden" name="submit_pressed" value="1"> <!-- used to identify submit button pressed or not before save data -->
</form>

<p style="color:purple">*ඉහත පරිශීලක නම හා මුරපදය ආරක්ෂාකර මතක තබා ගන්න</p>

</div>
</div> <!-- center content -->

<!-- footer -->
<span id="footer"></span>

<script>
footer_view();
</script>

</body>
</html>
