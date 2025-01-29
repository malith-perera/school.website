let teacher = [234, "Malith Perera", 8, "C"];
let term = [2024, 1];

let students = [
        [101, "රොහාෂා මල්ෂි", true],
		[102, "මිනෝදි ප්‍රහර්ෂා", true],
		[103, "සෙව්මිණී දිනෙත්මා", true],
        [104, "නෙලුනි නුවන්සා", true],
		[105, "තාරුසි නිතිනි", true],
		[106, "සත්මිණී හිමායා", true],
        [107, "සෙසුමි මංදාකිණි", true],
		[108, "චතුමි නිමාෂා", true],
		[109, "මනීෂා සඳමිණී", true],
        [110, "හිත්මි යතින්ද්‍රා", true],
		[111, "හර්ෂි චංචලා", true],
		[112, "නිලෙක්ෂිකා කවිෂානි", true],
        [113, "දිනුරි සංජනා", true],
		[114, "සයුනිමා නෙත්සරණි", true],
		[115, "හෙසඳු සත්මිර", true],
        [116, "අරුණෝද් විහංග", true],
		[117, "දුල්වාන් භානුජ", true],
		[118, "නංදික භිහාර", true],
        [119, "පහන් සංකල්ප", true],
		[120, "කවිත් ඕභාෂ", true],
		[121, "දිදුලන නිමේෂ්", true],
        [122, "දිනෙත් කළණ", true],
		[123, "දිනෙත් නිම්සර", true],
		[124, "ක්‍රිෂාන් මදුරංග", true]
    ];
		
let grades = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10 , 11, 12, 13];

let clases = ["All", "A", "B", "C", "D", "E", "F", "G"];

var subjects = ["Science", "Mathematics", "Sinhala", "English", "ICT", "Health Science", "Art", "Dance"];


let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thuresday", "Friday", "Saturday"];
let days_si = ["ඉරිදා", "සඳුදා", "අඟහරුවාදා", "බදාදා", "බ්‍රහස්පතින්දා", "සිකුරාදා", "සෙනසුරාදා"];

let houses = ["ගැමුණු", "විජය", "පැරකුම්"];

let times = [20, 40, 40, 40, 40, 40, 20, 40, 40, 40];
let periods = ['ආරම්භක කාලය', 1, 2, 3, 4, 5, 'විවේක කාලය', 6, 7, 8]; /* not used */
  
function show_grades(id) {
  let all_grades = "";
  
  for(let i = 0; i < grades.length; i++) {
    if(teacher[2] != i + 1) {
      all_grades += '<option value="' + grades[i] + '">' + grades[i] + '</option>';
    }
    else {
      all_grades += '<option value="' + grades[i] + '" selected>' + grades[i] + '</option>';
    }
  }
  document.getElementById(id).innerHTML = all_grades;
}

function show_clases(id) {
  let all_class = "";
  let i; 
  for(i = 0; i < clases.length; i++) {
    if(teacher[3] != clases[i]) {
      all_class += '<option value="' + clases[i] + '">' + clases[i] + '</option>';
    }
    else {
      all_class += '<option value="' + clases[i] + '" selected>' + clases[i] + '</option>';
    }
  }
  document.getElementById(id).innerHTML = all_class;
}

function show_houses(id) {
  let all_houses = "<option></option>";
  let i; 
  for(i = 0; i < houses.length; i++) {
      all_houses += "<option>" + houses[i] + "</option>";
  }
  document.getElementById(id).innerHTML = all_houses;
}

function show_subjects() {
  let all_subjects = "";
  let i; 

  for(i = 0; i < subjects.length; i++) {
      all_subjects += "<option>" + subjects[i] + "</option>";
  }
  document.getElementById("subject_opt").innerHTML = all_subjects;
}

function set_time(begin, period_length) {
  let split = begin.split(":");
  let hour = parseInt(split[0]);
  let minutes = parseInt(split[1]);
  let m = 0;

  m = minutes + period_length;

  minutes = m % 60;
  hour += parseInt(m / 60);

  if(hour > 12) {
      hour -= 12;
  }

  let end_time = hour + ":" + minutes;

  return end_time;
}

function set_table_times() {
  let time = "7:30";

  for(let i = 0; i < times.length; i++) {
    document.getElementById("p" + (i + 1)).innerHTML = time;
    time = set_time(time, times[i]);
    document.getElementById("pe" + (i + 1)).innerHTML = time;
  }
}

