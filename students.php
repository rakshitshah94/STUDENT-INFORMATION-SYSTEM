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
if(isset($_POST["button"]))
{
$sql="INSERT INTO studentdetails (studid, studfname, studlname, dob,fathername, gender, address, contactno,courseid,semester)
VALUES
('$_POST[studid]','$_POST[studfname]','$_POST[studlname]','$_POST[dob]','$_POST[fname]','$_POST[gender]','$_POST[address]','$_POST[contact]','$_POST[course]','$_POST[semester]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
	  echo "Record inserted Successfully...";
  }
}

$result = mysql_query("SELECT * FROM studentdetails");
$result1 = mysql_query("SELECT * FROM course");
?> 
<form name="form1" method="post" action="" id="formID" class="formular">
  <p>
    <label for="textfield">Student ID</label>
    <input type="text" name="studid" id="textid" class="validate[required] text-input">
  </p>
  <p>
    <label for="textfield2">First name</label>
    <input type="text" name="studfname" id="textfname" class="validate[required] text-input">
  </p>
  <p>
    <label for="textfield3">Last name</label>
    <input type="text" name="studlname" id="textlname" class="validate[required] text-input">
  </p>
  <p>
    <label for="textfield4">Date of birth</label>
    <input type="text" name="dob" id="textdob" class="validate[required] text-input">
  </p>
  <p>
    <label for="textfield5">Father's name</label>
    <input type="text" name="fname" id="textfield5" class="validate[required] text-input">
  </p>
  <p>Gender
    <input type="radio" name="gender" id="radio" value="Male">
    Male
    <input type="radio" name="gender" id="radio2" value="Female">
    Female
  </p>
  <p>
    <label for="textarea">Address</label>
    <textarea name="address" id="textarea" class="validate[required]" cols="45" rows="5"></textarea>
  </p>
  <p>
    <label for="textfield6">Contact No</label>
    <input type="text" name="contact" id="textfield6" class="validate[required] text-input">
  </p>
  <p>
    <label for="textfield7">Course </label>
    <select name="course">
     <option value="">Course Details</option>
     <?php
 while($row1 = mysql_fetch_array($result1))
  {
  echo "<option value='$row1[courseid]'>$row1[coursename]</option>";
  }
  ?>
    </select>
  </p>
  <p>
    <label for="textfield8">Semester</label>
    <label for="select"></label>
    <select name="semester" id="select">
      <option value="1">First Semester</option>
      <option value="2">Second Semester</option>
      <option value="3">Third Semester</option>
      <option value="4">Fourth Semester</option>
      <option value="5">Fifth Semester</option>
      <option value="6">Sixth Semester</option>
    </select>
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Submit">
    <input type="submit" name="button2" id="button2" value="Reset">
  </p>
</form>
<p>&nbsp;</p>
<table width="371" border="1">
  <tr>
    <td width="46">ID</td>
    <td width="88">Name</td>
    <td width="87">Date of birth</td>
    <td width="57">Course</td>
    <td width="59">Semester</td>
  </tr>
  <?php
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>&nbsp;" . $row['studid'] . "</td>";
  echo "<td>&nbsp;" . $row['studfname']. $row['studlname'] . "</td>";
    
	 echo "<td>&nbsp;" . $row['dob'] . "</td>";
	  echo "<td>&nbsp;" . $row['courseid'] . "</td>";
	   echo "<td>&nbsp;" . $row['semester'] . "</td>";
  echo "</tr>&nbsp;";
  }
?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
</table>
<p>&nbsp;</p>
