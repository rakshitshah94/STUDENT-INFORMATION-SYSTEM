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
include("modal.php");
$abc = 100;
if(isset($_SESSION["userid"]))
{
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription"> View Records
</h2>
</header>

<section id="contents">

<article class="post">
<header class="postheader">

  </header>
  <section class="entry">
  <font color="#330000">
<?php
// if(isset($_GET["view"]) && $_GET["view"] == "course")
if($_GET["view"]=="course")
{
// Course table starts here
$result = mysql_query("SELECT * FROM course where courseid='$_GET[slid]'");
while($row = mysql_fetch_array($result))
  {
 $courseid =  $row["courseid"];
 $coursename = $row["coursename"];
$coursecomment =   $row["comment"];
$coursekey =   $row["coursekey"];
  }
  
?>   <h2>Course</h2>
    <table width="428" border="1">
  <tr>
    <th width="150" height="35" scope="col">Course ID.</th>
    <th width="262" scope="col"><div align="left"> &nbsp; <?php echo  $courseid; ?></div></th>
    </tr>
  
   <tr>
    <th height="33" scope="col">Course Name</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $coursename; ?> </div></th>
    </tr>
  <tr>
    <th height="127" scope="col">Comment</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $coursecomment; ?> </div></th>
    </tr>
  <tr>
    <th height="42" scope="col">Course Key</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $coursekey; ?> </div></th>
    </tr>
  <tr>
    <th height="37" scope="col">&nbsp;</th>
    <th scope="col"><div align="left">&nbsp;  <a href='course.php'><< Back </a></div></th>
    </tr>
  </table>
<p>
  <?php
}
//course ends here
?>  
      
      
    <?php
    // if(isset($_GET["view"]) && $_GET["view"] == "subject")
 if($_GET["view"]="subject")
{
// Subject table starts here
$result1 = mysql_query("SELECT * FROM subject where subid='$_GET[slid]'");
while($row1 = mysql_fetch_array($result1))
  {
 $subid =  $row1["subid"];
 $subname = $row1["subname"];
$courseid =   $row1["courseid"];
$lecid =   $row1["lecid"];
$subtype = $row1["subtype"];
$semester =   $row1["semester"];
$comment =   $row1["comment"];
  }
  
?>  
</p>
<p>&nbsp;</p>
 <h2>Subject</h2>
<table width="428" border="1">
  <tr>
    <th width="150" height="48" scope="col">Subject ID.</th>
    <th width="262" scope="col"><div align="left"> &nbsp; <?php echo  $subid; ?></div></th>
    </tr>
  
   <tr>
    <th height="47" scope="col">Subject Name</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $subname; ?> </div></th>
    </tr>
  <tr>
    <th height="54" scope="col">Course ID</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $courseid; ?> </div></th>
    </tr>
  <tr>
    <th height="46" scope="col">Lecture ID</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $lecid; ?> </div></th>
    </tr>
    <tr>
    <th height="48" scope="col">Subject Type</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $subtype; ?> </div></th>
    </tr>
    <tr>
    <th height="50" scope="col">Semester</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $semester; ?> </div></th>
    </tr>
    <tr>
    <th height="101" scope="col">Comment</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $comment; ?> </div></th>
    </tr>
  <tr>
    <th height="45" scope="col">&nbsp;</th>
    <th scope="col"><div align="left">&nbsp;  <a href='subject.php'><< Back </a></div></th>
    </tr>
  </table>
<?php
}
//Subject ends here
?>  

        
    <?php
    // if(isset($_GET["view"]) && $_GET["view"] == "lectures")
 if($_GET["view"]="lectures")
{
// Lecture table starts here
$result2 = mysql_query("SELECT * FROM lectures where lecid='$_GET[slid]'");
while($row2 = mysql_fetch_array($result2))
  {
 $lecid =  $row2["lecid"];
 $password = $row2["password"];
$lecname =   $row2["lecname"];
$gender = $row2["gender"];
$address =   $row2["address"];
$contactno = $row2["contactno"];
  }
  
?>  
</p>
<p>&nbsp;</p>
 <h2>Lectures</h2>
<table width="428" border="1">
  <tr>
    <th width="150" height="44" scope="col">Lecture ID.</th>
    <th width="262" scope="col"><div align="left"> &nbsp; <?php echo  $lecid; ?></div></th>
    </tr>
  
   <tr>
    <th height="45" scope="col">Password</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $password; ?> </div></th>
    </tr>
  <tr>
    <th height="54" scope="col">Lecture Name</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $lecname; ?> </div></th>
    </tr>
  <tr>
    <th height="49" scope="col">Gender</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $gender; ?> </div> &nbsp;</th>
  </tr>
  <tr>
    <th height="49" scope="col">Address</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $address; ?> </div></th>
    </tr>
    <tr>
    <th height="55" scope="col">Contact No</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $contactno; ?> </div></th>
    </tr>
  <tr>
    <th height="37" scope="col">&nbsp;</th>
    <th scope="col"><div align="left">&nbsp;  <a href='lectureview.php'><< Back </a></div></th>
    </tr>
  </table>
<?php
}
//Lecture ends here
?>  

  
<?php
// if(isset($_GET["view"]) && $_GET["view"] == "studentdetails")
 if($_GET["view"]="studentdetails")
{
// Student table starts here
$result3 = mysql_query("SELECT * FROM studentdetails where studid='$_GET[slid]'");
while($row3 = mysql_fetch_array($result3))
{
$studid =  $row3["studid"];
$studfname = $row3["studfname"];
$studlname = $row3["studlname"];
$fathername= $row3["fathername"];
$gender = $row3["gender"];
$address = $row3["address"];
$contactno = $row3["contactno"];
$courseid = $row3["courseid"];
$semester = $row3["semester"];
$dob = $row3["dob"];
}
  
?>  
</p>
<p>&nbsp;</p>
 <h2>Students</h2>
<table width="428" border="1">
  <tr>
    <th width="150" height="35" scope="col">Student ID.</th>
    <th width="262" scope="col"><div align="left"> &nbsp; <?php echo  $studid; ?></div></th>
    </tr>
  
   <tr>
    <th height="33" scope="col">First name</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $studfname; ?> </div></th>
    </tr>
  <tr>
    <th height="54" scope="col">Last Name</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $studlname; ?> </div></th>
    </tr>
  <tr>
    <th height="46" scope="col">Father Name</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $fathername; ?> </div></th>
    </tr>
    <tr>
    <th height="50" scope="col">Gender</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $gender; ?> </div></th>
    </tr>
     <tr>
    <th height="48" scope="col">Address</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $address; ?> </div></th>
    </tr>
     <tr>
    <th height="43" scope="col">Contact No</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $contactno; ?> </div></th>
    </tr>
     <tr>
    <th height="48" scope="col">Course ID</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $courseid; ?> </div></th>
    </tr>
     <tr>
    <th height="56" scope="col">Semetser</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $semester; ?> </div></th>
    </tr>
     <tr>
    <th height="45" scope="col">Date Of Birth</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $dob; ?> </div></th>
    </tr>
  <tr>
    <th height="40" scope="col">&nbsp;</th>
    <th scope="col"><div align="left">&nbsp;  <a href='student.php'><< Back </a></div></th>
    </tr>
  </table>
<?php
}
//Student ends here
?>  

  
    
      <?php
      // if(isset($_GET["view"]) && $_GET["view"] == "attendance")
 if($_GET["view"]="attendance")
{
// Attendance table starts here
$result4 = mysql_query("SELECT * FROM attendance where attid='$_GET[slid]'");
while($row4 = mysql_fetch_array($result4))
  {
 $attid =  $row4["attid"];
 $studid = $row4["studid"];
$subid =   $row4["subid"];
$totalclasses =   $row4["totalclasses"];
$attendedclasses = $row4["attendedclasses"];
$percentage = $row4["percentage"];
$comment = $row4["comment"];
  }
  
?>  
</p>
<p>&nbsp;</p>
 <h2>Attendance</h2>
<table width="428" border="1">
  <tr>
    <th width="150" height="49" scope="col">Attendance ID.</th>
    <th width="262" scope="col"><div align="left"> &nbsp; <?php echo  $attid; ?></div></th>
    </tr>
  
   <tr>
    <th height="45" scope="col">Student ID</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $studid; ?> </div></th>
    </tr>
  <tr>
    <th height="54" scope="col">Subject ID</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $subid; ?> </div></th>
    </tr>
  <tr>
    <th height="41" scope="col">Total Classes</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $totalclasses; ?> </div></th>
    </tr>
    <tr>
    <th height="44" scope="col">Attended Classes</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $attendedclasses; ?> </div></th>
    </tr>
     <tr>
    <th height="48" scope="col">Percentage</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $percentage; ?> </div></th>
    </tr>
     <tr>
    <th height="50" scope="col">Comment</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $comment; ?> </div></th>
    </tr>
  <tr>
    <th height="47" scope="col">&nbsp;</th>
    <th scope="col"><div align="left">&nbsp;  <a href='attendanceview.php'><< Back </a></div></th>
    </tr>
  </table>
<?php
}
//Attendance ends here
?>  

      
      <?php
// if(isset($_GET["view"]) && $_GET["view"] == "examination")      
 if($_GET["view"]="examination")
{
// Examination table starts here
$result5 = mysql_query("SELECT * FROM examination where examid='$_GET[slid]'");
while($row5 = mysql_fetch_array($result5))
  {
 $examid =  $row5["examid"];
 $studid = $row5["studid"];
$subid =   $row5["subid"];
$courseid =   $row5["courseid"];
$internaltype = $row5["internaltype"];
$maxmarks = $row5["maxmarks"];
$scored = $row5["scored"];
$result = $row5["result"];
$comment = $row5["comment"];
  }
  
?>  
</p>
<p>&nbsp;</p>
 <h2>Examination</h2>
<table width="428" border="1">
  <tr>
    <th width="150" height="51" scope="col">Exam ID.</th>
    <th width="262" scope="col"><div align="left"> &nbsp; <?php echo  $examid; ?></div></th>
    </tr>
  
   <tr>
    <th height="51" scope="col">Student ID</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $studid; ?> </div></th>
    </tr>
  <tr>
    <th height="54" scope="col">Subject ID</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $subid; ?> </div></th>
    </tr>
  <tr>
    <th height="47" scope="col">Course ID</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $courseid; ?> </div></th>
    </tr>
    <tr>
    <th height="47" scope="col">Internal Type</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $internaltype; ?> </div></th>
    </tr>
     <tr>
    <th height="41" scope="col">Max Marks</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $maxmarks; ?> </div></th>
    </tr>
     <tr>
    <th height="40" scope="col">Scored</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $scored; ?> </div></th>
    </tr>
    <tr>
    <th height="40" scope="col">Result</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $result; ?> </div></th>
    </tr>
    <tr>
    <th height="53" scope="col">Comment</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $comment; ?> </div></th>
    </tr>
  <tr>
    <th height="43" scope="col">&nbsp;</th>
    <th scope="col"><div align="left">&nbsp;  <a href='examview.php'><< Back </a></div></th>
    </tr>
  </table>
<?php
}
//Examination ends here
?>  

  
  <?php
  // if(isset($_GET["view"]) && $_GET["view"] == "administrator")
if($_GET["view"]="administrator")
{
// Administrator table starts here
$result6 = mysql_query("SELECT * FROM administrator where adminid='$_GET[slid]'");
while($row6 = mysql_fetch_array($result6))
  {
 $adminid =  $row6["adminid"];
 $password = $row6["password"];
$adminname =   $row6["adminname"];
$address =   $row6["address"];
$contactno =   $row6["contactno"];
  }
  
?>   <h2>Admin</h2>
    <table width="428" border="1">
  <tr>
    <th width="150" height="50" scope="col">Admin ID.</th>
    <th width="262" scope="col"><div align="left"> &nbsp; <?php echo  $adminid; ?></div></th>
    </tr>
  
   <tr>
    <th height="43" scope="col">Password</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $password; ?> </div></th>
    </tr>
  <tr>
    <th height="56" scope="col">Admin Name</th>
    <th scope="col"><div align="left">&nbsp; <?php echo  $adminname; ?> </div></th>
    </tr>
  <tr>
    <th height="43" scope="col">Address</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $address; ?> </div></th>
    </tr>
    <tr>
    <th height="43" scope="col">Contact No</th>
    <th scope="col"><div align="left">&nbsp;  <?php echo  $contactno; ?> </div></th>
    </tr>
  <tr>
    <th height="36" scope="col">&nbsp;</th>
    <th scope="col"><div align="left">&nbsp;  <a href='adminview.php'><< Back </a></div></th>
    </tr>
  </table>
<p>
  <?php
}
//Admin ends here
?>  
  
  
  </section>
</article>


</section>

<?php 
}
else
{
		header("Location: admin.php");
}

include("adminmenu.php");
include("footer.php"); 

?>