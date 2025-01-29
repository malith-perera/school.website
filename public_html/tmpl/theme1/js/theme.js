function view_header(school_name) {
document.getElementById("header").innerHTML = '\
<nav class="navbar">\
<a href="index.php" class="nav-logo"><img src="img/logo32.png" alt="school logo" style="height:32px; width:32px;"> ' + school_name + '</a>\
<ul class="nav-menu">\
<li class="nav-item">\
  <a href="index.php" class="nav-link">මුල් පිටුව</a>\
</li>\
<li class="nav-item">\
  <a href="about_school.php" class="nav-link">පාසල ගැන</a>\
</li>\
<li class="nav-item">\
  <a href="application_student.php" class="nav-link">අයදුම්පත්</a>\
</li>\
<li class="nav-item">\
  <a href="contact_school.php" class="nav-link">සබැඳි</a>\
</li>\
<li class="nav-item">\
  <a href="login.php" class="nav-link"><img src="../tmpl/theme1/img/img32.png" style="width:32px; height:32px;"></a>\
</li>\
</ul>\
<div class="hamburger">\
<span class="bar"></span>\
<span class="bar"></span>\
<span class="bar"></span>\
</div>\
</nav>\
';
}   
    
function view_header_logged(school_name, name, user_type)
{
document.getElementById("header").innerHTML = '\
<nav class="navbar">\
<a href="index.php" class="nav-logo"><img src="img/logo32.png" alt="school logo" style="height:32px; width:32px;"> ' + school_name + '</a>\
<ul class="nav-menu">\
<li class="nav-item">\
  <a href="index.php" class="nav-link">මුල් පිටුව</a>\
</li>\
<li class="nav-item">\
  <a href="about_school.php" class="nav-link">පාසල ගැන</a>\
</li>\
<li class="nav-item">\
  <a href="application_student.php" class="nav-link">අයදුම්පත්</a>\
</li>\
<li class="nav-item">\
  <a href="contact_school.php" class="nav-link">සබැඳි</a>\
</li>\
<li class="nav-item">\
  <a href="login.php" class="nav-link"><img src="img/user.png" style="width:30px;"></a>\
</li>\
</ul>\
<div class="hamburger">\
<span class="bar"></span>\
<span class="bar"></span>\
<span class="bar"></span>\
</div>\
</nav>\
';
}

function footer() {
    let year = 2024;
    document.getElementById("footer").innerHTML = "<a href='../index.html' style='text-decoration:none;'>Copyrights&copy; " + year + "</a>";
}