function toggle_presence(i) {
  if (students[i][2] == true) {
    students[i][2] = false;
  }
  else {
    students[i][2] = true;
  }

  let all_absent_students = "";
  let all_absent_no = "";
  let all_absent_stu_no = "";

  document.getElementById("absents").innerHTML = "";
  document.getElementById("absent_no").innerHTML = "";
  document.getElementById("absent_stu_no").innerHTML = "";

  let abs_no = 1;
  for(let i = 0; i < students.length; i++) {
      if(students[i][2] == false) {
        all_absent_no += '<label for="cb' + i + '" onclick="toggle_presence()">' + abs_no++ + "</label><br>";
        all_absent_stu_no += '<label for="cb' + i + '" onclick="toggle_presence()">' + students[i][0] + "</label><br>";
        all_absent_students += '<label for="cb' + i + '" onclick="toggle_presence()">' + students[i][1] + "</label><br>";
      }
  }

  document.getElementById("absent_no").innerHTML = all_absent_no;
  document.getElementById("absent_stu_no").innerHTML = all_absent_stu_no;
  document.getElementById("absents").innerHTML = all_absent_students;
}

function toggle_all() {
  let all_absent_students = "";
  let all_absent_no = "";
  let all_absent_stu_no = "";

  document.getElementById("absents").innerHTML = "";
  document.getElementById("absent_no").innerHTML = "";
  document.getElementById("absent_stu_no").innerHTML = "";

  let abs_no = 1;
  for(let i = 0; i < students.length; i++) {
    if (students[i][2] == true) {
      students[i][2] = false;
    }
    else if (students[i][2] == false) {
      students[i][2] = true;
    }

    if(students[i][2] == false) {
      document.getElementById("cb" + i).checked = false;
      all_absent_no += abs_no++ + '<br>';
      all_absent_stu_no += students[i][0] + "<br>";
      all_absent_students += students[i][1] + "<br>";
    }
    else {
      document.getElementById("cb" + i).checked = true;
    }
  }

  document.getElementById("absent_no").innerHTML = all_absent_no;
  document.getElementById("absent_stu_no").innerHTML = all_absent_stu_no;
  document.getElementById("absents").innerHTML = all_absent_students;
}

function Create_Table(students) {
  let table = document.getElementById("student_table");
  let i = 0;

  let data = ["counter", students, students, ""]; 

  for(; i < students.length; i++) {
    let row = table.insertRow(i + 1);
    let cells = [];
    let n = 0;
    for(let j = 0; j < data.length; j++) {
      cells.push(row.insertCell(j));
      if (data[j] == "counter") {
        cells[j].innerHTML = '<label for="cb' + i + '">' + (i + 1) + '</label>';
      }
      else if (data[j] == "") {
      }
      else {
        cells[j].innerHTML = '<label for="cb' + i + '">' + (data[j])[i][n] + '</label>';
        n++;
      }
    }
    n = 0;
  }
}

function show_date() {
  const date = new Date();
  const year = date.getFullYear();
  const month = date.getMonth();
  const todate = date.getDate();
  const h = date.getHours();
  const m = date.getMinutes();
  const d = date.getDay();

  return year + "-"  + month + "-" + todate + " " + days_si[d];
}

function show_days(id) {
  document.getElementById(id).innerHTML = '\
  <option value="wee">Weekdays</option>\
  <option value="tod" selected>Today</option>\
  <option value="tom">Tomorrow</option>\
  <option value="yes">Yesterday</option>\
  <option value="1">Monday</option>\
  <option value="2">Tuesday</option>\
  <option value="3">Wednsday</option>\
  <option value="4">Thursday</option>\
  <option value="5">Friday</option>s';
}

function show_term() {
  return term[0] + " පළමු වාරය " ;
}

function reloadScrollBars() {
  document.documentElement.style.overflow = 'auto';  // firefox, chrome
  document.body.scroll = "yes"; // ie only
}

function unloadScrollBars() {
  document.documentElement.style.overflow = 'hidden';  // firefox, chrome
  document.body.scroll = "no"; // ie only
}

function View_Top_Menu(heading, subheading) {
  document.getElementById("top_menu").innerHTML = '\
<div style="text-align:left; padding-left:6px;"><span id="top" style="font-size:1.6em;">' + heading + '</span> <br>\
<span id="subheading" style="font-size:1.2em;">' + subheading + '</span></div>\
<div id="top" style="text-align:center;"><input type="text" style="border-radius:12px; height:1.8em; width:100%;"></div>\
<div style="text-align:right; padding-right:6px;"><img src="../tmpl/theme1/img/button.png" alt="menu button" style="width:24px; height:24px"></div>';
}

