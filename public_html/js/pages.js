function form_push_down()
{
    let left_top_space = screen.availHeight / 2 - 220;
    let right_top_space = screen.availHeight / 2 - 350;

    document.getElementById("left_top_space").style.height = left_top_space + "px";
    document.getElementById("right_top_space").style.height = right_top_space + "px";
}


function footer_view()
{
    document.getElementById("footer").innerHTML = "<div class='footer' style='color:#888888; font-size:.8em; width:100%; padding: 8px;'>\
        <table style='width: 100%; margin: 0px; bottom:30px; position:fixed; text-align:center; font-family:sans;'>\
        <tbody>\
        <tr><td>Login</td><td>Sign up</td><td>Schools</td><td>Groups</td><td>About</td><td>Developers</td><td>Help Us</td><td>Donate</td><td>Help Center</td></tr>\
        </tbody>\
        </table>\
        </div>\
        <div style='bottom:0; right:0; position:fixed; text-align:right; width:100%; color:#aeaeae; font-size:.8em; font-family:sans;'>ecsoftware &copy; 2022 &nbsp;</div>\
    ";
}
