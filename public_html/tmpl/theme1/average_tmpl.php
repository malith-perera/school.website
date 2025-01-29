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
<table id="average_table" style="width:100%;">
<tbody>
  <tr>
  <th>පන්තිය</th>
  <th>විෂය</th>
  <th>ගුරුවරයා</th>
  <th>සාමාන්‍යය</th>
  <th colspan="2">A</th>
  <th colspan="2">B</th>
  <th colspan="2">C</th>
  <th colspan="2">S</th>
  <th colspan="2">W</th>
  </tr>
  <tr><td>A</td><td>ගණිතය</td><td>ධම්මික සේනාධීර</td><td>72.5%</td><td>16</td><td>55.5%</td><td>12</td><td>34.3%</td><td>4</td><td>11.4%</td><td>2</td><td>5.7%</td><td>1</td><td>2.9%</td></tr>
  <tr><td>B</td><td>ගණිතය</td><td>ධම්මික සේනාධීර</td><td>72.5%</td><td>16</td><td>55.5%</td><td>12</td><td>34.3%</td><td>4</td><td>11.4%</td><td>2</td><td>5.7%</td><td>1</td><td>2.9%</td></tr>
  <tr><td>C</td><td>ගණිතය</td><td>ධම්මික සේනාධීර</td><td>72.5%</td><td>16</td><td>55.5%</td><td>12</td><td>34.3%</td><td>4</td><td>11.4%</td><td>2</td><td>5.7%</td><td>1</td><td>2.9%</td></tr>
  <tr><td>D</td><td>ගණිතය</td><td>ධම්මික සේනාධීර</td><td>72.5%</td><td>16</td><td>55.5%</td><td>12</td><td>34.3%</td><td>4</td><td>11.4%</td><td>2</td><td>5.7%</td><td>1</td><td>2.9%</td></tr>
  <tr><td>E</td><td>ගණිතය</td><td>ධම්මික සේනාධීර</td><td>72.5%</td><td>16</td><td>55.5%</td><td>12</td><td>34.3%</td><td>4</td><td>11.4%</td><td>2</td><td>5.7%</td><td>1</td><td>2.9%</td></tr>
</tbody>
</table>
</div> <!-- end scroll -->

<div class="bottom_menu" id="bottom_menu"></div>

<script>
  unloadScrollBars();
  View_Top_Menu("ප්‍රතිඵල විශ්ලේෂණය", show_term());
  view_pbtn();
  View_Student_Selection();
  View_Bottom_Menu();
  Set_Height();
</script>
</body>
</html>
