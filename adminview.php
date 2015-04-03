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
$abc = 100;
if(isset($_GET['view']) && $_GET['view']== "delete")
// if($_GET["view"] == "delete")
{
mysql_query("DELETE FROM administrator WHERE adminid ='$_GET[slid]'");
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
$result = mysql_query("SELECT * FROM administrator LIMIT $_GET[first] , $_GET[last]");

?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
Admin Details.  </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Admin Details</h2>
  </header>
  <section class="entry">
  <font color="#330000">
    <table width="458" border="1">
  <tr>
    <th width="62" scope="col">Admin ID</th>
    <th width="73" scope="col">Admin Name</th>
    <th width="73" scope="col">Address</th>
    <th width="84" scope="col">Contact No</th>
    <th width="132" scope="col">Action</th>
  </tr>
  
  <?php
    $i =$_GET["first"]+1;
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td align=center>&nbsp;" . $i . "</td>";
  echo "<td>&nbsp;" . $row['adminname'] . "</td>";
   echo "<td>&nbsp;" . $row['address'] . "</td>";
   echo "<td>&nbsp;" . $row['contactno'] . "</td>";
   echo "<td>&nbsp; <a href='viewrecords.php?slid=$row[adminid]&view=administrator'><img src='images/view.png' width='32' height='32' /></a>
 <a href='addadmin.php?slid=$row[adminid]&view=administrator'>  <img src='images/edit.png' width='32' height='32' /></a>";
 ?>
 <a href='adminview.php?slid=$row[adminid]&view=delete'><img src='images/delete.png' width='32' height='32' onclick="return confirm('Are you sure??')" /></a> </td>
<?php
echo "</tr>&nbsp;";
	$i++;
  }
  $first=$_GET["first"]-10;
$last= $_GET["last"]- 10;
  ?>
  <tr>
    <th scope="col"><?php 
	if($first <0)
	{ 
	} 
	else 
	{ ?>
    <a href="adminview.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    
    <?php 
	}
	?><img src="images/previous.png" width="32" height="32" /></th>
    <th scope="col">
<a href="#" onClick="openadmin(); return false"><img src="images/add.png" width="32" height="32" /></a> <span id="youremail" style="color: red"></span>
</a></th> <?php 
$first=$_GET["first"]+10;
$last = $_GET["last"]+ 10;
?>
    <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    <th scope="col"><?php 
	if($first > mysql_num_rows($result))
	{ 
	} 
	else 
	{ ?>
    <a href="adminview.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    <?php
	}
	?><img src="images/next.png" width="32" height="32" /></th>
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
include("footer.php"); 

?>