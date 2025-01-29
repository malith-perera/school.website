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
      <tr><td><label for="caddr">විදුහලට පැමිණෙන ලිපිනය</label></td><td><input type="text" name="caddr"></td></tr>
      <tr><td><label for="far">විදුහලට ඇති දුර ප්‍රමාණය</label></td><td><input type="text" name="far"></td></tr>
      <tr><td><label for="come">විදුහලට පැමිණෙන ක්‍රමය</label></td><td><select name="come"><option></option><option>Walk</option><option>Bus</option><option>Bicycle</option></select></td></tr>
      <tr><td>පෞද්ගලික වාහන තිබේ නම්</td><td>
        <table>
          <tbody>
            <tr><td><label for="byk">මෝටර් සයිකලය</label></td><td><input type="checkbox" name="byk"></td>
                <td><label for="van">වෑන් රථය</label></td><td><input type="checkbox" name="van"></td>
                <td><label for="trk">ට්‍රැක්ටරය</label></td><td><input type="checkbox" name="trk"></td> </tr>
            <tr><td><label for="twh">ත්‍රීරෝද රථය</label></td><td><input type="checkbox" name="twh"></td>
                <td><label for="lorry">ලොරිය</label></td><td><input type="checkbox" name="lorry"></td>
                <td><label for="htrk">අත් ට්‍රැක්ටරය</label></td><td><input type="checkbox" name="htrk"></td> </tr>
            <tr><td><label for="car">මෝටර් රථය</label></td><td><input type="checkbox" name="car"></td>
                <td><label for="bus">බසය</label></td><td><input type="checkbox" name="bus"></td></tr>
          </tbody>
        </table>
      </td></tr>
      <tr><td><label for="pvn">පෞද්ගලික වාහනවල මාර්ග අංක</label></td><td><input type="text" name="pvn"></td></tr>
      <tr><td><label for="prn">පොදු වාහන වලින් පැමිණෙන්නේ නම් මාර්ග අංකය</label></td><td><input type="text" name="prn"></td></tr>
      <tr><td><label for="start">ගමන් ආරම්භ කරන ස්ථානය</label></td><td><input type="text" name="start"></td></tr>
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
