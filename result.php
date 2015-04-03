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
if(isset($_GET["resid"]))
{
$rid =	$_GET["resid"];
}
else
{
	$rid =	$_POST["rollno"];
}
$result= mysql_query("SELECT * FROM studentdetails where studid='$rid' ");
$result1= mysql_query("SELECT * FROM course");
$result2= mysql_query("SELECT * FROM attendance");
$result3= mysql_query("SELECT * FROM examination where studid='$rid'");
 while($row1 = mysql_fetch_array($result))
  {
	  $regno = $row1["studid"];
	  $name = $row1['studfname'] . " " . $row1['studlname'] ;
	  $fathersname = $row1["fathername"];
	  $course = $row1["courseid"];
	  $semester = $row1["semester"];
	  $dob = $row1["dob"];
	  
  }
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Result</title>
<style>
html {background:#fff; height:100%; width:100%;}
body {background:#f4f4f4; width:500px; margin:25px auto 25px; text-align:center; display:block; border:solid 1px #ccc; font:normal 14px "Trebuchet MS", Arial, Helvetica, sans-serif; line-height:22px; padding:50px;}
a {color:#F60;}


</style>
</head>

<body>

<form name="form1" method="post" action="">
  <p>
    <label for="textfield">Reg No:   </label>
 <?php
    echo $regno; 
 ?> </p>
  <p>
    <label for="textfield2">Name: </label> <?php echo $name; ?>
  </p>
  <p>
  <label for="textfield3">Father's Name:</label> <?php echo $fathersname; ?> </p>
  <p>
    <label for="select">Course</label>
  : <?php echo $course; ?> </p>
  <p>
    <label for="select2">Semester</label>
  : <?php echo $semester; ?></p>
  <p>
    <label for="textfield4">DOB</label>
    :  <?php echo $dob; ?>
  </p>
  <hr>
  <table width="483" height="96" border="1">
    <tr>
      <td width="141">Subject</td>
      <td width="67">Max Marks</td>
      <td width="97">Scored marks</td>
      <td width="71">Result</td>
      <td width="241">Comment</td>
    </tr>
    <tr>
       <?php
	  $i =1;
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>&nbsp;"  . $i . "</td>";
  echo "<td>&nbsp;" . $row['subname'] . "</td>";
  $result4 = mysql_query("SELECT * FROM subject where  	subid='$row[subid]'");
    	   while($rowa= mysql_fetch_array($result))
  {
		  echo "<td>&nbsp;" . $rowa['studfname'] . " " . $rowa['studlname'] . "</td>";
  }
  
    $result55 = mysql_query("SELECT * FROM subject where subid='$row[subid]'");
    	
  }
  
?>
    </tr>
     <?php
     while($row3 = mysql_fetch_array($result3))
  {?>
    <tr>
      <td>&nbsp;<?php echo $row3["subid"]; ?> </td>
      <td>&nbsp;<?php echo $row3["maxmarks"]; ?> </td>
       <td>&nbsp;<?php echo $row3["scored"]; ?> </td>
      <td>&nbsp;<?php echo $row3["result"]; ?> </td>
      <td>&nbsp;<?php echo $row3["comment"]; ?> </td>
    </tr>
    <?php
  }
  ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Total</td>
      <td>&nbsp;
      <?php
       $result552 = mysql_query("SELECT SUM(scored) FROM examination  where studid='$rid'");
while($row22 = mysql_fetch_array($result552))
  {
	  echo $tota = $row22[0];
  }
	   ?>
    	</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Percentage</td>
      <td>&nbsp;
       <?php
      	 $perca = $tota/ mysql_num_rows($result552);
         /* 
          * put $result3 in above line #RAX
         */
		echo number_format( $perca, 2, '.', '');
		  ?>
 </td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="486" height="135" border="1">
    <tr>
      <td width="60" height="45">Subject</td>
      <td width="54">Total Classes</td>
      <td width="75">Attended Classes</td>
      <td width="104">Percentage</td>
      <td width="205">Comment</td>
    </tr>
    <?php
     while($row4 = mysql_fetch_array($result2))
  {?>
    <tr>
      <td>&nbsp;<?php echo $row4["subid"]; ?></td>
      <td>&nbsp;<?php echo $row4["totalclasses"]; ?> </td>
      <td>&nbsp;<?php echo $row4["attendedclasses"]; ?> </td>
       <td>&nbsp;<?php echo $row4["percentage"]; ?> </td>
      <td>&nbsp;<?php echo $row4["comment"]; ?> </td>
    </tr>
    <?php
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
  <p><a href="viewresult.php"><strong >&lt;&lt;Back</strong></a><br>
  </p>
</form>
</body>
</html>
