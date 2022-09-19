let web_name = name = place = "";


function check_name_place()
{
    var name = document.getElementById("school_name").value;
    var place = document.getElementById("school_place").value;
    var web_name = "";

    name = name.replace(/\s/g, '').toLowerCase();
    place = place.replace(/\s/g, '').toLowerCase();

    if (name != "" && place != "")
    {
        web_name = name + "-" + place;
        document.getElementById("school_web").value = web_name;
        document.getElementById("school_name_error").innerHTML = "";
        document.getElementById("school_place_error").innerHTML = "";
        check_web(document.getElementById("school_web").value);
    }
    else
    {
        if (name == "")
        {
            document.getElementById("school_name_error").innerHTML = "*";

            if (place == "")
            {
                web_name = "";
                document.getElementById("school_place_error").innerHTML = "*";
            }
            else
            {
                web_name = place;
                document.getElementById("school_place_error").innerHTML = "";
            }
        }
        else
        {
            document.getElementById("school_name_error").innerHTML = "";

            if (place == "")
            {
                web_name = name;
                document.getElementById("school_place_error").innerHTML = "*";
            }
            else
            {
                web_name = name + "-" + place;
                document.getElementById("school_place_error").innerHTML = "";
            }
        }
        document.getElementById("school_web").value = web_name;
        document.getElementById("submitbtn").innerHTML = "<div style='width:100%; text-align:right'><input type='submit' name='registerbtn' value='ලියාපදිංචි කරන්න' disabled></div>";
        document.getElementById("message").innerHTML = "<div style='width:100%; text-align:center; color:red;'>* හිස් නොවිය යුතුය</div>";
    }
}


function check_web(web_str)
{
    if (web_str == "") {
        document.getElementById("message").innerHTML = "<div style='width:100%; text-align:center; color:red;'>* හිස් නොවිය යුතුය</div>";
        document.getElementById("submitbtn").innerHTML = "<div style='width:100%; text-align:right'><input type='submit' name='registerbtn' value='ලියාපදිංචි කරන්න' disabled></div>";
    }
    else {
        web_str = web_str.toLowerCase();
        document.getElementById("school_web").value = web_str;
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "") { // web address not exist
                    document.getElementById("message").innerHTML = "<div style='width:100%; text-align:right; color:green;'>මෙම නම ලියාපදිංචි කල හැක</div>";
                    document.getElementById("submitbtn").innerHTML = "<div style='width:100%; text-align:right'><input type='submit' name='registerbtn' value='ලියාපදිංචි කරන්න' style='background-color: #55AA77; color:white; border:none; text-decoration: none; cursor: pointer; padding: 4px 8px; margin: 1px 1px;'></div>";
                    document.getElementById("school_table").innerHTML = "";
                }
                else {  // web address exist
                    xmlhttp.onload = function() {
                        const rows = JSON.parse(this.responseText);

                        let school_table = "<table style='margin:0 auto; width:100%'> \
                            <thead><tr><th>පාසල</th><th>ස්ථානය</th><th>වෙබ් ලිපිනය</th><th>තත්ත්වය</th></tr></thead><tbody>";

                        for (let x in rows) {
                            school_table += "<tr><td>" + rows[x].school + "</td><td>" + rows[x].place + "</td><td>" + rows[x].school_web + "</td></tr>";
                        }

                        school_table += "</tbody></table>";

                        document.getElementById("school_table").innerHTML = school_table;
                    }
                    document.getElementById("message").innerHTML = "<div style='width:100%; text-align:center; color:red;'>මෙය දැනටමත් ලියාපදිංචි කර ඇත</div>";
                    document.getElementById("submitbtn").innerHTML = "<div style='width:100%; text-align:right'><input type='submit' name='registerbtn' value='ලියාපදිංචි කරන්න' disabled></div>";
                }
            }
        };
        xmlhttp.open("GET", "register_school_ajax.php?school_web=" + web_str, true);
        xmlhttp.send();
    }
}


function footer_view()
{
    document.getElementById("footer").innerHTML = "<div class='footer fontfamilysans' style='color:#888888; font-size:.8em'> \
        <table style='width: 100%; margin: 0px;'> \
        <tbody> \
        <tr><td>Login</td><td>Sign up</td><td>Schools</td><td>Groups</td><td>About</td><td>Developers</td><td>Help Us</td><td>Donate</td><td>Help Center</td></tr> \
        </tbody> \
        </table> \
        <div style='color:#9f9f9f; width:100%; text-align:right; padding-top:8px; padding-bottom:4px;'>ecsoftware &copy; 2022 &nbsp;</div> \
        </div>";
}


function form_push_down()
{
    let left_top_space = screen.availHeight / 2 - 220;
    let right_top_space = screen.availHeight / 2 - 350;

    document.getElementById("left_top_space").style.height = left_top_space + "px";
    document.getElementById("right_top_space").style.height = right_top_space + "px";
}


function check_password()
{
    var pw1 = document.getElementById("password").value;
    var pw2 = document.getElementById("password2").value;

    if (pw1.length >= 4)
    {
        if (pw1.normalize() === pw2.normalize())
        {
            document.getElementById("message").innerHTML = "<span style='color:green'>නිවැරදියි</span>";
            document.getElementById("submitbtn").innerHTML = "<div style='width:100%; text-align:right'><input type='submit' name='registerbtn' value='ලියාපදිංචි කරන්න' style='background-color: #55AA77; color:white; border:none; text-decoration: none; cursor: pointer; padding: 4px 8px; margin: 1px 1px;'></div>";
        }
        else
        {
            document.getElementById("message").innerHTML = "<span style='color:red;'>ඉහත මුරපද දෙක සමාන විය යුතුය</span>";
            document.getElementById("submitbtn").innerHTML = "<div style='width:100%; text-align:right'><input type='submit' name='registerbtn' value='ලියාපදිංචි කරන්න' disabled></div>";
        }
    }
    else
    {
        document.getElementById("message").innerHTML = "<span style='color:red;'>මුරපදය සඳහා  අකුරු ඉලක්කම් හෝ සලකුණු  අවම 4 ක් වත් යොදා ගන්න.</span>";
        document.getElementById("submitbtn").innerHTML = "<div style='width:100%; text-align:right'><input type='submit' name='registerbtn' value='ලියාපදිංචි කරන්න' disabled></div>";
    }
}
