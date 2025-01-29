<!DOCTYPE html>
<html>
<head>
<title>contacts</title>
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
      <tr><td><label for="adr">පෞද්ගලික ලිපිනය</label></td><td><input type="text" name="adr"></td></tr>
      <tr><td><label for="wapp">වට්ස්ඇප් අංකය</label></td><td><input type="text" name="wapp"></td></tr>
      <tr><td>&nbsp;</td><td></td></tr>
      <tr><td><label for="father">පියාගේ නම</label></td><td><input type="text" name="father"></td></tr>
      <tr><td><label for="fadr">ලිපිනය</label></td><td><input type="text" name="fadr"></td></tr>
      <tr><td><label for="ftel">දුරකතන අංකය</label></td><td><input type="text" name="ftel"></td></tr>
      <tr><td>&nbsp;</td><td></td></tr>
      <tr><td><label for="mother">මවගේ නම</label></td><td><input type="text" name="mother"></td></tr>
      <tr><td><label for="madr">ලිපිනය</label></td><td><input type="text" name="madr"></td></tr>
      <tr><td><label for="mtel">දුරකතන අංකය</label></td><td><input type="text" name="mtel"></td></tr>
      <tr><td>&nbsp;</td><td></td></tr>
      <tr><td><label for="gard">භාරකරුගේ නම</label></td><td><input type="text" name="gard"></td></tr>
      <tr><td><label for="gadr">ලිපිනය</label></td><td><input type="text" name="gadr"></td></tr>
      <tr><td><label for="gtel">දුරකතන අංකය</label></td><td><input type="text" name="gtel"></td></tr>
      <tr><td><label for="rel">ශිෂ්‍යයාට ඇති නෑදෑ සම්බන්ධතාව</label></td><td><input type="text" name="rel"></td></tr>
      <tr><td>&nbsp;</td><td></td></tr>
      <tr><td>මෙම විදුහලේ ඉගෙනුම ලබන  සහෝදර සහෝදරියන් සිටී නම්</td><td></td></tr>
      <tr><td><label for="s1name">නම</label></td><td><input type="text" name="s1name"></td></tr>
      <tr><td><label for="s1grade">ඉගෙනුම ලබන  ශ්‍රේණිය</label></td><td><input type="text" name="s1grade"></td></tr>
      <tr><td>&nbsp;</td><td></td></tr>
      <tr><td>හදිස්සියක දී දැනුම්දිය යුතු</td><td></td></tr>
      <tr><td><label for="imcontname">නම</label></td><td><input type="text" name="imcontname"></td></tr>
      <tr><td><label for="imcontadr">ලිපිනය</label></td><td><input type="text" name="imcontadr"></td></tr>
      <tr><td><label for="imcontno">දුරකතන අංකය</label></td><td><input type="text" name="imcontno"></td></tr>
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
