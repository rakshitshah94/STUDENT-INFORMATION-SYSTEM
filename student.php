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
if($_GET["view"] = "delete")
{
mysql_query('DELETE FROM studentdetails WHERE studid =$_GET["slid"]');
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
		$result = mysql_query("SELECT * FROM studentdetails where courseid='$_POST[courseid]' && semester='$_POST[semester]'");
	}
	else
	{
$result = mysql_query("SELECT * FROM studentdetails LIMIT $_GET[first] , $_GET[last]");
	}

$result1= mysql_query("SELECT * FROM course LIMIT $_GET[first] , $_GET[last]");
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
  </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Student Details</h2>
  <p>
  <form method="post" action="">
    <label for="textfield7"><strong>Course </strong></label>  
    <strong>&nbsp;&nbsp;
    <select name="courseid" id="select2">
      <option value=""> Select Course </option>
      <?php
 while($row1 = mysql_fetch_array($result1))
  {
  echo "<option value='$row1[courseid]'>$row1[coursekey]</option>";
  }
  ?>
    </select>
    &nbsp;  &nbsp;  &nbsp;
    <label for="textfield8">Semester</label>  
    &nbsp;
    <select name="semester" id="select">
     <option value=""> Select Semester </option>
      <option value="1">First Semester</option>
      <option value="2">Second Semester</option>
      <option value="3">Third Semester</option>
      <option value="4">Fourth Semester</option>
      <option value="5">Fifth Semester</option>
      <option value="6">Sixth Semester</option>
    </select> 
    </strong>
    <input type="submit" name="button" id="button" value="View Records" />
    
    </form>
  </p>
  </header>
  <section class="entry">
  </section>
  <section class="entry">
  </section>
  <section class="entry">
  </section>
  <section class="entry">
  <?php 
if(mysql_num_rows($result) >= 1)
{
	?>
    <table width="500" border="1">
      <tr>
        <td width="38"><strong>SL No.</strong></td>
        <td width="73"><strong>ID</strong></td>
        <td width="50"><strong>Name</strong></td>
        <td width="56"><strong>Date of birth</strong></td>
           <?php
           if(isset($_SESSION["type"]) && $_SESSION["type"]== "admin")
      // if($_SESSION["type"]=="admin")
	{
		?>
        <td width="119"><strong>Action</strong></td>
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
  echo "<td>&nbsp;" . $row['studid'] . "</td>";
  echo "<td>&nbsp;" . $row['studfname'] . " " . $row['studlname'] . "</td>";
    
	 echo "<td>&nbsp;" . $row['dob'] . "</td>";
	 if(isset($_SESSION["type"]) && $_SESSION["type"]== "admin")
      // if($_SESSION["type"]=="admin")
	{
	
	      echo "<td>&nbsp;<a href='viewrecords.php?slid=$row[studid]&view=studentdetails'><img src='images/view.png' width='32' height='32' /></a>
		   <a href='studentins.php?slid=$row[studid]&view=studentdetails'>  <img src='images/edit.png' width='32' height='32' /></a>";
		   ?>
           
 <a href='student.php?slid=$row[studid]&view=delete'><img src='images/delete.png' width='32' height='32' onclick="return confirm('Are you sure??')"/></a></td>
	<?php
    }
  echo "</tr>&nbsp;";
 $i++;
  } 
  if(isset($_SESSION["type"]) && $_SESSION["type"]== "admin")
    // if($_SESSION["type"]=="admin")
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
	{ ?>
    <a href="student.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    
    <?php 
	}
	?><img src="images/previous.png" alt="" width="32" height="32" /></td>
        <td colspan="2"><a href="#" onClick="openstudent(); return false"><img src="images/add.png" alt="" width="32" height="32" /></a></td>
          <?php 
$first=$_GET["first"]+10;
$last = $_GET["last"]+ 10;
?>
        <td><div align="right"><?php 
	if($first > mysql_num_rows($result))
	{ 
	} 
	else 
	{ ?>
    <a href="student.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    <?php
	}
	?><img src="images/next.png" alt="" width="32" height="32" /></div></td>
        <td width="119" align="right">&nbsp;</td>
        </tr>
         <?php
	}
	?>
      </table>
      <?php
}
else
{
	echo "<h2>No Records Found...</h2>";
}
?>
<?php
if(isset($_SESSION["type"]) && $_SESSION["type"]== "admin")
     // if($_SESSION["type"]=="admin")
	{
		?>
     <p><a href="examview.php?first=<?php echo $first; ?>&amp;last=<?php echo $last; ?>"><a href="#" onClick="openstudent(); return false"><strong>Add Students</strong></a></p>
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
if(isset($_SESSION["type"]) && $_SESSION["type"]== "admin")
// if($_SESSION["type"]=="admin")
	{
	include("adminmenu.php");
	}
	else
	{	
	include("lecturemenu.php");
	}

include("footer.php"); ?>

