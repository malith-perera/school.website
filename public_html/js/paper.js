var question = "";
var paper = "";
var cnt = 1;
var answerSheet = [];
var answeredCount = 1;
var correctAnswers = 0;
var marksPerAnswer = 2.5;
var totalMarks = 0;

var xhttp = new XMLHttpRequest();

function loadPaper(grade, paper) {
  paperHeading();
  loadQuestions(grade, paper);
}

function loadQuestions(grade, paper) {
  window.xhttp.open("GET", "papers/grade" + grade + "/" + paper + "/" + window.cnt + ".xml", true);
  window.xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        makeQuesion(this, window.cnt, grade, paper);
        window.cnt++;
        if (window.cnt <= 3) {
          loadQuestions(grade, paper);
        }
        else {
          document.getElementById("paper").innerHTML = window.paper;
        }
    }
  };
  xhttp.send();
}

function paperHeading() {
  paperHeading = "<div id=\"paperHeading\" style=\"width: 100%; text-align: center;\"><img src=\"images/paper.jpg\" style=\"width: 99%; border-radius: 12px 12px 12px 12px; margin: 8px;\" alt=\"paper image\"></div>" +
    "<div class=\"hbox\">" +
    "<div style=\"border: 3px solid #336633; margin: 8px; border-radius: 8px; text-align: center;\"><h1>ශිෂ්‍යත්ව විභාග 2021</h1><h2> ආදර්ශ ප්‍රශ්න පත්‍රය</h2><h3>කුලි/හෙට්ටිපොල ආදර්ශ ප්‍රාථමික විද්‍යාලය</h3></div>" +
    "<div style=\"text-align: center; padding: 8px;\">පාසල්වලට සිසුන් තෝරා ගැනීම සහ ශිෂ්‍යාධාර ප්‍රදානය කිරීම සඳහා පස්වන ශ්‍රේණියේ සිසුන් සඳහා පැවැත්වෙන විභාගය</div>" +
    "<div style=\"text-align:center; font-size: 1.2em;\"><b>I පත්‍රය</b></div>" +
    "<div style=\"width:100%;\"><div style=\"border: 2px solid; border-radius: 5px; float: right; padding: 6px; font-size:1.2em;\"><b>කාලය: පැය 1</b></div></div>" +
    "<div style=\"clear:both\">&nbsp;</div>" +
    "<label for=\"nameinput\">නම : </label><input id=\"nameinput\" class=\"inputtext\" placeholder=\"මෙහි නම ලියන්න\">" +
    "<div>&nbsp;</div>" +
    "<div id=\"marks\" style=\"display: none;\"><span style=\"padding-right:24px;\">ලකුණු </span> <span id=\"markscell\"></span> </div>" +
    "<div>&nbsp;</div>" +
    "<div style=\"width:100%;\"><div style=\"padding: 8px; background-color: #ddeedd; text-align: right;\">සැකසුම: N.M. ජානකී ගුරුතුමිය</div></div>" +
    "</div>";

    document.getElementById("paperHeading").innerHTML = paperHeading;
}


