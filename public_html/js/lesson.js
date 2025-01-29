var content_id = 'c0';
var content_html = "";
var content_title = "";
var subcontent_title = "";
var lesson_title = "";
var toggle_content = 1;
var toggle_subcontent = 1;
var toggle_lesson = 1;
var toggle_lesson_view = 1;
var subject_content = {};
var sub_content = [];
var current_content_key = "";
var current_content_index = 0;
var last_content_index = 0;
var current_subcontent_index = 0;
var current_lesson_index = 0;
var content_keys = [];

var lan = "si";
var nxt_txt = "";
var prv_txt = "";

var content = [];
var subcontent = [];
var lessons = [];

function get_student_lesson_status() {
  current_content_index = 0; 
  current_subcontent_index = 0;
  current_lesson_index = 0;
}

function save_user_subject_status() {
}

function load_content(grade, subject, medium) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      set_content(this);
    }
  };

  xhttp.open("GET", "lessons/" + grade + "/" + subject + "/content_" + medium + ".xml", true);
  xhttp.send();
}

function set_content(xml) {
  var xmlDoc = xml.responseXML;
  var cont = xmlDoc.getElementsByTagName("cont");
  for (let i = 0; i < cont.length; i++) {
    var sb = cont[i].getElementsByTagName("sub");
    subcontent.push([]);
    lessons.push([]);
    for (let j = 0; j < sb.length; j++) {
      var ls = sb[j].getElementsByTagName("lsn");
      lessons[i].push([]);
      for (let k = 0; k < ls.length; k++) {
        lessons[i][j].push([ls[k].childNodes[0].nodeValue, ls[k].getAttribute("time")]);
      }
      subcontent[i].push(sb[j].getAttribute("name"));
    }
    content.push(cont[i].getAttribute("name"));
  }

  load_lesson();
}

function load_lesson() {
  get_student_lesson_status();

  for (let i = 0; i < content.length; i++) {
    content_html += '<div id="c' + i + '" onclick="select_content(this.id)" data-index="' + i + '">' + content[i] + '</div>';
  }

  document.getElementById("content").innerHTML = content_html;

  content_title = current_content_key = content[current_content_index];
  subcontent_title = subcontent[current_content_index][current_subcontent_index];
  lesson_title = lessons[current_content_index][current_subcontent_index][current_lesson_index][0];

  update_text_box();
  change_lesson_list(0);
  view_controls();
}

function update_text_box() {
  var content_text = "";
  var subcontent_text = "";
  var lesson_text = "";

  if (content_title != "") {
    content_text += content_title;
  }

  let video_view_width =  document.getElementById("video_view").clientWidth;

  document.getElementById("content_now_text").innerHTML = content_text;

  if (subcontent_title != "") {
    subcontent_text += subcontent_title;
  }

  document.getElementById("subcontent_now_text").innerHTML = subcontent_text;
  
  if (lesson_title != "") {
    lesson_text += lesson_title;
  }

  if (video_view_width * .8 <= lesson_text.length * 18 * 1.1) { // 1 em = 16px + 2px
    const textarray = lesson_text.split(" "); 
    let text_html = "";
    let half_count = textarray.length / 2;
    for(let i = 0; i < textarray.length; i++) {
      if (i == half_count) {
        text_html += "<br>";
      }
      text_html += textarray[i] + " ";
    }
    lesson_text = text_html;
  }

  document.getElementById("lesson_now_text").innerHTML = lesson_text;
}

function lesson_view() {
  document.getElementById("content").style.display = "none";
  document.getElementById("subcontent").style.display = "none";
  document.getElementById("lesson_view").style.display = "grid";
  document.getElementById("controls").style.display = "grid";
  document.getElementById("lessonlist").style.display = "none";
  update_text_box();
}

function view_content() {
  if (toggle_content == 1) {
    document.getElementById("content").style.display = "block";
    document.getElementById("subcontent").style.display = "none";
    document.getElementById("lesson_view").style.display = "none";
    document.getElementById("controls").style.display = "none";
    document.getElementById("lessonlist").style.display = "none";

    document.getElementById("content").innerHTML = content_html;
    toggle_content = 2;
  }
  else if (toggle_content == 2) {
    lesson_view();
    toggle_content = 1;
  }
}

function set_subcontent() {  
  let sub_html = ""

  for (let i = 0; i < subcontent[current_content_index].length; i++) {
    sub_html += '<div id="s' + i + '" onclick="change_lesson_list(this.id)" data-index="' + i + '">' + subcontent[current_content_index][i] + '</div>';
  }

  document.getElementById("subcontent").innerHTML = sub_html;
}

