let web_name = name = place = "";

function set_school_name(str)
{
    name = str.replace(/\s/g, '').toLowerCase();

    if (name != "")
    {
        document.getElementById("web").value = name + "-" + place;
        document.getElementById("school_name_error").innerHTML = "";
        check_web(document.getElementById("web").value);
    }
    else
    {
        document.getElementById("web").value = name + place;
        document.getElementById("school_name_error").innerHTML = "*";
        document.getElementById("submitbtn").innerHTML = "<div style='width:100%; text-align:right'><input type='submit' name='registerbtn' value='ලියාපදිංචි කරන්න' disabled></div>";
        document.getElementById("message").innerHTML = "<div style='width:100%; text-align:center; color:red;'>* හිස් නොවිය යුතුය</div>";
    }
}


function set_school_name_place(str)
{
    place = str.replace(/\s/g, '').toLowerCase();

    if (place != "")
    {
        document.getElementById("web").value = name + "-" + place;
        document.getElementById("school_place_error").innerHTML = "";
        check_web(document.getElementById("web").value);
    }
    else
    {
        document.getElementById("web").value = name;
        document.getElementById("school_place_error").innerHTML = "*";
        document.getElementById("submitbtn").innerHTML = "<div style='width:100%; text-align:right'><input type='submit' name='registerbtn' value='ලියාපදිංචි කරන්න' disabled></div>";
        document.getElementById("message").innerHTML = "<div style='width:100%; text-align:center; color:red;'>* හිස් නොවිය යුතුය</div>";
    }
}


function check_web(web_str)
{
    if (web_str == "")
    {
        document.getElementById("message").innerHTML = "<div style='width:100%; text-align:center; color:red;'>හිස් නොවිය යුතුය</div>";
        return;
    }
    else
    {
        web_str = web_str.toLowerCase();
        document.getElementById("web").value = web_str;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                if (this.responseText == "")  // web address not exist
                {
                    document.getElementById("message").innerHTML = "<div style='width:100%; text-align:right; color:green;'>මෙම නම ලියාපදිංචි කල හැක</div>";
                    document.getElementById("submitbtn").innerHTML = "<div style='width:100%; text-align:right'><input type='submit' name='registerbtn' value='ලියාපදිංචි කරන්න' style='background-color: #55AA77; color:white; border:none; text-decoration: none; cursor: pointer; padding: 4px 8px; margin: 1px 1px;' disabled></div>";
                    document.getElementById("school_table").innerHTML = "";
                }
                else  // web address exist
                {
                    xmlhttp.onload = function()
                    {
                        const rows = JSON.parse(this.responseText);

                        let school_table = "<table style='margin:0 auto; width:100%'> \
                            <thead><tr><th>පාසල</th><th>ස්ථානය</th><th>වෙබ් ලිපිනය</th><th>තත්ත්වය</th></tr></thead><tbody>";

                        for (let x in rows)
                        {
                            school_table += "<tr><td>" + rows[x].school + "</td><td>" + rows[x].place + "</td><td>" + rows[x].web + "</td></tr>";
                        }

                        school_table += "</tbody></table>";

                        document.getElementById("school_table").innerHTML = school_table;
                    }
                    document.getElementById("message").innerHTML = "<div style='width:100%; text-align:center; color:red;'>මෙය දැනටමත් ලියාපදිංචි කර ඇත</div>";
                    document.getElementById("submitbtn").innerHTML = "<div style='width:100%; text-align:right'><input type='submit' name='registerbtn' value='ලියාපදිංචි කරන්න' disabled></div>";
                }
            }
        };
        xmlhttp.open("GET", "register_school_ajax.php?web=" + web_str, true);
        xmlhttp.send();
    }
}
