<!DOCTYPE html>
<html>
<head>
<title>Marks</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="author" content="Malith Perera">
<link rel="icon" type="image/x-icon" href="img/logo32.png">
<link rel="stylesheet" href="../tmpl/<?php echo "$theme"; ?>/css/stylelog.css">
<script src="js/school.js"></script>
<script>
let marks = [];

function show_student_table_btn() {
  let table = document.getElementById("student_table");
  let i = students.length;
  row = table.insertRow(i + 1);
  cell1 = row.insertCell(0);
  cell2 = row.insertCell(1);
  cell3 = row.insertCell(2);
  cell4 = row.insertCell(3);
  cell4.style.textAlign = "center";
  cell4.innerHTML = "<input type='submit' value='Enter' style='font-size:1em; padding:4px; margin:4px;'>";     
}

function Show_Mark_Cells() {
  let table = document.getElementById("student_table");
  let align = ["center", "center", "left", "center"];

  for(let i = 0; i < students.length; i++) {
    table.rows[i + 1].cells[3].innerHTML = "<input type='text' maxlenght='3' name='" + students[i][0] + "' size='3'>";
    for(let j = 0; j < align.length; j++) {
      table.rows[i + 1].cells[j].style.textAlign = align[j];
    }
  }
}

function Clear_Students() {
  document.getElementById("stu_div").innerHTML = "";
}
</script>
</head>

<body onload="reload()" onresize="reload()">
<div id="top_menu"></div>
<div id="pbtn_div"></div>

<form action="student_marks.php" method="post">
<div id="stu_sel" style="padding: 8px"></div>

<div id="scroll" class="scroll">
<table id="student_table" style="width:100%">
<thead>
  <tr><th>No</th><th>Atd No</th><th>Name</th><th>Marks</th></tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</form>

<div class="bottom_menu" id="bottom_menu"></div>

<script>
  unloadScrollBars();
  View_Top_Menu("Marks", show_term());
  view_pbtn();
  View_Student_Selection();
  View_Bottom_Menu();
  Create_Table(students);
  Show_Mark_Cells();
  show_student_table_btn();
  Set_Height();
</script>
</body>
</html>
