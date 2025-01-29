<!DOCTYPE html>
<html>
<head>
<title>Messages</title>
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
<div id="scroll" class="scroll">
<div style="text-align:center;">
<table style="width: 80%; margin:auto;">
<tbody>
<tr><td><label for="msg">To: </label></td><td><input id="msg" type="text" style="height: 2em; width: 100%"></td></tr>
<tr><td><label for="msg">Message: </label></td><td><textarea style="width: 100%; height: 30em;"></textarea></td></tr>
<tr><td></td><td style=" text-align:right;"><input type="submit" value="Send" style="font-size:1em; padding: 4px;"></td></tr>
</tbody>
</table>
</div>
</div>

</form>

<div class="bottom_menu" id="bottom_menu"></div>

<script>
  View_Top_Menu("Messages", "user name");
  View_Bottom_Menu();
  unloadScrollBars();
  Set_Height();
</script>
</body>
</html>
