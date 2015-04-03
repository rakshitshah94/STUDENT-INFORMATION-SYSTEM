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
mysql_query("DELETE FROM subject WHERE subid ='$_GET[slid]'");
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
$result = mysql_query("SELECT * FROM subject LIMIT $_GET[first] , $_GET[last]");
$result1 = mysql_query("SELECT * FROM course LIMIT $_GET[first] , $_GET[last]");
$reslec = mysql_query("SELECT * FROM lectures LIMIT $_GET[first] , $_GET[last]");
?>

<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
  </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Subject  Details</h2>
  </header>
  <section class="entry">
    <table width="508" border="1">
  <tr>
    <td width="45"><strong>ID</strong></td>
    <td width="94"><strong>Subject Name</strong></td>
    <td width="80"><strong>Course</strong></td>
    <td width="71"><strong>Sub Type</strong></td>
    <td width="72"><strong>Semester</strong></td>
     <?php
      if($_SESSION["type"]=="admin")
	{
		?>
    <td width="106"><strong>Action</strong></td>
    <?php
	}
	?>
    
  </tr>
    <?php
	   $i =$_GET["first"]+1;
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>&nbsp;"  . $i . "</td>";
  echo "<td>&nbsp;" . $row['subname'] . "</td>";
    	  echo "<td>&nbsp;" . $row['courseid'] . "</td>";
	   echo "<td>&nbsp;" . $row['subtype'] . "</td>";
	   echo "<td>&nbsp;" . $row['semester'] . "</td>";

      if($_SESSION["type"]=="admin")
	{

	   	   echo "<td>&nbsp;<a href='viewrecords.php?slid=$row[subid]&view=subject'><img src='images/view.png' width='32' height='32' /></a>
<a href='subjectxx.php?slid=$row[subid]&view=subject'>  <img src='images/edit.png' width='32' height='32' /></a>";
?>
 <a href='subject.php?slid=<?php echo $row["subid"]; ?>&view=delete'><img src='images/delete.png' width='32' height='32'  onclick="return confirm('Are you sure??')"/></a></td>
 <?php echo "</tr>&nbsp;";
	}
  $i++;
  }

      if($_SESSION["type"]=="admin")
	{
$first=$_GET["first"]-10;
$last= $_GET["last"]- 10;

?>
  <tr>
    <td><?php 
	if($first <0)
	{ 
	} 
	else 
	{ ?><a href="subject.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    
    <?php 
	}
	?><img src="images/previous.png" alt="" width="32" height="32" /></td>
    <td><a href="courseinsert.php"><a href="#" onClick="opensubject(); return false"><img src="images/add.png" alt="" width="32" height="32" /></a></td>
     <?php 
$first=$_GET["first"]+10;
$last = $_GET["last"]+ 10;
?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
   
<?php 
	if($first > mysql_num_rows($result))
	{ 
	} 
	else 
	{ ?><a href="subject.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    <?php
	}
	?>

<img src="images/next.png" alt="" width="32" height="32" /></td>
    
  </tr>
  <?php
	}
	?>
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
if($_SESSION["type"]=="admin")
	{
	include("adminmenu.php");
	}
	else
	{	
	include("lecturemenu.php");
	}

include("footer.php"); ?>