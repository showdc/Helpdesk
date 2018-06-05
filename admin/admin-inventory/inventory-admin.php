<?php require_once('../../Connections/IT.php'); ?>
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

$maxRows_Computer = 10;
$pageNum_Computer = 0;
if (isset($_GET['pageNum_Computer'])) {
  $pageNum_Computer = $_GET['pageNum_Computer'];
}
$startRow_Computer = $pageNum_Computer * $maxRows_Computer;

mysql_select_db($database_IT, $IT);
$query_Computer = "SELECT * FROM table_computer";
$query_limit_Computer = sprintf("%s LIMIT %d, %d", $query_Computer, $startRow_Computer, $maxRows_Computer);
$Computer = mysql_query($query_limit_Computer, $IT) or die(mysql_error());
$row_Computer = mysql_fetch_assoc($Computer);

if (isset($_GET['totalRows_Computer'])) {
  $totalRows_Computer = $_GET['totalRows_Computer'];
} else {
  $all_Computer = mysql_query($query_Computer);
  $totalRows_Computer = mysql_num_rows($all_Computer);
}
$totalPages_Computer = ceil($totalRows_Computer/$maxRows_Computer)-1;

$maxRows_Printer = 10;
$pageNum_Printer = 0;
if (isset($_GET['pageNum_Printer'])) {
  $pageNum_Printer = $_GET['pageNum_Printer'];
}
$startRow_Printer = $pageNum_Printer * $maxRows_Printer;

mysql_select_db($database_IT, $IT);
$query_Printer = "SELECT * FROM table_printer";
$query_limit_Printer = sprintf("%s LIMIT %d, %d", $query_Printer, $startRow_Printer, $maxRows_Printer);
$Printer = mysql_query($query_limit_Printer, $IT) or die(mysql_error());
$row_Printer = mysql_fetch_assoc($Printer);

if (isset($_GET['totalRows_Printer'])) {
  $totalRows_Printer = $_GET['totalRows_Printer'];
} else {
  $all_Printer = mysql_query($query_Printer);
  $totalRows_Printer = mysql_num_rows($all_Printer);
}
$totalPages_Printer = ceil($totalRows_Printer/$maxRows_Printer)-1;

$maxRows_Office = 10;
$pageNum_Office = 0;
if (isset($_GET['pageNum_Office'])) {
  $pageNum_Office = $_GET['pageNum_Office'];
}
$startRow_Office = $pageNum_Office * $maxRows_Office;

mysql_select_db($database_IT, $IT);
$query_Office = "SELECT * FROM `table_network office`";
$query_limit_Office = sprintf("%s LIMIT %d, %d", $query_Office, $startRow_Office, $maxRows_Office);
$Office = mysql_query($query_limit_Office, $IT) or die(mysql_error());
$row_Office = mysql_fetch_assoc($Office);

if (isset($_GET['totalRows_Office'])) {
  $totalRows_Office = $_GET['totalRows_Office'];
} else {
  $all_Office = mysql_query($query_Office);
  $totalRows_Office = mysql_num_rows($all_Office);
}
$totalPages_Office = ceil($totalRows_Office/$maxRows_Office)-1;

$maxRows_WiFi = 10;
$pageNum_WiFi = 0;
if (isset($_GET['pageNum_WiFi'])) {
  $pageNum_WiFi = $_GET['pageNum_WiFi'];
}
$startRow_WiFi = $pageNum_WiFi * $maxRows_WiFi;

mysql_select_db($database_IT, $IT);
$query_WiFi = "SELECT * FROM `teble_network wifi`";
$query_limit_WiFi = sprintf("%s LIMIT %d, %d", $query_WiFi, $startRow_WiFi, $maxRows_WiFi);
$WiFi = mysql_query($query_limit_WiFi, $IT) or die(mysql_error());
$row_WiFi = mysql_fetch_assoc($WiFi);

if (isset($_GET['totalRows_WiFi'])) {
  $totalRows_WiFi = $_GET['totalRows_WiFi'];
} else {
  $all_WiFi = mysql_query($query_WiFi);
  $totalRows_WiFi = mysql_num_rows($all_WiFi);
}
$totalPages_WiFi = ceil($totalRows_WiFi/$maxRows_WiFi)-1;

$queryString_Computer = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Computer") == false && 
        stristr($param, "totalRows_Computer") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Computer = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Computer = sprintf("&totalRows_Computer=%d%s", $totalRows_Computer, $queryString_Computer);

$queryString_Printer = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Printer") == false && 
        stristr($param, "totalRows_Printer") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Printer = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Printer = sprintf("&totalRows_Printer=%d%s", $totalRows_Printer, $queryString_Printer);

$currentPage = $_SERVER["PHP_SELF"];

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<title>หน้าหลัก</title>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
$(function() {
    $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
  });
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</script>
</head>

<body background="images/1180422460.gif" onload="MM_preloadImages('icon/Back1.png')">
<table width="100%" border="0">
  <tr>
    <td height="43" class="btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="icon/Tools.png" width="32" height="32" /> &nbsp;<strong>ทะเบียนอุปกรณ์แผนก IT ( Asset Inventory IT )</strong>&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>
<p>
  <script src="js/bootstrap.min.js"></script></p>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
  <tr class="alert-success">
    <td align="center">&nbsp;</td>
    <td align="center"><strong><a href="computer.php"><img src="icon/monitor.png" width="32" height="32" /> Add Computer </a></strong></td>
    <td align="center"><strong><a href="printer/printer.php"><img src="icon/printer.png" width="32" height="32" /> Add Printer</a></strong></td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td width="287" align="center">&nbsp;</td>
    <td width="306" align="center"><a href="../index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','icon/Back1.png',1)"><strong><img src="icon/back.png" width="32" height="32" /> กลับหน้าหลัก</strong></a></td>
    <td width="293" align="center"><strong>&nbsp;<a href="#">&nbsp;&nbsp;<img src="icon/folder.png" width="32" height="32" /> ทะเบียนอุปกรณ์แผนก IT</a></strong></td>
    <td width="432" align="left">&nbsp;</td>
  </tr>
