var question = "";
var paper = "";
var cnt = 1;
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
        if (cnt <= 3) {
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
  window.paper = "<div style=\"width: 100%; text-align: center;\"><img src=\"images/paper.jpg\" style=\"width: 99%; border-radius: 12px 12px 12px 12px; margin: 8px;\" alt=\"paper image\"></div>" +
    "<div class=\"hbox\">" + 
    "<div style=\"border: 3px solid #336633; margin: 8px; border-radius: 8px; text-align: center;\"><h1>ශිෂ්‍යත්ව විභාග 2021</h1><h2> ආදර්ශ ප්‍රශ්න පත්‍රය</h2><h3>කුලි/හෙට්ටිපොල ආදර්ශ ප්‍රාථමික විද්‍යාලය</h3></div>" +
    "<div style=\"font-size: 16px; text-align: center; padding: 8px;\">පාසල්වලට සිසුන් තෝරා ගැනීම සහ ශිෂ්‍යාධාර ප්‍රධානය කිරීමට පස්වන ශ්‍රේණියේ සිසුන් සඳහා පැවැත්වෙන විභාගය</div>" +
    "<div style=\"font-size: 24px; text-align:center;\"><b>I පත්‍රය</b></div>" +
    "<div style=\"width:100%;\"><div style=\"border: 1px solid; border-radius: 5px; float: right;\"><b>කාලය: පැය 1</b></div></div>" +
    "<div style=\"clear:both\">&nbsp;</div>" +
    "<div style=\"width:100%;\"><div style=\"border: 1px solid; float: right;\"><label>නම : <input type=\"text\" name=\"name\"></labe></div></div>" +
    "<div style=\"clear:both\">&nbsp;</div>" + 
    "<div style=\"width:100%;\"><div style=\"padding: 8px; font-size: 16px; background-color: #ddeedd;\">සැකසුම: N.M. ජානකී ගුරුතුමිය</div></div>" +
    "</div>";
}


function makeQuesion(xml, i, grade, paper) {
  var xmlDoc = xml.responseXML;
  var x = xmlDoc.getElementsByTagName("question");
  var qhead = x[0].getElementsByTagName("qhead")[0].childNodes[0].nodeValue;
  var quesType = x[0].getElementsByTagName("qtype")[0].childNodes[0].nodeValue;
  var ansType = x[0].getElementsByTagName("atype")[0].childNodes[0].nodeValue;
  var heading = "";
  var ques = "";
  var ans = "";
  var questionHead = "";

  if (qhead != " ")
  {
    questionHead = "<div class=\"qbox\"><img src=\"images/dot.png\" alt=\"heading dot\" height=\"12px\"> " + qhead +"</div>";
  }

  if (quesType == "i")
  {
    ques = "<div class=\"qbox\"><img src=\"papers/grade" + grade + "/" + paper + "/imgs/" +  i + ".jpg\" alt=\"ques img\" height=\"200px\"></div>";
  }
  else if (quesType == "t")
  {
  }
  else
  {
  }

  if (ansType == "h") {
    ans = "<div style=\"width:100%; padding:12px;\">" +
      "<div class=\"abox\" onclick=\"underline(1," + i + ")\">" +
        "<label class=\"container fontsize\">" + x[0].getElementsByTagName("a")[0].childNodes[0].nodeValue + "<input type=\"radio\" id=\"r" + i + "-1\" name=\"a" + i + "\"><span class=\"checkmark\"></span></label></div>" +
      "<div class=\"abox\" onclick=\"underline(2," + i + ")\">" +
        "<label class=\"container fontsize\">" + x[0].getElementsByTagName("a")[1].childNodes[0].nodeValue + "<input type=\"radio\" id=\"r" + i + "-1\" name=\"a" + i + "\"><span class=\"checkmark\"></span></label></div>" +
      "<div class=\"abox\" onclick=\"underline(3," + i + ")\">" +
        "<label class=\"container fontsize\">" + x[0].getElementsByTagName("a")[2].childNodes[0].nodeValue + "<input type=\"radio\" id=\"r" + i + "-3\" name=\"a" + i + "\"><span class=\"checkmark\"></span></label></div>" +

       "<div style=\"clear: both\"></div>" +
       "</div>";
  }
  else if (ansType == "v") {
    ans = "<div style=\"width:100%; padding:12px;\">" +
      "<div onclick=\"underline(1," + i + ")\" style=\"padding: 8px;\"><label class=\"container fontsize\">" + x[0].getElementsByTagName("a")[0].childNodes[0].nodeValue + "<input type=\"radio\" id=\"r" + i + "-1\" name=\"a"+ i +"\"><span class=\"checkmark\"></span></label></div>" +
      "<div onclick=\"underline(2," + i + ")\" style=\"padding: 8px;\"><label class=\"container fontsize\">" + x[0].getElementsByTagName("a")[1].childNodes[0].nodeValue + "<input type=\"radio\" id=\"r" + i + "-2\" name=\"a"+ i +"\"><span class=\"checkmark\"></span></label></div>" +
      "<div onclick=\"underline(3," + i + ")\" style=\"padding: 8px;\"><label class=\"container fontsize\">" + x[0].getElementsByTagName("a")[2].childNodes[0].nodeValue + "<input type=\"radio\" id=\"r" + i + "-3\" name=\"a"+ i +"\"><span class=\"checkmark\"></span></label></div>" +
      "</div>";
  }
  else if (ansType == "i") {
  
      ans = "<div style=\"width:100%; padding:12px;\">" +
      "<div class=\"abox\" onclick=\"underline(1," + i + ")\">" +
      "<img src=\"papers/grade" + grade + "/" + paper + "/imgs/" +  i + ".1.jpg\" alt=\"ans img\" height=\"200px\">" +
        "<label class=\"container\">" + x[0].getElementsByTagName("a")[0].childNodes[0].nodeValue + "<input type=\"radio\" id=\"r" + i + "-1\" name=\"a" + i + "\"><span class=\"checkmark\"></span></label></div>" +
      "<div class=\"abox\" onclick=\"underline(2," + i + ")\">" +
      "<img src=\"papers/grade" + grade + "/" + paper + "/imgs/" +  i + ".2.jpg\" alt=\"ans img\" height=\"200px\">" +
        "<label class=\"container\">" + x[0].getElementsByTagName("a")[1].childNodes[0].nodeValue + "<input type=\"radio\" id=\"r" + i + "-2\" name=\"a" + i + "\"><span class=\"checkmark\"></span></label></div>" +
      "<div class=\"abox\" onclick=\"underline(3," + i + ")\">" +
      "<img src=\"papers/grade" + grade + "/" + paper + "/imgs/" +  i + ".3.jpg\" alt=\"ans img\" height=\"200px\">" +      
        "<label class=\"container\">" + x[0].getElementsByTagName("a")[2].childNodes[0].nodeValue + "<input type=\"radio\" id=\"r" + i + "-3\" name=\"a" + i + "\"><span class=\"checkmark\"></span></label></div>" +

       "<div style=\"clear: both\"></div>" +
       "</div>";
  }
  else {
    ans = "<tr><td>unknown type</td></tr>";
  } 

  window.paper +=  questionHead + ques + 
    "<div class=\"qbox\">" +
        "<div>" + "(" + i + ") " + x[0].getElementsByTagName("qbody")[0].childNodes[0].nodeValue + "</div>" +
        "<div>" + x[0].getElementsByTagName("qfoot")[0].childNodes[0].nodeValue + "</div>" +
        "<div>" + ans + "</div>" +
    "</div>";
}


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
