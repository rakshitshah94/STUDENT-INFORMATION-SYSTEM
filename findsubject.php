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

$semester=$_REQUEST['semester'];

$query="select subid,subname from subject where courseid=$semester";
$result=mysql_query($query);

?>
<select name="select3">
<option>Select Subject</option>
<? while($row=mysql_fetch_array($result)) { ?>
<option value><?=$row['subname']?></option>
<!-- changed subname | city -->
<? } ?>
</select>
