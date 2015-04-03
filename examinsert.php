<script>

/**
 * @System     HP-pc Rax
 * @author     Rakshit shah <Rakshitshah1994@gmail.com>
 * @copyright  2015-2017 |Rakshit shah
 * @license    http://rakshit.in/license/license.php |  PHP License 3.0
 * @version    1.1
 * @since      File available since Release 1.0.0
 */

 function submit_form()
        {
var totsum = 0 ;
var a= 0;
var b = 0;
var c=0;
var totsub = 0;
                   	 dml=document.forms['form1'];
	                // get the number of elements from the document
                       len = dml.elements.length;
                     for( i=0 ; i<len ; i++)
                        {
												   	 //  j=0;
							    //check the textbox with the elements name
								
								if (dml.elements[i].name=='totsub')
								{
							totsub = dml.elements[i].value;
								}
								//tot = tot + dml.elements[i].value;
									//alert(dml.elements[i].value);
						//	a = dml.elements[i].value;	
                                if (dml.elements[i].name=='subidd[]')
                                {
									/*	if(dml.elements[i].value > dml.elements[4].value)
									{
										alert("Entered value is greater than maximum marks");
										dml.elements[i].value=0;	
									}
									else
									{*/					
							 totsum = totsum + parseInt(dml.elements[i].value);
									//}
					             }
                        }
     dml.elements[14].value = totsum;
var perc	 = totsum /totsub ; 
             dml.elements[15].value = perc.toFixed(2);
                return true;
                       
        }
		/*
    function submit_form(abrec)
        {
                     dml=document.forms['form1'];
				
                // get the number of elements from the document
                       len = dml.elements.length;
                     for( i=0 ; i<len ; i++)
                        {     
						         
							 //  j=0;
							    //check the textbox with the elements name
                                if (dml.elements[i].name=='subidd[]')
                                {
									 //alert(dml.elements[i].value);   
										j=i+abrec;
													//alert(k);
								
									if(dml.elements[i].value > 100)
									{
										alert("Entered mark is greater than  total mark...");
										dml.elements[i].value="0";
									j=i+abrec;
								dml.elements[j].value = "0";
								k=j+abrec;
								dml.elements[k].value = "0";
								
						dml.elements[i].focus();
									}
									else
									{
								k =dml.elements[i].value;
								j=i+abrec;
								dml.elements[j].value = k;
								l= j+abrec;
								dml.elements[l].value = (dml.elements[j].value * dml.elements[i].value) / dml.elements[i].value;
									}
									
									
                                }
						
                        }
               
               
                return true;
                       
        }
*/
</script>
<?php
include("conection.php");

