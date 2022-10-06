<!DOCTYPE html>
<html class="" lang="en-US">

<head>
<title><?php echo $fname ?>-මුරපදය</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<link rel="icon" href="images/logo.png">
<meta name=”viewport” content=”width=device-width, initial-scale=1″>
<meta name="KeyWords" content="hettipola, mahindodaya, maha, vidyalaya, school, sri lanka, kurunegala, north western province, wayamba">
<meta name="Description" content="හෙට්ටිපොල මහින්දෝදය මහා විද්‍යාලීය වෙබ් අඩවිය. ">
<meta name="author" content="Malith Perera">
<link rel="stylesheet" href="css/style.css" type="text/css"  media="screen, projection">
<script src="js/pages.js"></script>
<script src="js/register.js"></script>
</head>

<body>
<div style="padding:8px; background-color:#8ec9ff">
<img src="images/logo.png" style="width:200px">
</div>

<div class="centercontent" style="background-color:#f2f0f5; height:850px;">
<div style="display:inline-block; width:100%; text-align:center">
<div id="container">

<h2></h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table style="margin:0 auto;">
<tbody>
<tr>
<td style="text-align:left;">පරිශීලක නම</td>
<td style="text-align:left;"><?php echo $admission_no; ?></td>
<td></td>
</tr>
<tr>
<td style="text-align:left">මුරපදය</td>
<td><input type="password" id="pword" name="pword" oninput="check_password();"></td>
<td><span class="login_err"><?php echo $pword_error;?></span></td>
</tr>
<tr>
<td style="text-align:left">මුරපදය නැවතත්</td>
<td><input type="password" id="pword2" name="pword2" oninput="check_password();"></td>
<td><span class="login_err"><?php echo $pword_error;?></span></td>
</tr>
<tr>
<td id="message" colspan="3"></td>
</tr>
<tr>
<td></td>
<td id="submitbtn"><div style='width:100%; text-align:right'><input type='submit' name='registerbtn' value='ලියාපදිංචි කරන්න' disabled></div></td> <!-- from script -->
<td></td>
</tr>
</tbody>
</table>
<input  type="hidden" name="submit_pressed" value="1"> <!-- used to identify submit button pressed or not before save data -->
</form>

<p style="color:purple">*ඉහත පරිශීලක නම හා මුරපදය ආරක්ෂාකර මතක තබා ගන්න</p>

</div> <!-- end container -->
</div>
</div> <!-- center content -->

<!-- footer -->
<span id="footer"></span>

<script>
footer_view();

if (<?php echo $registration_state; ?>)
{
    view_success();
    setTimeout(function () {window.location.replace("student_page.php");}, 2000);
}

</script>

</body>
</html>
