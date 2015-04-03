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
include("conection.php"); ?>
<section id="page">
<header id="pageheader" class="homeheader">
<h2 class="sitedescription">  </h2>
</header>

<section id="contents">

<article class="post">
<header class="postheader">
<h2><a href="result.php">Student Registration No.</a></h2>
</header>
<form name="form1" method="post" action="result.php">
  <p>
    <label for="textfield2">Roll No</label>
    <input type="text" name="rollno" id="textfield2">
  </p>
  <p>
    <input type="submit" name="button2" id="button2" value="Submit">
  </p>
</form>
</article>
<article class="post">
  <header class="postheader">
    <h2>Search by Name and Class</h2>
  </header>
  <form name="form2" method="post" action="">
    <p>
      <label for="textfield3">Name</label>
      <input type="text" name="textfield2" id="textfield3">
      </p>
    <p>
      <label for="select">Course</label>
   <?php
      $rescourse = mysql_query("SELECT * FROM course ");

  ?>
      <select name="select" id="select">
      <?php
      while($row1 = mysql_fetch_array($rescourse))
  {
echo "<option value='$row1[courseid]'>$row1[coursekey]</option>";
  }
  ?>
        </select>
      </p>
    <p>
      <input type="submit" name="submitresult" id="submitresult" value="Submit">
      </p>
</form>
<?php
if(isset($_POST["submitresult"]))
{
	 $searchstu = mysql_query("SELECT * FROM studentdetails where (studfname LIKE '$_POST[textfield2]' OR `studlname` LIKE '$_POST[textfield2]') AND courseid ='$_POST[select]' ");
	
?>
<form name="form2" method="post" action="viewresult.php">
  <table width="501" border="1">
    
    <tr>
      <td width="136"><strong>Student ID</strong></td>
      <td width="88"><strong>Name</strong></td>
      <td width="80"><strong>Fathers Name</strong></td>
      <td width="73"><strong>Semester</strong></td>
      <td width="90"><strong>View Result</strong></td>
    </tr>
   
    
     <?php
	 
      while($rowc = mysql_fetch_array($searchstu))
  {
  ?><tr>
      <td>&nbsp;<?php echo $rowc["studid"];?></td>
      <td>&nbsp;<?php echo $rowc["studfname"]. " ". $rowc["studlname"];?></td>
      <td>&nbsp;<?php echo $rowc["fathername"];?></td>
      <td>&nbsp;<?php echo $rowc["semester"];?></td>
      <td><a href="result.php?resid=<?php echo $rowc["studid"];?>"><img src="images/view.png" width="26" height="21"></a></td>
    </tr>
     <?php
  }
  ?>
  </table>
  <?php
}
?>
  </form>
  <p>&nbsp;</p>
</form>
</article>

</section>
<section id="sidebar">
</section>
<section id="sidebar">
  <h2>&nbsp;</h2>
<ul>
	<li></li>

</ul>
<h2>&nbsp;</h2>
<ul>
	<li></li>

</ul>
</section>
<div class="clear"></div>

<div class="clear"></div>
</section>
</div>
<?php include("footer.php"); ?>