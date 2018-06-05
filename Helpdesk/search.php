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

$currentPage = $_SERVER["PHP_SELF"];

$colname_Search = "-1";
if (isset($_POST['search'])) {
  $colname_Search = $_POST['search'];
}
mysql_select_db($database_IT, $IT);
$query_Search = sprintf("SELECT * FROM addjob WHERE department LIKE %s ORDER BY id DESC", GetSQLValueString("%" . $colname_Search . "%", "text"));
$Search = mysql_query($query_Search, $IT) or die(mysql_error());
$row_Search = mysql_fetch_assoc($Search);
$totalRows_Search = mysql_num_rows($Search);

$queryString_Search = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Search") == false && 
        stristr($param, "totalRows_Search") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Search = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Search = sprintf("&totalRows_Search=%d%s", $totalRows_Search, $queryString_Search);
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
</head>

<body background="images/1180422460.gif" onload="MM_preloadImages('icon/Back1.png')">
<table width="100%" border="1">
  <tr>
    <td class="btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="icon/Tools.png" width="32" height="32" /> &nbsp;<strong>ระบบแจ้งซ่อมออนไลน์ ( Peaceresort )</strong></td>
    <td width="7%" height="43" class="btn-success">&nbsp;&nbsp;&nbsp;<img src="images/R24pic.gif" width="70" height="60" /></td>
  </tr>
</table>
  <p>
    <script src="js/bootstrap.min.js"></script>
    <marquee bgcolor="#39b54a" border="0" align="middle" scrollamount="2"  scrolldelay="5" behavior="scroll"  width="100%" height="20" style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 18">
    ** รายการค้นหาใบงานเป็นแผนก **
    </marquee>
  <br>
  <p>
  <p>  
  <table width="100%" border="0">
    <tr>
      <td width="7%">&nbsp;</td>
      <td width="33%"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','icon/Back1.png',1)"><strong><img src="icon/Back.png" name="Image4" width="32" height="32" border="0" id="Image4" /> กลับหน้าหลัก</strong></a></td>
      <td width="60%"><img src="icon/Help.png" width="32" height="32" /> <strong>ใบงานเป็นแผนก &nbsp;<?php echo $row_Search['department']; ?></strong></td>
    </tr>
</table>

<table width="100%" border="0" class="table table-bordered">
  <tr class="btn-success">
    <td width="7%" height="33" align="center"><strong>ชื่อผู้แจ้ง</strong></td>
    <td width="9%" align="center"><strong>วันที่แจ้ง</strong></td>
    <td width="11%" align="center"><strong>แผนกที่แจ้ง</strong></td>
    <td width="31%" align="center"><strong>รายละเอียด</strong></td>
    <td width="9%" align="center"><strong>สถานะงาน</strong></td>
    <td width="33%" align="center"><strong>ข้อคิดเห็น</strong></td>
  </tr>
  <?php do { ?>
    <tr>
      <td align="center"><?php echo $row_Search['name']; ?></td>
      <td align="center"><?php echo $row_Search['datepicker']; ?></td>
      <td><?php echo $row_Search['department']; ?></td>
      <td><?php echo $row_Search['details']; ?></td>
      <td align="center"><?php echo $row_Search['status']; ?></td>
      <td><?php echo $row_Search['comment']; ?></td>
    </tr>
    <?php } while ($row_Search = mysql_fetch_assoc($Search)); ?>
</table>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Search);
?>
