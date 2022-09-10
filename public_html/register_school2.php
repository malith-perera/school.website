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
$school_no_error = $school_name_error = $place_error = $password_error = $login_error = "";
$school_no = $school_name = $place = $password_input = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["school_no"])) {
        $school_no_error = "පාසල් අනන්තා අංකගය අවශ්‍යයි";
    } else {
        $school_no = test_input($_POST["school_no"]);
    }

    if (empty($_POST["school_name"])) {
        $school_name_error = "පාසලේ නම අවශ්‍යයි";
    } else {
        $school_name = test_input($_POST["school_name"]);
    }

    if (empty($_POST["place"])) {
        $place_error = "පාසල පිහිටි ප්‍රදේශය අවශ්‍යයි";
    } else {
        $place = test_input($_POST["place"]);
    }
}

if ($school_no != "" && $password_input != "")
{
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT password, user_type FROM users WHERE username='$school_no' ";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);

        if ($row["password"] == $password_input)
        {
            $_SESSION["school_no"] = $school_no;

            switch ($row["user_type"])
            {
                case "s":
                    header("Location: student_page.php");
                    break;
                case "t":
                    header("Location: teacher_page.php");
                    break;
                case "p":
                    header("Location: principal_page.php");
                    break;
                case "a":
                    header("Location: admin_page.php");
                    break;
                default:
                    echo "Unknown user";
            }
        }
        else {
            $login_error = "පරිශීලක නම හෝ මුරපදය නිවැරදි නොවේ";
        }

    } else {
        $login_error = "පරිශීලක නම හෝ මුරපදය නිවැරදි නොවේ";
    }
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html class="" lang="en-US">

<head>
<title>ලියාපදිංචි වීම</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<link rel="icon" href="images/logo.jpg">
<meta name=”viewport” content=”width=device-width, initial-scale=1″>
<meta name="KeyWords" content="hettipola, mahindodaya, maha, vidyalaya, school, sri lanka, kurunegala, north western province, wayamba">
<meta name="Description" content="හෙට්ටිපොල මහින්දෝදය මහා විද්‍යාලීය වෙබ් අඩවිය. ">
<meta name="author" content="Malith Perera">
<link rel="stylesheet" href="css/style.css" type="text/css"  media="screen, projection">
</head>

<body>

<div class="centercontent">

<div style="background-color: #99ccbb; width: 100%; height: 60px; border-radius: 0px 0px 16px 16px; clear: both;">
<a class="menuanchor" href=""><div class="menubutton">විස්තර</div></a>
<a class="menuanchor" href=""><div class="menubutton">සබඳතා</div></a>
<a class="menuanchor" href=""><div class="menubutton">ඉතිහාසය</div></a>
<a class="menuanchor" href=""><div class="menubutton">මුල් පිටුව</div></a>
</div>


<hr class="blueline" style="clear:both;">

<h2>පාසල ලියාපදිංචි කිරීම</h2>

<hr class="blueline">

<div style="text-align:center; padding:5px;">
<table>
<tbody>
<tr>
<td style="text-align:left">පාසල</td>
<td><input type="text" name="school_name"></td>
<td><span class="login_err"><?php echo $school_name_error;?></span></td>
</tr>
<tr>
<td style="text-align:left">ස්ථානය</td>
<td><input type="text" name="place"></td>
</tr>
<tr>
<td style="text-align:left">රජයේ ලියාපදිංචි අංකය</td>
<td><input type="text" name="school_no"></td>
<td><span class="login_err"><?php echo $school_no_error;?></span></td>
</tr>
<tr>
<td style="text-align:left">පාසලේ දුරකතන අංකය</td>
<td><input type="text" name="telephone_no"></td>
<td><span class="login_err"><?php echo $telephone_no_error;?></span></td>
</tr>
<tr>
<td></td>
<td style="text-align:right"><input type="submit" name="login" value="ලියාපදිංචි කරන්න"></td>
</tr>
</tbody>
</table>
</div>

<hr class="blueline">
<hr class="blueline">

<div>&nbsp;</div>

<div class="centercontent footer" style="width: 100%; margin-top: 30px; border-radius: 8px 8px 0px 0px;">

<table class="centercontent" style="width: 100%; margin: 0px;">
<tbody>
<tr style="vertical-align:top">
<td class="footertext" style="text-align: center;">
<img src="images/logo.jpg" alt="logo" width="20%">
</td>
<td>
<div class="footercaption">වෙත යන්න</div>
<p style="color:white">මුල් පිටුව<br></p>
</td>
<td>
<div class="footercaption">ස්ථානය</div>
<p style="color:white">හෙට්ටිපොල</p>
</td>
<td>
<div class="footercaption">දුරකතන</div>
<p style="color:white">0372223332</p>
</td>
</tr>
</tbody>
</table>

<div style="background-color: black; color:#9f9f9f; width: 100%; text-align: center; padding-top: 8px; padding-bottom: 6px;">&copy; 2021</div>
</div>

</div> <!-- center content -->

</body>
</html>
