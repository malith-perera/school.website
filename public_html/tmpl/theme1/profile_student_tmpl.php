<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="author" content="Malith Perera">
<link rel="icon" type="image/x-icon" href="img/logo32.png">
<link rel="stylesheet" href="../tmpl/<?php echo "$theme"; ?>/css/stylelog.css">
<script src="js/school.js"></script>
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
      <tr><td><label for="flname">සම්පූර්ණ නම</label></td><td><input type="text" name="flname"></td></tr>
      <tr><td><label for="init">මුලකුරු සමග නම</label></td><td><input type="text" name="init"></td></tr>
      <tr><td><label for="bday">උපන් දිනය</label></td><td><input type="date" name="bday"></td></tr>
      <tr><td><label for="atno">ඇතුලත්වීමේ අංකය</label></td><td><input type="text" name="atno"></td></tr>
      <tr><td><label for="idno">ශිෂ්‍ය අනන්‍යතා අංකය</label></td><td><input type="text" name="idno"></td></tr>
      <tr><td><label for="atdate">පාසලට ඇතුලත්වූ දිනය</label></td><td><input type="date" name="atdate"></td></tr>
      <tr><td><label for="atgrade">ඇතුලත් වූ ශ්‍රේණිය</label></td><td><select id="atnd_grade_opt"></select></td></tr>
      <tr><td><label for="atgrade">ඉගෙනුම ලබන ශ්‍රේණිය</label></td><td><select id="grade_opt"></select> <select id="class_opt"></select</td></tr>
      <tr><td><label for="smark">ශිෂ්‍යත්ව විභාගයට ලබාගත් ලකුණු</label></td><td><input type="text" name="smark"></td></tr>
      <tr><td><label for="house">නිවාසය</label></td><td><select id="house"></select></td></tr>
      <tr><td><label for="adr">පෞද්ගලික ලිපිනය</label></td><td><input type="text" name="adr"></td></tr>
      <tr><td><label for="wapp">වට්ස්ඇප් අංකය</label></td><td><input type="text" name="wapp"></td></tr>
      <tr><td><label for="sinfo">දරුවා පිළිබඳව දැන්විය යුතු විශේෂ තොරතුරු <br>(කායික, මානසික සෞඛ්‍යය තත්වය)</label></td><td><textarea type="textarea" style="height:20em; width:98%" name="sinfo"></textarea></td></tr>
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
show_grades("atnd_grade_opt");
show_grades("grade_opt");
show_clases("class_opt");
show_houses("house");
</script>
</body>
</html>
