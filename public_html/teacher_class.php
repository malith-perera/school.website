<?php
session_start();

if ($_SESSION["username"] == null)
{
    header("Location: index.html");
}
?>
<!DOCTYPE html>
<html class="" lang="en-US">

<head>
<?php
    echo "<title>මහින්දෝදය " . $_SESSION["username"] ."</title>";
?>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<link rel="icon" href="images/logo.jpg">
<meta name=”viewport” content=”width=device-width, initial-scale=1″>
<meta name="KeyWords" content="hettipola, mahindodaya, maha, vidyalaya, school, sri lanka, kurunegala, north western province, wayamba">
<meta name="Description" content="හෙට්ටිපොල මහින්දෝදය මහා විද්‍යාලීය වෙබ් අඩවිය. ">
<meta name="author" content="Malith Perera">
<link rel="stylesheet" href="css/style.css" type="text/css"  media="screen, projection">
</head>

<body>

<div class="centercontent">

<div style="background-color: #99ccbb; width: 100%; height: 90px; border-radius: 0px 0px 16px 16px; clear: both;">
<?php
echo "<div style='text-align: right;'>පරිශීලක: " . $_SESSION["username"] . "<a href='logout.php'> ඉවත්වන්න </a>" . "</div>";
?>
<a class="menuanchor" href=""><div class="menubutton">විස්තර</div></a>
<a class="menuanchor" href=""><div class="menubutton">සබඳතා</div></a>
<a class="menuanchor" href=""><div class="menubutton">ඉතිහාසය</div></a>
<a class="menuanchor" href=""><div class="menubutton">මුල් පිටුව</div></a>
</div>

<hr class="blueline" style="clear:both;">

<hr class="blueline">
<h2>පන්තිභාර ගුරුවරු</h2>
<hr class="blueline">

<table style="width:100%">
<thead>
<tr>
<th>ශ්‍රේණිය</th>
<th>පන්තිය</th>
<th>ගුරු අංකය</th>
<th>ගුරුවරයාගේ නම</th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align:center">6</td>
<td style="text-align:center">A</td>
<td style="text-align:center"><input type="text" value="234"></td>
<td style="text-align:center">
<select>
    <option>සුධීර කරුණානායක</option>
</select>
</td>
</tr>
<tr>
</tr>

</tbody>
</table>

<hr class="blueline">
<hr class="blueline">

<div>&nbsp;</div>

<div class="centercontent footer" style="width: 100%; margin-top: 30px; border-radius: 8px 8px 0px 0px;">

<table class="centercontent" style="width: 100%; margin: 0px;">
<tbody>
<tr style="vertical-align:top">
<td class="footertext" style="text-align: center;">
<img src="images/logo.jpg" alt="logo" width="20%">
</td>
<td>
<div class="footercaption">වෙත යන්න</div>
<p style="color:white">මුල් පිටුව<br></p>
</td>
<td>
<div class="footercaption">ස්ථානය</div>
<p style="color:white">හෙට්ටිපොල</p>
</td>
<td>
<div class="footercaption">දුරකතන</div>
<p style="color:white">0372223332</p>
</td>
</tr>
</tbody>
</table>

<div style="background-color: black; color:#9f9f9f; width: 100%; text-align: center; padding-top: 8px; padding-bottom: 6px;">&copy; 2021</div>
</div>

</div> <!-- center content -->

</body>
</html>
