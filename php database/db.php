<?
 $con = mysqli_connect("localhost","root","root","loginSystem");
 //check connection
 if(mysqli_connect_errror()){
 	echo " Failed to connect to MySQL: ".mysql_connect_error();
 }
?>