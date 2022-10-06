function check_password()
{
    var pw1 = document.getElementById("pword").value;
    var pw2 = document.getElementById("pword2").value;

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
