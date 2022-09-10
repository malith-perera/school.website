function footer() {
   var footer_text = "<div class='footer fontfamilysans' style='color:#888888; font-size:.8em'> \
        <table style='width: 100%; margin: 0px;'> \
        <tbody> \
        <tr><td>Login</td><td>Sign up</td><td>Schools</td><td>Groups</td><td>About</td><td>Developers</td><td>Help Us</td><td>Donate</td><td>Help Center</td></tr> \
        </tbody> \
        </table> \
        <div style='color:#9f9f9f; width:100%; text-align:right; padding-top:8px; padding-bottom:4px;'>ecsoftware &copy; 2022 &nbsp;</div> \
        </div>";

    document.getElementById("footer").innerHTML = footer_text;
}


let web_name = name = place = "";


function set_school_name(val)
{
    name = val.replace(/\s/g, '');

    if (place != "" && name != "")
    {
        document.getElementById("web").value = name + "-" + place;
    }
    else
    {
        document.getElementById("web").value = name + place;
    }
}


function set_school_name_place(val)
{
    place = val.replace(/\s/g, '');

    if (place != "" && name != "")
    {
        document.getElementById("web").value = name + "-" + place;
    }
    else
    {
        document.getElementById("web").value = name;
    }
}


function check_web(str) {
    if (str == "") {
        document.getElementById("web_error").innerHTML = "Should not empty";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "1") {
                document.getElementById("button_or_error").innerHTML = "<div style='width:100%; text-align:center; color:red'>මෙය දැනටමත් ලියාපදිංචි කර ඇත</div>";
                }

                if (this.responseText == "0") {
                    document.getElementById("button_or_error").innerHTML = "<div style='width:100%; text-align:right'><input type='submit' name='register' value='ලියාපදිංචි කරන්න' style='color:green;'></div>";
                }
            }
    };
    xmlhttp.open("GET", "register_school_ajax.php?web=" + str, true);
    xmlhttp.send();
    }
}
