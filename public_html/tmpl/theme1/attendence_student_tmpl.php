<!DOCTYPE html>
<html>
<head>
<title>Attendence</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="author" content="Malith Perera">
<link rel="icon" type="image/x-icon" href="img/logo32.png">
<link rel="stylesheet" href="../tmpl/<?php echo "$theme"; ?>/css/stylelog.css">
<script src="js/school.js"></script>
<script>
function reload() {
  Set_Height();
}

function Show_Attendence_Cells() {
  let table = document.getElementById("student_table");
  let align = ["center", "center", "left", "center"];

  for(let i = 0; i < students.length; i++) {
    table.rows[i + 1].cells[3].innerHTML = '<input type="checkbox" id="cb' + i + '" onclick="toggle_presence(' + i + ')" checked></input>';
    for(let j = 0; j < align.length; j++) {
      table.rows[i + 1].cells[j].style.textAlign = align[j];
    }
  }
}

function view_attendence_page() {
}


</script>
<style>
#foot {
    color: red;
    text-align: center;
}
</style>
</head>

<body onload="reload()" onresize="reload()">
<div id="top_menu"></div>
<div id="pbtn_div"></div>

<form action="attendence.php" method="post">
<div id="stu_sel" style="padding: 8px"></div>



<div id="scroll" class="scroll">
<table id="student_table" style="width:100%">
<thead>
  <tr><th>No</th><th>Atd No</th><th>Name</th><th id="presence" onclick="toggle_all()">Presence</th></tr>
</thead>
<tfoot>
  <tr id="foot"><td id="absent_no"></td><td id="absent_stu_no"></td><td id="absents" style="text-align:left"></td><td><input type="submit" value="Mark" style="padding:4px; margin:4px; font-size:1em;"></td></tr>
</tfoot>
<tbody>
</tbody>
</table>
</div>

</form>

<div class="bottom_menu" id="bottom_menu"></div>

<script>
  unloadScrollBars();
  View_Top_Menu("Attendence", show_date());
  view_pbtn();
  View_Student_Selection();
  View_Bottom_Menu();
  Create_Table(students);
  Show_Attendence_Cells();
  Set_Height();
</script>
</body>
</html>
