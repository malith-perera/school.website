<!DOCTYPE html>
<html class="" lang="en-US">

<head>
<title><?php echo $school_name ?></title>
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
<script src="js/teacher.js"></script>
<script src="js/menu.js"></script>
<script src="js/maintain.js"></script>
</head>

<body>
<span id="maintain"></span>
<span id="menu"></span> <!-- header -->

<div class="centercontent" style="background-color:#f2f0f5; height:100%;"> <!-- center -->
<div style="display:inline-block; width:100%; text-align:center"> <!-- background pad -->
<div id="container">

<div style="padding-top:30px;">
    <img src="images/banner.jpg" alt="banner" style="width:94%;">
</div>

<div style="width:30%; margin:0 auto; padding-top:35px;">
<img src="images/motto.png" alt="motto">
</div>

<div>
<p style="font-size:1.2em; padding:4px;"><?php echo $description; ?></p>
</div>

<p style="font-size:2em;">෴</p>
</div> <!-- end container -->

</div> <!-- background pad -->
<span id="footer"></span> <!-- footer -->
</div> <!-- center content -->

<script type='text/javascript'>
maintainance();
<?php echo preg_replace( "/\r|\n/", "", "header('$school_name');"); ?>
footer();
</script>

</body>
</html>
