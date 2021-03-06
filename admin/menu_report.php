<!DOCTYPE html>
<tml lang="en">
<head>
<meta charset="utf-8">
<title>:: Report</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

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
</head>

<body background="images/1180422460.gif">

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
          <a href="index.php"><i class="icon-home"></i><font color="#ooooFF"><b> &nbsp; Home&nbsp;&nbsp;&nbsp; &nbsp; </a></b></font></a></button></li>
          <li><button name="button" class="btn btn-warning">
          <a href="adduser.php"><i class="icon-user"></i><font color="#ooooFF"><b>&nbsp;Add_User</b>&nbsp;&nbsp;&nbsp; &nbsp;</a></font></button></li>
          <li><button name="button" class="btn btn-warning">
          <a href="add_department.php"><i class="icon-cog"></i><font color="#ooooFF">&nbsp;<b>Add_Department</b>&nbsp; &nbsp;</a></font></button></li>
          <li><button name="button" class="btn btn-warning">
          <a href="add_priority.php"><i class="icon-cog"></i><font color="#ooooFF">&nbsp;<b>Add_Priority</b>&nbsp;&nbsp;&nbsp; &nbsp;</a></font></button></li>
          <li><button name="button" class="btn btn-warning">
          <a href="add_problem.php"><i class="icon-cog"></i><font color="#ooooFF">&nbsp;<b>Add_Problem</b>&nbsp; &nbsp;&nbsp;&nbsp;</a></font></button></li>
          <li><button name="button" class="btn btn-warning">  
          <a href="menu_report.php"><i class="icon-book"></i><font color="#ooooFF">&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></font></button></li>
          <li><button name="button" class="btn btn-">
          <a href="../indexlogin.php"><i class="icon-user"></i>&nbsp; <font color="red"><b>&nbsp;Logout&nbsp;&nbsp;&nbsp; &nbsp;</a></b></font></li>


          
        </ul>
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
<p>
<table width="100%" border="0">
  <tr>
    <td width="240" height="34" align="left"><img src="../images/helpdesk logo.png" width="300" height="72"></td>
    <td width="753" align="center"><p><strong>&nbsp;&nbsp;<font color ="#ooooFF"><h3>Report System</h3></font></strong><strong>&nbsp;&nbsp;</strong></p></td>
    <td width="329" align="center"><strong>
    <button type="button" class="btn btn-success"><i class="icon-calendar"></i>&nbsp;Date :: Time : <?php echo $date."&nbsp;/&nbsp;".$time;?></strong></button></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="40%" border="0" align="center">
  <tr>
    <td width="50" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><button name="button" class="btn btn-info"> <strong><a href="rep.php"><i class="icon-book"> 
    <font color ="#ooooFF"></i>&nbsp;&nbsp;&nbsp;&nbsp;By Summary Report</font></strong></a></butuon></td>
  </tr>

  <tr>
    <td align="center">&nbsp;</td>
  </tr>

  <tr>
    <td><button name="button" class="btn btn-info"> <strong><a href="report.php"><i class="icon-calendar">
    <font color ="#ooooFF"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By Date : Time</font></strong></a></butuon></td>
  </tr>

  <tr>
    <td align="center">&nbsp;</td>
  </tr>

  <tr>
    <td><button name="button" class="btn btn-info"> <a href="search_department.php"><strong><i class="icon-home">
    <font color ="#ooooFF"></i>&nbsp;&nbsp;&nbsp;&nbsp;By Department</font></strong></a></butuon></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>

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
</body>
</html>