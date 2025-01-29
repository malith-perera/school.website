<?php include '../../scripts/system.php';

$rid = 0; // reference id

// Start the session
session_start();

if(!empty($_SESSION["school_name"]))
{
    $school_info = $web = $keywords = $description = $introduction = "";
    $school_name = $school_web = $theme = "";

    $school_info = fopen("school_info", "r") or die("Unable to open web!"); // school_info - school initial web info

    if ($school_info) {
        $school_web = fgets($school_info);              // eg: mahindodaya-hettipola
        $school_name = rtrim(fgets($school_info));      // Mahindodaya
        $keywords = fgets($school_info);
        $description = fgets($school_info);
        $theme = rtrim(fgets($school_info));
    }

    fclose($school_info);

    $_SESSION["school_web"] = $school_web; // used to identify where user login from
    $_SESSION["school_name"] = $school_name; // used to identify where user login from
    $_SESSION["theme"] = $theme; // used theme by school website
}
else {
    $theme = "theme1";
}

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

// use for sample login
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($_GET["rid"])) {
      $rid = (int) test_input($_GET["rid"]);
    }
}
$_SESSION["rid"] = $rid;

/*
// From session
$school_web = test_input($_SESSION["school_web"]);
$school_name = test_input($_SESSION["school_name"]);

if ($uname != "" && $pword != "")
{
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "user_db");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT user_id, name, password, user_type FROM users WHERE username='$uname' AND school_web='$school_web';";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);

        if ($row["password"] == $pword)
        {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["username"] = $uname;
            $_SESSION["name"] = $row["name"];
            $_SESSION["user_type"] = $row["user_type"];

            switch ($_SESSION["user_type"])
            {
                case "s":
                    header("Location: student_page.php");
                    break;
                case "a":
                    header("Location: admin_page.php");
                    break;
                case "t":
                    header("Location: teacher_page.php");
                    break;
                case "p":
                    header("Location: principal_page.php");
                    break;
                default:
                    echo "Unknown user";
            }
        }
        else
        {
            $login_error = "පරිශීලක නම හෝ මුරපදය නිවැරදි නොවේ";
        }
    }
    else
    {
        $login_error = "පරිශීලක නම හෝ මුරපදය නිවැරදි නොවේ";
    }
    mysqli_close($conn);
}
 */

if($rid == 0) {
  include '../tmpl/' . $theme . '/login_tmpl.php';
}
else if($rid == 1) {
    include '../tmpl/' . $theme . '/lesson_tmpl.php'; // student
}
else if($rid == 2) {
    include '../tmpl/' . $theme . '/attendence_tmpl.php'; // teacher
}
else if($rid == 3) {
    include '../tmpl/' . $theme . '/profile_student_tmpl.php'; // principle
}
else if($rid == 4) {
    include '../tmpl/' . $theme . '/attendence_tmpl.php'; // admin
}
?>
