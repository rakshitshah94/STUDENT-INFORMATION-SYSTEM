<?php

/**
 * @System     HP-pc Rax
 * @author     Rakshit shah <Rakshitshah1994@gmail.com>
 * @copyright  2015-2017 |Rakshit shah
 * @license    http://rakshit.in/license/license.php |  PHP License 3.0
 * @version    1.1
 * @since      File available since Release 1.0.0
 */

include("validation.php");
include("header.php"); 
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
  </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Contact us</h2>
  </header>
  <section class="entry">
  <?php
  if(isset($_POST["name"]))
  {
  include("conection.php");
$sql="INSERT INTO contact (name, emailid, contactno, subject, message) VALUES ('$_POST[name]','$_POST[email]','$_POST[contact]','$_POST[subject]','$_POST[message]')";
if (!mysql_query($sql,$con))
  {
  die('Error in mysql: ' . mysql_error());
  }
  else
  {
echo "Mail sent Successfully...";
  }
  }
  else
  {
	  ?>
  
<form name="form1" method="post" action="" id="formID">
   <p class="textfield">
       <input name="name" id="name" value="" size="22" tabindex="1" type="text" class="validate[required,custom[onlyLetterSp]] text-input">
          <label for="author">
             <small>Name (required)</small>
          </label>
   </p>
   <p class="textfield">
       <input name="email" id="email" value="" size="22" tabindex="2" type="text" class="validate[required,custom[email]] text-input">
          <label for="email">
              <small>Mail (will not be published) required)</small>
          </label>
   </p>
   <p class="textfield">
       <input name="contact" id="contact" value="" size="22" tabindex="3" type="text" class="validate[required,custom[phone]] text-input">
          <label for="url1">
             <small>Contact No</small>
          </label>
   </p>
    <p class="textfield">
       <input name="subject" id="subject" value="" size="22" tabindex="3" type="text" class="validate[required] text-input">
          <label for="url">
             <small>Subject</small>
          </label>
   </p>
   <p>
       <small><strong>Message</strong></small>
   :</p>
   <p class="text-area">
       <textarea name="message" id="message" class="validate[required]"  cols="50" rows="10" tabindex="4"></textarea>
   </p>
   <p>
       <input name="submit" id="submit" tabindex="5" type="image" src="images/submit.png">
       <input name="comment_post_ID" value="1" type="hidden">
   </p>
   <div class="clear"></div>
</form>
<?php
  }
  ?>
<div class="clear"></div>
</section>
</article>


</section>
<section id="sidebar">
<h2>Contact Us</h2>
<ul>
	<li>Please enter Name, Mail Id, contact Number, Subject, Message.</li>

</ul>
<h2>&nbsp;</h2>
</section>
<div class="clear"></div>

<div class="clear"></div>
</section>
</div>
<?php include("footer.php"); ?>