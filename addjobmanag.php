<?php require_once('Connections/IT.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "addjob")) {
  $insertSQL = sprintf("INSERT INTO addjob (name, datepicker, `time`, department, piority, subject, problem, details) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['datepicker'], "date"),
                       GetSQLValueString($_POST['time'], "text"),
                       GetSQLValueString($_POST['department'], "text"),
                       GetSQLValueString($_POST['priority'], "text"),
                       GetSQLValueString($_POST['subject'], "text"),
                       GetSQLValueString($_POST['problem'], "text"),
                       GetSQLValueString($_POST['details'], "text"));

  mysql_select_db($database_IT, $IT);
  $Result1 = mysql_query($insertSQL, $IT) or die(mysql_error());

  $insertGoTo = "indexmanag.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_IT, $IT);
$query_dep = "SELECT * FROM department";
$dep = mysql_query($query_dep, $IT) or die(mysql_error());
$row_dep = mysql_fetch_assoc($dep);
$totalRows_dep = mysql_num_rows($dep);

mysql_select_db($database_IT, $IT);
$query_priority = "SELECT * FROM priority";
$priority = mysql_query($query_priority, $IT) or die(mysql_error());
$row_priority = mysql_fetch_assoc($priority);
$totalRows_priority = mysql_num_rows($priority);

mysql_select_db($database_IT, $IT);
$query_problem = "SELECT * FROM problem";
$problem = mysql_query($query_problem, $IT) or die(mysql_error());
$row_problem = mysql_fetch_assoc($problem);
$totalRows_problem = mysql_num_rows($problem);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>:: Addjob</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
/* Sticky footer styles
      -------------------------------------------------- */

      html,  body {
	height: 100%;/* The html and body elements cannot have any padding or margin. */
      }
/* Wrapper for page content to push down footer */
      #wrap {
	min-height: 100%;
	height: auto !important;
	height: 100%;
	/* Negative indent footer by it's height */
        margin: 0 auto -60px;
}
/* Set the fixed height of the footer here */
      #push,  #footer {
	height: 60px;
}
#footer {
	background-color: #f5f5f5;
}

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
 #footer {
 margin-left: -20px;
 margin-right: -20px;
 padding-left: 20px;
 padding-right: 20px;
}
}
/* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      #wrap > .container {
	padding-top: 60px;
}
.container .credit {
	margin: 20px 0;
}
code {
	font-size: 80%;
}
</style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
<script language="javascript"> 
function fncSubmit() 
{    
if(document.addjob.name.value == "")   
{ 
	alert('กรุณากรอกชื่อ');       
	document.addjob.name.focus(); 
	return false; 
}
if(document.addjob.datepicker.value == "")   
{ 
	alert('กรุณากรอกวันที่แจ้งด้วยครับ');       
	document.addjob.datepicker.focus(); 
	return false; 
}


if(document.addjob.hardware_software.value == "")   
{ 
	alert('กรุณากรอกปัญหาเกียวกับอะไรบอกด้วยครับ');       
	document.addjob.hardware_software.focus(); 
	return false; 
}





if(document.addjob.piority.value == "")   
{ 
	alert('กรุณาระบุความเร่งด่วนสักนิดนึง!ครับ');       
	document.addjob.piority.focus(); 
	return false; 
}










if(document.addjob.department.value == "")   
{ 
	alert('กรุณากรอกแผนกของท่านด้วยครับ');       
	document.addjob.department.focus(); 
	return false; 
}
if(document.addjob.problem.value == "")   
{ 
	alert('กรุณากรอกลักษณะของปัญหาด้วยครับ');       
	document.addjob.problem.focus(); 
	return false; 
}
if(document.addjob.details.value == "")   
{ 
	alert('กรุณากรอกรายละเอียดด้วนะครับ');       
	document.addjob.details.focus(); 
	return false; 
}
document.addjob.submit(); 
}
</script>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
$(function() {
    $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
  });
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body background="images">


<!-- Part 1: Wrap all page content here -->
<div id="wrap">

<!-- Fixed navbar -->
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
    <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="brand" href="#"><font color="#660033"> <b>IT  Services Helpdesk</b></font></a>  
          <div class="nav-collapse collapse">
        <ul class="nav">

              <li> <button name="button" class="btn btn-warning">
              	<a href="indexmanag.php"><i class="icon-home"></i>&nbsp; <font color="#ooooFF"><b>Home&nbsp;&nbsp;</a></b></font></button></li>

              <li><button name="button" class="btn btn-warning">
              	<a href="addjobmanag.php"><i class="icon-file"></i>&nbsp;<font color="#ooooFF"><b>Add Job&nbsp;&nbsp;</b></a></font></button></li>

            
				  <li><button name="button" class="btn btn-warning">  <a href="https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&service=mail&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><i class="icon-user"></i>&nbsp;sent E-Mail to IT </a></button>&nbsp;</li>

             
                <li><a href="indexlogin.php"><i class="icon-user"></i>&nbsp; <font color="red"><b>Logout&nbsp;&nbsp;</a></font></b></li>


            </ul>
        </li>
        </ul>
      </div>
<!--/.nav-collapse --> 
        </div>
  </div>
</div>
<p><br>
</p>
<p>&nbsp;</p>
<p>
  <?
  date_default_timezone_set("Asia/Bangkok");
 
    $date = date("d-m-Y");
    $time = date("H:i");
    ?>

<table width="100%" border="0">
      <tr>
    <td width="240" height="34" align="left"><img src="images/helpdesk logo.png" width="300" height="72"></td>

    <td width="753" align="center"><strong><font color ="#ooooFF">&nbsp;&nbsp; <h3>Add your job to system </h3>&nbsp;&nbsp;</font></strong></td>
    <td width="329" align="center"><strong><button type="button" class="btn btn-success"><i class="icon-calendar"></i>&nbsp;Date :: Time : <?php echo $date."&nbsp;/&nbsp;".$time;?></strong></button></td>

     
  </tr>

</table>
<li> <button name="button" class="btn btn-warning"> &nbsp; 0648025947 &nbsp;&nbsp; 0648025903 &nbsp;&nbsp;</button>&nbsp;</li>
    <hr/>
<form action="<?php echo $editFormAction; ?>" name="addjob" method="POST" onSubmit="JavaScript:return fncSubmit();">
  <table width="30%" border="0" align="center">
  <tr>
    <td height="40"><strong><i class="icon-user"></i><font color ="ooooFF">&nbsp;Username</font></strong></td>
    <td><strong><i class="icon-flag"></i><font color ="ooooFF">&nbsp;Priority</font></strong></td>
  </tr>
  <tr>
    <td width="21%" height="40"><input name="name" type="text" class="form-control" /></td>
    <td width="21%"><select name="priority" id="select">
      <?php
do {  
?>
      <option value="<?php echo $row_priority['priority']?>"><?php echo $row_priority['priority']?></option>
      <?php
} while ($row_priority = mysql_fetch_assoc($priority));
  $rows = mysql_num_rows($priority);
  if($rows > 0) {
      mysql_data_seek($priority, 0);
	  $row_priority = mysql_fetch_assoc($priority);
  }
?>
    </select></td>
    </tr>
  <tr>
    <td height="46"><strong><i class="icon-calendar"></i><font color ="#ooooFF">&nbsp;Date</font></strong></td>
    <td><strong><i class="icon-wrench"><font color ="ooooFF"></i>&nbsp;Problem</font></strong></td>
    </tr>
  <tr>
    <td height="42"><input type="text" name="datepicker" id="datepicker" class="form-control" /></td>
    <td><select name="problem" id="select3" class="form-control">
      <?php
do {  
?>
      <option value="<?php echo $row_problem['problem']?>"><?php echo $row_problem['problem']?></option>
      <?php
} while ($row_problem = mysql_fetch_assoc($problem));
  $rows = mysql_num_rows($problem);
  if($rows > 0) {
      mysql_data_seek($problem, 0);
	  $row_problem = mysql_fetch_assoc($problem);
  }
?>
    </select></td>
    </tr>
  <tr>
    <td height="47"><strong><i class="icon-time"><font color ="ooooFF"></i>&nbsp;Time</font></strong></td>
    <td><strong><i class="icon-file"></i><font color = "#ooooFF">&nbsp;Subject</font></strong></td>
    </tr>
  <tr>
    <td height="41"><input type="text" name="time" value="<? echo $time?>"></td>
    <td><input type="text" name="subject" id="textfield"></td>
    </tr>
  <tr>
    <td height="33"><strong><i class="icon-home"></i><font color= "ooooFF">&nbsp;Department</font> </strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="48"><select name="department" id="select2" class="form-control">
      <?php
do {  
?>
      <option value="<?php echo $row_dep['department']?>"><?php echo $row_dep['department']?></option>
      <?php
} while ($row_dep = mysql_fetch_assoc($dep));
  $rows = mysql_num_rows($dep);
  if($rows > 0) {
      mysql_data_seek($dep, 0);
	  $row_dep = mysql_fetch_assoc($dep);
  }
?>
    </select></td>
        

    
    </tr>

  <tr>
    <td height="34"><strong><i class="icon-comment"></i><font color ="ooooFF">&nbsp;Discriptio </font></strong></td>
    <td>&nbsp;</td>
    </tr>


  <tr>
    <td colspan="2"><textarea name="details" rows="3" class="mana"></textarea>&nbsp;</td>
    </tr>

  <tr>
    <td colspan="2">
</td>


    </tr>
     <td align="center">      

      <button name="button" type="submit" id="button" class="btn btn-success"><i class="icon-check"></i>&nbsp;Save&nbsp;&nbsp;</button>
      <button name="button2" type="reset" id="button2" class="btn btn-danger"><i class="icon-trash"></i>&nbsp;Cancel&nbsp;</button></td>

</table>

  <input type="hidden" name="MM_insert" value="addjob">






</form>






<p>&nbsp;</p>
<br>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
mysql_free_result($dep);

mysql_free_result($priority);

mysql_free_result($problem);
?>
