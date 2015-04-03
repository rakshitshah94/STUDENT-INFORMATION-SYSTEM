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

$totcourse = mysql_query("SELECT MAX(courseid) FROM course");

 while($row1 = mysql_fetch_array($totcourse))
  {
$totid = $row1[0]+1;
  }
if(isset($_POST["button"]))
{
$sql="INSERT INTO course (courseid, coursename, comment, coursekey)
VALUES
('$_POST[courseid]','$_POST[coursename]','$_POST[comment]','$_POST[coursekey]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
	  echo "1 record Inserted Successfully...";
  }
}

if(isset($_POST["button2"]))
{
mysql_query("UPDATE course SET coursename='$_POST[coursename]', 	comment='$_POST[comment]', 	coursekey='$_POST[coursekey]' WHERE courseid = '$_POST[courseid]'");
echo "Record updated successfully...";
}


if('$_post["view"]' == "course")
{
$result = mysql_query("SELECT * FROM course where courseid='$_GET[slid]'");	
 while($row1 = mysql_fetch_array($result))
  {
	$totid = $row1["courseid"];
	$coursename = $row1["coursename"];
	$comment = $row1["comment"];
	$coursekey = $row1["coursekey"];
	}
}
else
{
$result = mysql_query("SELECT * FROM course");
}

?> 
<form name="form1" method="post" action="" id="formID">
  <p>
    <label for="textfield">Course ID</label>
    <input type="text" name="courseid" id="textfield" class="validate[required] text-input" value="<?php echo $totid; ?>" readonly >
  </p>
  <p>
    <label for="textfield2">Course Name</label>
    <input type="text" name="coursename" id="textfield2" class="validate[required,custom[onlyLetterSp]] text-input" value="<?php echo $coursename; ?>">
  </p>
  <p>
    <label for="textarea">Comment</label>
    <textarea name="comment" id="textarea" class="validate[required]" cols="25" rows="5" ><?php echo $comment; ?></textarea>
  </p>
  <p>
    <label for="coursekey">Course Key</label>
    <input type="text" name="coursekey" id="coursekey" class="validate[required,custom[onlyLetterSp]] text-input" value="<?php echo $coursekey; ?>">
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Submit">
    <input type="submit" name="button2" id="button2" value="Update" />
    <input type="submit" name="button2" id="button2" value="Reset">
<form id="myform">
  <input type="button" value="Close" name="B1" onClick="parent.emailwindow.hide()" /></p>
</form>
  </p>
</form>
<p>&nbsp;</p>
