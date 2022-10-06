<?php include '../scripts/system.php';

/* =============================================*
 * Create databases and tables                  *
 * =============================================*
 * File     : db.php                            *
 * Used  by : config_sys.php, config.php        *
 * ---------------------------------------------*/

/* =============================== System Database Section =============================== */

/*------------------*/
/* Create Databases */
/*------------------*/

// Create system_db
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


// Create curriculum_db

function create_curriculum_db()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS curriculum_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database curriculum_db created successfully\n";
    }
    else {
        echo "Error: Creating curriculum_db database: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


// Create country database

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


// Create user database

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


// Create school database

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


/*=============================== system_db tables =============================== */

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


/*=============================== user_db tables =============================== */

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
        user_type       VARCHAR(7),                         /* a - admin, p - principal, v - vice principal, t - teacher, s - student, r - parent, n - none academic staff, o - old student,  d - doner, y - analyst */
        name            VARCHAR(127),
        full_name       VARCHAR(255),
        email           VARCHAR(1017),                      /* https://blog.greglow.com/2019/05/17/sql-column-length-storing-email-addresses-sqlserver-database/ */
        address         VARCHAR(255),
        country_id      TINYINT(5) UNSIGNED,
        school_web      VARCHAR(255),                       /* school.website subdomain name */
        username        VARCHAR(255),                       /* 0 - school.website based, 1 - email based, 2 - telephone number based */
        password        VARCHAR(15)
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


/* =============================== curriculum_db tables =============================== */

function create_curriculum_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "curriculum_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS curriculums (
        curriculum_id   SMALLINT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        curriculum      VARCHAR(255) NOT NULL,
        based_on        VARCHAR(1) NOT NULL, /* t - terms, s - semester */
        n_terms         TINYINT(2) /* how many terms or semesters per year */
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table school_curriculum table created successfully\n";
    }
    else {
        echo "Error: Creating school_curriculum table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_curriculum_grades_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "curriculum_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS curriculum_grades (
        curriculum_id   SMALLINT(5) UNSIGNED,
        grade           TINYINT(4) UNSIGNED NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table curriculum_grades table created successfully\n";
    }
    else {
        echo "Error: Creating curriculum_grades table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function create_subjects_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "curriculum_db");

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


function create_curriculum_subjects_table()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "curriculum_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS curriculum_subjects (
        curriculum_id   SMALLINT(5) UNSIGNED NOT NULL,
        grade           TINYINT(3) UNSIGNED NOT NULL,
        subject_id      SMALLINT(5) UNSIGNED NOT NULL,
        compulsory      BOOLEAN NOT NULL   /* true - compulsory, false - optional */
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table curriculum_subjects table created successfully\n";
    }
    else {
        echo "Error: Creating curriculum_subjects table: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


/* =============================== country_db tables =============================== */

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


/* =============================== school_db tables =============================== */

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




/*================*/
/* Drop databases */
/*================*/

function drop_country_db()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Drop database
    $sql = "DROP database IF EXISTS country_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database country_db dropped successfully\n";
    }
    else {
        echo "Error: Dropping country_db database: " . mysqli_error($conn) . "\n";
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

    // Drop database
    $sql = "DROP database IF EXISTS system_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database system_db dropped successfully\n";
    }
    else {
        echo "Error: Dropping system_db database: " . mysqli_error($conn) . "\n";
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

    // Drop database
    $sql = "DROP database IF EXISTS school_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database school_db dropped successfully\n";
    }
    else {
        echo "Error: Dropping school_db database: " . mysqli_error($conn) . "\n";
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

    // Drop database
    $sql = "DROP database IF EXISTS user_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database user_db dropped successfully\n";
    }
    else {
        echo "Error: Dropping user_db database: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function drop_curriculum_db()
{
    global $servername, $username, $password;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // drop database
    $sql = "DROP database IF EXISTS curriculum_db";

    if (mysqli_query($conn, $sql)) {
        echo "Database curriculum_db droped successfully\n";
    }
    else {
        echo "Error: Dropping curriculum_db database: " . mysqli_error($conn) . "\n";
    }

    mysqli_close($conn);
}


function drop_databases()
{
    drop_country_db();
    drop_system_db();
    drop_user_db();
    drop_school_db();
    drop_curriculum_db();
}

?>
