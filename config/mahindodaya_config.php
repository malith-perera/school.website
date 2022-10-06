<?php
include '../scripts/school.php';

function drop_mahindodaya_db()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // drop database
    $sql = "DROP database IF EXISTS mahindodaya_hettipola_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database mahindodaya_hettipola_db droped successfully\n";
    }
    else {
        echo "Error: Dropping mahindodaya_hettipola_db database: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


// Enter classes for Mahindodaya school

function enter_mahindodaya_classes()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, 'mahindodaya_hettipola_db');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $classes = array("A", "B", "C", "D", "E");
    $sql = "";

    // sql insert currilulums
    for($g = 6; $g < 9; $g++)
    {
        foreach($classes as $c)
        {
            $sql .= "INSERT INTO classes (grade, class_name)
                VALUES ('$g', '$c');";
        }
    }

    if (mysqli_multi_query($conn, $sql)) {
        echo "Enter Mahindodaya classes successfully\n";
    } else {
        echo "Error: Entering Mahindodaya classes : " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}

drop_mahindodaya_db();
create_school_related_database_and_tables('mahindodaya_hettipola_db');
enter_mahindodaya_classes();

?>
