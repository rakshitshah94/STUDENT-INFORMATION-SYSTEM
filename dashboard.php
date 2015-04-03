<?php

/**
 * @System     HP-pc Rax
 * @author     Rakshit shah <Rakshitshah1994@gmail.com>
 * @copyright  2015-2017 |Rakshit shah
 * @license    http://rakshit.in/license/license.php |  PHP License 3.0
 * @version    1.1
 * @since      File available since Release 1.0.0
 */

session_start(); 
include("header.php"); 
include("conection.php");

if(isset($_POST["submit"]))
{
$result = mysql_query("SELECT * FROM administrator
WHERE adminid='$_POST[uid]' and password='$_POST[pwd]'");
if(mysql_num_rows($result)==0)
{
$log =  "Login failed";
}
else
{
	header("Location: dashboard.php");
}
}
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
  </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Admin Menu</h2>
  </header>
  <section class="entry">
  <form action="" method="post" class="form">
   <p class="textfield"><a href="course.php">Course</a></p><hr />
   <p class="textfield"><a href="subject.php">Subject</a></p><hr />
      <p class="textfield"><a href="lectureview.php">Lecture</a></p><hr />
  <p class="textfield"><a href="student.php">Student </a></p><hr />
   <p class="textfield"><a href="attendanceview.php">Attendance</a></p><hr />
   <p class="textfield"><a href="examview.php">Examination</a></p><hr />
   <p class="textfield"><a href="adminview.php">Admin</a></p><hr />
   <p class="textfield"><a href="contactview.php">Inbox</a></p><hr />

   <p>
     <input name="comment_post_ID" value="1" type="hidden">
 </p>
  </form>
  </section>
</article>

<article class="post">
  <header class="postheader">
  <h2>&nbsp;</h2>
  </header>
  <section class="entry"></section>
</article>



</section>


<?php 
include("adminmenu.php");
include("footer.php"); ?>