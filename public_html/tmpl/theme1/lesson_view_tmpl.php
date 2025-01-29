<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="img/logo32.png">
<style>
.lesson_header {
  display:grid;
  grid-template-columns:25% 50% 25%;
}

.lesson_header > div {
  font-size:1.3em;
  padding:5px;
}

#lesson_view {
  position:relative;
  height:360px;
  background-color:#aaaaaa;
  display:grid;
  grid-template-columns:10% 80% 10%;
}

#content {
  padding:4px;
  background-color:lightgray;
  text-align:center;
}

#content > div {
  padding: 4px;
}

#subcontent {
  padding:4px;
  background-color:#999999;
}

#subcontent > div {
  padding:4px;
}

.lessonlist {
}

input {
    float:right;
}

#content_now_text {
  display:flex;
  justify-content:center;
  align-items:center;
  margin:auto;
  height:0;
  padding:0;
  width:inherit;
  background-color:white;
  text-align:center;
  font-size:1.3em;
  overflow:hidden;
  background:rgba(255, 255, 255, .6);
  white-space:pre-wrap;
}

.content_text {
  animation-name:content_text_anim;
  animation-duration:3s;
  animation-direction:alternate;
  animation-iteration-count:2;
  animation-timing-function:ease;
}

@keyframes content_text_anim {
  0% {height:0; padding:0;}
  1% {height:0; padding:4px;}
  100% {height:2em; padding:4px;}
}

#subcontent_now_text {
  position:absolute;
  display:flex;
  justify-content:center;
  align-items:center;
  margin:auto;
  padding:4px;
  background-color:white;
  text-align:center;
  position:absolute;
  top:3.5em;
  left:5px;
  border-radius:4px;
  max-width:80%;
  overflow:hidden;
  background:rgba(255, 255, 255, 0);
  white-space:pre-wrap;
  font-size:1.2em;
}

.subcontent_text {
  animation-name:subcontent_text_anim;
  animation-duration:3s;
  animation-direction:alternate;
  animation-iteration-count:2;
  animation-timing-function:ease;
}

@keyframes subcontent_text_anim {
  from {background:rgba(255, 255, 255, 0)}
  to {background:rgba(255, 255, 255, .6)}
}

#lesson_now_text {
  position:absolute;
  bottom:5px;
  right:5px;
  display:flex;
  justify-content:center;
  align-items:center;
  margin:auto;
  padding:0;
  background-color:white;
  text-align:left;
  font-size:1.1em;
  width:0;
  overflow:hidden;
  background:rgba(255, 255, 255, 0);
  white-space:pre;
}

.lesson_text {
  animation-name:lesson_text_anim;
  animation-duration:3s;
  animation-direction:alternate;
  animation-iteration-count:2;
  animation-timing-function:ease;
}

@keyframes lesson_text_anim {
  0% {width:0; padding:0px; background:rgba(255, 255, 255, 0);}
  1% {padding:4px}
  100% {width:60%; padding:4px; background:rgba(255, 255, 255, .6);}
}

.controls {
  display:grid;
  grid-template-columns:33.33% 33.33% 33.33%;
  background-color:steelblue;
  color:white;
  margin-top:4px;
  margin-bottom:4px;
}

.controls > div {
    text-align:center;
    padding:6px;
}

#subcontent > div {
    padding:4px;
}
</style>

<script src="../js/lesson.js"></script>

</head>
<body style="padding:0; margin:auto">
<div class="lesson_header">
<div style="text-align:center; background-color:steelblue; color:white;">8 ශ්‍රේණිය</div>
<div id="subject" style="text-align:center; background-color:#dddddd; color:steelblue;" onclick="view_content()"><b>විද්‍යාව</b></div>
<div id="lan" style="text-align:center; background-color:steelblue; font-size:1.6em;"><a href="lessons.php" style="text-decoration:none; color:white;">x</a></div>
</div>

<div id="content" style="font-size:1.2em;"></div>
<div id="subcontent"></div>

<div id="lesson_view">
<div style="background-color:#888888; text-align:center; font-size:2em;"></div>
<div id="video_view"style="background-color:black; position:relative;">
<div id="content_now_text" class="content_text"></div>
<div id="subcontent_now_text" class="subcontent_text"></div>
<div id="lesson_now_text" class="lesson_text"></div>
</div>
<div style="background-color:#888888; text-align:center; font-size:2em;"></div>
</div>

<div id="controls" class="controls"></div>

<div class="lessonlist" id="lessonlist"></div>

<script>
load_content("8", "sci", "si");
lesson_view();

const content_text1 = document.getElementById("content_now_text");
const subcontent_text1 = document.getElementById("subcontent_now_text");
const lesson_text1 = document.getElementById("lesson_now_text");

document.addEventListener("click", function(e) {
  e.preventDefault;
  
  content_text1.classList.remove("content_text");
  subcontent_text1.classList.remove("subcontent_text");
  lesson_text1.classList.remove("lesson_text");
  
  // animation won't work without two lines below
  void content_text1.offsetWidth;
  void subcontent_text1.offsetWidth;
  void lesson_text1.offsetWidth;
  
  content_text1.classList.add("content_text");
  subcontent_text1.classList.add("subcontent_text");
  lesson_text1.classList.add("lesson_text");
}, false);

</script>
</body>
</html>
