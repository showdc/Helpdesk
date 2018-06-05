<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_IT = "localhost";
$database_IT = "it";
$username_IT = "root";
$password_IT = "1234";
$IT = mysql_pconnect($hostname_IT, $username_IT, $password_IT) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_query("SET NAMES UTF8");
?>