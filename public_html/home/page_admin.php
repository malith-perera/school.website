<?php include 'db.php';
$user_id = 0;
$user_name = "";

// Start the session
session_start();

if (empty($_SESSION["user_id"]) || $_SESSION["user_id"] == 0)
{
    header("Location: index.html");
}
else
{
    $user_id = test_input($_SESSION["user_id"]);
    $user_name = test_input($_SESSION["user_name"]);
}

?>
<!DOCTYPE html>
<html class="" lang="en-US">

<head>
<?php echo "<title>පාලක - ". $user_name ."</title>"; ?>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<link rel="icon" href="images/logo.png">
<meta name=”viewport” content=”width=device-width, initial-scale=1″>
<meta name="KeyWords" content="hettipola, mahindodaya, maha, vidyalaya, school, sri lanka, kurunegala, north western province, wayamba">
<meta name="Description" content="හෙට්ටිපොල මහින්දෝදය මහා විද්‍යාලීය වෙබ් අඩවිය. ">
<meta name="author" content="Malith Perera">
<link rel="stylesheet" href="css/style.css" type="text/css"  media="screen, projection">
<link rel="stylesheet" href="css/pages.css" type="text/css"  media="screen, projection">
<script src="js/pages.js"></script>
<script src="js/admin.js"></script>
<script src="js/student.js"></script>
<script src="js/teacher.js"></script>
<style>
#form_table table, td, th {
          padding:4px;
}
</style>
</head>

<body>

<div style="padding:8px; background-color:#8ec9ff"> <!-- header -->
<table style="width:100%;">
<tbody>
<tr>
<td><img src="images/logo.png" style="width:200px"></td>
<td style="text-align:right;"><?php echo $user_name; ?></td>
<td style="text-align:right;"><a href='logout.php'><img src='images/logout.png' style='width:30px;'></a></td>
</tr>
</tbody>
</table>
</div> <!-- end header -->

<div class="centercontent" style="background-color:#f2f0f5; height:100%;"> <!-- center -->
<div style="display:inline-block; width:100%; text-align:center"> <!-- background pad -->

<table style="width:100%; border-spacing:10px;">
<tbody>
<tr>
<td style="width:20%; background-color:#dddddd; text-align:left; vertical-align: text-top;"> <!-- left container -->
<div style="background-color:#5588dd; text-align:center; font-size:1.4em; color:white; height:2em;"><b>කාර්යය</b></div>
<div class="taskbox"><a href="javascript:enrol_student()">සිසුන් බඳවා ගැනීම</a></div>
<div class="taskbox"><a href="javascript:enrol_teacher()">ගුරුවරුන්  බඳවා ගැනීම</a></div>
<div class="taskbox"><a href="javascript:asign_class_teacher()">පන්තිභාර ගුරුවරු</a></div>
<div class="taskbox"><a href="javascript:asign_new_test();">නව පරීක්ෂණය</a></div>
<div class="taskbox"><a href="javascript:asign_new_term();">නව අධ්‍යයන වාර</a></div>
<div class="taskbox"><a href="javascript:anlytical_reports();">සමීක්ෂණ වාර්තා</a></div>
</td>
<td id="right_container"></td> <!-- right container -->
</tr>
</tbody>
</table>

</div> <!-- background pad -->
<div style="background-color:#8ec9ff; width:100%; height:90px; border-radius:0px 0px 12px 12px;"></div> <!-- footer -->
</div> <!-- center content -->

</body>
</html>
