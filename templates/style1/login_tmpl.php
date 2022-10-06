<!DOCTYPE html>
<html class="" lang="en-US">

<head>
<title>school.website</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<link rel="icon" href="images/logo.png">
<meta name=”viewport” content=”width=device-width, initial-scale=1″>
<meta name="KeyWords" content="school, website, create, register">
<meta name="Description" content="Create a wholly new, full fledge school website for your school or expand your existing school website into a full functional website in few seconds. School website users can publish lessons, do online tests, make school announcements, mark attendence, generate, view and compare school reports, manage school accounts, handle new recruitments, keep a good connection with students, teachers and parents and do many more.">
<meta name="author" content="Malith Perera">
<link rel="stylesheet" href="css/style.css" type="text/css"  media="screen, projection">
<link rel="stylesheet" href="css/pages.css" type="text/css"  media="screen, projection">
<link rel="stylesheet" href="css/menu.css" type="text/css"  media="screen, projection">
<script src="js/pages.js"></script>
<script src="js/student.js"></script>
<script src="js/teacher.js"></script>
<script src="js/menu.js"></script>
<script src="js/maintain.js"></script>
</head>

<body>
<span id="maintain"></span>
<span id="menu"></span> <!-- header -->

<!-- begin content -->
<div class="centercontent" style="background-color:#f2f0f5; height:100%;"> <!-- center -->
<div style="display:inline-block; width:100%; text-align:center"> <!-- background pad -->
<div id="container">

<div id="top_space" style="display:block;"></div>

<!-- div left begin -->
<div style="display:inline-block; width:50%; text-align:right; float:left">
<div id="left_top_space" style="display:block;"></div>
<div><img src="images/logo.png" alt="black logo"></div>
<div class="fontfamilysans" style="display:block; font-size:1.8em; padding-right:10px;"><?php echo $school_name; ?></div>
</div> <!-- div left end -->

<!-- div right begin -->
<div style="display:inline-block; width:50%; clear:both;">
<div id="right_top_space" style="display:block;"></div>
<div style="text-align:left;"><img src="images/motto.png" alt="motto"></div>
<div style="box-shadow: 8px 8px 8px grey; border-style: outset; border-radius:10px; padding:20px; padding-top:60px; padding-bottom:60px; width:50%">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table style="margin:0 auto;">
<tbody>
<tr><td style="padding:5px;"><input type="text" name="uname" placeholder="Username" style="color:#888888; border-radius: 20px; font-size:1.2em;"></td></tr>
<tr><td style="padding:5px;"><input type="password" name="pword" placeholder="Password" style="color:#888888; border-radius: 20px; font-size:1.2em;"></td></tr>
<tr><td style="color:red;"><?php echo $login_error ?></td></tr>
<tr><td style="text-align:center; padding:5px; "><input type="submit" name="password" value="Login" style="color:white; border-radius: 8px; width:100%; padding:8px; background-color:#1877f2; font-size:1.2em;"></td></tr>
</tbody>
</table>
<input type="hidden" id="submit_pressed" name="submit_pressed" value="1">
</form>
</div>

<br>
<div style="text-align:left;"><a href="signup.html"><input type="button" name="signup" value="Sign up" style="color:white; border-radius: 8px; font-size:1.2em; padding:8px; background-color:#1877f2; "></a></div>
<div style="text-align:left;"><a href="http://school.website"><input type="button" name="register" value="Create a school website" style="color:white; border-radius: 8px; font-size:1.2em; padding:8px; background-color:#1877f2;"></a></div>
<br>

<div style="text-align:left;"><a href="" style="text-decoration:none; color:darkblue;">Learn More</a></div>

</div> <!-- div right end -->

<br><br>
<br><br>
<br><br>

</div> <!-- end container -->
</div> <!-- background pad -->
<span id="footer"></span> <!-- footer -->
</div> <!-- center content -->

<script>
form_push_down();
footer_view();

maintainance();
<?php echo preg_replace( "/\r|\n/", "", "header('$school_name');"); ?>
footer();
</script>

</body>
</html>