function makeQuesion(xml, i, grade, paper) {
  var xmlDoc = xml.responseXML;
  var x = xmlDoc.getElementsByTagName("question");
  var qhead = x[0].getElementsByTagName("qhead")[0].childNodes[0].nodeValue;
  var quesType = x[0].getElementsByTagName("qtype")[0].childNodes[0].nodeValue;
  var ansType = x[0].getElementsByTagName("atype")[0].childNodes[0].nodeValue;
  var ans = x[0].getElementsByTagName("ans")[0].childNodes[0].nodeValue;
  var ques = x[0].getElementsByTagName("ques")[0].childNodes[0].nodeValue;
  var heading = "";
  var quesImageHtml = "";
  var ansHtml = "";

  var questionHead = "";

  if (qhead != " ")
  {
    questionHead = "<div class=\"qbox\" style=\"vertical-align:bottom;\"><img src=\"images/dot.png\" alt=\"heading dot\" height=\"12px\"> " + qhead +"</div>";
  }

  if (quesType == "i")
  {
    quesImageHtml = "<div class=\"qbox\"><img src=\"papers/grade" + grade + "/" + paper + "/imgs/" +  i + ".jpg\" alt=\"ques img\" height=\"200px\"></div>";
  }
  else if (quesType == "t")
  {
  }
  else
  {
  }

 if (ansType == "h") {
    ansHtml = "<div style=\"width:100%; padding:12px;\">" +
      "<div class=\"abox\" onclick=\"markAnswer(1," + i + ")\">" +
        "<label class=\"container\"><span class=\"fontsize\">" + x[0].getElementsByTagName("a")[0].childNodes[0].nodeValue + "</span>" +
        "<input type=\"radio\" id=\"r" + i + "-1\" name=\"a" + i + "\"><span class=\"checkmark\"></span></label></div>" +
      "<div class=\"abox\" onclick=\"markAnswer(2," + i + ")\">" +
        "<label class=\"container\"><span class=\"fontsize\">" + x[0].getElementsByTagName("a")[1].childNodes[0].nodeValue + "</span>" +
        "<input type=\"radio\" id=\"r" + i + "-2\" name=\"a" + i + "\"><span class=\"checkmark\"></span></label></div>" +
      "<div class=\"abox\" onclick=\"markAnswer(3," + i + ")\">" +
        "<label class=\"container\"><span class=\"fontsize\">" + x[0].getElementsByTagName("a")[2].childNodes[0].nodeValue + "</span>" +
        "<input type=\"radio\" id=\"r" + i + "-3\" name=\"a" + i + "\"><span class=\"checkmark\"></span></label></div>" +
       "<div style=\"clear: both\"></div>" +
       "</div>";
  }
  else if (ansType == "v") {
    ansHtml = "<div style=\"width:100%; padding:12px;\">" +
      "<div onclick=\"markAnswer(1," + i + ")\" style=\"padding: 8px; width: 100%;\">" +
        "<label class=\"container\"><span class=\"fontsize\">" + x[0].getElementsByTagName("a")[0].childNodes[0].nodeValue + "</span>" +
        "<input type=\"radio\" id=\"r" + i + "-1\" name=\"a"+ i +"\"><span class=\"checkmark\"></span></label></div>" +
      "<div onclick=\"markAnswer(2," + i + ")\" style=\"padding: 8px; width: 100%;\">" +
        "<label class=\"container\"><span class=\"fontsize\">" + x[0].getElementsByTagName("a")[1].childNodes[0].nodeValue + "</span>" +
        "<input type=\"radio\" id=\"r" + i + "-2\" name=\"a"+ i +"\"><span class=\"checkmark\"></span></label></div>" +
      "<div onclick=\"markAnswer(3," + i + ")\" style=\"padding: 8px; width: 100%;\">" +
        "<label class=\"container\"><span class=\"fontsize\">" + x[0].getElementsByTagName("a")[2].childNodes[0].nodeValue + "</span>" +
        "<input type=\"radio\" id=\"r" + i + "-3\" name=\"a"+ i +"\"><span class=\"checkmark\"></span></label></div>" +
      "</div>";
  }
  else if (ansType == "i") {
      ansHtml = "<div style=\"width:100%; padding:12px;\">" +
      "<div class=\"abox\" onclick=\"markAnswer(1," + i + ")\">" +
      "<img src=\"papers/grade" + grade + "/" + paper + "/imgs/" +  i + ".1.jpg\" alt=\"ans img\" height=\"200px\">" +
        "<label class=\"container\"><span class=\"fontsize\">" + x[0].getElementsByTagName("a")[0].childNodes[0].nodeValue + "</span>" +
        "<input type=\"radio\" id=\"r" + i + "-1\" name=\"a" + i + "\"><span class=\"checkmark\"></span></label></div>" +
      "<div class=\"abox\" onclick=\"markAnswer(2," + i + ")\">" +
      "<img src=\"papers/grade" + grade + "/" + paper + "/imgs/" +  i + ".2.jpg\" alt=\"ans img\" height=\"200px\">" +
        "<label class=\"container\"><span class=\"fontsize\">" + x[0].getElementsByTagName("a")[1].childNodes[0].nodeValue + "</span>" +
        "<input type=\"radio\" id=\"r" + i + "-2\" name=\"a" + i + "\"><span class=\"checkmark\"></span></label></div>" +
      "<div class=\"abox\" onclick=\"markAnswer(3," + i + ")\">" +
      "<img src=\"papers/grade" + grade + "/" + paper + "/imgs/" +  i + ".3.jpg\" alt=\"ans img\" height=\"200px\">" +
        "<label class=\"container\"><span class=\"fontsize\">" + x[0].getElementsByTagName("a")[2].childNodes[0].nodeValue + "</span>" +
        "<input type=\"radio\" id=\"r" + i + "-3\" name=\"a" + i + "\"><span class=\"checkmark\"></span></label></div>" +
      "<div style=\"clear: both\"></div>" +
      "</div>";
  }
  else {
    ansHtml = "<tr><td>unknown type</td></tr>";
  }

  window.paper +=  questionHead + quesImageHtml +
    "<div id=\"qb" + i + "\" class=\"qbox\">" +
        "<div><span id=\"rightWrongImg" + i + "\"></span>" + "(" + i + ") " + ques + "</div>" +
        "<div>" + x[0].getElementsByTagName("qfoot")[0].childNodes[0].nodeValue + "</div>" +
        "<div>" + ansHtml + "</div>" +
    "</div>";

    window.answerSheet.push([ans, 0]);
}

