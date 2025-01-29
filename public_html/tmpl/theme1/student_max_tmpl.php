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

.mark {
text-align:center;
}
</style>
</head>

<body>
<div id="top_menu"></div>
<div id="pbtn_div"></div>
<div id="stu_sel" style="padding: 8px"></div>

<div id="scroll" class="scroll" style="width:100%;">
<table id="average_table" style="width:100%;">
<tbody>
  <tr>
  <th>විෂය</th>
  <th>නම</th>
  <th>පන්තිය</th>
  <th>ලකුණු</th>
  </tr>
  <tr><td>ගණිතය</td><td>දිනිති හිමාෂී</td><td class="mark">C</td><td class="mark">94</td></tr>
  <tr><td>ඉංග්‍රීසි</td><td>සිතුම් උදාර</td><td class="mark">B</td><td class="mark">92</td></tr>
  <tr><td>ආගම</td><td>වියානි පෙරේරා</td><td class="mark">A</td><td class="mark">89</td></tr>
  <tr><td>විද්‍යාව</td><td>ධනුක සිතුමිණ</td><td class="mark">E</td><td class="mark">88</td></tr>
  <tr><td>සිංහල</td><td>විහඟ රසිත්</td><td class="mark">D</td><td class="mark">88</td></tr>
</tbody>
</table>
</div> <!-- end scroll -->

<div class="bottom_menu" id="bottom_menu"></div>

<script>
  unloadScrollBars();
  View_Top_Menu("Student Max", show_term());
  view_pbtn();
  View_Student_Selection();
  View_Bottom_Menu();
  Set_Height();
</script>
</body>
</html>
