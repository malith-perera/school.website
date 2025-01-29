<!DOCTYPE html>
<html>
<head>
<title>පාඩම්</title>
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
<form action="attendence.php" method="post">
<div id="stu_sel" style="padding: 8px"></div>

<div id="scroll" class="scroll">

<div style="text-align:center; padding:8px; margin:8px; font-size:1.8em; color:teal;">ප්‍රශ්න පත්‍ර</div>

<div style="text-align:center; padding:8px; margin:8px;"><a href="paper.php" style="padding:8px;  font-size:1em; color:darkblue; background-color:skyblue; text-decoration:none;">ආදර්ශ ප්‍රශ්න පත්‍රය බලන්න</a></div>

<div style="text-align:center; padding:8px; margin:8px; font-size:1.8em; color:teal;">Video Lessons</div>

<div style="text-align:center;">

<iframe width="560" height="315" src="https://www.youtube.com/embed/uJEOL1V_5Yo?si=vfkcqWVKLQz4WwhU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

<iframe width="560" height="315" src="https://www.youtube.com/embed/lkedE_2aNu8?si=zEFAVJLcDI6XsxKg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

<iframe width="560" height="315" src="https://www.youtube.com/embed/9zUS6-Rlet8?si=fpexDKYg_232h0mD" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

<iframe width="560" height="315" src="https://www.youtube.com/embed/9a8z3EVKG-4?si=TuF0Npgmpb7O3yI7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

</div>
</div>

</form>

<div class="bottom_menu" id="bottom_menu"></div>

<script>
  View_Top_Menu("Lessons", "subject name");
  View_Student_Selection();
  View_Bottom_Menu();
  unloadScrollBars();
  Set_Height();
</script>
</body>
</html>