function markAnswer(ans, i) {
  if (window.answerSheet[i-1][1] == 0) {
    document.getElementById("answeredCount").innerHTML = window.answeredCount;
    window.answeredCount++;
  }

  if (ans == 1) {
    document.getElementById("r" + i + "-1").checked = true;
    window.answerSheet[i-1][1] = 1;
  }
  else if (ans == 2) {
    document.getElementById("r" + i + "-2").checked = true;
    window.answerSheet[i-1][1] = 2;
  }
  else if (ans == 3) {
    document.getElementById("r" + i + "-3").checked = true;
    window.answerSheet[i-1][1] = 3;
  }
  else {
  }
}

function submitPaper() {
  var nofques = 3;
  var total = 0;
  var allmarks = 0;

  for (i = 1; i < nofques + 1; i++)
  {
    if (window.answerSheet[i-1][0] == window.answerSheet[i-1][1]) {
      correctAnswers++;
      document.getElementById("rightWrongImg" + i).innerHTML = "<img src=\"images/right64.png\" style=\"padding: 4px; vertical-align:bottom;\">";
      document.getElementById("qb" + i).classList.toggle("qboxright");
    }
    else {
      document.getElementById("rightWrongImg" + i).innerHTML = "<img src=\"images/wrong64.png\" style=\"padding: 4px; vertical-align:bottom;\">";
      document.getElementById("qb" + i).classList.toggle("qboxwrong");
    }

    document.getElementById("r" + i + "-1").disabled = true;
    document.getElementById("r" + i + "-2").disabled = true;
    document.getElementById("r" + i + "-3").disabled = true;

    if (window.answerSheet[i-1][1] == 0 ) {
    }
  }

  total =  correctAnswers * window.marksPerAnswer;
  document.getElementById("namecell").innerHTML = document.getElementById("nameinput").value;
  document.getElementById("nameinput").style.display = "none";
  document.getElementById("markscell").innerHTML = total;
  document.getElementById("marks").style.display = "block";
  document.getElementById("submitbox").innerHTML = " ";
  document.getElementById("paper").style.display = "none";
  document.getElementById("showMarks").style.display = "block";
}

function showAnswers() {
  document.getElementById("paper").style.display = "block"; // "block"
  document.getElementById("showMarks").style.display = "none"; // "block"
}
