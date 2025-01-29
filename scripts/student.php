<?php
function check_student_exist_in_school($school_web_db, $admission_no)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "$school_web_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT student_id FROM students
        WHERE admission_no='$admission_no'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $student_id = $row["student_id"];
        mysqli_close($conn);
        return student_id;
    }
    else {
        mysqli_close($conn);
        return 0;
    }
}
?>
