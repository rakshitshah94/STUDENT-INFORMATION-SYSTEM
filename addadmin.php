
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
	$pwde = md5($_POST["password"]);
$sql="INSERT INTO administrator (adminid, adminname, password, address, contactno)
VALUES
('$_POST[adminid]','$_POST[adminname]','$pwde','$_POST[address]','$_POST[contactno]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
	  echo "1 record Inserted Successfully...";
  }
}
$result = mysql_query("SELECT * FROM administrator");
while($row1 = mysql_fetch_array($result))
  {
	$adminid = $row1["adminid"]+1;
	}
if(isset($_POST["button2"]))
{
	$pwde = md5($_POST["password"]);
mysql_query("UPDATE administrator SET 	adminname='$_POST[adminname]', 	address='$_POST[address]', 	contactno='$_POST[contactno]'
WHERE adminid = '$_POST[adminid]'");
echo "Record updated successfully";
}

if(isset($_GET['view']) && $_GET['view']== "administrator")
// if($_GET["view"] == "administrator")
{
$result = mysql_query("SELECT * FROM administrator where adminid='$_GET[slid]'");	
 while($row1 = mysql_fetch_array($result))
  {
	$adminid = $row1["adminid"];
	$password = $row1["password"];
	$adminname = $row1["adminname"];
	$address = $row1["address"];
$contact = 	$row1["contactno"];
	}
}



?> 
<form name="form1" method="post" action="" id="formID">
  <p>
    <label for="adminid">Admin ID</label>
    <input type="text" name="adminid" id="adminid"  class="validate[required] text-input" value="<?php echo $adminid; ?>">
</p>
  <p>
    <label for="adminname">Admin Name</label>
    <input type="text" name="adminname" id="adminname"  class="validate[required,custom[onlyLetterSp]] text-input"  value="<?php echo $adminname; ?>">
</p>
<p>
  <label for="password">Password</label>
  <input type="password" name="password" id="password"  class="validate[required] text-input" >
</p>
 <p>
    <label for="cpassword">Confirm Password</label>
    <input type="password" name="cpassword" id="cpassword" class="validate[required,equals[password]] text-input">
</p>
  <p>
    <label for="address">Address</label>
    <textarea name="address" id="address" class="validate[required] text-input" cols="45" rows="5"  ><?php echo $address; ?></textarea>
</p>
  <p>
    <label for="contactno">Contact No</label>
    <input type="text" name="contactno" id="contactno"  class="validate[required,custom[phone]] text-input" value="<?php echo $contact; ?>">
</p>
  <p>
    <input type="submit" name="button" id="button" value="Submit">
    <input type="submit" name="button2" id="button2" value="Update" />
    <input type="submit" name="Reset" id="Reset" value="Reset">
<form id="myform">
  <input type="button" value="Close" name="B1" onClick="parent.emailwindow.hide()" /></p>
</form>
  </p>
</form>
<a href='adminview.php'>&lt;&lt; Back </a>
