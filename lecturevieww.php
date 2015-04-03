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

$result = mysql_query("SELECT * FROM lectures WHERE lecid='$_SESSION[userid]'");
 while($row1 = mysql_fetch_array($result))
  {
	  $lecid = $row1['lecid'];
	$pass =	  $row1['password']; 	
	$couseid = 	  $row1['courseid']; 	
	$lecname =	  $row1['lecname']; 	
	$address = 	  $row1['address']; 	
	$contno =	  $row1['contactno'];
  }
  $result12 = mysql_query("SELECT * FROM course WHERE courseid ='$courseid'");
 while($row2 = mysql_fetch_array($result12))
  {
	  $cbane =	  $row2["coursename"];
  }
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
</h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Lecture Profile</h2>
  </header>
  <section class="entry">
  <font size="3">
  <form action="" method="post" class="form">
   <table width="501" height="228" border="1">
     <tr>
       <td width="198" height="34"><strong>&nbsp; Lecture ID :</strong></td>
       <td width="287">&nbsp; <?php echo $lecid ;?></td>
     </tr>
     <tr>
       <td height="42"><strong>&nbsp;  Name :</strong></td>
       <td>&nbsp;<?php echo $lecname ;?></td>
     </tr>
     <tr>
       <td height="64"><strong>&nbsp; Address : </strong></td>
       <td>&nbsp; <?php echo $address ;?></td>
     </tr>
     <tr>
       <td height="39"><strong>&nbsp; Contact No. : </strong></td>
       <td>&nbsp; <?php echo $contno;?></td>
     </tr>
     <tr>
       <td height="35"><strong>&nbsp; Course :</strong></td>
       <td>&nbsp; <?php echo $cbane ;?></td>
     </tr>
   </table>
     </font>
   <p class="textfield">&nbsp;</p>
<div class="clear"></div>
</form>
  </section>
</article>

<article class="post">
  <header class="postheader"></header>
  <section class="entry">
    <form action="" method="post" class="form">
<div class="clear"></div>
</form>
<div class="clear"></div>
</section>
</article>



</section>


<?php 
if($_SESSION["type"]=="admin")
	{
	include("adminmenu.php");
	}
	else
	{	
	include("lecturemenu.php");
	}

include("footer.php"); ?>