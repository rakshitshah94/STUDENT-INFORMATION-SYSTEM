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

$pa=md5($_POST["textpassword"]);
include("conection.php");
$sql="INSERT INTO administrator (adminid, password, adminname,	address, contactno)
VALUES ('$_POST[textadmin]','$pa','$_POST[textname]','$_POST[textadd]','$_POST[textcont]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

$result = mysql_query("SELECT * FROM administrator");

?> 

<form name="form1" method="post" action=""  id="formID" class="formular">
  <p>
    <label for="textadmin">Admin ID</label>
    <input type="text" name="textadmin" id="textadmin" class="validate[required] text-input">
  </p>
  <p>
    <label for="textpassword">Password</label>
    <input type="password" name="textpassword" id="textpassword" class="validate[required] text-input">
  </p>
  <p>
    <label for="textfield3">Confirm Password</label>
    <input type="password" name="textfield3" id="textfield3" class="validate[required,equals[textpassword]] text-input">
  </p>
  <p>
    <label for="textname">Admin Name</label>
    <input type="text" name="textname" id="textname" class="validate[required] text-input">
  </p>
  <p>
    <label for="textadd">Address</label>
    <textarea name="textadd" class="validate[required]" id="textadd" cols="45" rows="5"></textarea>
  </p>
  <p>
    <label for="textcont">Contact No</label>
    <input type="text" name="textcont" id="textcont" class="validate[required] text-input">
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Submit">
    <input type="reset" name="button2" id="button2" value="Reset">
  </p>
</form>
<br />
<table width="317" border="1">
  <tr>
    <th width="18" scope="col"><p>ID</p></th>
    <th width="40" scope="col">Name</th>
    <th width="55" scope="col">Address</th>
    <th width="95" scope="col">Contactno</th>
  </tr>
<?php

  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>&nbsp;" . $row['adminid'] . "</td>";
  echo "<td>&nbsp;" . $row['adminname'] . "</td>";
   echo "<td>&nbsp;" . $row['address'] . "</td>";
    echo "<td>&nbsp;" . $row['contactno'] . "</td>";
  echo "</tr>&nbsp;";
  }

?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
