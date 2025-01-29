<!DOCTYPE html>
<html>
<head>
<title>Average</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="author" content="Malith Perera">
<link rel="icon" type="image/x-icon" href="img/logo32.png">
<link rel="stylesheet" href="../tmpl/<?php echo "$theme"; ?>/css/stylelog.css">
<script src="js/school.js"></script>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 4px;
}

div.scroll {
overflow-x: auto;
overflow-y: auto;
}

</style>
</head>

<body>
<div id="top_menu"></div>
<div id="pbtn_div"></div>
<div id="stu_sel" style="padding: 8px"></div>

<div id="scroll" class="scroll" style="width:100%;">
<div>
<table style="width:100%">
<tbody>
<tr><td rowspan="3" colspan ="2" style="text-align:center;"><img src="img/user.png" alt="profile image" style="width:100px;"></td><td>ස්ථානය</td><td></td></tr>
<tr><td>මුළු ලකුණු</td><td></td></tr>
<tr><td>සාමාන්‍යය</td><td></td></tr>
<tr><td colspan="4">&nbsp;</td></tr>
  <tr>
  <th style="width:25%">විෂය</th>
  <th style="width:25%">ලකුණු</th>
  <th style="width:25%">පසුගිය වාරයේ ලකුණු</th>
  <th>වෙනස</th>
  <tr>
  <tr><td>සිංහල</td><td></td><td></td><td></td></tr>
  <tr><td>දෙමළ</td><td></td><td></td><td></td></tr>
  <tr><td>ඉංග්‍රීසි</td><td></td><td></td><td></td></tr>
  <tr><td>ආගම</td><td></td><td></td><td></td></tr>
  <tr><td>ගණිතය</td><td></td><td><td></td></td></tr>
  <tr><td>විද්‍යාව</td><td></td><td></td><td></td></tr>
  <tr><td>සෞඛ්‍යය</td><td></td><td></td><td></td></tr>
  <tr><td>ඉතිහාසය</th><td></td><td></td><td></td></tr>  
  <tr><td>පුරවැසි</th><td></td><td></td><td></td></tr>
  <tr><td>භූගෝල විද්‍යාව</td><td></td><td></td><td></td></tr>
  <tr><td>ප්‍රා.තා.කු.</td><td></td><td></td><td></td></tr>
  <tr><td>තො.තා</td><td></td><td></td><td></td></tr>
  <tr><td>සෞන්දර්ය</td><td></td><td></td><td></td></tr>
</tbody>
</table>
</div> <!-- end scroll -->

<div class="bottom_menu" id="bottom_menu"></div>

<script>
  unloadScrollBars();
  View_Top_Menu("ප්‍රතිඵල", show_term());
  view_pbtn();
  View_Student_Selection();
  View_Bottom_Menu();
  Set_Height();
</script>
</body>
</html>
