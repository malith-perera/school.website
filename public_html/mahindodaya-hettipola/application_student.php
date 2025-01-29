<?php
include '../../scripts/system.php';
include '../../scripts/student.php';


// Start the session
session_start();

// Session values
$school_name = $school_web = $theme = "";
$school_web_db = "";

if(!empty($_SESSION))
{
    $school_web = $_SESSION["school_web"]; // used to identify where user login from
    $school_name = $_SESSION["school_name"]; // used to identify where user login from
    $theme = $_SESSION["theme"];
    $school_web_db = get_school_db_from_web($school_web);
}
else {
    $theme = "theme1";
}


// define variables and set to empty values
$admission_no_error = $name_error = $lname_error = $grade_error = $class_name_error = $pword_error = $login_error = "";
$name = $grade = $class_name = $pword = "";

$email_error = "";
$user_id = 0;
$admission_no = 0;
$registration_state = 0;
$submit_pressed = 0;
$class_id = 0;
$last_id = 0;

if (!empty($_SERVER))
{
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (!empty($_POST["admission_no"])) {
            $admission_no = test_input($_POST["admission_no"]);
        }

        if (!empty($_POST["name"])) {
            $name = test_input($_POST["name"]);
        }

        if (!empty($_POST["grade"])) {
            $grade = test_input($_POST["grade"]);
        }

        if (!empty($_POST["class_name"])) {
            $class_name = test_input($_POST["class_name"]);
        }

        if (!empty($_POST["submit_pressed"])) {
            $submit_pressed = test_input($_POST["submit_pressed"]);
        }
    }
}


// Form values
if ($submit_pressed) {
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "user_db");

    $student_existance = check_student_exist_in_school($school_web_db, $admission_no);

    if ($student_existance) {
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO users (user_type, name, country_id, school_web, username)
            VALUES ('s', '$name', '1', '$school_web', '$admission_no')";

        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            $student_id = $last_id;
            $_SESSION["user_id"] = $student_id;
            $_SESSION["user_type"] = $user_type;
            $_SESSION["admission_no"] = $admission_no;
            $_SESSION["name"] = $name;

            // Create connection
            $conn2 = mysqli_connect($servername, $username, $password, $school_web_db);

            // Check connection
            if (!$conn2) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT class_id FROM classes
                WHERE grade='$grade' AND class_name='$class_name'";

            $result = mysqli_query($conn2, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $row = mysqli_fetch_assoc($result);
                $class_id = $row["class_id"];
                $_SESSION["class_id"] = $class_id;

                $sql = "INSERT INTO students (student_id, admission_no, class_id)
                    VALUES ('$student_id', '$admission_no', '$class_id')";

                if (mysqli_query($conn2, $sql)) {
                    mysqli_close($conn);
                    mysqli_close($conn2);
                    header("Location: register_user.php");
                }
                else {
                    echo '<script type="text/javascript">
                    window.onload = function () { alert("Something Wrong!\nPlease try again later"); }
                    </script>';
                }
            }
            else {
                echo '<script type="text/javascript">
                window.onload = function () { alert("Something Wrong!\nPlease try again later"); }
                </script>';
            }

            mysqli_close($conn2);
        }
        else {
            echo '<script type="text/javascript">
            window.onload = function () { alert("Something Wrong!\nPlease try again later"); }
            </script>';

            // ****** save below messsage in error log
            //echo "Error: school registration failed" . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    else {
        echo '<script type="text/javascript">
        window.onload = function () { alert("Student Exist!\nStudent exist already."); }
        </script>';
    }
}

include '../tmpl/' . $theme . '/application_student_tmpl.php';
?>
