<!DOCTYPE html>
<html>
<head>
<title>Analysis</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="author" content="Malith Perera">
<link rel="icon" type="image/x-icon" href="img/logo32.png">
<link rel="stylesheet" href="../tmpl/<?php echo "$theme"; ?>/css/stylelog.css">
<script src="js/school.js"></script>
<script>
let marks = [
    [11, "J.P. Rohasha Malshi", 71, 39, 40, 74, 75, 76, 77, 78, 13, 80, 81, 82, -2, -2, -2, 86],
    [12, "malshi", 71, 0, 73, 41, 75, 76, 77, 78, 79, 51, 21, 26, 38, -2, -2, -2],
    [13, "prisenthi", 71, -1, 73, 74, 75, 76, 77, 60, 33, 15, 81, 82, -2, -2, 85, -2]  
];

const student_total = [];

var subject_grade = [];
var n_all_subjects = 16;
var n_sub_per_st = 13;
var n_students = 3;

var st_A = 0;
var st_B = 0;
var st_C = 0;
var st_S = 0;
var st_W = 0;
var st_ab = 0;

var total_A = 0;
var total_B = 0;
var total_C = 0;
var total_S = 0;
var total_W = 0;
var total_ab = 0;

var row_i = 0;

function add_rows() {
  	var table = document.getElementById("marks_table");
  	var st_no = 0;
    var cellno = 0;

    for(let i = 0; i < n_all_subjects; i++) {
        const sub = new Object();
        sub.A = 0;
        sub.B = 0;
        sub.C = 0;
        sub.S = 0;
        sub.W = 0;
        sub.ab = 0;
        sub.st_total = 0;
        sub.pass = 0;
        sub.fail_20_39 = 0;
        sub.fail_0_19 = 0;
        subject_grade.push(sub);
    }

    const st = new Object();

	for ( row_i= 5; row_i < 5 + n_students; row_i++) {
        const st = new Object();
        st.no = st_no + 1;
        st.total = 0;
        st.marks = [];

        cellno = 0;
	 	var row = table.insertRow(row_i);
	 	
        var cell = row.insertCell(cellno++);
        cell.innerHTML = st_no + 1;

        var cell = row.insertCell(cellno++);
        st.attendence_no = marks[row_i - 5][0];
        cell.innerHTML = st.attendence_no;

        var cell = row.insertCell(cellno++);
        st.name = marks[row_i - 5][1];
        cell.innerHTML = st.name;
        cell.style.whiteSpace = "nowrap";

		for(let j = 2; j < 18; j++) {
			var cell = row.insertCell(cellno++);

            if (marks[row_i - 5][j] == -1) {
                cell.innerHTML = 0;
            }
            else if (marks[row_i - 5][j] == -2) {
                cell.innerHTML = "-";
            }
            else {
                cell.innerHTML = marks[row_i - 5][j];
                st.total += marks[row_i - 5][j];
            }

            st.marks.push(marks[row_i - 5][j]);

			var cell = row.insertCell(cellno++);
            let grade = show_grade(marks[row_i - 5][j]);

            if (grade == 'A') {
                subject_grade[j - 2].A++;
                subject_grade[j - 2].pass++;
            }
            else if (grade == 'B') {
                subject_grade[j - 2].B++;
                subject_grade[j - 2].pass++;
            }
            else if (grade == 'C') {
                subject_grade[j - 2].C++;
                subject_grade[j - 2].pass++;
            }
            else if (grade == 'S') {
                subject_grade[j - 2].S++;
                subject_grade[j - 2].pass++;
            }
            else if (grade == 'W') {
                subject_grade[j - 2].W++;
                subject_grade[j - 2].fail_20_39++;
            }
            else if (grade == 'w') {
                grade = "W";
                subject_grade[j - 2].W++;
                subject_grade[j - 2].fail_0_19++;
            }
            else if (grade == 'ab') {
                subject_grade[j - 2].ab++;
            }
            else{}

            if (grade != '-') {
                subject_grade[j - 2].st_total++;
            }

			cell.innerHTML = grade; 
		}

        var cell = row.insertCell(cellno++);
        cell.innerHTML = st_A;

        var cell = row.insertCell(cellno++);
        cell.innerHTML = st_B;

        var cell = row.insertCell(cellno++);
        cell.innerHTML = st_C;

        var cell = row.insertCell(cellno++);
        cell.innerHTML = st_S;

        var cell = row.insertCell(cellno++);
        cell.innerHTML = st_W;

        var cell = row.insertCell(cellno++);
        cell.innerHTML = st.total;

        var cell = row.insertCell(cellno++);
        st.avg = Math.round(st.total / n_all_subjects * 100) / 100;
        cell.innerHTML = (st.avg).toFixed(2);

        var cell = row.insertCell(cellno++);
        st.cell = cell; 

        st.A = st_A;
        st.B = st_B;
        st.C = st_C;
        st.S = st_S;
        st.W = st_W;

        student_total.push(st);

        st_no++;

        st_A = 0;
        st_B = 0;
        st_C = 0;
        st_S = 0;
        st_W = 0;
	}
    student_decending_sort(student_total);

    for(let i = 0; i < student_total.length; i++) {
        student_total[i].place = i + 1;
        student_total[i].cell.innerHTML = student_total[i].place;
    }


    var row = table.insertRow(row_i++);
    row.innerHTML = "&nbsp;";

    const result = ["A-(75-100)", "B-(65-74)", "C-(50-64)", "S-(40-49)", "W-(0-39)", "නොපැමිණි සිසුන් ගණන", "පැමිණි සිසුන් ගණන", "එකතුව", "40-100 අතර සිසුන් ගණන", "20-39 අතර සිසුන් ගණන", "0-19 අතර සිසුන් ගණන"];

    var col = 0;
    var r = 0;
    var fail_0_19_total = 0.0;
    var fail_20_39_total = 0.0;
    var pass_total = 0.0;


    for(let j = 0; j < n_all_subjects; j++) {
        pass_total += subject_grade[j].pass;
        fail_20_39_total += subject_grade[j].fail_20_39;
        fail_0_19_total += subject_grade[j].fail_0_19;

    }

    for(let i = 0; i < 11; i++) {
        var row = table.insertRow(row_i++);

        if (col == 0) {
            var cell = row.insertCell(col++);
            cell.colSpan = "2";
            var cell = row.insertCell(col++);
            cell.innerHTML = result[r++];
        }

        if (i == 0) {
            for(let j = 0; j < n_all_subjects; j++) {
                var cell = row.insertCell(col++);
                cell.innerHTML =  sub_grade_percentage(subject_grade[j].st_total, subject_grade[j].A);
                var cell = row.insertCell(col++);
                cell.innerHTML = subject_grade[j].A;
            }
            var cell = row.insertCell(col++);
            cell.colSpan = "5";
            var cell = row.insertCell(col++);
            cell.innerHTML = total_A;
            var cell = row.insertCell(col++);
            cell.innerHTML = (Math.round(total_A / (n_sub_per_st * n_students) * 10000)/100).toFixed(2);
        }

        if (i == 1) {
            for(let j = 0; j < n_all_subjects; j++) {
                var cell = row.insertCell(col++);
                cell.innerHTML =  sub_grade_percentage(subject_grade[j].st_total, subject_grade[j].B);
                var cell = row.insertCell(col++);
                cell.innerHTML = subject_grade[j].B;
            }
            var cell = row.insertCell(col++);
            cell.colSpan = "5";
            var cell = row.insertCell(col++);
            cell.innerHTML = total_B;
            var cell = row.insertCell(col++);
            cell.innerHTML = ((Math.round(total_B / (n_sub_per_st * n_students) * 10000))/100).toFixed(2);
        }

        if (i == 2) {
            for(let j = 0; j < n_all_subjects; j++) {
                var cell = row.insertCell(col++);
                cell.innerHTML =  sub_grade_percentage(subject_grade[j].st_total, subject_grade[j].C);
                var cell = row.insertCell(col++);
                cell.innerHTML = subject_grade[j].C;
            }
            var cell = row.insertCell(col++);
            cell.colSpan = "5";
            var cell = row.insertCell(col++);
            cell.innerHTML = total_C;
            var cell = row.insertCell(col++);
            cell.innerHTML = ((Math.round(total_C / (n_sub_per_st * n_students) * 10000))/100).toFixed(2);
        }

        if (i == 3) {
            for(let j = 0; j < n_all_subjects; j++) {
                var cell = row.insertCell(col++);
                cell.innerHTML =  sub_grade_percentage(subject_grade[j].st_total, subject_grade[j].S);
                var cell = row.insertCell(col++);
                cell.innerHTML = subject_grade[j].S;
            }
            var cell = row.insertCell(col++);
            cell.colSpan = "5";
            var cell = row.insertCell(col++);
            cell.innerHTML = total_S;
            var cell = row.insertCell(col++);
            cell.innerHTML = ((Math.round(total_S / (n_sub_per_st * n_students) * 10000))/100).toFixed(2);
        }

        if (i == 4) {
            for(let j = 0; j < n_all_subjects; j++) {
                var cell = row.insertCell(col++);
                cell.innerHTML =  sub_grade_percentage(subject_grade[j].st_total, subject_grade[j].W);
                var cell = row.insertCell(col++);
                cell.innerHTML = subject_grade[j].W;
            }
            var cell = row.insertCell(col++);
            cell.colSpan = "5";
            var cell = row.insertCell(col++);
            cell.innerHTML = total_W;
            var cell = row.insertCell(col++);
            cell.innerHTML = ((Math.round(total_W / (n_sub_per_st * n_students) * 10000))/100).toFixed(2);
        }

        if (i == 5) {
            for(let j = 0; j < n_all_subjects; j++) {
                var cell = row.insertCell(col++);
                cell.innerHTML =  sub_grade_percentage(subject_grade[j].st_total, subject_grade[j].ab);
                var cell = row.insertCell(col++);
                cell.innerHTML = subject_grade[j].ab;
            }
            var cell = row.insertCell(col++);
            cell.colSpan = "5";
            var cell = row.insertCell(col++);
            cell.innerHTML = "";
            var cell = row.insertCell(col++);
            cell.innerHTML = "";
        }

        if (i == 6) {
            for(let j = 0; j < n_all_subjects; j++) {
                var cell = row.insertCell(col++);
                cell.innerHTML =  "";
                var cell = row.insertCell(col++);
                cell.innerHTML = subject_grade[j].st_total - subject_grade[j].ab;
            }
            var cell = row.insertCell(col++);
            cell.colSpan = "5";
            var cell = row.insertCell(col++);
            cell.innerHTML = "";
            var cell = row.insertCell(col++);
            cell.innerHTML =  "";
        }

        if (i == 7) {
            for(let j = 0; j < n_all_subjects; j++) {
                var cell = row.insertCell(col++);
                cell.innerHTML =  "";
                var cell = row.insertCell(col++);
                cell.innerHTML = subject_grade[j].st_total;
            }
            var cell = row.insertCell(col++);
            cell.colSpan = "5";
            var cell = row.insertCell(col++);
            cell.innerHTML = "";
            var cell = row.insertCell(col++);
            cell.innerHTML = ""; 
        }

        if (i == 8) {
            for(let j = 0; j < n_all_subjects; j++) {
                var cell = row.insertCell(col++);
                if(subject_grade[j].st_total != 0) {
                    cell.innerHTML = (Math.round((subject_grade[j].A + subject_grade[j].B + subject_grade[j].C + subject_grade[j].S) / subject_grade[j].st_total * 10000)/100).toFixed(2);
                }
                else {
                    cell.innerHTML = 0;
                }

                var cell = row.insertCell(col++);
                cell.innerHTML = subject_grade[j].pass;
            }
            var cell = row.insertCell(col++);
            cell.colSpan = "5";
            var cell = row.insertCell(col++);
            cell.innerHTML = pass_total;
            var cell = row.insertCell(col++);
            cell.innerHTML = ((Math.round(pass_total / (pass_total + fail_20_39_total + fail_0_19_total)*10000))/100).toFixed(2);
        }

        if (i == 9) {
            for(let j = 0; j < n_all_subjects; j++) {
                var cell = row.insertCell(col++);
                if(subject_grade[j].st_total != 0) {
                    cell.innerHTML = (Math.round(subject_grade[j].fail_20_39 / subject_grade[j].st_total * 10000)/100).toFixed(2);
                }
                else {
                    cell.innerHTML = 0;
                }
                var cell = row.insertCell(col++);
                cell.innerHTML = subject_grade[j].fail_20_39;
            }
            var cell = row.insertCell(col++);
            cell.colSpan = "5";
            var cell = row.insertCell(col++);
            cell.innerHTML = fail_20_39_total;
            var cell = row.insertCell(col++);
            cell.innerHTML = ((Math.round(fail_20_39_total / (pass_total + fail_20_39_total + fail_0_19_total)*10000))/100).toFixed(2);
        }

        if (i == 10) {
            for(let j = 0; j < n_all_subjects; j++) {
                var cell = row.insertCell(col++);
                if(subject_grade[j].st_total != 0) {
                    cell.innerHTML = (Math.round(subject_grade[j].fail_0_19 / subject_grade[j].st_total * 10000)/100).toFixed(2);
                }
                else {
                    cell.innerHTML = 0;
                }
                var cell = row.insertCell(col++);
                cell.innerHTML = subject_grade[j].fail_0_19;
            }
            var cell = row.insertCell(col++);
            cell.colSpan = "5";
            var cell = row.insertCell(col++);
            cell.innerHTML = fail_0_19_total;
            var cell = row.insertCell(col++);
            cell.innerHTML = ((Math.round(fail_0_19_total / (pass_total + fail_20_39_total + fail_0_19_total) * 10000))/100).toFixed(2);
        }

        col = 0;
    }
}