function select_content(cid) {
  last_content_index = current_content_index;
  current_content_index = document.getElementById(cid).getAttribute('data-index');
  content_title = document.getElementById(cid).innerHTML;
  set_subcontent();

  if (toggle_subcontent == 1) {
    document.getElementById("content").innerHTML = '<div id=c"' + cid + '" onclick="select_content(this.id)" data-index="'+ document.getElementById(cid).getAttribute('data-index') +'">' + content_title + '</div>';
    document.getElementById("content").style.display = "block";
    document.getElementById("subcontent").style.display = "block";
    document.getElementById("lessonlist").style.display = "none";
    document.getElementById("lesson_view").style.display = "none";
    document.getElementById("controls").style.display = "none";
    toggle_subcontent = 2;
  } else if (toggle_subcontent == 2) {
    current_content_index = last_content_index;
    toggle_content = 1;
    toggle_subcontent = 1;
    view_content();
  }
}

function prv_lsn() {
  if (current_lesson_index > 0) {
    current_lesson_index--;
    lesson_title = lessons[current_content_index][current_subcontent_index][current_lesson_index][0];    
  }
  view_controls();
  update_text_box();
}

function nxt_lsn() {
  if (lessons[current_content_index][current_subcontent_index].length - 1 > current_lesson_index) {
    current_lesson_index++;
    lesson_title = lessons[current_content_index][current_subcontent_index][current_lesson_index][0];
  }
  view_controls();
  update_text_box();
}

function change_lesson(lid) {
  current_lesson_index = document.getElementById(lid).getAttribute('data-index');
  lesson_title = lessons[current_content_index][current_subcontent_index][current_lesson_index][0];  
  view_controls();
  update_text_box();
}

function view_controls() {
    let cur_lsn, nxt_lsn, prv_lsn;

    cur_lsn = lessons[current_content_index][current_subcontent_index][current_lesson_index][0];

    if (current_lesson_index == 0) {
      prv_lsn = "";
    }
    else {
      prv_lsn = "&lt;&lt; " + prv_txt;
    }

    if (current_lesson_index == lessons[current_content_index][current_subcontent_index].length - 1)
    {
      nxt_lsn = "";
    }
    else {
      nxt_lsn = nxt_txt + " &gt;&gt;";
    }
    
    const collection = document.getElementsByClassName("lessonlist");
    for (let i = 0; i < collection.length; i++) {
      collection[i].style.backgroundColor = "white";
    }

    document.getElementById("l" + current_lesson_index).style.backgroundColor = "lightblue";

    document.getElementById("controls").innerHTML = '<div id="prev" onclick="prv_lsn()" style="text-align:left;"> ' + prv_lsn + '</div><div id="curr" onclick="toggle_lesson_list()" style="text-align:center;">' + cur_lsn + '</div><div id="next" onclick="nxt_lsn()" style="text-align:right;">' + nxt_lsn + ' </div>';
}

function toggle_lesson_list() {
  if (toggle_lesson_view == 1) {
    document.getElementById("lessonlist").style.display = "block";
    toggle_lesson_view = 2;
  }
  else if (toggle_lesson_view == 2) {
    document.getElementById("lessonlist").style.display = "none";
    toggle_lesson_view = 1;
  }
}

function change_lesson_list(sid) {
  if(sid != 0) {
    current_subcontent_index = document.getElementById(sid).getAttribute('data-index');
    subcontent_title = document.getElementById(sid).innerHTML;
    lesson_title = lessons[current_content_index][current_subcontent_index][current_lesson_index][0];
  }

  let lesson_html = '<table style="width:100%"><thead><tr style="background-color:#cccccc;"><th>පාඩම</th><th>කාලය</th><th>තත්වය</th></tr></thead><tbody>';

  for (let i = 0; i < lessons[current_content_index][current_subcontent_index].length; i++) {
      let name = lessons[current_content_index][current_subcontent_index][i][0];
      let time = lessons[current_content_index][current_subcontent_index][i][1];
      lesson_html += '<tr class="lessonlist" id="l' + i + '" onclick="change_lesson(this.id)" data-index="'+ i +'"><td style="padding:4px;">' + name + '</td><td class="time" style="text-align:center;">' + time + '</td><td style="text-align:center;"><img src="../tmpl/theme1/img/right64.png" alt="lesson finished or not" style="width:16px; height:16px;"></td></tr>';
  }
  lesson_html += '</tbody></table>';

  document.getElementById("lessonlist").innerHTML = lesson_html;

  toggle_content = 1;
  toggle_subcontent = 1;
  toggle_lesson_view = 1;
  lesson_view();
  view_controls()
  toggle_lesson_list();
  set_lang();
}

function set_lang() {
  let lang = 'si';
  
  if (lang == 'en') {
    prv_txt = "Previous";
    nxt_txt = "Next";
  }
  else if(lang == 'si') {
    prv_txt = "පෙර";
    nxt_txt = "මීලග";
  }
  
}
