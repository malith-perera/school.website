<!DOCTYPE html>
<head>
<title><?php echo $school_name ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Malith Perera">
<meta name="KeyWords" content="<?php echo $keywords; ?>, ලොග්, වීම, login">
<meta name="Description" content="<?php echo $school_name; ?> ලොග් වීම">
<meta name="author" content="Malith Perera">
<link rel="icon" type="image/x-icon" href="img/logo32.png">
<link rel="stylesheet" href="../tmpl/<?php echo "$theme"; ?>/css/style.css" type="text/css" media="screen, projection">
<script src="../tmpl/<?php echo "$theme"; ?>/js/theme.js"></script>

<!-- only for example links -->
<style>
a.bt:link, a.bt:visited {
  background-color: slateblue;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a.bt:hover, a.bt:active {
  background-color: purple;
}

.log_form {
  display: grid;
  grid-template-columns: 50% 50%;
}
</style>
</head>

<body>
<header class="header" id="header"></header>

<!-- begin content -->
<div class="container"> <!-- center -->
<div class="back_pad"> <!-- background pad -->
<div id="container">

<div id="top_space" style="display:block;"></div>

<div class="log_form">
<!-- div left begin -->
<div style="text-align:center; display:flex; justify-content: center; align-items: center;">
<div><img src="img/logo.png" alt="black logo"></div>
</div> <!-- div left end -->

<!-- div right begin -->
<div style="text-align:center;">
<div id="right_top_space" style="display:block;"></div>
<div class="fontfamilysans" style="display:block; font-size:1.8em; padding-bottom:1em; padding-top:1em;"><?php echo $school_name; ?></div>
<div style="box-shadow: 4px 4px 4px grey; border-style: outset; border-radius:10px; padding-top:40px; padding-bottom:40px; margin:0;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table style="margin:auto;">
<tbody>
<tr><td style="padding:5px;"><input type="text" name="uname" placeholder="Username" style="width:100%"></td></tr>
<tr><td style="padding:5px;"><input type="password" name="pword" placeholder="Password"></td></tr>
<tr><td style="color:red;"><?php echo $login_error ?></td></tr>
<tr><td style="text-align:center; padding:5px; "><input type="submit" name="password" value="Login" style="color:white; border-radius: 8px; width:100%; padding:8px; background-color:#1877f2; font-size:1.2em;"></td></tr>
</tbody>
</table>
<input type="hidden" id="submit_pressed" name="submit_pressed" value="1"> <!-- check here -->
</form>
</div>

<br>
<div style="text-align:left;"><a href="http://school.website"><input type="button" name="signup" value="Sign up" style="color:white; border-radius: 8px; font-size:1.2em; padding:8px; background-color:#1877f2; "></a></div>
<div style="text-align:left;"><a href="http://school.website"><input type="button" name="register" value="Forgot password" style="color:white; border-radius: 8px; font-size:1.2em; padding:8px; background-color:#1877f2;"></a></div>
<br>

<div style="text-align:left;"><a href="http://school.website" style="text-decoration:none; color:darkblue;">Learn More</a></div>
<br>

</div> <!-- div right end -->
</div> <!-- div log_form end -->

<hr>
<div style="padding: 30px;">
<p style="color:teal; font-size:1.6em;">නිදසුන් සඳහා පහත බොත්තම ඔබන්න</p>
<!--
<div style="padding: 8px;"> <a class="bt" href="login.php?rid=1">Student view</a></div>
<div style="padding: 8px;"> <a class="bt" href="login.php?rid=2">Teacher view</a></div>
-->
<div style="padding: 8px;"> <a class="bt" href="login.php?rid=3">Sample view</a></div>
<!--
<div style="padding: 8px;"> <a class="bt" href="login.php?rid=4">Admin view</a></div>
-->
</div>

</div> <!-- end container -->
</div> <!-- background pad -->
<footer id="footer"></footer> <!-- footer -->
</div> <!-- center content -->


<script type='text/javascript'>
<?php
if ($user_id)
{
    echo preg_replace( "/\r|\n/", "", "view_header_logged('$school_name', '$name', '$user_type');");
}
else
{
    echo preg_replace( "/\r|\n/", "", "view_header('$school_name', '$name');");
}
?>

footer();
</script>
<script src="../tmpl/<?php echo "$theme"; ?>/js/navbar.js"></script>
</body>
</html>
