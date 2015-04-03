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
if(isset($_GET['view']) && $_GET['view']== "delete")
// if($_GET["view"] == "delete")
{
mysql_query("DELETE FROM lectures WHERE lecid ='$_GET[slid]'");
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
$result = mysql_query("SELECT * FROM lectures LIMIT $_GET[first] , $_GET[last]");
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
  </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Lecture Details</h2>
  </header>
  <section class="entry">
    <table width="508" border="1">
  <tr>
    <td width="45"><strong>&nbsp; ID</strong></td>
    <td width="94"><strong>&nbsp; Leturer Name</strong></td>
    <td width="80"><strong>&nbsp; Address</strong></td>
    <td width="71"><strong>&nbsp; Contact No.</strong></td>
    <td width="106"><strong>&nbsp; Action</strong></td>
    
  </tr>
    <?php
  $i =$_GET["first"]+1;
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>&nbsp;"  . $i . "</td>";
  echo "<td>&nbsp;" . $row['lecname'] . "</td>";
	   echo "<td>&nbsp;" . $row['address'] . "</td>";
	   echo "<td>&nbsp;" . $row['contactno'] . "</td>";
	   	   echo "<td>&nbsp;<a href='viewrecords.php?slid=$row[lecid]&view=lectures'><img src='images/view.png' width='32' height='32' /></a> 
<a href='lecture.php?slid=$row[lecid]&view=lectures'>  <img src='images/edit.png' width='32' height='32' /></a>";
?>
<a href='lectureview.php?slid=<?php echo $row["lecid"]; ?>&view=delete'><img src='images/delete.png' width='32' height='32'  onclick="return confirm('Are you sure??')"/></a></td>
  <?php
  echo "</tr>&nbsp;";
  $i++;
  }
  $first=$_GET["first"]-10;
$last= $_GET["last"]- 10;

?>
  <tr>
    <td><?php 
	if($first <0)
	{ 
	} 
	else 
	{ ?>
    <a href="lectureview.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    
    <?php 
	}
	?><img src="images/previous.png" alt="" width="32" height="32" /></td>
    <td><a href="#" onClick="openleture(); return false"><img src="images/add.png" alt="" width="32" height="32" /></a></td>
     <?php 
$first=$_GET["first"]+10;
$last = $_GET["last"]+ 10;
?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php 
	if($first > mysql_num_rows($result))
	{ 
	} 
	else 
	{ ?>
    <a href="lectureview.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    <?php
	}
	?><img src="images/next.png" alt="" width="32" height="32" /></td>
    
  </tr>
  </table>
  </section>
</article>


</section>

<?php 
}
else
{
		header("Location: admin.php");
}
include("adminmenu.php");
include("footer.php"); ?>