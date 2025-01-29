<!DOCTYPE html>
<html>
<head>
<title><?php echo $school_name ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="KeyWords" content="<?php echo $keywords; ?>">
<meta name="Description" content="<?php echo $description; ?>">
<meta property="og:title" content="මහින්දෝදය මහා විද්‍යාලය හෙට්ටිපොල" />
<meta property="og:url" content="https://my-school.website/mahindodaya-hettipola/" />
<meta property="og:description" content="<?php echo $description; ?>" />
<meta property="og:image" content="https://my-school.website/mahindodaya-hettipola/img/webimage.png" />
<meta property="og:type" content="website" />
<meta name="author" content="Malith Perera">
<link rel="icon" type="image/x-icon" href="img/logo32.png">
<link rel="stylesheet" href="../tmpl/<?php echo "$theme"; ?>/css/style.css" type="text/css" media="screen, projection">
<script src="../tmpl/<?php echo "$theme"; ?>/js/theme.js"></script>
<style>
/* announcements and createions viewer */
.viewer {
  display: grid;
  grid-template-columns:50% 50%;
}

.viewbox {
  background-color:steelblue;
  margin:20px;
  border-radius:8px;
}

.viewtitle {
  color:white;
  font-size:1.2em;
  padding: .5em;
}

.viewcontent {
  height: 200px;
  background-color:snow;
}

.viewtrack {
  width:100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* profile logo */
#profile_logo {
  max-width:90px;
  width:100%;
  height:auto;
}

@media screen and (max-width: 768px) {
.viewer {
  display:block;
  text-align:center;
}

.viewbox {
  display:block;
}

#profile_logo {
  max-width:80px;
  width:100%;
  height:auto;
}
}
</style>

</head>
<body>
<header class="header" id="header" style=""></header>

<div class="container" style=""> <!-- center -->
<div class="back_pad"> <!-- back_pad -->

<!-- banner and logo -->
<div style="position:relative; background-color:#dfdfdf; z-index:0;">
<img src="img/banner.jpg" alt="banner" style="width:100%;"> <!-- banner -->
<div style="position:absolute; left:4px; bottom:-20px; z-index:2; padding:4px; background-color:snow; border-radius:4px; box-shadow:4px 4px 4px grey; border-style: outset;"> <!-- logo -->
<img src="img/logo.png" alt="logo" id="profile_logo">
</div>
</div>

<!-- motto -->
<div style="width:100%; margin:0 auto; padding-top:30px;">
<img src="img/motto.png" alt="motto" style="max-width:52%; height:auto;">
</div>

<!-- description -->
<div>
<p style="font-size:1.2em; padding:4px;"><?php echo $description; ?></p>
</div>
<p style="font-size:2em;">෴</p>

<!-- announcements and creations viewers -->
<div id="viewer" class="viewer">
<div class="viewbox">
<div class="viewtitle">නිවේදන</div>
<div class="viewcontent"></div>
<div class="viewtrack">
<div style="padding:8px;"><img src="../tmpl/theme1/img/dot8.png" style="width:8px; height:8px;"></div>
<div style="padding:8px;"><img src="../tmpl/theme1/img/dot8.png" style="width:8px; height:8px;"></div>
<div style="padding:8px;"><img src="../tmpl/theme1/img/dott8.png" style="width:8px; height:8px;"></div>
<div style="padding:8px;"><img src="../tmpl/theme1/img/dot8.png" style="width:8px; height:8px;"></div>
<div style="padding:8px;"><img src="../tmpl/theme1/img/dot8.png" style="width:8px; height:8px;"></div>
</div>
</div>

<div class="viewbox">
<div class="viewtitle">නිර්මාණ</div>
<div class="viewcontent"></div>
<div class="viewtrack">
<div style="padding:8px;"><img src="../tmpl/theme1/img/dot8.png" style="width:8px; height:8px;"></div>
<div style="padding:8px;"><img src="../tmpl/theme1/img/dot8.png" style="width:8px; height:8px;"></div>
<div style="padding:8px;"><img src="../tmpl/theme1/img/dott8.png" style="width:8px; height:8px;"></div>
<div style="padding:8px;"><img src="../tmpl/theme1/img/dot8.png" style="width:8px; height:8px;"></div>
<div style="padding:8px;"><img src="../tmpl/theme1/img/dot8.png" style="width:8px; height:8px;"></div>
</div>
</div>
</div> <!-- end viewer -->

</div> <!-- back_pad -->
<footer id="footer"></footer> <!-- footer -->
</div> <!-- container -->

<script type='text/javascript'>
<?php
if ($user_id) {
  echo preg_replace( "/\r|\n/", "", "view_header_logged('$school_name', '$name', '$user_type');");
}
else {
  echo preg_replace( "/\r|\n/", "", "view_header('$school_name', '$name');");
}
?>
footer();
</script>
<script src="../tmpl/<?php echo "$theme"; ?>/js/navbar.js"></script>
</body>
</html>
