<?php
// Check database username password
$servername = "localhost";
$username = "malith";
$password = "Lamayage 2";
$dbname = "school_db";

function test_input($data) {
    $data = trim($data);            // Strip unnecessary characters (extra space, tab, newline)
    $data = stripslashes($data);    // Remove backslashes (\) from the user input
    $data = htmlspecialchars($data);// converts special characters to HTML entities
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $web = test_input($_GET["web"]);

    // Create connection
    $conn_get = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn_get) {
        die("Connection failed in register_school.php: " . mysqli_connect_error());
    }

    $sql = "SELECT school_id FROM schools WHERE web = '" . $web . "'";

    $result = mysqli_query($conn_get, $sql);

    if (mysqli_num_rows($result) > 0) {
         echo "1";
    }
    else {
        echo "0";
    }

    mysqli_close($conn_get);
}
?>
