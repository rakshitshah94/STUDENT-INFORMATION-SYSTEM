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
//echo $_SESSION["uid"];
if(isset($_SESSION["userid"]))
{
	if($_SESSION["type"]=="admin")
	{
	header("Location: dashboard.php");
	}
	else
	{	
	header("Location: lectureaccount.php");
	}
}

include("header.php"); 
include("conection.php");
if(isset($_POST["uid"]) && isset($_POST["pwd"]) )
{
//	echo "sdfsd".	$_POST[uid];
$result = mysql_query("SELECT * FROM administrator WHERE adminid='$_POST[uid]'");
while($row = mysql_fetch_array($result))
  {
$pwdmd5 = $row["password"];
  }

if(md5($_POST["pwd"])==$pwdmd5)
{
	$_SESSION["userid"] = $_POST["uid"];
	$_SESSION["type"]="admin";
	header("Location: dashboard.php");
}
else
{
$log =  "Login failed.. Please try again..";
}
}

if(isset($_POST["luid"]) && isset($_POST["lpwd"]))
{

$result = mysql_query("SELECT * FROM lectures WHERE lecid='$_POST[luid]'");
	while($row = mysql_fetch_array($result))
 	 {
$pwdm= $row["password"];
$_SESSION["lecname"] = $row["lecname"];
$_SESSION["coid"] = $row["courseid"];
  	}
//echo"pwd". md5($_POST["lpwd"]);

if(md5($_POST["lpwd"])==$pwdm)
	{
		//echo $_POST["lpwd"];
	$_SESSION["userid"] = $_POST["luid"];
	$_SESSION["type"]=="lecturer";
	header("Location: lectureaccount.php");
	}
else
	{
		$log12 =  "Login failed.. Please try again..";
	}
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
  <h2><u>Admin Login</u></h2>
  
  <h2><?php echo $log;?></h2>
  </header>
  <section class="entry">
  <form action="admin.php" method="post" class="form">
   <p class="textfield">
      <label for="author">
             <small>Admin Login ID (required)</small>
          </label>
           <input name="uid" id="uid" value="" size="22" tabindex="1" type="text">
   </p>
   <p class="textfield">
   <label for="email">
              <small>Password (required)</small>
          </label>
       <input name="pwd" id="pwd" value="" size="22" tabindex="2" type="password">
   </p>
   <p>
     <input name="submit" id="submit" tabindex="5" type="image" src="images/submit.png">
     <input name="comment_post_ID" value="1" type="hidden">
     
   </p>
   <div class="clear"></div>
</form>
  <form action="admin.php" method="post" class="form">
<div class="clear">
<hr />
  <header class="postheader">
    <h2><u>Lectures Login</u></h2>
    <h2><?php echo $log12;?></h2>
  </header>
  <section class="entry">

      <p class="textfield">
        <label for="author2"> <small><br />
          Lecture Login ID (required)</small> </label>
        <input name="luid" id="luid" value="" size="22" tabindex="3" type="text" />
      </p>
      <p class="textfield">
        <label for="email2"> <small>Password (required)</small> </label>
        <input name="lpwd" id="lpwd" size="22" tabindex="4" type="password" />
      </p>
      <p>
        <input name="submit2" id="submit2" tabindex="5" type="image" src="images/submit.png" />
        <input name="comment_post_ID2" value="1" type="hidden" />
      </p>
      <div class="clear"></div>
    </form>
    <div class="clear"></div>
  </section>
</div>
</section>
</article>
</section>

<?php 
include("adminmenu.php");
include("footer.php"); ?>