<?php include '../scripts/db.php';

/* ============================================*
 * configurations                              *
 * ============================================*
 * File     : config.php                       *
 * Use      : db.php                           *
 * --------------------------------------------*/

/*----------------*/
/* Configurations */
/*----------------*/

/* Drop existing databases */
drop_databases();

/* ========== Create databases ============ */

// Create system_db
create_system_db();

// Create user_db
create_user_db();

// Create country_db
create_country_db();

// Create school_db
create_school_db();

// Create curriculum_db
create_curriculum_db();


/* ========== Create system_db tables ========== */
create_system_staff_table();


/* ========== Create user_db tables ========== */
create_system_users_table();


/* ========== Create country_db tables ========== */
create_country_table();


/* ========== school_db tables ========== */
create_schools_table();


/* ========= curriculum_db tables =========== */
create_curriculum_table();
create_subjects_table();
create_curriculum_grades_table();
create_curriculum_subjects_table();


/* ========= Entry functions =========== */

function enter_country_sri_lanka()
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
        VALUES ('ශ්‍රී ලකාව')";

    if (mysqli_query($conn, $sql)) {
        echo "Enter Sri Lanka successfully\n";
    } else {
        echo "Error: Entering Sri Lanka: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}
enter_country_sri_lanka();


function enter_sri_lanka_curriculum()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, 'curriculum_db');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql insert currilulums
    $sql = "INSERT INTO curriculums (curriculum, based_on, n_terms)
        VALUES ('ශ්‍රී ලංකා ප්‍රාථමික ජාතික අධ්‍යාපන පටිපාටිය - 6, 7, 8 ශ්‍රේණි', 't', 3)";

    if (mysqli_query($conn, $sql)) {
        echo "Enter Sri Lanka curriculum successfully\n";
    } else {
        echo "Error: Entering Sri Lanka curriculum : " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}
enter_sri_lanka_curriculum();


function enter_sri_lanka_curriculum_grades()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, 'curriculum_db');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql insert curriculum grades
    $sql = "INSERT INTO curriculum_grades (curriculum_id, grade)
        VALUES ('1', 6);";

    $sql .= "INSERT INTO curriculum_grades (curriculum_id, grade)
        VALUES ('1', 7);";

    $sql .= "INSERT INTO curriculum_grades (curriculum_id, grade)
        VALUES ('1', 8);";

    if (mysqli_multi_query($conn, $sql)) {
        echo "Enter Sri Lanka curriculum_grades successfully\n";
    } else {
        echo "Error: Entering Sri Lanka curriculum_grades : " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}
enter_sri_lanka_curriculum_grades();



function enter_subjects()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, 'curriculum_db');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql insert subjects
    $sql = "INSERT INTO subjects (subject)
        VALUES ('කතෝලික ධර්මය');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('ක්‍රිස්තු ධර්මය');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('බුද්ධ ධර්මය');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('ඉසලාම් ධර්මය');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('හින්දු ධර්මය');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('සිංහල');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('දෙමළ');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('ඉංග්‍රීසි');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('ගණිතය');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('විද්‍යාව');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('චිත්‍ර');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('නැටුම්');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('සංගීතය');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('ඉතිහාසය');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('පුරවැසි අධ්‍යාපනය');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('සෞඛ්‍ය හා ශාරීරික අධ්‍යාපනය');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('ප්‍රායෝගික හා තාක්ෂණික කුසලතා');";

    $sql .= "INSERT INTO subjects (subject)
        VALUES ('තොරතුරු හා සංනිවේදන තාක්ෂණය');";

    if (mysqli_multi_query($conn, $sql)) {
        echo "Enter subjects successfully\n";
    } else {
        echo "Error: Entering subjects : " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}
enter_subjects();


function enter_sri_lanka_curriculum_6_7_8_subjects()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, 'curriculum_db');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "";

    for ($g = 6; $g < 9; $g++) // grades
    {
        for ($s = 1; $s < 19; $s++) // subjects
        {
            $compulsory = array(1, 2, 3, 4, 5, 11, 12, 13); // optional subjects

            $comp = 1;

            foreach($compulsory as $c)
            {
                if ($s == $c)
                {
                    $comp = 0;
                    break;
                }
            }

            // sql insert curriculum subjects
            $sql .= "INSERT INTO curriculum_subjects (curriculum_id, grade, subject_id, compulsory)
                VALUES ('1', '$g', '$s', '$comp');";
        }
    }

    if (mysqli_multi_query($conn, $sql)) {
        echo "Enter Sri Lanka curriculum_subjects successfully\n";
    } else {
        echo "Error: Entering Sri Lanka curriculum_subjects : " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}

enter_sri_lanka_curriculum_6_7_8_subjects();
?>
