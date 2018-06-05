<?php require_once('../Connections/IT.php'); ?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE addjob SET name=%s, datepicker=%s, `time`=%s, department=%s, piority=%s, subject=%s, problem=%s, details=%s, `comment`=%s, status=%s WHERE id=%s",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['datepicker'], "date"),
                       GetSQLValueString($_POST['time'], "text"),
                       GetSQLValueString($_POST['department'], "text"),
                       GetSQLValueString($_POST['piority'], "text"),
                       GetSQLValueString($_POST['subject'], "text"),
                       GetSQLValueString($_POST['problem'], "text"),
                       GetSQLValueString($_POST['details'], "text"),
                       GetSQLValueString($_POST['comment'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_IT, $IT);
  $Result1 = mysql_query($updateSQL, $IT) or die(mysql_error());

  $updateGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_EAD = "-1";
if (isset($_GET['id'])) {
  $colname_EAD = $_GET['id'];
}
mysql_select_db($database_IT, $IT);
$query_EAD = sprintf("SELECT * FROM addjob WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_EAD, "int"));
$EAD = mysql_query($query_EAD, $IT) or die(mysql_error());
$row_EAD = mysql_fetch_assoc($EAD);
$totalRows_EAD = mysql_num_rows($EAD);
?>
<!DOCTYPE html>
<tml lang="en">
<head>
<meta charset="utf-8">
<title>Edit your job</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<script type="text/javascript">

function Nxtpage(){
	
var r=confirm ('Are you sure?');

if(r==true){
	
	window.localtion="admin_index.php";
	}
	else{
		
		return false;
		}	
}
</script>
<!-- Le styles -->
<link href="assets/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
/* Sticky footer styles
      -------------------------------------------------- */

      html, body {
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
      #push, #footer {
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
$(function() {
    $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
  });
</script>
</head>

<body background="images/1180422460.gif">

<!-- Part 1: Wrap all page content here -->
<div id="wrap">

<!-- Fixed navbar -->
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="brand" href="#">IT Helpdesk :: Edit your job</a>
      <div class="nav-collapse collapse">
        </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>
<p></p>
  <br>
  <?
 date_default_timezone_set("Asia/Bangkok");
    $date = date("d-m-Y");
    $time = date("H:i");
    ?>
</p>
<br>
<table width="100%" border="0">
  <tr>
    <td width="240" height="34" align="left"><img src="../images/helpdesk logo.png" width="300" height="72"></td>
    <td width="753" align="center"><p><strong><img src="http://www.ufocool.com/images/flag/thailand.gif">&nbsp;&nbsp;Edit your job</strong><strong>&nbsp;&nbsp;<img src="http://www.ufocool.com/images/flag/thailand.gif"></strong></p></td>
    <td width="329" align="center"><strong>
    <button type="button" class="btn btn-success"><i class="icon-calendar"></i>&nbsp;Date :: Time : <?php echo $date."&nbsp;/&nbsp;".$time;?></strong></button></td>
  </tr>
</table>
<script src="assets/js/bootstrap-transition.js"></script> 
  <script src="assets/js/bootstrap-alert.js"></script> 
  <script src="assets/js/bootstrap-modal.js"></script> 
  <script src="assets/js/bootstrap-dropdown.js"></script> 
  <script src="assets/js/bootstrap-scrollspy.js"></script> 
  <script src="assets/js/bootstrap-tab.js"></script> 
  <script src="assets/js/bootstrap-tooltip.js"></script> 
  <script src="assets/js/bootstrap-popover.js"></script> 
  <script src="assets/js/bootstrap-button.js"></script> 
  <script src="assets/js/bootstrap-collapse.js"></script> 
  <script src="assets/js/bootstrap-carousel.js"></script> 
  <script src="assets/js/bootstrap-typeahead.js"></script> 
  <script src="js/bootstrap.min.js"></script>
</p>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td height="24" align="left" nowrap><strong><i class="icon-user"></i>&nbsp;Name</strong></td>
      <td><strong><i class="icon-flag"></i>&nbsp;Piority</strong></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="left"><input type="text" name="name" value="<?php echo htmlentities($row_EAD['name'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      <td><input type="text" name="piority" value="<?php echo htmlentities($row_EAD['piority'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td height="22" align="left" nowrap><strong><i class="icon-calendar"></i>&nbsp;Date </strong></td>
      <td><strong><i class="icon-wrench"></i>&nbsp;Problem</strong></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="left"><input type="text" name="datepicker" id="datepicker" value="<?php echo htmlentities($row_EAD['datepicker'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      <td><input type="text" name="problem" value="<?php echo htmlentities($row_EAD['problem'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td height="22" align="left" nowrap><strong><i class="icon-time"></i>&nbsp;Time</strong></td>
      <td><strong><i class="icon-file"></i>&nbsp;Subject</strong></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="left"><input type="text" name="time" value="<?php echo htmlentities($row_EAD['time'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      <td><input type="text" name="subject" value="<?php echo htmlentities($row_EAD['subject'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td height="22" align="left" nowrap><strong><i class="icon-home"></i>&nbsp;Department</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="left"><input type="text" name="department" value="<?php echo htmlentities($row_EAD['department'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td height="22" align="left" nowrap><strong><i class="icon-book"></i>&nbsp;Details</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="left" nowrap><input type="text" class="mana" name="details" value="<?php echo htmlentities($row_EAD['details'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="left">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td height="22" align="left" nowrap><strong><i class="icon-comment"></i>&nbsp;Comment</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="left" nowrap><input type="text" name="comment" class="mana" value="<?php echo htmlentities($row_EAD['comment'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td height="22" align="left" nowrap><strong><i class="icon-time"></i>&nbsp;Status</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="left"><input type="text" name="status" value="<?php echo htmlentities($row_EAD['status'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="left" nowrap>
      <button type="submit" class="btn btn-success" ><i class="icon-upload"></i>&nbsp;Save&nbsp;</button>
      <a href="index.php">
      <button type="button" class="btn btn-danger" ><i class="icon-remove"></i>&nbsp;Cancel&nbsp;</button>
      </a>
      </td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id" value="<?php echo $row_EAD['id']; ?>">
</form>
</body>
</html><?php
mysql_free_result($EAD);
?>
