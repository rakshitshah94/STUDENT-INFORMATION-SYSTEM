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

$totcourse = mysql_query("SELECT * FROM lectures");
$result1 = mysql_query("SELECT * FROM course");
$totid = mysql_num_rows($totcourse)+1;

if(isset($_POST["button"]))
{
	$pwde = md5($_POST["password"]);
$sql="INSERT INTO lectures (lecid, password, courseid, lecname, gender, address ,contactno)
VALUES
('$_POST[lecid]','$pwde', '$_POST[course]',  '$_POST[lecname]', '$_POST[gender]','$_POST[address]','$_POST[contactno]')";

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
	$pwde = md5($_POST["password"]);
mysql_query("UPDATE lectures SET lecname='$_POST[lecname]',     gender='$_POST[gender]', address='$_POST[address]', courseid='$_POST[coursekey]' 	contactno='$_POST[contactno]' WHERE lecid = '$_POST[lecid]'");
echo "Record updated successfully...";
}

if(isset($_GET['view']) && $_GET['view']== "lectures")
// if($_GET["view"] == "lectures")
{
$result = mysql_query("SELECT * FROM lectures where lecid='$_GET[slid]'");	
 while($row1 = mysql_fetch_array($result))
  {
	$totid = $row1["lecid"];
	$lecname = $row1["lecname"];
	$password = $row1["password"];
	$courseid = $row1["courseid"];
	$gender = $row1["gender"];
	$address = $row1["address"];
	$contactno = $row1["contactno"];
	}
}
else
{
$result = mysql_query("SELECT * FROM lectures");
}

?> 
<form name="form1" method="post" action="" id="formID">
  <p>&nbsp;</p>
  <p>
    <label for="lecid">Lecturer ID&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="lecid" id="lecid" class="validate[required] text-input" readonly value="<?php echo $totid; ?>">
  </p>
  <p>
  <label for="lecname">Lecturer Name</label>
    <input type="text" name="lecname" id="lecname" class="validate[required,custom[onlyLetterSp]] text-input" value="<?php echo $lecname; ?>">
  </p>
  <p>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="validate[required] text-input">
  </p>
  <p>
    <label for="textfield4">Confirm Password</label>
    <input type="password" name="textfield4" id="textfield4" class="validate[required,equals[password]] text-input">
  </p>
  <p>
    <label for="textfield2">Course </label>
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
  <p>Gender
    <input type="radio" name="gender" id="radio" value="Male" <?php
  if($gender == "Male")
  {
	  echo "checked";
  }
  ?> class="validate[required] radio" />
    <label for="radio">Male</label>
    <input type="radio" name="gender" id="radio2" value="Female"  <?php if($gender == "Female")
  {
	  echo "checked";
  }?> class="validate[required] radio" />
    <label for="radio2">Female</label>
  </p>
  <p>
    <label for="address">Address</label>
    <textarea name="address" id="address" class="validate[required]" cols="25" rows="5"><?php echo $address; ?></textarea>
  </p>
  <p>
    <label for="contactno">Contact No</label>
    <input type="text" name="contactno" id="contactno" class="validate[required,custom[phone]] text-input"  value="<?php echo $contactno; ?>">
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Submit"> 
      <input type="submit" name="button2" id="button2" value="Update" />
    <input type="submit" name="button2" id="button2" value="Reset">
<form id="myform">
  <input type="button" value="Close" name="B1" onClick="parent.emailwindow.hide()" /></p>
</form>
  </p>
  <p>&nbsp;</p>
</form>
<a href='lectureview.php'>&lt;&lt;Back </a>