function View_Student_Selection() {
  document.getElementById("stu_sel").innerHTML = '\
<lable for="grade_opt">Grade </lable><select id="grade_opt" style="margin:4px;"></select>\
<lable for="class_opt">Class </lable><select id="class_opt" style="margin:4px;"></select>\
<lable for="subject_opt">Subject </lable><select id="subject_opt" style="margin:4px;"></select>\
<button style="margin:4px;">Search</button>';

  show_grades("grade_opt");
  show_clases("class_opt");
  show_subjects("subject_opt");
}

function get_day(dn)
{
  const date = new Date();
  const d = date.getDay();
  
  return days_si[d + dn];
}

function set_time_table_header() {
  let table_header = '<tr><th colspan="3">වේලාව</th>';
  let d = "";
if (document.getElementById("class_opt").value == 'All') {
  table_header += '<th>A</th><th>B</th><th>C</th><th>D</th><th>E</th>';
}
else {
if (document.getElementById("days_opt").value == 'wee') {
  table_header += '<th>සඳුදා</th><th>අඟහරුවාදා</th><th>බදාදා</th><th>බ්‍රහස්පතින්දා</th><th>සිකුරාදා</th>';
}
else if(document.getElementById("days_opt").value == 'tod')
{
  table_header += '<th>' + get_day(0) + '</th>';  
}
else if(document.getElementById("days_opt").value == 'tom')
{
  table_header += '<th>' + get_day(1) + '</th>';  
}
else if(document.getElementById("days_opt").value == 'yes')
{
  table_header += '<th>' + get_day(-1) + '</th>';  
}
else if(document.getElementById("days_opt").value == 'mon')
{
  table_header += '<th>' + days_si[1] + '</th>';  
}
else if(document.getElementById("days_opt").value == 'tue')
{
  table_header += '<th>' + days_si[2] + '</th>';  
}
else if(document.getElementById("days_opt").value == 'wed')
{
  table_header += '<th>' + days_si[3] + '</th>';  
}
else if(document.getElementById("days_opt").value == 'thu')
{
  table_header += '<th>' + days_si[4] + '</th>';  
}
else if(document.getElementById("days_opt").value == 'fri')
{
  table_header += '<th>' + days_si[5] + '</th>';  
}
else
{
  d =  days_si[document.getElementById("days_opt").value];
  table_header += '<th>' + d + '</th>';
}
}
  table_header += '</tr>';
  return table_header;
}

function set_time_table_body() {
  let table_body = "";
  
if (document.getElementById("days_opt").value == 'wee' || document.getElementById("class_opt").value == 'All') {  
  table_body = '<tr><td class="time" id="p1"></td><td class="dash">-</td><td class="time" id="pe1"></td><td colspan="5" style="text-align:center;">ආරම්භක කාලය</td></tr>\
<tr><td class="time" id="p2"></td><td class="dash">-</td><td class="time" id="pe2"></td><td></td><td></td><td></td><td></td><td></td></tr>\
<tr><td class="time" id="p3"></td><td class="dash">-</td><td class="time" id="pe3"></td><td></td><td></td><td></td><td></td><td></td></tr>\
<tr><td class="time" id="p4"></td><td class="dash">-</td><td class="time" id="pe4"></td><td></td><td></td><td></td><td></td><td></td></tr>\
<tr><td class="time" id="p5"></td><td class="dash">-</td><td class="time" id="pe5"></td><td></td><td></td><td></td><td></td><td></td></tr>\
<tr><td class="time" id="p6"></td><td class="dash">-</td><td class="time" id="pe6"></td><td></td><td></td><td></td><td></td><td></td></tr>\
<tr><td class="time" id="p7"></td><td class="dash">-</td><td class="time" id="pe7"></td><td colspan="5" style="text-align:center;">විවේක කාලය</td></tr>\
<tr><td class="time" id="p8"></td><td class="dash">-</td><td class="time" id="pe8"></td><td></td><td></td><td></td><td></td><td></td></tr>\
<tr><td class="time" id="p9"></td><td class="dash">-</td><td class="time" id="pe9"></td><td></td><td></td><td></td><td></td><td></td></tr>\
<tr><td class="time" id="p10"></td><td class="dash">-</td><td class="time" id="pe10"></td><td></td><td></td><td></td><td></td><td></td></tr>';
}
else {
  table_body += '<tr><td class="time" id="p1"></td><td class="dash">-</td><td class="time" id="pe1"></td><td style="text-align:center;">ආරම්භක කාලය</td></tr>\
<tr><td class="time" id="p2"></td><td class="dash">-</td><td class="time" id="pe2"></td><td></td></tr>\
<tr><td class="time" id="p3"></td><td class="dash">-</td><td class="time" id="pe3"></td><td></td></tr>\
<tr><td class="time" id="p4"></td><td class="dash">-</td><td class="time" id="pe4"></td><td></td></tr>\
<tr><td class="time" id="p5"></td><td class="dash">-</td><td class="time" id="pe5"></td><td></td></tr>\
<tr><td class="time" id="p6"></td><td class="dash">-</td><td class="time" id="pe6"></td><td></td></tr>\
<tr><td class="time" id="p7"></td><td class="dash">-</td><td class="time" id="pe7"></td><td style="text-align:center;">විවේක කාලය</td></tr>\
<tr><td class="time" id="p8"></td><td class="dash">-</td><td class="time" id="pe8"></td><td></td></tr>\
<tr><td class="time" id="p9"></td><td class="dash">-</td><td class="time" id="pe9"></td><td></td></tr>\
<tr><td class="time" id="p10"></td><td class="dash">-</td><td class="time" id="pe10"></td><td></td></tr>';
}
  return table_body;
}

