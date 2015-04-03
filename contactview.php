<?php

/**
 * @System     HP-pc Rax
 * @author     Rakshit shah <Rakshitshah1994@gmail.com>
 * @copyright  2015-2017 |Rakshit shah
 * @license    http://rakshit.in/license/license.php |  PHP License 3.0
 * @version    1.1
 * @since      File available since Release 1.0.0
 */

include("header.php");
include("conection.php");
if(isset($_GET["view"]) && $_GET["view"] == "delete")
// if($_GET["view"] == "delete")
{
mysql_query("DELETE FROM contact WHERE contactid ='$_GET[slid]'");
}
$result = mysql_query("SELECT * FROM contact");
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
 </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Contact Inbox</h2>
  </header>
  <section class="entry">
  <form name="form2" method="post" action="">
<table width="485" border="1">
  <tr>
    <td width="56">&nbsp;</td>
<td width="202"><strong>Name</strong></td>
    <td width="205"><strong>Subject</strong></td>
  </tr>
  <?php
	  $i =1;
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>&nbsp";
  ?>
  <a href='contactview.php?slid=<?php echo $row["contactid"]; ?>
  &view=delete'><img src='images/delete.png' width='30' height='30'  onclick="return confirm('Are you sure??')"/></a>
  <?php
  echo  $i . " </td>";
     	  echo "<td>&nbsp;" . $row['name'] . "</td>";
	   echo "<td>&nbsp;<a href='inbox.php?cid=$row[contactid]'>" . $row['subject'] . "</a></td>";
  echo "</tr>&nbsp;";
  $i++;
  }
  
?>

  <tr>
    <td height="25">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>
</table>
    </form>
  </section>
</article>


</section>
<?php 
include("adminmenu.php");
include("footer.php"); ?>
<p>&nbsp;</p>
<form name="form1" method="post" action="">
  <input type="submit" name="button" id="button" value="Delete">
</form>
