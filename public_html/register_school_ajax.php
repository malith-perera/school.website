<?php include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $school_web = test_input($_GET["school_web"]);

    // Create connection
    $conn_get = mysqli_connect($servername, $username, $password, "school_db");

    // Check connection
    if (!$conn_get) {
        die("Connection failed in register_school.php: " . mysqli_connect_error());
    }

    $sql = "SELECT school, place,  school_web FROM schools WHERE school_web = '" . $school_web . "'";

    $result = mysqli_query($conn_get, $sql);

    $rows = array();

    // Fetch all
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) > 0) {
         echo json_encode($rows);
    }
    else {
        echo "";
    }

    // Free result set
    mysqli_free_result($result);

    mysqli_close($conn_get);
}
?>
