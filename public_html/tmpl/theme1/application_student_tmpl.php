<!DOCTYPE html>
<head>
<title>සිසුන් ලියාපදිංචි කිරීම - <?php echo $school_name ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="KeyWords" content="<?php echo $keywords; ?>, application, අයදුම්පත">
<meta name="Description" content="<?php echo $school_name; ?> සඳහා අයදුම්පත">
<meta name="author" content="Malith Perera">
<link rel="icon" type="image/x-icon" href="img/logo32.png">
<link rel="stylesheet" href="../tmpl/<?php echo "$theme"; ?>/css/style.css" type="text/css" media="screen, projection">
<script src="../tmpl/<?php echo "$theme"; ?>/js/theme.js"></script>
<style>
#form_table table, td, th {
    padding:4px;
}
</style>
</head>

<body>
<header class="header" id="header"></header>

<div class="container"> <!-- container -->
<div class="back_pad"> <!-- back_pad -->

<div class='form_div' style='text-align:center; padding:8px; width:100%;'> <!-- begin form -->

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table id='form_table' style='margin:0 auto;'><tbody>
<thead>
<tr>
<th style='font-size:1.2em;' colspan=2>ශිෂ්‍ය අයදුම්පත</th>
<th></th>
</tr>
</thead>
<tr>
<td style='text-align:left'>නම</td>
<td><input type='text' name='name'></td>
<td><span class='login_err'><?php echo $name_error;?></span></td>
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
<tr>
<td style='text-align:left'>ශ්‍රේණිය</td>
<td style='text-align:left'>
<select name='grade' id='grade' style='width:100%; padding:4px;'>
<option value=''></option>
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
</select>
</td>
</tr>
<tr>
<td></td>
<td style='text-align:right'><input type='submit' name='login' value='අයදුම් කරන්න' style='width:8em; height:3em;'></td>
</tr>
</tbody></table>
<input  type="hidden" name="submit_pressed" value="1"> <!-- used to identify submit button pressed or not before save data -->
</form>
</div> <!-- end form -->

</div> <!-- back_pad -->
<footer id="footer"></footer> <!-- footer -->
</div> <!-- container -->

<script>
<?php
if ($user_id)
{
    echo preg_replace( "/\r|\n/", "", "view_header_logged('$school_name', '$name', '$user_type');");
}
else
{
    echo preg_replace( "/\r|\n/", "", "view_header('$school_name', '$name');");
}
?>
footer();
</script>
<script src="../tmpl/<?php echo "$theme"; ?>/js/navbar.js"></script>
</body>
</html>
