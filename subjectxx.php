<?php

/**
 * @System     HP-pc Rax
 * @author     Rakshit shah <Rakshitshah1994@gmail.com>
 * @copyright  2015-2017 |Rakshit shah
 * @license    http://rakshit.in/license/license.php |  PHP License 3.0
 * @version    1.1
 * @since      File available since Release 1.0.0
 */

include("validation.php");
include("conection.php");

$totcourse = mysql_query("SELECT * FROM subject");
$totid = mysql_num_rows($totcourse);
 while($row1 = mysql_fetch_array($totcourse))
  {
$totid = $row1[0]+1;
  }
if(isset($_POST["button"]))
{
$sql="INSERT INTO subject (subid, subname, comment, courseid,subtype, semester)
VALUES
('$_POST[subid]','$_POST[subname]','$_POST[comment]','$_POST[course]','$_POST[subtype]','$_POST[semester]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
	  echo "Record inserted Successfully...";
  }
}

if(isset($_POST["button2"]))
{
mysql_query("UPDATE subject SET subname='$_POST[subname]', 	comment='$_POST[comment]', 	courseid='$_POST[courseid]', 	subtype='$_POST[subtype]', 	semester='$_POST[semester]', 	lecid='$_POST[lecid]' WHERE subid = '$_POST[subid]'");
echo "Record updated successfully...";
}

if(isset($_GET["view"]) && $_GET["view"] == "subject")
// if($_GET["view"] == "subject")
{
$result = mysql_query("SELECT * FROM subject where subid='$_GET[slid]'");	
 while($row1 = mysql_fetch_array($result))
  {
	$totid = $row1["subid"];
	$subname = $row1["subname"];
	$comment = $row1["comment"];
	$courseid  = $row1["courseid"];
	$subtype = $row1["subtype"];
	$semester = $row1["semester"];
	$lecid = $row1["lecid"];
	}
}

$result = mysql_query("SELECT * FROM subject");
$result1 = mysql_query("SELECT * FROM course");
$reslec = mysql_query("SELECT * FROM lectures");



?> 
<form name="form1" method="post" action="" id="formID">
  <p>
    <label for="textfield">Subject ID</label>
    <input type="text" name="subid" id="textfield" class="validate[required] text-input" value="<?php echo $totid; ?>" readonly>
  </p>
  <p>
    <label for="textfield2">Sub Name</label>
    <input type="text" name="subname" id="textfield2" class="validate[required,custom[onlyLetterSp]] text-input" value="<?php echo $subname; ?>">
  </p>
  <p>
    <label for="textarea">Comment</label>
    <textarea name="comment" id="textarea" class="validate[required]" cols="25" rows="5"><?php echo $comment; ?></textarea>
  </p>
 <p>
    <label for="textfield7">Course </label>
    <select name="course" value="<?php echo $courseid; ?>">
     <option value="">Course Details</option>
     <?php
	  while($row1 = mysql_fetch_array($result1))
  {
	  if($courseid  == $row1[courseid])
	  {
		  $selvar = "selected";
	  }
  echo "<option value='$row1[courseid]' ". $selvar . ">$row1[coursekey]</option>";
  $selvar ="";
  }
  ?>
    </select>
  </p>
  <p>
    <label for="select">Subject Type</label>
    <select name="subtype" id="select" value="<?php echo $subtype; ?>">
      <option value="Language">Language</option>
      <option value="Theory">Theory</option>
      <option value="Lab">Lab</option>
    </select>
  </p>
  <p>
    <label for="select2">Semester</label>
    <select name="semester" id="semester" value="<?php echo $semester; ?>">
      <option value="1">First Semester</option>
      <option value="2">Second Semester</option>
      <option value="3">Third Semester</option>
      <option value="4">Fourth Semester</option>
      <option value="5">Fifth Semester</option>
      <option value="6">Sixth Semester</option>
    </select>
  </p>
  <p>Lecture 
    <select name="semester2" id="semester2" value="<?php echo $lecid; ?>">
      <?php
 while($row1 = mysql_fetch_array($reslec))
  {
  echo "<option value='$row1[lecid]'>$row1[lecname]</option>";
  }
  ?>
    </select>
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Submit">
     <input type="submit" name="button2" id="button2" value="Update" />
    <input type="submit" name="button2" id="button2" value="Reset">  <form id="myform">
  <input type="button" value="Close" name="B1" onClick="parent.emailwindow.hide()" /></p>
</form>
  </p>
</form>
<a href='subject.php'><< Back </a>