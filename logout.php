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
session_destroy();
?>
<section id="page">
<header id="pageheader" class="homeheader">
<h2 class="sitedescription">Student Information System.  </h2>
</header>

<section id="contents">

<article class="post">
<header class="postheader">
<h2><a href="#">Logged Out Successfully</a>...<br>
You will be redirecting to Login page...
<br> 
</h2>
<?php 
header( "refresh:3;url=admin.php" );

?>
<p class="postinfo">&nbsp;</p>
</header>
<p>
  <article class="post">
    <footer class="postfooter"></footer>
  </article>
</p>
</article>
<div class="blog-nav"></div>
</section>
<div class="clear"></div>

<div class="clear"></div>
</section>
</div>
<?php include("footer.php"); ?>