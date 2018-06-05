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

$MM_restrictGoTo = "../mantenace.php";
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

$maxRows_MA = 10;
$pageNum_MA = 0;
if (isset($_GET['pageNum_MA'])) {
  $pageNum_MA = $_GET['pageNum_MA'];
}
$startRow_MA = $pageNum_MA * $maxRows_MA;

mysql_select_db($database_IT, $IT);
$query_MA = "SELECT * FROM mantenace";
$query_limit_MA = sprintf("%s LIMIT %d, %d", $query_MA, $startRow_MA, $maxRows_MA);
$MA = mysql_query($query_limit_MA, $IT) or die(mysql_error());
$row_MA = mysql_fetch_assoc($MA);

if (isset($_GET['totalRows_MA'])) {
  $totalRows_MA = $_GET['totalRows_MA'];
} else {
  $all_MA = mysql_query($query_MA);
  $totalRows_MA = mysql_num_rows($all_MA);
}
$totalPages_MA = ceil($totalRows_MA/$maxRows_MA)-1;

$queryString_MA = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_MA") == false && 
        stristr($param, "totalRows_MA") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_MA = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_MA = sprintf("&totalRows_MA=%d%s", $totalRows_MA, $queryString_MA);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>:: Mantennace</title>
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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body background="../images/1180422460.gif">

<!-- Part 1: Wrap all page content here -->
<div id="wrap">

<!-- Fixed navbar -->
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
    <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="brand" href="#">IT Helpdesk</a>
          <div class="nav-collapse collapse">
        <ul class="nav">
              <li><a href="mantenace_index.php"><i class="icon-home"></i>&nbsp;Home</a></li>
              <li><a href="add_mantenance.php"><i class="icon-file"></i>&nbsp;Add Maintenance</a></li>
              <li><a href="<?php echo $logoutAction ?>"><i class="icon-user"></i>&nbsp;Logout</a></li>
            </ul>
        </li>
        </ul>
      </div>
<!--/.nav-collapse --> 
        </div>
  </div>
</div>
<p>&nbsp;</p>
<p><br/>
  <?
    date_default_timezone_set("Asia/Bangkok");
    $date = date("d-m-Y");
    $time = date("H:i");
    ?>
  
</p>
<table width="100%" border="0">
      <tr>
    <td width="240" height="34" align="left"><img src="../images/helpdesk logo.png" width="300" height="72"></td>
    <td width="753" align="center"><p><strong><img src="http://www.ufocool.com/images/flag/thailand.gif">&nbsp;&nbsp;Welcome to Mantennace system</strong><strong>&nbsp;&nbsp;<img src="http://www.ufocool.com/images/flag/thailand.gif"></strong></p></td>
    <td width="329" align="center"><strong><button type="button" class="btn btn-success"><i class="icon-calendar"></i>&nbsp;Date :: Time : <?php echo $date."&nbsp;/&nbsp;".$time;?></strong></button></td>
  </tr>
</table>    
 <hr/>

<body background="../images/1180422460.gif">



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
<table width="100%" border="0" class="table table-bordered">
  <tr class="btn-success">
    <td width="9%"><strong><i class="icon-calendar"></i>&nbsp;Date :: Time</strong></td>
    <td width="21%"><strong><i class="icon-user"></i>&nbsp;Username</strong></td>
    <td width="10%"><strong><i class="icon-home"></i>&nbsp;Department</strong></td>
    <td width="22%"><strong><i class="icon-file"></i>&nbsp;Details</strong></td>
    <td width="11%"><strong><i class="icon-cog"></i>&nbsp;Repair By</strong></td>
    <td width="21%"><strong><i class="icon-comment"></i>&nbsp;Comment</strong></td>
    <td width="6%"><strong><i class="icon-cog"></i>&nbsp;Option</strong></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_MA['datepicker']; ?></td>
      <td><?php echo $row_MA['username']; ?></td>
      <td><?php echo $row_MA['department']; ?></td>
      <td><?php echo $row_MA['details']; ?></td>
      <td><?php echo $row_MA['repair_by']; ?></td>
      <td><?php echo $row_MA['coment']; ?></td>
      <td><a href="ma_info.php?id=<?php echo $row_MA['id']; ?>">
        <button type="button" name="details" class="btn btn-mini btn-success"><i class="icon-file"></i>&nbsp;Details</button>
      </a></td>
    </tr>
    <?php } while ($row_MA = mysql_fetch_assoc($MA)); ?>
</table>
<table width="200" border="0" align="center" class="table-bordered">
  <tr>
    <td align="center"><?php if ($pageNum_MA > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_MA=%d%s", $currentPage, 0, $queryString_MA); ?>"><img src="First.gif"></a>
    <?php } // Show if not first page ?></td>
    <td align="center"><?php if ($pageNum_MA > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_MA=%d%s", $currentPage, max(0, $pageNum_MA - 1), $queryString_MA); ?>"><img src="Previous.gif"></a>
    <?php } // Show if not first page ?></td>
    <td align="center"><?php if ($pageNum_MA < $totalPages_MA) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_MA=%d%s", $currentPage, min($totalPages_MA, $pageNum_MA + 1), $queryString_MA); ?>"><img src="Next.gif"></a>
    <?php } // Show if not last page ?></td>
    <td align="center"><?php if ($pageNum_MA < $totalPages_MA) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_MA=%d%s", $currentPage, $totalPages_MA, $queryString_MA); ?>"><img src="Last.gif"></a>
    <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($MA);
?>