$studid =$_POST['stuid'];
$subid =$_POST["subid"];
$submark =$_POST['subidd'];
$resul= $_POST['result'];
$comment = $_POST['comment'];
if(isset($_POST["exambutton"]))
	{
for($i=0;$i<$_POST["tst"];$i++)
{
	 mysql_query("DELETE FROM examination WHERE subid = '$subid[$j]'");
	for($j=0;$j<$_POST['tsubb'];$j++)
	{
	 $sql="INSERT INTO examination (studid,subid,courseid,internaltype,maxmarks,scored,percentage,result)
VALUES
('$studid[$i]','$subid[$j]','$_POST[ttcourse]','$_POST[tintt]','$_POST[tmarks]','$submark[$j]','$resul[$j]','$comment[$j]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


	}
	 
}
	}
	
	if(isset($_POST["button"]))
	{
for($i=0;$i<$_POST["tst"];$i++)
{
	for($j=0;$j<$_POST['tsubb'];$j++)
	{
mysql_query("UPDATE examination SET scored='$submark[$j]',percentage ='$resul[$j]', result='$comment[$j]' WHERE examid ='$_POST[examid]' AND subid='$subid[$j]' AND studid='$studid[$i]'");

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


	}
	 
}
	}

  //$listvals=$_POST['mylist'];
  // $n=count($listvals);
  $examid=$_POST['examid'];
    $studid =$_POST['studid'];
	$scored =$_POST['scored'];
	$result =$_POST['result'];
//echo  $_POST["totstdnt"];
  for($i=0;$i<$_POST["totstdnt"];$i++)
  {
     //echo "Item".$stuid[$i]."<br>\n";
	 $sql="INSERT INTO examination (examid, studid, subid, internaltype, scored, result)
VALUES
('$examid[$i]','$_POST[subid]','$_POST[totclass]','$attclass[$i]','$percent[$i]','$comment[$i]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
	  echo "Record inserted Successfully...";
  }
echo "1 record added";
	 
   }

$rescourse = mysql_query("SELECT * FROM course where courseid='$_POST[course]'");
while($row1 = mysql_fetch_array($rescourse))
  {
	$courseid =   $row1["courseid"];
	$coursename =   $row1["coursename"];
  }
  $resclass = mysql_query("SELECT * FROM subject where subid='$_POST[subject]'");
while($row2 = mysql_fetch_array($resclass))
  {
	$subid =   $row2["subid"];
	$subname =   $row2["subname"];
  }
  
  
  
    $restotst = mysql_query("SELECT * FROM studentdetails 
 where courseid='$_POST[course]' AND semester ='$_POST[semester]'");
$tstudent = mysql_num_rows($restotst);

  $restotstrec = mysql_query("SELECT * FROM studentdetails where courseid='$_POST[course]' AND semester='$_POST[semester]'");

$ressub = mysql_query("SELECT * FROM subject where courseid='$_POST[course]' AND semester='$_POST[semester]'");

$restotsub = mysql_query("SELECT * FROM subject where courseid='$_POST[course]' AND semester='$_POST[semester]'");
$tsub = mysql_num_rows($restotsub);
?>
<table width="1000" border="1">
<form name="form1" method="post" action="">
<input type="hidden" value="<?php echo $tsub; ?>" name="tsubb" />
  <tr>
    <td>&nbsp; Course : <?php echo $_POST['course']; ?>
    <input type="hidden" value="<?php echo $_POST['course']; ?>" name="ttcourse" />
    </td>
    <td>&nbsp; Semester : <?php echo $_POST['semester']; ?>'th Semester
    <input type="hidden" value="<?php echo $_POST['semester']; ?>" name="tsemm" />
    </td>
  </tr>
  <tr>
    <td>&nbsp; Internal Type : <?php echo $_POST['internal']; ?>'st Internal
    <input type="hidden" value="<?php echo $_POST['internal']; ?>" name="tintt" />
    </td>
    <td>&nbsp; Max marks : <?php echo $_POST['marks']; ?>
    <input type="hidden" value="<?php echo $_POST['marks']; ?>" name="tmarks" />
    </td>
  </tr>
</table><br>
<table width="1000" border="1">
<?php
    if(isset($_POST[exambutton]))
  {
	  ?>
  <tr>
    <td colspan="5">&nbsp; 
      <?php
	  echo "Record inserted Successfully...";
	?>
	  </td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td width="107"><strong>Roll No.</strong></td>
    <td width="144"><strong>Student Name</strong></td>
    <?php
	while($rowab = mysql_fetch_array($ressub))
  {
    echo "<td><strong> $rowab[subname] </strong>
	<input type='hidden' value='$rowab[subid]' name='subid[]'>
	</td>";

  }
    ?>
    <td width="204"><strong>Total Scored Marks</strong></td>
    <td width="257"><strong>Percentage</strong></td>
    <td width="258"> Result</td>
  </tr>
<?php
 
 while($rowa = mysql_fetch_array($restotstrec))
  {
  ?>
  <tr>
    <td>
      <label for="textfield3"><?php echo $rowa[studid]; ?></label></td>
    <td><?php echo $rowa[studfname]. " ". $rowa[studlname] ; ?></td>
    
<input type="hidden" value="<?php echo $rowa[studid]; ?>" name="stuid[]"/>
<input type="hidden" value="<?php echo $tstudent; ?>" name="tst"/>
       <?php
	   $ressubb = mysql_query("SELECT * FROM subject where courseid='$_POST[course]' AND semester='$_POST[semester]'");
	 $reccount = mysql_num_rows($ressubb);
	 echo "<input type='hidden' value='" . $reccount . "' name='totsub'/>";
while($rowabb = mysql_fetch_array($ressubb))
  {
    echo "<td><input type='text' name='subidd[]' id='subidd[]' size='5' onchange='javascript:return submit_form();'></td>";
}

    ?>
    

    
    <td>
      <label for="textfield4"></label>
      <input name="scoredmarks[]" id="scoredmarks[]" type="text" size="5"  readonly value="0">
</td>
    <td>
      <label for="result"></label>
      <input type="text" name="result[]" id="result" readonly>
</td>
    <td>
      <label for="textarea"></label>
      <textarea name="comment[]" id="textarea" cols="35" rows="1"></textarea>
</td>
  </tr>
  <?php
  }
  ?>
</table>
<br>
<table width="1000" border="0">
  <?php
 
 while($rowa = mysql_fetch_array($restotstrec))
  {
  ?>
  <?php
  }
  ?>
  <tr align="center">
    <td height="30" colspan="5"><input type="submit" name="exambutton" id="button" value="Insert Records">
      <input type="submit" name="button2" id="button2" value="Reset"></td>
  </tr>
</table>
<a href='examview.php'>&lt;&lt; Back </a>
<p>&nbsp;</p>
