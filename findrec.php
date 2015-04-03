<?php

/**
 * @System     HP-pc Rax
 * @author     Rakshit shah <Rakshitshah1994@gmail.com>
 * @copyright  2015-2017 |Rakshit shah
 * @license    http://rakshit.in/license/license.php |  PHP License 3.0
 * @version    1.1
 * @since      File available since Release 1.0.0
 */

$course=$_REQUEST['course'];
$link = mysql_connect('localhost', 'root', ''); //change the configuration in required

if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('studentinfo');
$query="select subid,subname from subject where courseid=$course";
$result=mysql_query($query);

?>
<select name="subject">
<option>Select Subject</option>
<? while($row=mysql_fetch_array($result)) { ?>
<option value='<?php $subname=$row["subid"]?>'>
<?php echo $row["subname"]?></option>
<? } ?>
</select>
