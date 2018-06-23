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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "mantenace")) {
  $insertSQL = sprintf("INSERT INTO mantenace (datepicker, device_id, username, department, position_user, details, repair_by, `position`, coment) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['datepicker'], "date"),
                       GetSQLValueString($_POST['device_id'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['department'], "text"),
                       GetSQLValueString($_POST['position_user'], "text"),
                       GetSQLValueString($_POST['details'], "text"),
                       GetSQLValueString($_POST['repair_by'], "text"),
                       GetSQLValueString($_POST['position'], "text"),
                       GetSQLValueString($_POST['coment'], "text"));

  mysql_select_db($database_IT, $IT);
  $Result1 = mysql_query($insertSQL, $IT) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
</head>

<body background="images" onload="MM_preloadImages('../icon/Back1.png')">
<table width="100%" border="0">
  <tr>
    <td class="btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="icon/Tools.png" width="32" height="32" /> &nbsp;<strong>แผนงานการซ่อมบำรุงประจำปี ( Peace Mantenace year plan)</strong></td>
    <td width="7%" height="43" class="btn-success">&nbsp;&nbsp;&nbsp;<img src="images/R24pic.gif" width="70" height="60" /></td>
  </tr>
</table>
<form action="<?php echo $editFormAction; ?>" name="mantenace" method="POST">
<table width="100%" border="0">
  <tr>
    <td width="5%" height="70">&nbsp;</td>
    <td colspan="3"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image13','','../icon/Back1.png',1)"><strong><img src="../icon/Back.png" name="Image13" width="32" height="32" border="0" id="Image13" /> กลับหน้าหลัก</strong></a></td>
    <td width="48%">&nbsp;</td>
  </tr>
  <tr>
    <td height="43">&nbsp;</td>
    <td colspan="3" align="center" class="btn-info"><strong><img src="icon/Computer.png" width="32" height="32" /> แผนงานการซ่อมบำรุงคอมพิวเตอร์ประจำปี</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="44">&nbsp;</td>
    <td width="25%"><img src="../icon/Calender.png" width="32" height="32" /> วันที่ซ่อมบำรุง</td>
    <td width="1%">&nbsp;</td>
    <td width="21%">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <input type="text" name="datepicker" id="datepicker" class="form-control" /></td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td><img src="../icon/User.png" width="32" height="32" /> ชื่อผู้ใช้งาน</td>
    <td>&nbsp;</td>
    <td><img src="../icon/Mail.png" width="32" height="32" /> รหัสเครื่อง</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td>
      <input type="text" name="username" id="textfield2" class="form-control" /></td>
    <td>&nbsp;</td>
    <td>
      <input type="text" name="device_id" id="textfield" class="form-control" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td><img src="../icon/Home.png" width="32" height="32" /> แผนก</td>
    <td>&nbsp;</td>
    <td><img src="../icon/Stationery.png" width="32" height="32" /> ผู้ปฏิบัติงานซ่อม</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="42">&nbsp;</td>
    <td>
      <select name="department" id="select" class="form-control">
      <option>** Select **</option>
      <option>Accounting</option>
      <option>Engineering</option>
      <option>Front Office</option>
      <option>F & B</option>
      <option>Laundry</option>
      <option>HR</option>
      <option>HK</option>
      <option>Main Kitchen</option>
      <option>Reservation</option>
      <option>Sales</option>
      </select></td>
    <td>&nbsp;</td>
    <td><select name="repair_by" id="select2" class="form-control">
    <option>** Select **</option>
    <option>Mr.Mana Duangsri</option>
    <option>Mr.Chaimas Phanphon</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td><img src="../icon/Tag.png" width="32" height="32" /> ตำแหน่ง</td>
    <td>&nbsp;</td>
    <td><img src="../icon/Help.png" width="32" height="32" /> ตำแหน่ง</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="42">&nbsp;</td>
    <td>
      <input type="text" name="position_user" id="textfield3" class="form-control" /></td>
    <td>&nbsp;</td>
    <td><select name="position" id="select3" class="form-control">
    <option>** Select **</option>
    <option>IT Supervisor</option>
    <option>IT Manager</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td><img src="../icon/Status.png" width="37" height="34" />รายละเอียดการซ่อมบำรุง</td>
    <td>&nbsp;</td>
    <td><img src="../icon/Edit.png" width="32" height="32" /> ข้อคิดเห็น</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><textarea name="details" id="textarea" rows="3" class="form-control"></textarea></td>
    <td>&nbsp;</td>
    <td><textarea name="coment" id="textarea2" rows="3" class="form-control"></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="button" type="submit" class="btn-success" id="button" value="บันทึก" />
      <input name="button2" type="reset" class="btn-danger" id="button2" value="ยกเลิก" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td colspan="3" class="btn-info">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<input type="hidden" name="MM_insert" value="mantenace" />
</form>
<hr />

<script src="js/bootstrap.min.js"></script>
</body>
</html>