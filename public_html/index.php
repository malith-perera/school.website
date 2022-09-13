<!DOCTYPE html>
<html class="" lang="en-US">

<head>
<title>school.website</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<link rel="icon" href="images/logo.jpg">
<meta name=”viewport” content=”width=device-width, initial-scale=1″>
<meta name="KeyWords" content="school, website, create, register">
<meta name="Description" content="Create a wholy new, full fledge school website for your school or expand your existing school website into a full functional website in few seconds. With this users can make school announcements, mark attendence , generate and view school reports, handle school accounts, hadle school recruitments, keep a good relation with students and parents and many more">
<meta name="author" content="Malith Perera">
<link rel="stylesheet" href="css/style.css" type="text/css"  media="screen, projection">
<script src="js/pages.js"></script>
</head>

<body class="centercontent" onload="footer()">
<!-- begin content -->
<div style="background-color:#f2f0f5; height:900px;">

<!-- div left begin -->
<div style="display:inline-block; width:50%; height:100%; text-align: right; float:left">
<div id="left_top_space" style="display:inline-block;"></div>
<div style="width:100%; text-align:right;"><img src="images/logo.png"></div>
<div><p class="fontfamilysans" style="font-size:1.8em; padding-right:10px;">The world of school websites</p></div>
</div> <!-- div left end -->

<!-- div right begin -->
<div style="display:inline-block; width:50%; clear:both;">
<div id="right_top_space" style="display:inline-block;"></div>

<div style="box-shadow: 8px 8px 8px grey; border-style: outset; border-radius:10px; padding-top: 60px; padding-bottom:60px; width:50%">

<form method="post" action="register_school.php"> <!-- check for htmlspecialchars security -->
<table style="margin:0 auto;">
<tbody>
<tr><td style="padding:5px;"><input type="text" name="school_name" placeholder="School Name" style="color:#888888; border-radius: 20px; font-size:1.5em;"></td></tr>
<tr><td style="padding:5px;"><input type="text" name="school_place" placeholder="City/Town/Village" style="color:#888888; border-radius: 20px; font-size:1.5em;"></td></tr>
<tr><td style="text-align:center; padding:5px; "><input type="submit" name="password" value="Create" style="color:white; border-radius: 8px; font-size:1.5em; width:100%; padding:8px; background-color:#1877f2;"></td></tr>
</tbody>
</table>
<input type="hidden" id="web" name="web">
</form>
</div>

<p class="fontfamilysans" style="padding-top:20px; font-size:1em;">Create a full pledge school website within few seconds</p>
<a href="" style="text-decoration:none; color:darkblue;">Learn More</a>
</div> <!-- div right end -->

</div> <!-- end content -->

<script>
    let left_top_space = screen.availHeight / 2 - 180;
    let right_top_space = screen.availHeight / 2 - 260;

    document.getElementById("left_top_space").style.height = left_top_space + "px";
    document.getElementById("right_top_space").style.height = right_top_space + "px";
</script>

<!-- footer -->
<?php include 'footer.php';
footer_view();
?>

</body>
</html>