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
.cb {
text-align:center;
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
      <tr><th>විෂය</th><th>තෝරන්න</th></tr>
      <tr><td>ආගම</td><td class="cb"><input id="rel" name="rel" type="checkbox" /></td></tr>
      <tr><td>ගණිතය</td><td class="cb"><input id="rel" name="mat" type="checkbox" /></td></tr>
      <tr><td>සිංහල</td><td class="cb"><input id="rel" name="sin" type="checkbox" /></td></tr>
      <tr><td>විද්‍යාව</td><td class="cb"><input id="rel" name="sci" type="checkbox" /></td></tr>
      <tr><td>සෞඛ්‍යය</td><td class="cb"><input id="rel" name="sin" type="checkbox" /></td></tr>
      <tr><td>දෙමළ</td><td class="cb"><input id="rel" name="sin" type="checkbox" /></td></tr>
      <tr><td>ඉග්‍රීසි</td><td class="cb"><input id="rel" name="sin" type="checkbox" /></td></tr>
      <tr><td>පුරවැසි</td><td class="cb"><input id="rel" name="sin" type="checkbox" /></td></tr>
      <tr><td>භූගෝල විද්‍යාව</td><td class="cb"><input id="rel" name="sin" type="checkbox" /></td></tr>
      <tr><td>තො.තා.</td><td class="cb"><input id="rel" name="sin" type="checkbox" /></td></tr>
      <tr><td>ප්‍රා.තා.කු.</td><td class="cb"><input id="rel" name="sin" type="checkbox" /></td></tr>
      <tr><td>ඉතිහාසය</td><td class="cb"><input id="rel" name="sin" type="checkbox" /></td></tr>
      <tr><td></td><td class="cb"><input id="rel" name="sin" type="button" value="Assign"/></td></tr>
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
