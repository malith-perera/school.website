<?php include 'db.php';

function drop_country_db()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "DROP database IF EXISTS country_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database country_db droped successfully\n";
    }
    else {
        echo "Error: Droping country_db database: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function drop_system_db()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "DROP database IF EXISTS system_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database system_db droped successfully\n";
    }
    else {
        echo "Error: Droping system_db database: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}



function drop_school_db()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "DROP database IF EXISTS school_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database school_db droped successfully\n";
    }
    else {
        echo "Error: Droping school_db database: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function drop_user_db()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "DROP database IF EXISTS user_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database user_db droped successfully\n";
    }
    else {
        echo "Error: Droping user_db database: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


drop_country_db();
drop_system_db();
drop_user_db();
drop_school_db();
?>
