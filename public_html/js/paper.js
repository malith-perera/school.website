var question = "";
var paper = "";
var cnt = 1;
var answerSheet = [];
var answeredCount = 0;
var correctAnswers = 0;
var totalMarks = 0.0;
var nques;

var xhttp = new XMLHttpRequest();

function loadPaper(grade, paper) {
  loadQuestions(grade, paper);
}

function loadQuestions(grade, paper) {
  window.xhttp.open("GET", "papers/grade" + grade + "/" + paper + "/test.xml", true);
  window.xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        make_paper(this, grade, paper);
        document.getElementById("paper").innerHTML = window.paper;
    }
  };
  xhttp.send();
}

function paperHeading(title, institute, grade, subject, description, paperNo, time, nques, author) {
  paperHeading = "<div id=\"paperHeading\" style=\"width: 100%; text-align: center;\"><img src=\"../../tmpl/theme1/img/paper.jpg\" style=\"width: 99%; border-radius: 12px 12px 12px 12px; margin: 8px;\" alt=\"paper image\"></div>" +
    "<div class=\"hbox\">" +
    "<div class=\"headbox\"><img src='img/logo.png' alt='school logo'><h2>" + institute + "</h2><h1>" + title + "</h1><h2>" + grade + " ශ්‍රේණිය</h2> <h2>" + subject + "</h2></div>" +
    "<div style=\"text-align: center; padding: 8px;\">" + description + "</div>" +
    "<div style=\"text-align:center; font-size: 1.2em;\"><b>" + paperNo+ "</b></div>" +
    "<div style=\"width:100%;\"><div style=\"border: 2px solid; border-radius: 5px; float: right; padding: 6px; font-size:1.2em;\"><b>" + time + "</b></div></div>" +
    "<div style=\"clear:both\">&nbsp;</div>" +
    "<label for=\"nameinput\">නම : </label><input id=\"nameinput\" class=\"inputtext\" placeholder=\"මෙහි නම ලියන්න\"><span id=\"nametext\"></span>" +
    "<div>&nbsp;</div>" +
    "<div id=\"marks\" style=\"display: none;\"><span style=\"padding-right:24px;\">ලකුණු </span> <span id=\"markscell\"></span> </div>" +
    "<div>&nbsp;</div>" +
    "<div style=\"width:100%;\"><div style=\"padding: 8px; background-color: lightblue; text-align: right;\">සැකසුම: " + author + "</div></div>" +
    "</div>";

    document.getElementById("paperHeading").innerHTML = paperHeading;
}

