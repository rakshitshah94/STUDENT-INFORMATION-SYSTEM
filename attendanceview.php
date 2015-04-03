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
include("header.php");
include("conection.php");
include("modal.php");
?>

<script>
function getXMLHTTP() { //fuction to return the xml http object
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

<?php
if(isset($_GET['view']) && $_GET['view']== "delete")
	// if($_GET["view"] == "delete")
	{
	mysql_query("DELETE FROM attendance WHERE attid ='$_GET[slid]'");
	}
if(isset($_SESSION["userid"]))
{
	if(isset($_GET["first"])) 
	{
	}
	else
	{
		$_GET["first"] =0;
	$_GET["last"] = 10;
	}
	if(isset($_POST["button"]))
	{
		
		$resultax = mysql_query("SELECT * FROM attendance where subid='$_POST[subject]'");
	}
	else
	{
	$result = mysql_query("SELECT * FROM attendance LIMIT $_GET[first] , $_GET[last]");
	}
$result1 = mysql_query("SELECT * FROM course LIMIT $_GET[first] , $_GET[last]");
$result2 = mysql_query("SELECT * FROM subject LIMIT $_GET[first] , $_GET[last]");
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
  </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Attendance  Details</h2>
  <p>&nbsp;</p>
  
<?php include("selectcss.php"); ?>
  

  <p>&nbsp;</p>
  </header>
  <section class="entry">
     <?php 

if(mysql_num_rows($resultax) >= 1)
{
	?>
<table width="490" border="1">
        <tr>
          <td width="36">Sl.No</td>
          <td width="54">Student ID</td>
          <td width="53">Student Name</td>
          <td width="52">Subject</td>
          <td width="50">Total Classes</td>
          <td width="64">Attended Classes</td>
          <td width="67">Percentage</td>
          <td width="62"><strong>Action</strong></td>
        </tr>
        <?php
	   $i =$_GET[first]+1;
  while($row = mysql_fetch_array($resultax))
  {
  echo "<tr>";
  echo "<td>&nbsp;"  . $i . "</td>";
  echo "<td>&nbsp;" . $row['studid'] . "</td>";
  $result5 = mysql_query("SELECT * FROM studentdetails where  	studid='$row[studid]'");
    	   while($rowa= mysql_fetch_array($result5))
  {
		  echo "<td>&nbsp;" . $rowa['studfname'] . " " . $rowa['studlname'] . "</td>";
  }
  
    $result55 = mysql_query("SELECT * FROM subject where subid='$row[subid]'");
    	   while($rowasy= mysql_fetch_array($result55))
  {
		  echo "<td>&nbsp;" . $rowasy['subname'] . "</td>";
  }
	   echo "<td>&nbsp;" . $row['totalclasses'] . "</td>";
	     echo "<td>&nbsp;" . $row['attendedclasses'] . "</td>";  
		 echo "<td>&nbsp;" . $row['percentage'] . "</td>";
	   	   echo "<td>&nbsp;<a href='viewrecords.php?slid=$row[attid]&view=attendance'><img src='images/view.png' width='32' height='32' /></a><a href='attendanceinsert.php?slid=$row[attid]&view=edit'><img src='images/edit.png' width='32' height='32' /><a href='attendanceview.php?slid=$row[attid]&view=delete'></a> </td>";
  echo "</tr>&nbsp;";
  $i++;
  }
  $first=$_GET[first]-10;
$last= $_GET[last]- 10;
?>
        <tr>
          <td><?php 
	if($first <0)
	{ 
	} 
	else 
	{ ?>
    <a href="attendanceview.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    
    <?php 
	}
	?><img src="images/previous.png" alt="" width="32" height="32" /></td>
          <td><a href="attendance.php" ><img src="images/add.png" alt="" width="32" height="32" /></a></td>
           <?php 
$first=$_GET[first]+10;
$last = $_GET[last]+ 10;
?>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><?php 
	if($first > mysql_num_rows($result))
	{ 
	} 
	else 
	{ ?>
    <a href="attendanceview.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    <?php
	}
	?><img src="images/next.png" alt="" width="32" height="32" /></td>
        </tr>
      </table></td>
    </tr>
    </table>
    
      <?php
}
else
{
	echo "<h2>No Records Found...</h2>";
}
?>
 <?php
     if($_SESSION["type"]=="admin")
	{
		?>
     <p><a href="examview.php?first=<?php echo $first; ?>&amp;last=<?php echo $last; ?>"><a href="attendance.php" ><strong>Add Attendance Records</strong></a></p>
 <?php
	}
	?>
  </section>
</article>


</section>


<?php 
}
else
{
	header("Location: admin.php");
}
if($_SESSION["type"]=="admin")
	{
	include("adminmenu.php");
	}
	else
	{	
	include("lecturemenu.php");
	}

include("footer.php"); ?>