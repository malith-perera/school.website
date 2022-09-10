<?php
$servername = "localhost";
$username = "malith";
$password = "Lamayage 2";
$db_name = "school_db";

/*-----------------*/
/* Create database */
/*-----------------*/

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
        echo "Database school_db created successfully<br>";
    } else {
        echo "Error: Creating school_db database: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


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
        echo "Database country_db created successfully<br>";
    } else {
        echo "Error: Creating country_db database: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}

/*----------------*/
/* Country tables */
/*----------------*/

function create_country_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS countries (
        country_id  INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        country     VARCHAR(128) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table countries table created successfully<br>";
    } else {
        echo "Error: Creating countries table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}

function create_country_curriculum_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS country_curriculum (
        country_id      INT(2) UNSIGNED,
        curriculum_id   INT(2) UNSIGNED
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table country table created successfully<br>";
    } else {
        echo "Error: Creating country table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}

/*----------------------*/
/* Create school tables */
/*----------------------*/

function create_schools_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS schools (
        school_id   INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, /* school_id */
        school      VARCHAR(128) NOT NULL,
        place       VARCHAR(64) NOT NULL,
        web         VARCHAR(256) NOT NULL,
        email       VARCHAR(256),
        telephone   INT(6) UNSIGNED,
        country_id  INT(2) UNSIGNED,
        school_ref  VARCHAR(128),                      /* school_ref is given by school staff */
        description VARCHAR(1024)
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table schools table created successfully<br>";
    } else {
        echo "Error: Creating schools table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}

function create_school_classes_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS school_classes (
        school_id   INT(6) UNSIGNED NOT NULL,
        grade       INT(1) UNSIGNED NOT NULL,
        class_name  VARCHAR(1) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table school_classes table created successfully<br>";
    } else {
        echo "Error: Creating school_classes table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


/*---------------*/
/* users table */
/*---------------*/

function create_users_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        user_id     INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        admition_no INT(4) UNSIGNED NOT NULL,
        username    VARCHAR(32) NOT NULL,
        password    VARCHAR(16) NOT NULL,
        user_type   VARCHAR(1)  NOT NULL /* a - admin, p - principal, t - teacher, s - student */
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table users table created successfully<br>";
    } else {
        echo "Error: Creating users table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


/*-----------------*/
/* Student Tables  */
/*-----------------*/

function create_students_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS students (
        student_id  INT(6) UNSIGNED PRIMARY KEY, /* student_id = user_id */
        first_name  VARCHAR(64) NOT NULL,
        last_name   VARCHAR(64) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table students table created successfully<br>";
    } else {
        echo "Error: Creating students table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


function create_student_class_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS student_class (
        student_id  INT(6) UNSIGNED PRIMARY KEY, /* student_id = user_id */
        grade       INT(1) UNSIGNED NOT NULL,
        class_name  VARCHAR(1) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table student_class table created successfully<br>";
    } else {
        echo "Error: Creating student_class table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


function create_student_subjects_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS student_subjects (
        student_id  INT(6) UNSIGNED, /* student_id = user_id */
        subject_id  INT(6) UNSIGNED
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table student_subjects table created successfully<br>";
    } else {
        echo "Error: Creating student_subjects table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


function create_student_marks_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS student_marks (
        student_id  INT(6) UNSIGNED NOT NULL,  /* student_id = user_id */
        grade       INT(1) UNSIGNED NOT NULL,
        class_name  VARCHAR(1) NOT NULL,
        exam_id     INT(6) UNSIGNED NOT NULL ,
        subject_id  INT(4) UNSIGNED NOT NULL,
        marks       INT(2) UNSIGNED

    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table student_marks table created successfully<br>";
    } else {
        echo "Error: Creating student_marks table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


function create_student_temp_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS student_temp (
        student_id  INT(6) UNSIGNED NOT NULL,  /* student_id = user_id */
        first_name  VARCHAR(64) NOT NULL,
        last_name   VARCHAR(64) NOT NULL,
        grade       INT(1) UNSIGNED NOT NULL,
        class_name  VARCHAR(1) NOT NULL,
        password    VARCHAR(16) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table student_temp table created successfully<br>";
    } else {
        echo "Error: Creating student_temp table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


/*-----------------*/
/* Teachers tables */
/*-----------------*/

function create_teachers_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS teachers (
        teacher_id  INT(6) UNSIGNED NOT NULL, /* teacher_id = user id */
        first_name  VARCHAR(64) NOT NULL,
        last_name   VARCHAR(64) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table teachers table created successfully<br>";
    } else {
        echo "Error: Creating teachers table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


function create_teacher_class_subjects_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS teacher_class_subject (
        term_id     INT(6) UNSIGNED NOT NULL,
        grade       INT(1) UNSIGNED NOT NULL,
        class_name  VARCHAR(1) NOT NULL,
        subject_id  INT(4) UNSIGNED NOT NULL,
        teacher_id  INT(6) UNSIGNED            /* teacher_id = user id */
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table teacher_class_subject table created successfully<br>";
    } else {
        echo "Error: Creating teacher_class_subject table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}



/*-------------*/
/* Term tables */
/*-------------*/

function create_term_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS terms (
        term_id     INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        term        INT(1) UNSIGNED NOT NULL,
        term_begin  DATE,
        term_end    DATE
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table terms table created successfully<br>";
    } else {
        echo "Error: Creating terms table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


/*-----------------------------*/
/* Subject & Curriculum tables */
/*-----------------------------*/

function create_curriculum_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS curriculum (
        curriculum_id   INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        curriculum      VARCHAR(256) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table subject_grade table created successfully<br>";
    } else {
        echo "Error: Creating subject_grade table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}

function create_subjects_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS subjects (
        subject_id  INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        subject     VARCHAR(64) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table subjects table created successfully<br>";
    } else {
        echo "Error: Creating subjects table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


function create_currculum_subject_grade_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS curriculum_subject_grade (
        curriculum_id   INT(6) UNSIGNED NOT NULL,
        subject_id      INT(6) UNSIGNED NOT NULL,
        grade           INT(2) UNSIGNED NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table subject_grade table created successfully<br>";
    } else {
        echo "Error: Creating subject_grade table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


/*-------------*/
/* Exams table */
/*-------------*/

function create_exams_table()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS exams (
        exam_id     INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        exam        VARCHAR(127) NOT NULL,
        exam_type   VARCHAR(1) NOT NULL, /* t - term test, p - optional test, o - ordinary level, a - advanced level, */
        term_id     INT(6) UNSIGNED NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table exams table created successfully<br>";
    } else {
        echo "Error: Creating exams table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


function create_exam_examiner()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS exam_examiner (
        exam_id     INT(6) UNSIGNED NOT NULL,
        examiner_id INT(6) UNSIGNED NOT NULL, /* who check the answers. examiner have the ability to enter marks */
        subject_id  INT(6) UNSIGNED NOT NULL,
        grade       INT(1) UNSIGNED NOT NULL,
        class_name  VARCHAR(1) NOT NULL,
        exam_date   DATE NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table exam_examiner table created successfully<br>";
    } else {
        echo "Error: Creating exam_examiner table: " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


/*------------*/
/* configure  */
/*------------*/


function enter_countries()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql insert admin
    $sql = "INSERT INTO countries (country)
        VALUES ('Sri Lanka')";

    if (mysqli_query($conn, $sql)) {
        echo "Countries entered successfully<br>";
    } else {
        echo "Error: Entering countries : " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


function enter_admins()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql insert admin
    $sql = "INSERT INTO users (admition_no, username, password, user_type)
        VALUES (1, 'admin', 'a', 'a')";

    if (mysqli_query($conn, $sql)) {
        echo "Admin entered successfully<br>";
    } else {
        echo "Error: Entering admin : " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


function enter_class_teacher_as_a_subject()
{
    global $servername, $username, $password, $db_name;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql insert admin
    $sql = "INSERT INTO subjects (subject)
        VALUES ('Class Teacher')";

    if (mysqli_query($conn, $sql)) {
        echo "Class teacher entered as a subject successfully<br>";
    } else {
        echo "Error: Entering class teacher as a subjects : " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}


// Create database
create_school_db();
create_country_db();

// country tables
create_country_table();

// Create school tables
create_schools_table();
create_school_classes_table();

// Create users table
create_users_table();

// Create student tables
create_students_table();
create_student_class_table();
create_student_subjects_table();
create_student_marks_table();
create_student_temp_table();

// Create teacher tables
create_teachers_table();
create_teacher_class_subjects_table();

// Create term tables
create_term_table();

// Create subject tables
create_curriculum_table();
create_subjects_table();
create_currculum_subject_grade_table();

// Create exams tables
create_exams_table();
create_exam_examiner();

// Configure
enter_countries();
enter_admins();
enter_class_teacher_as_a_subject();
?>
