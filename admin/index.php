<?php require_once('../Connections/IT.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../ind.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_AND = 10;
$pageNum_AND = 0;
if (isset($_GET['pageNum_AND'])) {
  $pageNum_AND = $_GET['pageNum_AND'];
}
$startRow_AND = $pageNum_AND * $maxRows_AND;

mysql_select_db($database_IT, $IT);
$query_AND = "SELECT * FROM addjob";
$query_limit_AND = sprintf("%s LIMIT %d, %d", $query_AND, $startRow_AND, $maxRows_AND);
$AND = mysql_query($query_limit_AND, $IT) or die(mysql_error());
$row_AND = mysql_fetch_assoc($AND);

if (isset($_GET['totalRows_AND'])) {
  $totalRows_AND = $_GET['totalRows_AND'];
} else {
  $all_AND = mysql_query($query_AND);
  $totalRows_AND = mysql_num_rows($all_AND);
}
$maxRows_AND = 10;
$pageNum_AND = 0;
if (isset($_GET['pageNum_AND'])) {
  $pageNum_AND = $_GET['pageNum_AND'];
}
$startRow_AND = $pageNum_AND * $maxRows_AND;

mysql_select_db($database_IT, $IT);
$query_AND = "SELECT * FROM addjob ORDER BY id DESC";
$query_limit_AND = sprintf("%s LIMIT %d, %d", $query_AND, $startRow_AND, $maxRows_AND);
$AND = mysql_query($query_limit_AND, $IT) or die(mysql_error());
$row_AND = mysql_fetch_assoc($AND);

if (isset($_GET['totalRows_AND'])) {
  $totalRows_AND = $_GET['totalRows_AND'];
} else {
  $all_AND = mysql_query($query_AND);
  $totalRows_AND = mysql_num_rows($all_AND);
}
$totalPages_AND = ceil($totalRows_AND/$maxRows_AND)-1;

$queryString_AND = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_AND") == false && 
        stristr($param, "totalRows_AND") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_AND = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_AND = sprintf("&totalRows_AND=%d%s", $totalRows_AND, $queryString_AND);
?>
<!DOCTYPE html>
<tml lang="en">
<head>
<meta charset="utf-8">
<title>:: Wecome Administrator</title>
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
<link rel="shortcut icon" href="../assets/ico/favicon.png">
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
    <a class="brand" href="#"><font color="#660033"> <b>IT Helpdesk</b></font></a>  
      <div class="nav-collapse collapse">
        <ul class="nav">

          <li><button name="button" class="btn btn-warning">
          <a href="index.php"><i class="icon-home"></i><font color="#ooooFF"><b> &nbsp; Home&nbsp; &nbsp; </a></b></font></a></button></li>
          <li><button name="button" class="btn btn-warning">
          <a href="adduser.php"><i class="icon-user"></i><font color="#ooooFF"><b>&nbsp;Add_User</b>&nbsp; &nbsp;</a></font></button></li>
          <li><button name="button" class="btn btn-warning">
          <a href="add_department.php"><i class="icon-cog"></i><font color="#ooooFF">&nbsp;<b>Add_Department</b>&nbsp; &nbsp;</a></font></button></li>
          <li><button name="button" class="btn btn-warning">
          <a href="add_priority.php"><i class="icon-cog"></i><font color="#ooooFF">&nbsp;<b>Add_Priority</b>&nbsp; &nbsp;</a></font></button></li>
          <li><button name="button" class="btn btn-warning">
          <a href="add_problem.php"><i class="icon-cog"></i><font color="#ooooFF">&nbsp;<b>Add_Problem</b>&nbsp; &nbsp;</a></font></button></li>
          <li><button name="button" class="btn btn-warning">  
          <a href="menu_report.php"><i class="icon-book"></i><font color="#ooooFF">&nbsp;<b>Report</b></a></font></button></li>
          <li><button name="button" class="btn btn-">
          <a href="../indexlogin.php"><i class="icon-user"></i>&nbsp; <font color="red"><b>&nbsp;Logout&nbsp; &nbsp;</a></b></font></li>

          

        </ul>
        </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>
<p></p>

  <?
 date_default_timezone_set("Asia/Bangkok");
    $date = date("d-m-Y");
    $time = date("H:i");
    ?>
</p>
<br>
<p>
<p>
<table width="100%" border="0">
  <tr>
    <td width="240" height="34" align="left"><img src="../images/helpdesk logo.png" width="300" height="72"></td>
    <td width="753" align="center"><p><strong><font color="#ooooFF"> &nbsp;&nbsp;<h3>Welcome to Administrator index </h3> </font></strong><strong>&nbsp;&nbsp;</p></td>
    <td width="329" align="center"><strong>
    <button type="button" class="btn btn-success"><i class="icon-calendar"></i>&nbsp;Date :: Time : <?php echo $date."&nbsp;/&nbsp;".$time;?></strong></button></td>
  </tr>
</table>
<table width="100%" border="0" class="table table-bordered">
  <tr class="btn-success">
    <td width="8%"><strong><i class="icon-user"></i>&nbsp;Username</strong></td>
    <td width="12%"><strong><i class="icon-calendar"></i>&nbsp;Date :: Time</strong></td>
     <td width="10%"><strong><i class="icon-time"></i>&nbsp;Subject</strong></td>
       <td width="10%"><strong><i class="icon-file"></i>&nbsp;Problem</strong></td>
    <td width="10%"><strong><i class="icon-file"></i>&nbsp;Details</strong></td>
    <td width="10%"><strong><i class="icon-time"></i>&nbsp;Status</strong></td>
    <td width="12%"><strong><i class="icon-time"></i>&nbsp;comment</strong></td>

    <td colspan="2"><strong><i class="icon-cog"></i>&nbsp;Option</strong></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><a href="../sendoutsite_report.php?id=<?php echo $row_AND['id']; ?>"><?php echo $row_AND['name']; ?></td>
      <td><a href="../sendoutsite_report.php?id=<?php echo $row_AND['id']; ?>"><?php echo $row_AND['datepicker']; ?> 
      	<strong>:</strong> <?php echo $row_AND['time']; ?></td>
      <td><a href="../sendoutsite_report.php?id=<?php echo $row_AND['id']; ?>"><?php echo $row_AND['subject']; ?></td>
      	 <td><a href="../sendoutsite_report.php?id=<?php echo $row_AND['id']; ?>"><?php echo $row_AND['problem']; ?></td>
      <td><a href="../sendoutsite_report.php?id=<?php echo $row_AND['id']; ?>"><?php echo $row_AND['details']; ?></td>
      <td><a href="../sendoutsite_report.php?id=<?php echo $row_AND['id']; ?>"><?php echo $row_AND['status']; ?></td>
       <td><a href="../sendoutsite_report.php?id=<?php echo $row_AND['id']; ?>"><?php echo $row_AND['comment']; ?></td>

      <td width="6%"><a href="edit_adjob.php?id=<?php echo $row_AND['id']; ?>">
        <button type="button" name="btnsubmit" class="btn btn-mini btn-success"><i class="icon-pencil"></i>&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</button>
      </a></td>
      <td width="6%"><a href="delete_helpdesk.php?id=<?php echo $row_AND['id']; ?>">
        <button type="button" name="btnremove" class="btn btn-mini btn-danger" onClick="Nxtpage()"><i class="icon-trash"></i>&nbsp;Delete</button>
      </a></td>
    </tr>
    <?php } while ($row_AND = mysql_fetch_assoc($AND)); ?>
