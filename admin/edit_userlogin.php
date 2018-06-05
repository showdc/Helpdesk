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
  $updateSQL = sprintf("UPDATE login_user SET date_reg=%s, name=%s, username=%s, password=%s, department=%s WHERE id=%s",
                       GetSQLValueString($_POST['date_reg'], "date"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['department'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_IT, $IT);
  $Result1 = mysql_query($updateSQL, $IT) or die(mysql_error());

  $updateGoTo = "adduser_login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_EditUser = "-1";
if (isset($_GET['id'])) {
  $colname_EditUser = $_GET['id'];
}
mysql_select_db($database_IT, $IT);
$query_EditUser = sprintf("SELECT * FROM login_user WHERE id = %s", GetSQLValueString($colname_EditUser, "int"));
$EditUser = mysql_query($query_EditUser, $IT) or die(mysql_error());
$row_EditUser = mysql_fetch_assoc($EditUser);
$totalRows_EditUser = mysql_num_rows($EditUser);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<title>เพิ่มชื่อผู้ใช้งานระบบ</title>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body background="images/1180422460.gif" onload="MM_preloadImages('icon/Back1.png')">



<script src="js/bootstrap.min.js"></script>
<table width="100%" border="0">
  <tr>
    <td width="6%" height="34" class="btn-success">&nbsp;</td>
    <td width="94%" class="btn-success"><img src="icon/Write.png" width="32" height="32" /> <strong>แก้ไขข้อมูล / ผู้ใช้งาน</strong></td>
  </tr>
</table>
<p>&nbsp;</p>
<p align="center"><strong> <a href="adduser_login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','icon/Back1.png',1)"><img src="icon/Back.png" name="Image7" width="32" height="32" border="0" id="Image7" /> กลับหน้าหลัก</a></strong></p>
<p align="center"><br>
</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td height="32" colspan="3" align="center" nowrap="nowrap" class="btn-success"><strong> ** แก้ไขข้อมูล / ผู้ใช้งาน</strong> **</td>
    </tr>
    <tr valign="baseline">
      <td height="42" align="left" nowrap="nowrap"><img src="icon/Calender.png" width="32" height="32" /> <strong>วันที่ลงทะเบียน</strong></td>
      <td>&nbsp;</td>
      <td><img src="icon/User.png" width="32" height="32" /> <strong>ชื่อ</strong></td>
    </tr>
    <tr valign="baseline">
      <td height="34" align="right" nowrap="nowrap"><input type="text" name="date_reg" value="<?php echo htmlentities($row_EditUser['date_reg'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td>&nbsp;</td>
      <td><input type="text" name="name" value="<?php echo htmlentities($row_EditUser['name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td height="39" align="left" nowrap="nowrap"><img src="icon/Mail.png" width="32" height="32" /> <strong>ชื่อผู้ใช้งาน</strong></td>
      <td>&nbsp;</td>
      <td><img src="icon/Lock.png" width="32" height="32" /> <strong>รหัสผ่าน</strong></td>
    </tr>
    <tr valign="baseline">
      <td height="35" align="right" nowrap="nowrap"><input type="text" name="username" value="<?php echo htmlentities($row_EditUser['username'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td>&nbsp;</td>
      <td><input type="text" name="password" value="<?php echo htmlentities($row_EditUser['password'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td height="46" align="left" nowrap="nowrap"><img src="icon/Home.png" width="32" height="32" /> <strong>แผนก</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td height="25" align="right" nowrap="nowrap"><input type="text" name="department" value="<?php echo htmlentities($row_EditUser['department'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" value="บันทึก" /></td>
    </tr>
    <tr valign="baseline">
      <td height="29" colspan="3" align="right" nowrap="nowrap" class="btn-success">&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_EditUser['id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($EditUser);
?>
