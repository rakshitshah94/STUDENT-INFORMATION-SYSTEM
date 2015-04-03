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
if(isset($_POST["button"]))
{
mysql_query("UPDATE attendance SET studid='$_POST[stid]',subid='$_POST[subid]',totalclasses='$_POST[totcla]',attendedclasses='$_POST[attcla]',percentage='$_POST[percent]',comment='$_POST[comment]'  WHERE attid ='$_POST[attid]'");
echo "Record updated successfully...";
}

$result = mysql_query("SELECT * FROM attendance where examid='$_GET[coid]'");	
 while($row = mysql_fetch_array($result))
  {
$attid =  $row[attid]; 	
$studid =  $row[studid]; 	
$subid =  $row[subid]; 	
$totalclasses = $row[totalclasses]; 	
$attendedclasses = $row[attendedclasses]; 	
$percentage =  $row[percentage];	
$comment =  $row[comment];
  }
?>

<form method="post" action="">
<p>Attendance ID : 
  <label for="textfield"></label>
  <input type="text" name="attid" id="examid" value="<?php echo $attid; ?>" />
</p>
<p>Student ID : 
  <input type="text" name="stid" id="stid" value="<?php echo $studid; ?>"  />
</p>
<p>Subject ID:
  <input type="text" name="subid" id="subid" value="<?php echo $subid; ?>"  />
</p>
<p>Total Classes : 
  <input type="text" name="totcla" id="totcla" value="<?php echo $totalclasses; ?>"  />
</p>
<p>Attended Classes:

  <label for="select"></label>
  <input type="text" name="attcla" id="maxm2" value="<?php echo $attendedclasses; ?>"  />
</p>
<p>Percentage:
  <input type="text" name="percent" id="maxm" value="<?php echo $percentage; ?>"  />
</p>
<p>Comment:
  <label for="textarea"></label>
  <textarea name="comment" id="comment" cols="45" rows="5" value="<?php echo $comment; ?>" ></textarea>
</p>
<p>
  <input type="submit" name="button" id="button" value="Submit" />
</p>
</form>
