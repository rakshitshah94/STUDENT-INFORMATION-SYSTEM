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

$recinbox = mysql_query("SELECT * FROM contact where contactid='$_GET[eid]'");
while($row = mysql_fetch_array($recinbox))
  {
$name =	  $row["name"];
$emailid=	  $row["emailid"];
$contact = 	  $row["contactno"]; 
$subject=	  $row["subject"];
$message=	  $row["message"]; 
  }
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">Enquiry Message</h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Enquiry Message</h2>
  <p><a href="contactview.php">&lt;&lt; Back</a></p>
  </header>
  <section class="entry">
  <form name="form2" method="post" action="">
<table width="463" border="1">
  <tr>
    <td width="319" height="39">&nbsp; <strong>Name: </strong><?php echo $name;?></td>
  </tr>
  <tr>
    <td height="36">&nbsp; <strong>Email ID: </strong><?php echo $emailid;?> </td>
  </tr>
  <tr>
    <td height="33">&nbsp; <strong>Contact No:</strong> <?php echo $contact;?> </td>
  </tr>
  <tr>
    <td height="35">&nbsp; <strong>Subject: </strong><?php echo $subject;?> </td>
  </tr>
  <tr>
    <td height="338" valign="top"><br>&nbsp; <strong>Message: </strong><?php echo $message;?> </td>
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




