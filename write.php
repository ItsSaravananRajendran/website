<?php
	$emp=$_POST['f1empno'];
	$pass=$_POST['f1Password'];
	$fh=fopen("Login_valid.php",'w');
	$text= '<?php
	$empno="';
	fwrite($fh,$text);
	
	$fh=fopen("Login_valid.php",'a+');
	$text="$emp";
	fwrite($fh,$text);
	$text='";
	$password="';
	fwrite($fh,$text);
	$text="$pass";
	fwrite($fh,$text);
	$text='";
	$loginid="undefned";
	$host="localhost";
	$user="root";
	$pw="";
	$db="students";
	$login=0;
	$conn=mysqli_connect($host,$user,$pw,$db) or die ("connection failed");
			
	$query= "SELECT * FROM user_detail ";
	$result=mysqli_query($conn,$query);
	$udata=mysqli_fetch_array($result ,MYSQLI_ASSOC);
	$login=($udata["Employee_no"]== $empno && $udata["Password"]== $password);			
	mysqli_close($conn);	
	?>';
	
	fwrite($fh,$text) or die ("could write to the file");
	fclose($fh);
?>