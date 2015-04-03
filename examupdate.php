<?php

/**
 * @System     HP-pc Rax
 * @author     Rakshit shah <Rakshitshah1994@gmail.com>
 * @copyright  2015-2017 |Rakshit shah
 * @license    http://rakshit.in/license/license.php |  PHP License 3.0
 * @version    1.1
 * @since      File available since Release 1.0.0
 */

include("conection.php");
//if(isset($_POST["button"]))
{
mysql_query("UPDATE examination SET scored='$_POST[scored]', 	result='$_POST[result]' WHERE examid ='$_POST[examid]'");

}

$result = mysql_query("SELECT * FROM examination where examid ='$_GET[exid]'");	
 while($row = mysql_fetch_array($result))
  {
	 
$examid =  $row["examid"]; 	
$studid =  $row["studid"];  	
$subid =  $row["subid"]; 	
$courseid = $row["courseid"]; 	
$internaltype = $row["internaltype"];
$maxmarks =  $row["maxmarks"]; 
$scored =  $row["scored"]; 		
$percentage =  $row["percentage"]; 
$commentr =  $row["result"];

  }
?>

<form method="post" action="">
<p>Exam ID : 
  <label for="textfield"></label>
  <input type="text" name="examid" id="examid" value="<?php echo $examid; ?>" />
</p>
<p>Student ID : 
  <input type="text" name="stid" id="stid" value="<?php echo $studid; ?>"  />
</p>
<p>Course ID : 
  <input type="text" name="courseid" id="courseid" value="<?php echo $courseid; ?>"  />
</p>
<p>Internal Type:

  <label for="select"></label>
  <select name="internaltype" id="select">
    <option value="1">First Internal</option>
    <option value="2">Second Internal</option>
  </select>
</p>
<p>Maximum Marks:
  <input type="text" name="maxm" id="maxm" value="<?php echo $maxmarks; ?>"  />
</p>
<table width="200" border="1">
  <tr>
    <th colspan="2" scope="col">&nbsp;<?php
    if(isset($_POST["button"]))
{ echo "Record updated successfully..."; 
}?></th>
    </tr>
  <tr>
    <th scope="col"><?php echo $subid; ?></th>
    <th scope="col">Result:
      <label for="textarea"></label></th>
    </tr>
  <tr>
    <td height="39"><input type="text" name="scored" id="scored" value="<?php echo $scored; ?>"  /></td>
    <td><textarea name="comment" id="comment" cols="25" rows="2"><?php echo $commentr; ?></textarea></td>
    </tr>
</table>
<p>&nbsp; </p>
<p>
  <input type="submit" name="button" id="button" value="Update Records" />
</p>
</form>
