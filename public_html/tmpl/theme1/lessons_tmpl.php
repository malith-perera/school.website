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

<style>
#foot {
    color: red;
    text-align: center;
}

#div1, #div2 {
  border:1px solid steelblue;
  display: block;
  border-radius:6px;
  text-align:center;
  margin-bottom:16px;
}

#div1 > .divbox {
  border:1px solid steelblue;
  border-radius:4px;
  display:block;
  padding:4px;
  display:block;
  margin:8px;
  display: grid;
  grid-template-columns: 33% 33% 33%;
  margin-bottom:20px;
}

#div2 > .divbox {
  border:1px solid steelblue;
  border-radius:12px;
  margin:4px;
  padding: 4px;
  display:inline-block;
}

#div1 .divbox > .grade {
  font-size:1.2em;
  color:orange;
  float:left;
}

#div2 .divbox > .grade {
  font-size:1.2em;
  color:orange;
  padding:2px;
}

#div1 .divbox > .subj {
  font-size:1.2em;
  color:green;
  float:left;
}

#div2 .divbox > .subj {
  font-size:1.2em;
  color:green;
}

#div1 .divbox > .medium {
 color:brown;
 float:left;
}

#div2 .divbox > .medium {
 color:brown;
}

#div1 .divbox > .pbar {
  color:steelblue;

}

#div2 .divbox > .pbar {
  display:none;
}

#div1 .divbox > .marks {
 display:inline-block;
 color:steelblue;
 float:right;
}

#div2 .divbox > .marks {
 display:none;
}

.grdsub {
    text-align:left;
}

.marks {
    text-align:right;
}

.pbar {
    text-align:left;
}

.grade {
    color:orange;
}

.subj {
    color:steelblue;
}
</style>

<script>
function reload() {
  Set_Height();
}

var empty_div = true;
var medium = "si";

function set_to_drop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  var ele = document.getElementById(data);
  let i = 0;
  let div, ev_target;

  ev_target = child_target = ev.target;

  while(true) {
    if(ev_target.id == 'div1' || ev_target.id == 'div2') { 
      div = document.getElementById(ev_target.id);
      break;
    }
    else {
      child_target = ev_target;
      ev_target = ev_target.parentNode;
    }
  }

  for (const child of div.children) {
    if (child.id == child_target.id) {
      break;
    }
    i++;
  }   
  console.log(i);

  div.insertBefore(ele, div.children[i]);    
}

function move_to_div(id) {
  let move_to = '';
  if (document.getElementById(id).parentNode.id == 'div1') {
    move_to = 'div2';
  }
  else {
    move_to = 'div1';
  }

  hide_text();

  const node = document.getElementById(id);
  document.getElementById(move_to).appendChild(node);
}

function add_subjects() {
let subjects_html = "";
let grade = 8;
for(let i = 1; i <= subjects.length; i++) {
        subjects_html += '<div draggable="true" ondragstart="drag(event)" class="divbox" id="' + grade + '-' + subjects[i - 1] + '" ondblclick="move_to_div(this.id), hide_text()"><div class="grdsub"><span class="grade">'+ grade +' </span><span class="subj">' + subjects[i-1] + '</span><sup class="medium">' + medium + '</sup></div><div class="pbar" id="pbar-' + subjects[i - 1] + '"></div><div class="marks">92%</div></div>';
}
  document.getElementById("div2").innerHTML = subjects_html;
}

function hide_text() {
  if (document.getElementById("div1").children.length == 1 && empty_div == true ) {
    document.getElementById("dragtext").style.display = "block";
  }
  else if (document.getElementById("div1").children.length == 1 && empty_div == false ) {
    document.getElementById("dragtext").style.display = "block";
    empty_div = true;
  }
  else {
    document.getElementById("dragtext").style.display = "none";
    empty_div = false;
  }
}

function view_progress(sub, total, done) {
  let bar_length = parseInt(done*100/total);
  document.getElementById(sub).innerHTML = '<div style="width:100%; text-align:center; background-color:lightgray; border:1px solid; border-radius:8px;"><div style="position:absolute; left:47.6%;">'+ done + '/' + total + '</div><div style="text-align:center; background-color:pink; border-radius:8px; width:' + bar_length + '%">&nbsp;</div></div>';
}
</script>
</head>

<body onload="reload()" onresize="reload()">
<div id="top_menu"></div>
<form action="attendence.php" method="post">
<div id="stu_sel" style="padding: 8px"></div>

<div id="scroll" class="scroll">

<div style="text-align:center;">
<h2>Lessons</h2>
<div id="div1" ondrop="drop(event), hide_text()" ondragover="set_to_drop(event)" style="color:#888888"><p id="dragtext" style="text-align:center; color:#aaaaaa;">Drag and drop or double click (double tap) lessons below</p></div>

</div>

<div style="text-align:center;">
<div id="div2" ondrop="drop(event), hide_text()" ondragover="set_to_drop(event)"></div>
</div>

<a href="lesson_view.php"><input type="button" style="font-size:1.2em; padding:8px; color:white; background-color:steelblue; border-radius:4px;" value="Go to lesson view"></a>

</div>

</form>

<div class="bottom_menu" id="bottom_menu"></div>

<script>
View_Top_Menu("Lessons", "subject name");
View_Student_Selection();
View_Bottom_Menu();
unloadScrollBars();
Set_Height();

add_subjects();
for (let i = 0; i < subjects.length; i++) {
  view_progress("pbar-" + subjects[i], 12, 3);
}
</script>
</body>
</html>
