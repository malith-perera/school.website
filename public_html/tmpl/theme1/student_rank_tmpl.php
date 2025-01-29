<!DOCTYPE html>
<html>
<head>
<title>Rank</title>
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

.star {
  width:32px;
  height:32px;
}

.sstar {
  width:24px;
  height:24px;
}

.sstar_div {
text-align:center;
}

.attr_val {
text-align:center;
}
</style>

<script>
function view_stars(attr_id, star) {
  let star_html = "";

  let star_count = 0;

  for(let s_count = 0; s_count < parseInt(star); s_count++) {
    star_html += '<img src="../tmpl/<?php echo "$theme" ?>/img/star.png" alt="star" class="sstar" />';
    star_count++;
  }
  
if(star_count < 5) {
  let st = 0;
  if (star_count == 0) {
      st = parseInt(star * 10);
  }
  else {
      st = parseInt(star * 10) % (10 * star_count);
  }

  if (st >= 9) {
    star_html += '<img src="../tmpl/<?php echo "$theme" ?>/img/star9.png" alt="star" class="sstar" />';
  }
  else if (st >= 8) {
    star_html += '<img src="../tmpl/<?php echo "$theme" ?>/img/star8.png" alt="star" class="sstar" />';
  }
  else if (st >= 7) {
    star_html += '<img src="../tmpl/<?php echo "$theme" ?>/img/star7.png" alt="star" class="sstar" />';
  }
  else if (st >= 6) {
    star_html += '<img src="../tmpl/<?php echo "$theme" ?>/img/star6.png" alt="star" class="sstar" />';
  }
  else if (st >= 5) {
    star_html += '<img src="../tmpl/<?php echo "$theme" ?>/img/star5.png" alt="star" class="sstar" />';
  }
  else if (st >= 4) {
    star_html += '<img src="../tmpl/<?php echo "$theme" ?>/img/star4.png" alt="star" class="sstar" />';
  }
  else if (st >= 3) {
    star_html += '<img src="../tmpl/<?php echo "$theme" ?>/img/star3.png" alt="star" class="sstar" />';
  }
  else if (st >= 2) {
    star_html += '<img src="../tmpl/<?php echo "$theme" ?>/img/star2.png" alt="star" class="sstar" />';
  }
  else if (st >= 1) {
    star_html += '<img src="../tmpl/<?php echo "$theme" ?>/img/star1.png" alt="star" class="sstar" />';
  }
  else {
    star_html += '<img src="../tmpl/<?php echo "$theme" ?>/img/star0.png" alt="star" class="sstar" />';
  }

  star_count = star_count + 1;

  for(; star_count < 5; star_count++) {
    star_html += '<img src="../tmpl/<?php echo "$theme" ?>/img/star0.png" alt="star" class="sstar" />';
  }
}
  
  document.getElementById(attr_id).innerHTML = star_html;
  document.getElementById(attr_id + "_val").innerHTML = star;
}

function view_rank(edu, aten, resp, pres, act, phy, disp, attr, soc, mang) {
  let total_stars = edu + aten + resp + pres + act + phy + disp + attr + soc + mang;
  let rank = 0;

  view_stars("attr_edu", edu);
  view_stars("attr_aten", aten);
  view_stars("attr_resp", resp);
  view_stars("attr_pres", pres);
  view_stars("attr_act", act);
  view_stars("attr_phy", phy);
  view_stars("attr_disp", disp);
  view_stars("attr_attr", attr);
  view_stars("attr_soc", soc);
  view_stars("attr_mang", mang);
  view_stars("total_stars", total_stars/10);

  let remaining_stars = 50 - total_stars;

  if(total_stars == 50) {
      rank = 1;
  }
  else {
      rank = parseInt((remaining_stars - 1)/5) + 1;
  }

  document.getElementById("rank").innerHTML = rank;
  document.getElementById("stars").innerHTML = parseInt(total_stars) + "/50";
}

</script>
</head>

<body>
<div id="top_menu"></div>
<div id="pbtn_div"></div>
<div id="stu_sel" style="padding: 8px"></div>

<div id="scroll" class="scroll" style="width:100%;">
<div>
<table style="width:100%">
<tbody>
<tr><td rowspan="3" style="text-align:center; width:50%;"><img src="img/user.png" alt="profile image" style="width:100px;"></td><td>Rank</td><td style="text-align:center" id="rank"></td></tr>
<tr><td>Stars</td><td id="stars" style="text-align:center;"></td></tr>
<tr><td style="text-align:center" id="total_stars"></td><td style="text-align:center" id="total_stars_val"></tr>
<tr><td colspan="3">&nbsp;</td></tr>
  <tr><td style="width:50%;">ඉගෙනීම</td><td id="attr_edu" class="sstar_div"></td><td id="attr_edu_val" class="attr_val"></td></tr>
  <tr><td>පැමිණීම</td><td id="attr_aten" class="sstar_div"></td><td id="attr_aten_val" class="attr_val"></td></tr>
  <tr><td>වගකීමෙන් වැඩ කිරීම</td><td id="attr_resp" class="sstar_div"></td><td id="attr_resp_val" class="attr_val"></td></tr>
  <tr><td>ඉදිරිපත්වීම</td><td id="attr_pres" class="sstar_div"></td><td id="attr_pres_val" class="attr_val"></td></tr>
  <tr><td>ක්‍රියාශීලී බව</td><td id="attr_act" class="sstar_div"></td><td id="attr_act_val" class="attr_val"></td></tr>
  <tr><td>ශාරීරික සුවතාව</td><td id="attr_phy" class="sstar_div"></td><td id="attr_phy_val" class="attr_val"></td></tr>
  <tr><td>විනය හා හැසිරීම</td><td id="attr_disp" class="sstar_div"></td><td id="attr_disp_val" class="attr_val"></td></tr>
  <tr><td>හොඳ ගති ගුණ</th><td id="attr_attr" class="sstar_div"></td><td id="attr_attr_val" class="attr_val"></td></tr>  
  <tr><td>සමිති, සමාගම් හා සමාජ කටයුතු</th><td id="attr_soc" class="sstar_div"></td><td id="attr_soc_val" class="attr_val"></td></tr>
  <tr><td>පිරිසිදුකම හා පිළිවෙල</td><td id="attr_mang" class="sstar_div"></td><td id="attr_mang_val" class="attr_val"></td></tr>
</tbody>
</table>
</div> <!-- end scroll -->

<div class="bottom_menu" id="bottom_menu"></div>

<script>
  unloadScrollBars();
  View_Top_Menu("Rank", show_term());
  view_pbtn();
  View_Student_Selection();
  View_Bottom_Menu();
  Set_Height();
  
  view_rank(5, 4.8, 4.5, 4.3, 3.6, 2.3, 1.8, 1.2, .4, .2);

/*
 */
</script>
</body>
</html>
