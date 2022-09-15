<?php include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $web = test_input($_GET["web"]);

    // Create connection
    $conn_get = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn_get) {
        die("Connection failed in register_school.php: " . mysqli_connect_error());
    }

    $sql = "SELECT school, place,  web FROM schools WHERE web = '" . $web . "'";

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
