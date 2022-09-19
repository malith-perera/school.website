<?php include 'db.php';

/* ============================================*
 * configurations                              *
 * ============================================*
 * File     : config.php                       *
 * Use      : db.php                           *
 * --------------------------------------------*/


/*------------------*/
/* config functions */
/*------------------*/

function enter_countries()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, 'country_db');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql insert country
    $sql = "INSERT INTO countries (country)
        VALUES ('Sri Lanka')";

    if (mysqli_query($conn, $sql)) {
        echo "Countries entered successfully\n";
    } else {
        echo "Error: Entering countries : " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function enter_class_teacher_as_a_subject()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "school_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql insert admin
    $sql = "INSERT INTO subjects (subject)
        VALUES ('Class Teacher')";

    if (mysqli_query($conn, $sql)) {
        echo "Class teacher entered as a subject successfully\n";
    }
    else {
        echo "Error: Entering class teacher as a subjects : " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


/* ========== system_db section ========== */

// Create system_db
create_system_db();

// Create system tables
create_system_staff_table();


/* ========== user_db section ========== */

// Create user_db
create_user_db();

// Create tables
create_system_users_table();


/* ========== country_db section ========== */

// Create country_db
create_country_db();
create_country_table();
enter_countries();


/* ========== school_db section ========== */

// Create school_db
create_school_db();
create_schools_table();
create_subjects_table();
create_curriculum_table();
create_school_curriculum_table();
enter_class_teacher_as_a_subject();

?>
