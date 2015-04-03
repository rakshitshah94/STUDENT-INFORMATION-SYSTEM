<section id="sidebar">
<?php
/**
 * @System     HP-pc Rax
 * @author     Rakshit shah <Rakshitshah1994@gmail.com>
 * @copyright  2015-2017 |Rakshit shah
 * @license    http://rakshit.in/license/license.php |  PHP License 3.0
 * @version    1.1
 * @since      File available since Release 1.0.0
 */
if(isset($_SESSION["userid"]))
{
?>
<h2>Admin Menu</h2>
<ul>
	<li><a href="course.php">Course</a></li>
    <li><a href="subject.php">Subject</a></li>
    <li><a href="lectureview.php">Lectures</a></li>
    <li><a href="student.php">Student</a></li>
    <li><a href="attendanceview.php">Attendance</a></li>
    <li><a href="examview.php">Examination</a></li>
    <li><a href="adminview.php">Admin</a></li>
    <li><a href="contactview.php">Inbox</a></li>

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
