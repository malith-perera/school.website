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

.dash {
text-align:center;
}

.time {
text-align:right;
}

</style>
</head>

<body>
<div id="top_menu"></div>
<div id="pbtn_div"></div>
<div id="stu_sel" style="padding: 8px"></div>

<div id="scroll" class="scroll" style="width:100%;">
<table id="average_table" style="width:100%;">
<tbody id="timetable"></tbody>
</table>
</div> <!-- end scroll -->

<div class="bottom_menu" id="bottom_menu"></div>


<script>
  unloadScrollBars();
  View_Top_Menu("කාල සටහන", "ශ්‍රේණිය  - 8 පන්තිය - C");
  view_pbtn();
  View_Student_Grade_Selection();
  View_Bottom_Menu();
  Set_Height();
  create_timetable();
  set_table_times();
</script>
</body>
</html>