function make_paper(xml, grade, paper) {
  var xmlDoc = xml.responseXML;
  var ph = xmlDoc.getElementsByTagName("phead");
  let title = ph[0].getElementsByTagName("ptitle")[0].childNodes[0].nodeValue;
  var institute = ph[0].getElementsByTagName("institute")[0].childNodes[0].nodeValue;
  var grade = ph[0].getElementsByTagName("grade")[0].childNodes[0].nodeValue;
  var subject = ph[0].getElementsByTagName("subject")[0].childNodes[0].nodeValue;
  var description = ph[0].getElementsByTagName("description")[0].childNodes[0].nodeValue;
  var paperNo = ph[0].getElementsByTagName("paperNo")[0].childNodes[0].nodeValue;
  var time = ph[0].getElementsByTagName("time")[0].childNodes[0].nodeValue;
  var score = parseFloat(ph[0].getElementsByTagName("score")[0].childNodes[0].nodeValue);
  var author = ph[0].getElementsByTagName("author")[0].childNodes[0].nodeValue;
  
  nques = xmlDoc.firstElementChild.childElementCount - 1;
  document.getElementById("nques").innerHTML = nques;    
  paperHeading(title, institute, grade, subject, description, paperNo, time, nques, author);

  var x = xmlDoc.getElementsByTagName("question");
  
  var q = 0;

  for(let i = 0; i < nques; i++) {
    var qhead = x[i].getElementsByTagName("qhead")[0].childNodes[0].nodeValue;
    var quesType = x[i].getElementsByTagName("qtype")[0].childNodes[0].nodeValue;
    var ansType = x[i].getElementsByTagName("atype")[0].childNodes[0].nodeValue;
    var ans = parseInt(x[i].getElementsByTagName("ans")[0].childNodes[0].nodeValue);
    var ques = x[i].getElementsByTagName("ques")[0].childNodes[0].nodeValue;
    var score_ind = x[i].getElementsByTagName("score")[0].childNodes[0].nodeValue;
    var heading = "";
    var quesImageHtml = "";
    var ansHtml = "";
    var sc = 0;

    var questionHead = "";
    
    q = i + 1;

    if (qhead != " ")
    {
      questionHead = "<div class=\"qbox\" style=\"vertical-align:bottom;\"><img src=\"../../tmpl/theme1/img/dot.png\" alt=\"heading dot\" height=\"12px\"> " + qhead +"</div>";
    }

    if (quesType == "i")
    {
      quesImageHtml = "<div class=\"qbox\"><img src=\"papers/grade" + grade + "/" + paper + "/imgs/" +  q + ".jpg\" alt=\"ques img\" height=\"200px\"></div>";
    }
    else if (quesType == "t")
    {
    }
    else
    {
    }

   if (ansType == "h") {
      ansHtml = "<div style=\"width:100%; padding:12px;\">" +
        "<div class=\"abox\" onclick=\"markAnswer(1," + q + ")\">" +
          "<label class=\"container\"><span class=\"fontsize\">" + x[i].getElementsByTagName("a")[0].childNodes[0].nodeValue + "</span>" +
          "<input type=\"radio\" id=\"r" + q + "-1\" name=\"a" + q + "\"><span class=\"checkmark\"></span></label></div>" +
        "<div class=\"abox\" onclick=\"markAnswer(2," + q + ")\">" +
          "<label class=\"container\"><span class=\"fontsize\">" + x[i].getElementsByTagName("a")[1].childNodes[0].nodeValue + "</span>" +
          "<input type=\"radio\" id=\"r" + q + "-2\" name=\"a" + q + "\"><span class=\"checkmark\"></span></label></div>" +
        "<div class=\"abox\" onclick=\"markAnswer(3," + q + ")\">" +
          "<label class=\"container\"><span class=\"fontsize\">" + x[i].getElementsByTagName("a")[2].childNodes[0].nodeValue + "</span>" +
          "<input type=\"radio\" id=\"r" + q + "-3\" name=\"a" + q + "\"><span class=\"checkmark\"></span></label></div>" +
         "<div style=\"clear: both\"></div>" +
         "</div>";
    }
    else if (ansType == "v") {
      ansHtml = "<div style=\"width:100%; padding:12px;\">" +
        "<div onclick=\"markAnswer(1," + q + ")\" style=\"padding: 8px; width: 100%;\">" +
          "<label class=\"container\"><span class=\"fontsize\">" + x[i].getElementsByTagName("a")[0].childNodes[0].nodeValue + "</span>" +
          "<input type=\"radio\" id=\"r" + q + "-1\" name=\"a"+ q +"\"><span class=\"checkmark\"></span></label></div>" +
        "<div onclick=\"markAnswer(2," + q + ")\" style=\"padding: 8px; width: 100%;\">" +
          "<label class=\"container\"><span class=\"fontsize\">" + x[i].getElementsByTagName("a")[1].childNodes[0].nodeValue + "</span>" +
          "<input type=\"radio\" id=\"r" + q + "-2\" name=\"a"+ q +"\"><span class=\"checkmark\"></span></label></div>" +
        "<div onclick=\"markAnswer(3," + q + ")\" style=\"padding: 8px; width: 100%;\">" +
          "<label class=\"container\"><span class=\"fontsize\">" + x[i].getElementsByTagName("a")[2].childNodes[0].nodeValue + "</span>" +
          "<input type=\"radio\" id=\"r" + q + "-3\" name=\"a"+ q +"\"><span class=\"checkmark\"></span></label></div>" +
        "</div>";
    }
    else if (ansType == "i") {
      ansHtml = "<div style=\"width:100%; padding:12px;\">" +
        "<div class=\"abox\" onclick=\"markAnswer(1," + q + ")\">" +
        "<img src=\"papers/grade" + grade + "/" + paper + "/imgs/" + q + ".1.jpg\" alt=\"ans img\" height=\"200px\">" +
          "<label class=\"container\"><span class=\"fontsize\">" + x[i].getElementsByTagName("a")[0].childNodes[0].nodeValue + "</span>" +
          "<input type=\"radio\" id=\"r" + q + "-1\" name=\"a" + q + "\"><span class=\"checkmark\"></span></label></div>" +
        "<div class=\"abox\" onclick=\"markAnswer(2," + q + ")\">" +
        "<img src=\"papers/grade" + grade + "/" + paper + "/imgs/" + q + ".2.jpg\" alt=\"ans img\" height=\"200px\">" +
          "<label class=\"container\"><span class=\"fontsize\">" + x[i].getElementsByTagName("a")[1].childNodes[0].nodeValue + "</span>" +
          "<input type=\"radio\" id=\"r" + q + "-2\" name=\"a" + q + "\"><span class=\"checkmark\"></span></label></div>" +
        "<div class=\"abox\" onclick=\"markAnswer(3," + q + ")\">" +
        "<img src=\"papers/grade" + grade + "/" + paper + "/imgs/" + q + ".3.jpg\" alt=\"ans img\" height=\"200px\">" +
          "<label class=\"container\"><span class=\"fontsize\">" + x[i].getElementsByTagName("a")[2].childNodes[0].nodeValue + "</span>" +
          "<input type=\"radio\" id=\"r" + q + "-3\" name=\"a" + q + "\"><span class=\"checkmark\"></span></label></div>" +
        "<div style=\"clear: both\"></div>" +
        "</div>";
    }
    else {
      ansHtml = "<tr><td>unknown type</td></tr>";
    }

    window.paper +=  questionHead + quesImageHtml +
      "<div id=\"qb" + q + "\" class=\"qbox\">" +
          "<div><span id=\"rightWrongImg" + i + "\"></span>" + "(" + q + ") " + ques + "</div>" +
          "<div>" + x[i].getElementsByTagName("qfoot")[0].childNodes[0].nodeValue + "</div>" +
          "<div>" + ansHtml + "</div>" +
      "</div>";

      if(score_ind == " ") {
        sc = score;
        console.log(sc);
      }
      else {
        sc = parseFloat(score_ind);
      }
      window.totalMarks += sc;

      window.answerSheet.push([ans, 0, sc]);
  }
}