function create_timetable() {
  let header = set_time_table_header();
  let body = set_time_table_body();
  
  document.getElementById("timetable").innerHTML = header + body;
  
  set_table_times();
}

function View_Student_Grade_Selection() {
  document.getElementById("stu_sel").innerHTML = '\
<lable for="grade_opt">Grade </lable><select id="grade_opt" style="margin:4px;"></select>\
<lable for="class_opt">Class </lable><select id="class_opt" style="margin:4px;" onchange="create_timetable()"></select>\
<lable for="subject_opt">Day </lable><select id="days_opt" style="margin:4px;" onchange="create_timetable()"></select>\
<button style="margin:4px;">Search</button>';

  show_grades("grade_opt");
  show_clases("class_opt");
  show_days("days_opt");
}

function View_Bottom_Menu() {
document.getElementById("bottom_menu").innerHTML = '\
<div class="btn_div">\
  <a class="bot_men_btn" href="profile_student.php">\
  <img src="../../tmpl/theme1/img/img32.png" alt="profile view">\
  <div>Profile</div>\
  </a>\
</div>\
  <div class="btn_div">\
  <a class="bot_men_btn" href="attendence_student.php">\
  <img src="../../tmpl/theme1/img/class32.png" alt="class view">\
  <div>Class</div>\
  </a>\
</div>\
  <div class="btn_div">\
  <a class="bot_men_btn" href="lessons.php">\
  <img src="../../tmpl/theme1/img/lesson32.png" alt="lesson view">\
  <div>Lessons</div>\
  </a>\
</div>\
<div class="btn_div">\
  <a class="bot_men_btn" href="messages.php">\
  <img src="../../tmpl/theme1/img/msg32.png" alt="message view">\
  <div>Message</div>\
  </a>\
</div>';
}

function reload() {
  Set_Height();
}

function Set_Height() {
   let h = window.innerHeight - document.getElementById("bottom_menu").clientHeight - document.getElementById("top_menu").clientHeight;
   
   let stu_sel = document.getElementById("stu_sel");
   if(stu_sel) {
     h -= document.getElementById("stu_sel").clientHeight;
   }
   
   let pbtn = document.getElementById("pbtn_div");   
   if(pbtn) {
     h -= document.getElementById("pbtn_div").clientHeight;
   }
   
   let prf_img = document.getElementById("prf_img_div");   
   if(prf_img) {
     h -= document.getElementById("prf_img_div").clientHeight;
   }
      
   document.getElementById("scroll").style.height = h + "px";
}


function view_pbtn() {
  document.getElementById("pbtn_div").innerHTML = '\
    <a href="attendence_student.php"><button class="pbtn">Atendence</button></a>\
    <a href="time_table_student.php"><button class="pbtn">Time Table</button></a>\
    <a href="marks.php"><button class="pbtn">Enter Marks</button></a>\
    <a href="analysis.php"><button class="pbtn">Class Analysis</button></a>\
    <a href="student_result.php"><button class="pbtn">Result</button></a>\
    <a href="student_rank.php"><button class="pbtn">Rank</button></a>\
    <a href="student_max.php"><button class="pbtn">Max</button></a>\
    <a href="average.php"><button class="pbtn">Class Average</button></a>';
}

function view_profile_btns() {
  document.getElementById("pbtn_div").innerHTML = '\
  <a href="profile_student.php"><button class="pbtn">Student</button></a>\
  <a href="profile_parent.php"><button class="pbtn">Parents</button></a>\
  <a href="profile_contact.php"><button class="pbtn">Contacts</button></a>\
  <a href="profile_other.php"><button class="pbtn">Other</button></a>\
  <a href="profile_subjects.php"><button class="pbtn">Subjects</button></a>';
}
