<?php

/* =============================================*
 * Create databases and tables                  *
 * =============================================*
 * File     : db.php                            *
 * Used  by : config_sys.php, config.php        *
 * ---------------------------------------------*/

// Check database username password
$servername = "localhost";
$username = "malith";
$password = "Lamayage 2";

function test_input($data)
{
    $data = trim($data);            // Strip unnecessary characters (extra space, tab, newline)
    $data = stripslashes($data);    // Remove backslashes (\) from the user input
    $data = htmlspecialchars($data);// converts special characters to HTML entities
    return $data;
}

/* =============================== System Database Section =============================== */

/*------------------------*/
/* Create system database */
/*------------------------*/

function create_system_db()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS system_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database system_db created successfully\n";
    }
    else {
        echo "Error: Creating system_db database: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_system_staff_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "system_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS system_staff (
        user_id     INT(12) UNSIGNED NOT NULL,
        duty        TINYINT(5) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table system_staff table created successfully\n";
    }
    else {
        echo "Error: Creating system_staff table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


/*------------------------*/
/* Create user database   */
/*------------------------*/

function create_user_db()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS user_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database user_db created successfully\n";
    }
    else {
        echo "Error: Creating user_db database: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_system_users_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "user_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        user_id         INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email           VARCHAR(1017),                      /* https://blog.greglow.com/2019/05/17/sql-column-length-storing-email-addresses-sqlserver-database/ */
        school_web      VARCHAR(255),                       /* school.website subdomain name */
        telephone_id    INT(6) UNSIGNED,
        username        VARCHAR(255) NOT NULL,              /* 0 - school.website based, 1 - email based, 2 - telephone number based */
        password        VARCHAR(15) NOT NULL,
        user_type       VARCHAR(7) NOT NULL,                /* a - admin, p - principal, v - vice principal, t - teacher, s - student, r - parent, n - none academic staff, o - old student,  d - doner, y - analyst */
        first_name      VARCHAR(63),
        last_name       VARCHAR(63),
        full_name       VARCHAR(255),
        country_id      TINYINT(5) UNSIGNED,
        address         VARCHAR(255)
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table users table created successfully\n";
    }
    else {
        echo "Error: Creating users table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_user_telephone_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "user_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS telephone (
        user_id      INT(12) UNSIGNED NOT NULL,
        telephone    VARCHAR(15) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table telephone table created successfully\n";
    }
    else {
        echo "Error: Creating telephone  table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}



/* =============================== Country Database Section =============================== */

/*-------------------------*/
/* Create country database */
/*-------------------------*/

function create_country_db()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS country_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database country_db created successfully\n";
    }
    else {
        echo "Error: Creating country_db database: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


/*----------------*/
/* Country tables */
/*----------------*/

function create_country_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "country_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS countries (
        country_id      TINYINT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        country         VARCHAR(127) NOT NULL,
        dial_code       VARCHAR(4),                                         /* telephone country code */
        timezone        VARCHAR(31)
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table countries table created successfully\n";
    }
    else {
        echo "Error: Creating countries table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_country_curriculums_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "country_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS country_curriculums (
        country_id      TINYINT(5) UNSIGNED,
        curriculum_id   SMALLINT(5) UNSIGNED         /* Used curriculums in the country */
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table country_curriculums table created successfully\n";
    }
    else {
        echo "Error: Creating country_curriculums table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}



/* =============================== School Database Section =============================== */

/*------------------------*/
/* Create school database */
/*------------------------*/

function create_school_db()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS school_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database school_db created successfully\n";
    }
    else {
        echo "Error: Creating school_db database: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


/*----------------------*/
/* Create school tables */
/*----------------------*/


function create_schools_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "school_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS schools (
        school_id       MEDIUMINT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,   /* hope there is no more schools than MEDIUMINT UNSIGNED */
        school          VARCHAR(127) NOT NULL,      /* hope it may be enough to school name in any language */
        place           VARCHAR(63) NOT NULL,       /* nearly utf-8 16 characters */
        school_web      VARCHAR(127) NOT NULL,      /* school.website subdomain name */
        address         VARCHAR(255),               /* nearly utf-8 63 characters */
        country_id      TINYINT(5) UNSIGNED,        /* There is no more than 255 countries */
        telephone       INT(15) UNSIGNED,           /* https://support.telesign.com/s/article/what-is-the-maximum-length-of-any-phone-number */
        email           VARCHAR(1017),              /* https://blog.greglow.com/2019/05/17/sql-column-length-storing-email-addresses-sqlserver-database/ */
        web             VARCHAR(253),               /* https://webmasters.stackexchange.com/questions/16996/maximum-domain-name-length */
        ref_code        VARCHAR(63),                /* any school ref_code given by government or any other institute to identify the school */
        description     VARCHAR(1022),
        status          VARCHAR(2)                  /* unconfirmed - u, confirmed - c, active - a, inactive - i */
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table schools table created successfully\n";
    }
    else {
        echo "Error: Creating schools table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_school_curriculum_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "school_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS school_curriculum (
        school_id       MEDIUMINT(8) UNSIGNED,
        curriculum_id   SMALLINT(5) UNSIGNED
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table school_curriculum table created successfully\n";
    }
    else {
        echo "Error: Creating school_curriculum table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


/*--------------------------------------------*/
/* School tables create while register school */
/*--------------------------------------------*/

function create_school_admins_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS school_admins (
        school_id       MEDIUMINT(8) UNSIGNED NOT NULL,
        user_id         INT(12) UNSIGNED NOT NULL,
        duty            TINYINT(4) UNSIGNED                     /* What this admin allow to do */
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table school_admins table created successfully\n";
    }
    else {
        echo "Error: Creating school_admins table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_school_classes_table($db)
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
        class_name      VARCHAR(127) NOT NULL,
        student_max     TINYINT(4) UNSIGNED                         /* maximum student in a class room */
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table school_classes table created successfully\n";
    }
    else {
        echo "Error: Creating school_classes table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


/*-----------------*/
/* Student Tables  */
/*-----------------*/

/*---------------------------------------------*/
/* Student tables create while register school */
/*---------------------------------------------*/

function create_student_class_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS student_class (
        student_id  INT(12) UNSIGNED NOT NULL,               /* student_id = user_id */
        class_id    MEDIUMINT(8) UNSIGNED NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table student_class table created successfully\n";
    }
    else {
        echo "Error: Creating student_class table: " . mysqli_error($conn) . "\n";
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
        class_id    MEDIUMINT(8) UNSIGNED NOT NULL,
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


/*-----------------*/
/* Teachers tables */
/*-----------------*/

/*---------------------------------------------*/
/* Teacher tables create while register school */
/*---------------------------------------------*/

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
        teacher_id  INT(6) UNSIGNED NOT NULL,            /* teacher_id = user id */
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


/*----------------------------*/
/* None academic staff tables */
/*----------------------------*/

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
    $sql = "CREATE TABLE IF NOT EXISTS staff_attendence (
        staff_id    INT(6) UNSIGNED NOT NULL,            /* staff_id = user id */
        date        TIMESTAMP NOT NULL,
        attend      INT(1) UNSIGNED,
        score       INT(1) UNSIGNED
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table staff_attendence_table table created successfully\n";
    }
    else {
        echo "Error: Creating staff_attendence_table table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


/*-------------*/
/* Term tables */
/*-------------*/

function create_term_table($db)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS terms (
        term_id     INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        term_no     TINYINT(3) UNSIGNED NOT NULL,
        term        VARCHAR(63) NOT NULL,
        term_begin  DATE,
        term_end    DATE
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table terms table created successfully\n";
    }
    else {
        echo "Error: Creating terms table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


/*----------------------------*/
/* Curriculum subjects tables */
/*----------------------------*/

function create_curriculum_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "school_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS curriculums (
        curriculum_id   SMALLINT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        curriculum      VARCHAR(255) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table school_curriculum table created successfully\n";
    }
    else {
        echo "Error: Creating school_curriculum table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_subjects_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "school_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS subjects (
        subject_id  SMALLINT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        subject     VARCHAR(127) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table subjects table created successfully\n";
    }
    else {
        echo "Error: Creating subjects table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_currculum_subject_grade_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "school_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS curriculum_subject_grade (
        curriculum_id   SMALLINT(5) UNSIGNED NOT NULL,
        subject_id      SMALLINT(5) UNSIGNED NOT NULL,
        grade           TINYINT(4) UNSIGNED NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table curriculum_subject_grade table created successfully\n";
    }
    else {
        echo "Error: Creating curriculum_subject_grade table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


/*-------------*/
/* Exams table */
/*-------------*/

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
        exam        VARCHAR(127) NOT NULL,
        term_id     INT(12) UNSIGNED NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table exams table created successfully\n";
    }
    else {
        echo "Error: Creating exams table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


/* Calling functions */

function enter_school_admin($db, $admin_id, $duty)
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql insert admin
    $sql = "INSERT INTO school_admins (school_id, user_id, duty)
        VALUES ($school_id, $admin_id, $duty)";

    if (mysqli_query($conn, $sql)) {
        echo "School admin entered successfully\n";
    }
    else {
        echo "Error: Entering school admin : " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}

?>