function markAnswer(ans, q) {
  var i = q - 1;
  if (window.answerSheet[i][1] == 0) {
    window.answeredCount++;  
    document.getElementById("answeredCount").innerHTML = window.answeredCount;
  }

  if (ans == 1) {
    document.getElementById("r" + q + "-1").checked = true;
    window.answerSheet[i][1] = 1;
  }
  else if (ans == 2) {
    document.getElementById("r" + q + "-2").checked = true;
    window.answerSheet[i][1] = 2;
  }
  else if (ans == 3) {
    document.getElementById("r" + q + "-3").checked = true;
    window.answerSheet[i][1] = 3;
  }
  else {
  }

  if (window.answeredCount == window.nques) {
    document.getElementById("answeredCount").style.color = "steelblue";
  }
}

function submitPaper() {
  var total = 0.0;
  var allmarks = 0;
  var q = 0;

  for(let i = 0; i < nques; i++)
  {
    q = i + 1;
    if (window.answerSheet[i][0] == window.answerSheet[i][1]) {
      correctAnswers++;
      document.getElementById("rightWrongImg" + i).innerHTML = "<img src=\"../../tmpl/theme1/img/right64.png\" style=\"padding: 4px; vertical-align:bottom;\">";
      document.getElementById("qb" + q).classList.toggle("qboxright");
      total += window.answerSheet[i][2];
    }
    else {
      document.getElementById("rightWrongImg" + i).innerHTML = "<img src=\"../../tmpl/theme1/img/wrong64.png\" style=\"padding: 4px; vertical-align:bottom;\">";
      document.getElementById("qb" + q).classList.toggle("qboxwrong");
    }

    document.getElementById("r" + q + "-1").disabled = true;
    document.getElementById("r" + q + "-2").disabled = true;
    document.getElementById("r" + q + "-3").disabled = true;

    if (window.answerSheet[i][1] == 0 ) {
    }
  }

  total_text = total + "/" + totalMarks;

  document.getElementById("nameinput").style.display = "none";
  document.getElementById("nametext").innerHTML = document.getElementById("nameinput").value;
  document.getElementById("markscell").innerHTML = total_text;
  document.getElementById("marks").style.display = "block";
  document.getElementById("submitbox").innerHTML = " ";
  document.getElementById("paper").style.display = "none";
  document.getElementById("showMarks").style.display = "block";
}

function showAnswers() {
  document.getElementById("paper").style.display = "block"; // "block"
  document.getElementById("showMarks").style.display = "none"; // "block"
}

/*
function underline(ans, i) {
  if (ans == 1) {
    document.getElementById("r" + i + "-1").checked = true;
  }
  else if (ans == 2) {
    document.getElementById("r" + i + "-2").checked = true;
  }
  else if (ans == 3) {
    document.getElementById("r" + i + "-3").checked = true;
  }
  else {
  }
}
*/
