<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="author" content="Malith Perera">
<link rel="icon" type="image/x-icon" href="img/logo32.png">
<link rel="stylesheet" href="../tmpl/<?php echo "$theme"; ?>/css/stylelog.css">
<script src="js/school.js">
</script>
<style>
td { padding: 6px; }
input[type=text] {width: 98%;}
#top_menu {
  display:flex;
  justify-content: space-between;
  align-items: center;
  padding: 8px;
}
</style>
</head>

<body onload="reload()" onresize="reload()">
<div id="top_menu"></div>

<div id="prf_img_div" style="border:1px solid gray; border-radius:4px; margin:4px; padding:4px;"><img src="img/user.png" alt="profile image" style="width:128px;"></div>
<div id="pbtn_div"></div>
<form action="attendence.php" method="post">

<div id="scroll" class="scroll">
  <table style="width:100%">
    <tbody>
      <tr><td><label for="father">පියාගේ නම</label></td><td><input type="text" name="father"></td></tr>
      <tr><td><label for="fjob">රැකියාව</label></td><td><input type="text" name="fjob"></td></tr>
      <tr><td>&nbsp;</td><td></td></tr>
      <tr><td><label for="mother">මවගේ නම</label></td><td><input type="text" name="mother"></td></tr>
      <tr><td><label for="mjob">රැකියාව</label></td><td><input type="text" name="mjob"></td></tr>
      <tr><td>&nbsp;</td><td></td></tr>
      <tr><td>මව පියා නොමැති නම්</td><td></td></tr>
      <tr><td><label for="gard">භාරකරුගේ නම</label></td><td><input type="text" name="gard"></td></tr>
      <tr><td><label for="rel">ශිෂ්‍යයාට ඇති නෑදෑ සම්බන්ධතාව</label></td><td><input type="text" name="rel"></td></tr>      
      <tr><td><label for="gjob">රැකියාව</label></td><td><input type="text" name="gjob"></td></tr>
    </tbody>
  </table>
</div>

</form>

<div class="bottom_menu" id="bottom_menu"></div>

<script>
View_Top_Menu("Profile", "student name");
View_Bottom_Menu();
unloadScrollBars();
view_profile_btns();
</script>
</body>
</html>
