<!DOCTYPE html>
<html class="" lang="en-US">

<head>
<title>සිසුන් ලියාපදිංචි කිරීම - <?php echo $school_name ?></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name=”viewport” content=”width=device-width, initial-scale=1″>
<link rel="icon" href="images/logo.png">
<meta name="KeyWords" content="hettipola, mahindodaya, maha, vidyalaya, school, sri lanka, kurunegala, north western province, wayamba">
<meta name="Description" content="හෙට්ටිපොල මහින්දෝදය මහා විද්‍යාලීය වෙබ් අඩවිය. ">
<meta name="author" content="Malith Perera">
<link rel="stylesheet" href="css/style.css" type="text/css"  media="screen, projection">
<link rel="stylesheet" href="css/pages.css" type="text/css"  media="screen, projection">
<link rel="stylesheet" href="css/menu.css" type="text/css"  media="screen, projection">
<script src="js/student.js"></script>
<script src="js/teacher.js"></script>
<script src="js/menu.js"></script>
<script src="js/maintain.js"></script>
<style>
#form_table table, td, th {
    padding:4px;
}
</style>
</head>

<body>
<span id="maintain"></span>
<span id="menu"></span> <!-- header -->

<div class="centercontent" style="background-color:#f2f0f5; height:100%;"> <!-- center -->
<div style="display:inline-block; width:100%; text-align:center"> <!-- background pad -->
<div id="container">

<div class='centercontent' style='text-align:center; padding:8px; width:100%;'> <!-- begin form -->

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table id='form_table' style='margin:0 auto;'><tbody>
<thead>
<tr>
<th style='font-size:1.2em;' colspan=2>ශිෂ්‍ය ලියාපදිංචිය</th>
<th></th>
</tr>
</thead>
<tr>
<td style='text-align:left'>ඇතුලත්වීමේ අංකය</td>
<td><input type='text' name='admission_no'></td>
<td><span class='login_err'><?php echo $admission_no_error;?></span></td>
</tr>
<tr>
<td style='text-align:left'>නම</td>
<td><input type='text' name='name' placeholder="නිර්මල තෙන්නකෝන්"></td>
<td><span class='login_err'><?php echo $name_error;?></span></td>
</tr>
<!--
<tr>
<td style='text-align:left'>සම්පූර්ණ නම</td>
<td><input type='text' name='full_name' placeholder="තෙන්නකෝන් මුදියන්සේලාගේ නිර්මල විමුත්ති තෙන්නකෝන්"></td>
<td><span class='login_err'><?php echo $full_name_error;?></span></td>
</tr>
<tr>
<td style='text-align:left;'>උපන් දිනය</td>
<td style='text-align:left;'>
<select>
<option>වර්ෂය</option>
<option value='2002'>2002</option>
<option value='2003'>2003</option>
<option value='2004'>2004</option>
<option value='2005'>2005</option>
<option value='2006'>2006</option>
<option value='2007'>2007</option>
<option value='2008'>2008</option>
<option value='2009'>2009</option>
<option value='2010'>2010</option>
<option value='2011'>2011</option>
<option value='2012'>2012</option>
<option value='2013'>2013</option>
</select>
<select>
<option>මාසය</option>
<option value='1'>ජනවාරි</option>
<option value='2'>පෙබරවාරි</option>
<option value='3'>මාර්තු</option>
<option value='4'>අප්‍රේල්</option>
<option value='5'>මැයි</option>
<option value='6'>ජූනි</option>
<option value='7'>ජූලි</option>
<option value='8'>අගෝස්තු</option>
<option value='9'>සැප්තැම්බර්</option>
<option value='10'>ඔක්තෝබර්</option>
<option value='11'>නොවැම්බර්</option>
<option value='12'>දෙසැම්බර්</option>
</select>
<select>
<option>දිනය</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='9'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select>
</td>
<td></td>
</tr>
<tr>
<td style='text-align:left'>ලිපිනය</td>
<td><input type='text' name='address'></td>
<td><span class='address_err'><?php echo $address_error;?></span></td>
</tr>
<tr>
<td style='text-align:left'>දුරකතන අංකය</td>
<td><input type='text' name='telephone'></td>
<td><span class='telephone_err'><?php echo $telephone_error;?></span></td>
</tr>
-->
<tr>
<td style='text-align:left'>ශ්‍රේණිය</td>
<td style='text-align:left'>
<select name='grade' id='grade'>
<option value=''>--තෝරන්න--</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='9'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
</select>
</td>
</tr>
<tr>
<td style='text-align:left'>පන්තිය</td>
<td style='text-align:left'>
<select name='class_name' id='class_name'>
  <option value=''>--තෝරන්න--</option>
  <option value='A'>A</option>
  <option value='B'>B</option>
  <option value='C'>C</option>
  <option value='D'>D</option>
  <option value='E'>E</option>
</select>
</td
</tr>
<!--
<tr>
<td style='text-align:left'>මුරපදය</td>
<td><input type='password' name='password'></td>
<td><span class='login_err'><?php echo $password_error;?></span></td>
</tr>
<tr>
<td style='text-align:left'>මුරපදය නැවතත්</td>
<td><input type='password' name='password_again'></td>
<td><span class='login_err'><?php echo $password_error;?></span></td>
</tr>
-->
<tr>
<td></td>
<td style='text-align:right'><input type='submit' name='login' value='ලියාපදිංචි වන්න'></td>
</tr>
</tbody></table>
<input  type="hidden" name="submit_pressed" value="1"> <!-- used to identify submit button pressed or not before save data -->
</form>
</div> <!-- end form -->

</div> <!-- end container -->

</div> <!-- background pad -->
<span id="footer"></span> <!-- footer -->
</div> <!-- center content -->

<script>
maintainance();
<?php echo preg_replace( "/\r|\n/", "", "header('$school_name');"); ?>
footer();
</script>

</body>
</html>
