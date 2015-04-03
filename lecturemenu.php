<?php 

/**
 * @System     HP-pc Rax
 * @author     Rakshit shah <Rakshitshah1994@gmail.com>
 * @copyright  2015-2017 |Rakshit shah
 * @license    http://rakshit.in/license/license.php |  PHP License 3.0
 * @version    1.1
 * @since      File available since Release 1.0.0
 */

// session_start();
?>
<section id="sidebar">
<?php
if(isset($_SESSION["userid"]))
{
?>
<h2>Lecturer Profile</h2>
<ul>
	<li>Lecture ID : <?php echo $_SESSION["userid"] ; ?></li>
    <li>Name : <?php echo $_SESSION["lecname"]; ?></li>

</ul>
<h2>Lecturer Menu</h2>
<ul>
	<li><a href="course.php">Course</a></li>
    <li><a href="subject.php">Subject</a></li>
    <li><a href="lecturevieww.php">Lecture Profile</a></li>
    <li><a href="student.php">Student</a></li>
    <li><a href="attendanceview.php">Attendance</a></li>
    <li><a href="examview.php">Examination</a></li>

</ul>
<h2>Reports</h2>
<ul>
	<li><a href="#nogo">Student Report</a></li>
    <li><a href="#nogo">Attendance Report</a></li>
    <li><a href="#nogo">Examination Report</a></li>

</ul>

<h2><a href="logout.php">Logout</a></h2>
<?php
}
?>
</section>
<div class="clear"></div>

<div class="clear"></div>
</section>
</div>
