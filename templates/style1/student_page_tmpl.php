<!DOCTYPE html>
<html class="" lang="en-US">

<head>
<title><?php echo $name ?></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<link rel="icon" href="images/logo.png">
<meta name=”viewport” content=”width=device-width, initial-scale=1″>
<meta name="KeyWords" content="<?php echo $keywords; ?>">
<meta name="Description" content="<?php echo $description; ?>">
<meta name="author" content="Malith Perera">
<link rel="stylesheet" href="css/style.css" type="text/css"  media="screen, projection">
<link rel="stylesheet" href="css/pages.css" type="text/css"  media="screen, projection">
<link rel="stylesheet" href="css/menu.css" type="text/css"  media="screen, projection">
<script src="js/student.js"></script>
<script src="js/student_report.js"></script>
<script src="js/messages.js"></script>
<script src="js/profile.js"></script>
<script src="js/teacher.js"></script>
<script src="js/menu.js"></script>
<script src="js/maintain.js"></script>

<style>
button.subbtn {
    background-color:#bcbcbc;
    border:none;
    color:white;
    padding:15px 45px;
    margin:4px;
    text-align:center;
    text-decoration:none;
    display:inline-block;
    cursor:pointer;
    font-size:1em;
    border-radius:5px;
}


button.sidebtn {
    background-color:#bcbcbc;
    border:none;
    color:white;
    padding:12px;
    margin:10px;
    text-align:center;
    text-decoration:none;
    display:inline-block;
    cursor:pointer;
    font-size:1.2em;
    border-radius:5px;
    width:80%;
}


.sub_menu_btn_div {
    border-radius:5px;
    background-color:#bcbcbc;
    width:100%;
    text-align:center;
}


.marks {
    width: 3em;
}
</style>

</head>

<body>
<span id="maintain"></span>
<span id="menu"></span> <!-- header -->

<div class="centercontent" style="background-color:#f2f0f5; height:100%;"> <!-- center -->
<div style="display:inline-block; width:100%; text-align:center"> <!-- background pad -->
<div id="container"> <!-- begin container -->
<br>
<div id="submenu" style="background-color:#dfdfdf; padding:6px; font-size:1.2em; margin:0 auto; border-radius:5px;">
<table style="width:100%; table-layout: fixed;">
<tbody>
<tr>
<td><div id="profile_btn_div" class="sub_menu_btn_div"><button id="profile_btn" class="subbtn" onclick="profile();"><?php echo $name ?></button></div></td>
<td><div id="message_btn_div" class="sub_menu_btn_div"><button id="message_btn" class="subbtn" onclick="messages();">පණිවිඩ</button></div></td>
<td><div id="report_btn_div" class="sub_menu_btn_div"><button id="report_btn" class="subbtn" onclick="report();">ප්‍රගති වාර්ථාව</button></div></td>
</tr>
</tbody>
</table>
</div>
<br>

<div id="sub_container"></div>

</div> <!-- end container -->
</div> <!-- background pad -->
<span id="footer"></span> <!-- footer -->
</div> <!-- center content -->

<script type='text/javascript'>
maintainance();
<?php echo preg_replace( "/\r|\n/", "", "header_student('$school_name', '$name');"); ?>
footer();
if (<?php echo $just_logged ?>)
{
    messages();
    <?php $_SESSION["just_logged"] = 0; ?>
}
</script>

</body>
</html>
