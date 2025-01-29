<?php include 'db.php';

// Start the session
session_start();

$uname = $pword = "";

// Form values
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["submit_pressed"])) {
        $submit_pressed = test_input($_POST["submit_pressed"]);
    }

    if (!empty($_POST["uname"])) {
        $uname = test_input($_POST["uname"]);
    }

    if (!empty($_POST["pword"])) {
        $pword = test_input($_POST["pword"]);
    }
}

if ($uname != "" && $pword != "")
{
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "user_db");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT user_id, password, user_type FROM users WHERE username='$uname' ";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);

        if ($row["password"] == $pword)
        {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["username"] = $uname;

            switch ($row["user_type"])
            {
                case "s":
                    header("Location: page_student.php");
                    break;
                case "a":
                    header("Location: page_admin.php");
                    break;
                case "t":
                    header("Location: page_teacher.php");
                    break;
                case "p":
                    header("Location: page_principal.php");
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
<title>school.website</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<link rel="icon" href="images/logo.png">
<meta name=”viewport” content=”width=device-width, initial-scale=1″>
<meta name="KeyWords" content="school, website, create, register">
<meta name="Description" content="Create a wholly new, full fledge school website for your school or expand your existing school website into a full functional website in few seconds. School website users can publish lessons, do online tests, make school announcements, mark attendence, generate, view and compare school reports, manage school accounts, handle new recruitments, keep a good connection with students, teachers and parents and do many more.">
<meta name="author" content="Malith Perera">
<link rel="stylesheet" href="css/style.css" type="text/css"  media="screen, projection">
<script src="js/pages.js"></script>
</head>

<body class="centercontent">
<!-- begin content -->
<div style="background-color:#f2f0f5; height:900px;">

<!-- div left begin -->
<div style="display:inline-block; width:50%; height:100%; text-align: right; float:left">
<div id="left_top_space" style="display:inline-block;"></div>
<div style="width:100%; text-align:right;"><img src="images/logo.png"></div>
<div><p class="fontfamilysans" style="font-size:1.8em; padding-right:10px;">The world of school websites</p></div>
</div> <!-- div left end -->

<!-- div right begin -->
<div style="display:inline-block; width:50%; clear:both;">
<div id="right_top_space" style="display:inline-block;"></div>

<p class="fontfamilysans" style="padding-top:20px; font-size:1em;">We care children than anything.</p>
<div style="box-shadow: 8px 8px 8px grey; border-style: outset; border-radius:10px; padding:20px; padding-top:60px; padding-bottom:60px; width:50%">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table style="margin:0 auto;">
<tbody>
<tr><td style="padding:5px;"><input type="text" name="uname" placeholder="Username" style="color:#888888; border-radius: 20px; font-size:1.2em;"></td></tr>
<tr><td style="padding:5px;"><input type="password" name="pword" placeholder="Password" style="color:#888888; border-radius: 20px; font-size:1.2em;"></td></tr>
<tr><td style="color:red;"><?php echo $login_error ?></td></tr>
<tr><td style="text-align:center; padding:5px; "><input type="submit" name="password" value="Login" style="color:white; border-radius: 8px; width:100%; padding:8px; background-color:#1877f2; font-size:1.2em;"></td></tr>
</tbody>
</table>
<input type="hidden" id="submit_pressed" name="submit_pressed" value="1">
</form>
</div>

<br>
<div><a href="signup.html"><input type="button" name="signup" value="Sign up" style="color:white; border-radius: 8px; font-size:1.2em; padding:8px; background-color:#1877f2; "></a></div>
<div><a href="http://school.website"><input type="button" name="register" value="Create a school website" style="color:white; border-radius: 8px; font-size:1.2em; padding:8px; background-color:#1877f2;"></a></div>
<br>

<a href="" style="text-decoration:none; color:darkblue;">Learn More</a>
</div> <!-- div right end -->

</div> <!-- end content -->

<!-- footer -->
<span id="footer"></span>

<script>
form_push_down();
footer_view();
</script>

</body>
</html>
