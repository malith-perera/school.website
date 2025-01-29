<!DOCTYPE html>
<head>
<title><?php echo $school_name ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="KeyWords" content="<?php echo $keywords; ?>, about">
<meta name="Description" content="<?php echo $school_name; ?> පිළිබඳ විස්තර">
<meta name="author" content="Malith Perera">
<link rel="icon" type="image/x-icon" href="img/logo32.png">
<link rel="stylesheet" href="../tmpl/<?php echo "$theme"; ?>/css/style.css" type="text/css" media="screen, projection">
<script src="../tmpl/<?php echo "$theme"; ?>/js/theme.js"></script>
</head>

<body>
<header class="header" id="header"></header>

<div class="container"> <!-- container -->
<div class="back_pad"> <!-- backg_pad -->

<h2><?php echo $school_name; ?></h2>
<?php
if($motto == "") {
    echo "<img src='img/motto.png' style='height:1.8em;'>";
}
else {
    echo "<h2>" . $motto . "</h2>";
}
?>
<div class="scroll"> <!--scroll -->
<div style="text-align:left; padding:1em;"><h2>දැක්ම</h2></div>
<div style="text-align:left; padding:1em;"><?php echo $vision; ?></div>
<div style="text-align:left; padding:1em;"><h2>මෙහෙවර</h2></div>
<div style="text-align:left; padding:1em;"><?php echo $mission; ?></div>
<div style="text-align:left; padding:1em;"><h2>පාසල් ගීතය</h2></div>
<div style="text-align:left; padding:1em;"><?php echo $anthem; ?></div>
<div style="text-align:left; padding:1em;"><h2>ඇදුරු මඩුල්ල</h2></div>
<div style="text-align:left; padding:1em;">විදුහල්පති</div>
<div style="text-align:left; padding:1em;">ගුරුවරු</div>
<div style="text-align:left; padding:1em;"><h2>පාසල් ඉතිහාසය</h2></div>
<div style="text-align:left; padding:1em;"><?php echo $history; ?></div>
</div>

</div> <!-- back_ pad -->
<footer id="footer"></footer> <!-- footer -->
</div> <!-- container -->

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

<script src="../tmpl/<?php echo $theme ?>/js/navbar.js"></script>;

</body>
</html>
