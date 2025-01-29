<?php include 'system.php';

/*------------------------------------------*/
/* Tables create while registering a school */
/*------------------------------------------*/

// Exams table

function create_school_related_db($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS $db";

    if (mysqli_query($conn, $sql)) {
        echo "Create school related database successfully\n";
    }
    else {
        echo "Error: Creating school related database: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_new_students_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS new_student (
        new_student_id      INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        admission_no        MEDIUMINT(8) UNSIGNED NULL,
        name                VARCHAR(127) NOT NULL,
        address             VARCHAR(255) NOT NULL,
        telephone           VARCHAR(15) NOT NULL,
        grade               TINYINT(4) UNSIGNED NOT NULL,
        class_name          VARCHAR(63) NULL,
        acceptance1         BOOLEAN,
        acceptance2         BOOLEAN,
        applied_date        DATE NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table new_students table created successfully\n";
    }
    else {
        echo "Error: Creating new_students table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_new_teacher_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS new_teacher (
        new_teacher_id      INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        admission_no        MEDIUMINT(8) UNSIGNED NULL,
        name                VARCHAR(127) NOT NULL,
        address             VARCHAR(255) NOT NULL,
        telephone           VARCHAR(15) NOT NULL,
        grade               TINYINT(4) UNSIGNED NOT NULL,
        class_name          VARCHAR(63) NULL,
        acceptance          BOOLEAN,
        applied_date        DATE NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table new_teacher table created successfully\n";
    }
    else {
        echo "Error: Creating new_teacher table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}



function create_school_users_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS school_users (
        admission_no    INT(8) UNSIGNED NOT NULL,
        user_id         INT(12) UNSIGNED NOT NULL,
        admit_date      DATE NULL,
        exit_date       DATE NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table school_users table created successfully\n";
    }
    else {
        echo "Error: Creating school_users table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


// school_curriculums tables
function create_school_curriculums_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS school_curriculums (
        curriculum_id   SMALLINT(5) UNSIGNED NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table school_curriculums table created successfully\n";
    }
    else {
        echo "Error: Creating school_curriculums table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_exams_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS exams (
        exam_id     INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        exam        VARCHAR(63) NOT NULL,
        year        SMALLINT(5)
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table exams table created successfully\n";
    }
    else {
        echo "Error: Creating exams table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


// School tables

function create_classes_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS classes (
        class_id        MEDIUMINT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        grade           TINYINT(4) UNSIGNED NOT NULL,
        class_name      VARCHAR(31) NOT NULL,
        description     VARCHAR(127),
        teacher_id      INT(12) UNSIGNED,                           /* teacher_id = user_id */
        student_max     TINYINT(4) UNSIGNED                         /* maximum student in a class room */
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table classes table created successfully\n";
    }
    else {
        echo "Error: Creating classes table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


// Student Tables

function create_students_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS students (
        student_id      INT(12) UNSIGNED NOT NULL,               /* student_id = user_id */
        admission_no    MEDIUMINT(7) UNSIGNED NOT NULL,
        class_id        MEDIUMINT(8) UNSIGNED
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table students table created successfully\n";
    }
    else {
        echo "Error: Creating students table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_student_subjects_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS student_subjects (
        student_id  INT(12) UNSIGNED NOT NULL,           /* student_id = user_id */
        subject_id  SMALLINT(5) UNSIGNED NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table student_subjects table created successfully\n";
    }
    else {
        echo "Error: Creating student_subjects table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_student_report_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS student_report (
        student_id  INT(12) UNSIGNED NOT NULL,          /* student_id = user_id */
        exam_id     INT(12) UNSIGNED NOT NULL ,
        subject_id  SMALLINT(5) UNSIGNED NOT NULL,
        marks       INT(2) UNSIGNED
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table student_report table created successfully\n";
    }
    else {
        echo "Error: Creating student_report table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_student_attendance_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS student_attendance (
        student_id  INT(6) UNSIGNED NOT NULL,            /* student_id = user_id */
        date        DATE NOT NULL,
        exit_at     TIME,
        note        VARCHAR(255)
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table student_attendance table created successfully\n";
    }
    else {
        echo "Error: Creating student_attendance table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


// Teachers tables

function create_teacher_class_subjects_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS teacher_class_subject (
        teacher_id  INT(6) UNSIGNED NOT NULL,            /* teacher_id = user_id */
        class_id    MEDIUMINT(8) UNSIGNED NOT NULL,
        subject_id  SMALLINT(5) UNSIGNED NOT NULL,
        examiner_id INT(6) UNSIGNED
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table teacher_class_subject table created successfully\n";
    }
    else {
        echo "Error: Creating teacher_class_subject table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


// None academic staff tables

function create_staff_attendance_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS staff_attendance (
        staff_id    INT(6) UNSIGNED NOT NULL,            /* staff_id = user id */
        date        TIMESTAMP NOT NULL,
        attend      INT(1) UNSIGNED,
        score       INT(1) UNSIGNED
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table staff_attendance_table table created successfully\n";
    }
    else {
        echo "Error: Creating staff_attendance_table table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


// Admin tables

function create_admins_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS admins (
        user_id         INT(12) UNSIGNED NOT NULL,
        duty            TINYINT(4) UNSIGNED                     /* What this admin allow to do */
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table admins table created successfully\n";
    }
    else {
        echo "Error: Creating admins table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_school_related_database_and_tables($db)
{
    create_school_related_db($db);
    create_exams_table($db);
    create_school_curriculums_table($db);
    create_classes_table($db);
    create_admins_table($db);
    create_students_table($db);
    create_student_subjects_table($db);
    create_student_report_table($db);
    create_student_attendance_table($db);
    create_student_attendance_table($db);
    create_teacher_class_subjects_table($db);
    create_staff_attendance_table($db);
}

?>