</table>
<strong>
</p>
</strong>
<table width="100%" border="0">
  <tr>
    <td width="50%"><strong>&nbsp;จำนวนคอมพิวเตอร์ที่อยู่ในระบบทั้งหมด &nbsp;<?php echo $totalRows_Computer ?> &nbsp;เครื่อง</strong></td>
    <td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>จำนวนปริ้นเตอร์ที่มีอยู่ในระบบทั้งหมด &nbsp;<?php echo $totalRows_Printer ?> &nbsp;เครื่อง</strong></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="50%" align="center" class="btn-success"><img src="icon/monitor.png" width="32" height="32" /> <strong>ทะเบียนอุปกรณ์ Computer</strong></td>
    <td width="1%">&nbsp;</td>
    <td width="49%" align="center" class="btn-success"><img src="icon/printer.png" width="32" height="32" /> <strong>ทะเบียนอุปกรณ</strong> <strong>Printer </strong></td>
  </tr>

  <td><table width="746" border="0" class="table table-bordered">
        <tr class="btn-info">
          <td width="151" align="center"><strong>Device ID</strong></td>
          <td width="140" align="center"><strong>Date PR</strong></td>
          <td width="184" align="center"><strong>username</strong></td>
          <td colspan="2" align="center" valign="top"><strong>Option</strong></td>
        </tr>
        <?php do { ?>
          <tr>
            <td><strong><?php echo $row_Computer['device_id']; ?></strong></td>
            <td><strong><?php echo $row_Computer['date_pr']; ?></strong></td>
            <td><strong><?php echo $row_Computer['username']; ?></strong></td>
            <td width="66"><strong><a href="computer_edit.php?id=<?php echo $row_Computer['id']; ?>"><img src="images/pencil.png" width="16" height="16" />&nbsp;Edit</a></strong></td>
            <td width="85"><strong><a href="delete_computer.php?id=<?php echo $row_Computer['id']; ?>"><img src="images/page_full.png" width="16" height="16" />&nbsp;Delete</a></strong></td>
          </tr>
          <?php } while ($row_Computer = mysql_fetch_assoc($Computer)); ?>
    </table></td>
    <td>&nbsp;</td>
    <td><table width="804" border="0" class="table table-bordered">
        <tr class="btn-info">
          <td width="131" align="center"><strong>device_id</strong></td>
          <td width="120" align="center"><strong>date_pr</strong></td>
          <td width="210" align="center"><strong>Username</strong></td>
          <td colspan="2" align="center"><strong>Option</strong></td>
        </tr>
        <?php do { ?>
          <tr>
            <td align="center"><strong><?php echo $row_Printer['device_id']; ?></strong></td>
            <td align="center"><strong><?php echo $row_Printer['date_pr']; ?></strong></td>
            <td align="left"><strong><?php echo $row_Printer['username']; ?></strong></td>
            <td width="75"><strong><a href="printer/printer_edit.php?id=<?php echo $row_Printer['id']; ?>"><img src="images/pencil.png" width="16" height="16" /> Edit</a></strong></td>
            <td width="91"><strong><a href="delete.php?id=<?php echo $row_Printer['id']; ?>"><img src="images/page_full.png" width="16" height="16" /> Delete</a></strong></td>
          </tr>
          <?php } while ($row_Printer = mysql_fetch_assoc($Printer)); ?>
    </table></td>
  </tr>
  <tr>
    <td>
      <table width="190" border="0" align="center">
        <tr>
          <td><?php if ($pageNum_Computer > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Computer=%d%s", $currentPage, 0, $queryString_Computer); ?>"><img src="First.gif" /></a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Computer > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Computer=%d%s", $currentPage, max(0, $pageNum_Computer - 1), $queryString_Computer); ?>"><img src="Previous.gif" /></a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Computer < $totalPages_Computer) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Computer=%d%s", $currentPage, min($totalPages_Computer, $pageNum_Computer + 1), $queryString_Computer); ?>"><img src="Next.gif" /></a>
          <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_Computer < $totalPages_Computer) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Computer=%d%s", $currentPage, $totalPages_Computer, $queryString_Computer); ?>"><img src="Last.gif" /></a>
          <?php } // Show if not last page ?></td>
        </tr>
    </table></td>
    <td>&nbsp;</td>
    <td>
      <table width="198" border="0" align="center">
        <tr>
          <td><?php if ($pageNum_Printer > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Printer=%d%s", $currentPage, 0, $queryString_Printer); ?>"><img src="First.gif" /></a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Printer > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Printer=%d%s", $currentPage, max(0, $pageNum_Printer - 1), $queryString_Printer); ?>"><img src="Previous.gif" /></a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Printer < $totalPages_Printer) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Printer=%d%s", $currentPage, min($totalPages_Printer, $pageNum_Printer + 1), $queryString_Printer); ?>"><img src="Next.gif" /></a>
          <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_Printer < $totalPages_Printer) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Printer=%d%s", $currentPage, $totalPages_Printer, $queryString_Printer); ?>"><img src="Last.gif" /></a>
          <?php } // Show if not last page ?></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="49%">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" height="48" border="0">
  <tr>
    <td class="btn-success">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Computer);

mysql_free_result($Printer);

mysql_free_result($Office);

mysql_free_result($WiFi);
?>
