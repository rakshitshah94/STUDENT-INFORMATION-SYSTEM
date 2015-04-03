<?php

/**
 * @System     HP-pc Rax
 * @author     Rakshit shah <Rakshitshah1994@gmail.com>
 * @copyright  2015-2017 |Rakshit shah
 * @license    http://rakshit.in/license/license.php |  PHP License 3.0
 * @version    1.1
 * @since      File available since Release 1.0.0
 */
session_start();
include("conection.php");

$query="select city from subject where courseid='$courseid' ";
$result=mysql_query($query);
if(isset($_SESSION["void"]))
{
$result2 = mysql_query("SELECT DISTINCT courseid FROM subject where courseid='$_SESSION[coid]'");
}
else
{
$result2 = mysql_query("SELECT DISTINCT courseid FROM subject");	
}
?>
<script>
function getXMLHTTP() {
 // fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getCity(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('subdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>



<form method="post" action="" name="form1">
<table width="60%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="150"><strong>Course</strong></td>
    <td  width="150"><select name="course" onChange="getCity('findrec.php?course='+this.value)">
	<option value="">Select Course</option>
	<?php
    while($row1 = mysql_fetch_array($result2))
  {
	  $result21 = mysql_query("SELECT * FROM course where courseid='$row1[courseid]'");
	echo "<option value='$row1[courseid]'>";
		  while($row11 = mysql_fetch_array($result21))
  {
	  echo $row11["coursekey"];
  }
	 echo "</option>";
  }
    ?>
        </select></td>
  </tr>
  <tr style="">
    <td height="28"><strong>Semester</strong></td>
    <td ><select name="semsester">
	<option>Select Semester</option>
	<option value="1">1st Semester</option>
	<option value="2">2nd Semester</option>
	<option value="3">3rd Semester</option>
	<option value="4">4th Semester</option>
	<option value="5">5th Semester</option>
	<option value="6">6th Semester</option>
      </select></td>
  </tr>
  <tr>
    <td><strong>Subject</strong></td>
    <td><div id="subdiv"><select name="subject">
      <option selected>Select Subject</option>
    </select></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Search" /></td>
  </tr>
</table>
</form>