function student_decending_sort(arr) {
    let temp = new Object();

    for(let i = 0; i < arr.length; i++) {
        for(let j = 0; j < arr.length; j++) {
            if(arr[i].avg > arr[j].avg) {
                temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
        }
    }
}


function sub_grade_percentage(n_students, grade_total) {
    let percentage = 0.0;

    if(n_students != 0) {
        percentage = (Math.round(grade_total / n_students * 10000)/100).toFixed(2);
        return percentage;
    }
    else {
        return 0;
    }
}


function show_grade(m) {
	if (m > 100 || m < 0) {
        if (m == -2) {
            return "-"; //optional
        }

        if (m == -1) {
            total_ab++;
            st_ab++;
            return "ab"; //absent
        }

        return '<span style="color:red;">Err</span>';
	}
	else if (m >= 75) {
        total_A++;
        st_A++;
		return "A";
	}
	else if (m >= 65) {
        total_B++;
        st_B++;
		return "B";
	}
	else if (m >= 50) {
        total_C++;
        st_C++;
		return "C";
	}
	else if (m >= 40) {
        total_S++;
        st_S++;
		return "S";
	}
	else if (m >= 20) {
        total_W++;
        st_W++;
		return "W";
	}
	else if (m >= 0) {
        total_W++;
        st_W++;
		return "w";
	}
}
</script>
<style>
.rotate-text {
   transform: rotate(-90deg);
   height: 140px;
   white-space: nowrap;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 4px;
}

div.scroll {
overflow-x: auto;
overflow-y: auto;
}

</style>
</head>

<body onload="add_rows()">
<div id="top_menu"></div>
<div id="pbtn_div"></div>
<div id="stu_sel" style="padding: 8px"></div>

<div id="scroll" class="scroll">
<table id="marks_table" style="width:100%;">
<tbody>
    <caption style="padding-bottom:8px;">වාර පරීක්ෂණ ලකුණු විශ්ලේෂණ වාර්ථාව - ශිෂ්‍ය සාධන මට්ටම 6 - 9 ශ්‍රේණි</caption>

    <tr>
        <td style="white-space: nowrap;" colspan="3">පාසලේ නම</td>
        <td style="white-space: nowrap;" colspan="28">කුලි/මහින්දෝදය මහා විද්‍යාලය</td>
        <td colspan="3">කොට්ඨාසය</td>
    </tr>
    <tr>
    	<td colspan="2">ශ්‍රේණිය</td>
    	<td style="text-align: center;"> 8</td>
    	<td colspan="8" rowspan="2">පන්තිභාර ගුරුවරයාගේ නම</td>
    	<td colspan="20" rowspan="2">C.A.M.S. Fernando</td>    	
    	<td rowspan="2" colspan="2">වර්ෂය </td>
    	<td rowspan="2" colspan="5"></td>	
    	<td rowspan="2" colspan="2">වාරය </td>
    	<td rowspan="2" colspan="5"></td>    	 	
    </tr>
    <tr>
    	<td colspan="2">පන්තිය</td>
    	<td style="text-align: center;"> C</td>
    </tr>
    <tr>
    	<td class="rotate-text" rowspan="2">අනු අංකය</td>
    	<td class="rotate-text" rowspan="2">ඇතුලත්වීමේ<br>අංකය</td>
    	<td style="text-align: center">විෂයන්</td>
    	<td style="transform: rotate(-90deg); white-space: nowrap;" colspan="2">ගණිතය</td>
    	<td style="transform: rotate(-90deg); white-space: nowrap;" colspan="2">විද්‍යාව</td>
    	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">මව්බස</td>    	
    	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">ආගම</td>
    	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">ඉතිහාසය</td>
	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">ඉංග්‍රීසි</td>
    	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">භූගෝල<br>විද්‍යාව</td>
	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">පුරවැසි<br>අධ්‍යාපනය</td>    	
	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">සෞඛ්‍ය හා<br>ශාරීරික<br>අධ්‍යාපනය</td>
	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">දෙවන බස<br>(දෙමළ)</td>    	
        <td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">තෝරතුරු හා<br>සංනිවේදන<br>තාක්ෂණය</td>
	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">ප්‍රා.තා.කු.</td>
	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">සංගීතය</td>
	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">චිත්‍ර කලාව</td>
	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">නර්තනය</td>
	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" colspan="2">නාට්‍ය හා<br>රංග කලාව</td>
	<td style="white-space: nowrap;" colspan="5">ශිෂ්‍යයාගේ සාමාර්ථ එකතුව</td>
	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" rowspan="2">එකතුව</td>
	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" rowspan="2">සාමාන්‍යය</td>
	<td style="transform: rotate(-90deg) translate(0px, 0px); white-space: nowrap;" rowspan="2">ස්ථානය</td>
    </tr>
    <tr>
    	<td style="height:20px; text-align: center; white-space: nowrap;">ශිෂ්‍යයාගේ නම</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">M</td>
    	<td style="text-align:center">G</td>
    	<td style="text-align:center">A</td>
    	<td style="text-align:center">B</td>
    	<td style="text-align:center">C</td>
    	<td style="text-align:center">S</td>
    	<td style="text-align:center">W</td>		
    </tr>
    <span id="table_rows"></span>
</tbody>
</table>
</div>

<div class="bottom_menu" id="bottom_menu"></div>

<script>
  unloadScrollBars();
  View_Top_Menu("විශ්ලේෂණ වාර්ථාව", show_term());
  view_pbtn();
  View_Student_Selection();
  View_Bottom_Menu();
  Set_Height();
</script>
</body>
</html>