</table>
<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="assets/js/jquery.js"></script> 
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
<table width="200" border="0" align="center">
  <tr>
    <td align="center"><?php if ($pageNum_AND > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_AND=%d%s", $currentPage, 0, $queryString_AND); ?>"><button type="button" class="btn btn-mini btn-success"><i class="icon-fast-backward"></i></button></a>
    <?php } // Show if not first page ?></td>
    <td align="center"><?php if ($pageNum_AND > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_AND=%d%s", $currentPage, max(0, $pageNum_AND - 1), $queryString_AND); ?>"><button type="button" class="btn btn-mini btn-success"><i class="icon-backward"></i></button></a>
    <?php } // Show if not first page ?></td>
    <td align="center"><?php if ($pageNum_AND < $totalPages_AND) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_AND=%d%s", $currentPage, min($totalPages_AND, $pageNum_AND + 1), $queryString_AND); ?>"><button type="button" class="btn btn-mini btn-success"><i class="icon-forward"></i></button></a>
    <?php } // Show if not last page ?></td>
    <td align="center"><?php if ($pageNum_AND < $totalPages_AND) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_AND=%d%s", $currentPage, $totalPages_AND, $queryString_AND); ?>"><button type="button" class="btn btn-mini btn-success"><i class="icon-fast-forward"></i></button></a>
    <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($AND);
?>
