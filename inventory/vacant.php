<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>:: Mantennace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
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
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

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
              <li><a href="../index.php"><i class="icon-home"></i>&nbsp;Home</a></li>
              <li><a href="../addjob.php"><i class="icon-file"></i>&nbsp;Add Job</a></li>
              <li><a href="../mantenace.php"><i class="icon-wrench"></i>&nbsp;Mantennace</a></li>
              <li><a href="../inventory.php"><i class="icon-barcode"></i>&nbsp;Inventory</a></li>
              <li><a href="../pr_login"><i class="icon-tag"></i>&nbsp;PR :: Order</a></li>
              <li><a href="../ind.php"><i class="icon-user"></i>&nbsp;Administrator</a></li>
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
 <form name="login_ma" method="post">
 <table width="20%" border="0" align="center">
   <tr>
     <td height="43" align="center" class="btn-success"><strong>Please Login</strong> !</td>
   </tr>
   <tr>
     <td height="39" align="center"><strong><i class="icon-user"></i>&nbsp;Username</strong></td>
   </tr>
   <tr>
     <td align="center"><input type="text" name="username" id="textfield"></td>
   </tr>
   <tr>
     <td height="40" align="center"><strong><i class="icon-lock"></i>&nbsp;Password</strong></td>
   </tr>
   <tr>
     <td align="center"><input type="password" name="password" id="textfield2"></td>
   </tr>
   <tr>
     <td height="32" align="center"><button type="submit" name="button" id="button" class="btn btn-success"><i class="icon-check"></i>&nbsp;Login&nbsp;</button>
      <button type="reset" name="button2" id="button2" class="btn btn-danger" ><i class="icon-remove"></i>&nbsp;Cancel</button></td>
   </tr>
 </table>
</form>
<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="../assets/js/jquery.js"></script> 
<script src="../assets/js/bootstrap-transition.js"></script> 
<script src="../assets/js/bootstrap-alert.js"></script> 
<script src="../assets/js/bootstrap-modal.js"></script> 
<script src="../assets/js/bootstrap-dropdown.js"></script> 
<script src="../assets/js/bootstrap-scrollspy.js"></script> 
<script src="../assets/js/bootstrap-tab.js"></script> 
<script src="../assets/js/bootstrap-tooltip.js"></script> 
<script src="../assets/js/bootstrap-popover.js"></script> 
<script src="../assets/js/bootstrap-button.js"></script> 
<script src="../assets/js/bootstrap-collapse.js"></script> 
<script src="../assets/js/bootstrap-carousel.js"></script> 
<script src="../assets/js/bootstrap-typeahead.js"></script>
</body>
</html>