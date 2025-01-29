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
$username_error = $password_error = $login_error = $password_new_error = $change_result_error = "";
$username_input = $password_input = $password_new_input = $password_new_input = $change_result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $username_error = "පරිශීලක අවශ්‍යයි";
    } else {
        $username_input = test_input($_POST["username"]);
    }

    if (empty($_POST["password"])) {
        $password_error = "මුරපදය අවශ්‍යයි";
    } else {
        $password_input = test_input($_POST["password"]);
    }

    if (empty($_POST["new_password"])) {
        $password_new_error = "මුරපදය අවශ්‍යයි";
    } else {
        $password_new_input = test_input($_POST["new_password"]);
    }
}

if ($username_input != "" && $password_input != "")
{
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT user_id, password FROM users WHERE username='$username_input' ";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);

        $user_id = $row["user_id"];

        echo $password_new_input;
        echo $user_id;

        if ($row["password"] == $password_input)
        {
            $sql = "UPDATE users SET password='$password_new_input' WHERE user_id='$user_id'";

            if (mysqli_query($conn, $sql)) {
                $change_result = "Password changed successfully";
            } else {
                $change_result_error = "Error: Password change error";
                //"Error: Change password : " . mysqli_error($conn) . "<br>";
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
<title>මුරපදය</title>
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
<h2>මුරපදය වෙනස් කිරීම</h2>

<hr class="blueline">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div style="text-align:center; padding:5px;">
<table>
<tbody>
<tr>
<td>පරිශීලක</td>
<td><input type="text" name="username"></td>
<td><span class="login_err"><?php echo $username_error;?></span></td>
</tr>
<tr>
<td>මුරපදය</td>
<td><input type="password" name="password"></td>
<td><span class="login_err"><?php echo $password_error;?></span></td>
</tr>
<tr>
<td>අළුත් මුරපදය</td>
<td><input type="password" name="new_password"></td>
<td></td>
</tr>
<tr>
<td>අළුත් මුරපදය නැවතත්</td>
<td><input type="password" name="new_password2"></td>
<td></td>
</tr>
<tr>
<td></td>
<td style="text-align:right"><input type="submit" name="login" value="වෙනස් කරන්න"></td>
</tr>
</tbody>
</table>
</div>
</form>

<div class="login_err"><?php echo $login_error;?></div>
<div style="color: green;"><?php echo $change_result;?></div>

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
