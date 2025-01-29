<!DOCTYPE html>
<head>
<title><?php echo $school_name ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name=”viewport” content=”width=device-width, initial-scale=1″>
<meta name="KeyWords" content="<?php echo $keywords; ?>, address, tele, phone, email, e-mail, whatsapp, contacts, දුරකතන, අංකය, වට්ස් ඇප්, ඊ, මේල්,, , ලිපිනය,">
<meta name="Description" content="<?php echo $school_name; ?> ලිපිනය, දුරකතන, අංකය, විද්‍යත් ලිපිනය, වට්ස් ඇප් අංකය, ආදී සබඳතා ">
<meta name="author" content="Malith Perera">
<link rel="icon" type="image/x-icon" href="img/logo32.png">
<link rel="stylesheet" href="../tmpl/<?php echo "$theme"; ?>/css/style.css" type="text/css" media="screen, projection">
<script src="../tmpl/<?php echo "$theme"; ?>/js/theme.js"></script>

<style>
td.contacts {padding:8px;}
td {padding: 8px;}
</style>
</head>

<body>
<header class="header" id="header"></header>

<div class="container"> <!-- center -->
<div class="back_pad"> <!-- background pad -->
<div id="container">

<div style="text-align:center; padding:0; margin:auto; display:flex; justify-content:center;">
<div>
<h2>සබැඳි</h2>
<table style="text-align:left;">
<tbody>
<tr style="vertical-align: top;"><td style="text-align:left">ලිපිනය</td><td> : </td><td><address style="text-align:left;">
මහින්දෝදය මහා විද්‍යාලය,<br>
හෙට්ටිපොල.
</address></td></tr>
<tr><td style="text-align:left">දුරකතන</td><td> : </td><td>037 </tr>
<tr><td>විද්‍යුත් ලිපිනය</td><td> : </td><td></td></tr>
<tr><td>වෙබ් පිටුව</td><td> : </td><td>www.my-school.website/mahindodaya-hettipola</td></tr>
</tbody>
</table>
</div>
</div>

<div style="height:2em">&nbsp;</div>

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
