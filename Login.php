<html>
<head>
	<?php
	$emp=$_POST['f1empno'];
    $pass=$_POST['f1Password'];
	$fh=fopen("Login_valid.php",'w') or die ("failed to create a file");
	$text= '<?php
	$empno="';
	fwrite($fh,$text);
	
	$fh=fopen("Login_valid.php",'a+');
	$text=$emp;
	fwrite($fh,$text);
	$text='";
	$password="';
	fwrite($fh,$text);
	$text=$pass;
	fwrite($fh,$text);
	$text='";
		$enc="";
	$temp=str_split($password);
	foreach ($temp as $new)
		$enc=$enc.(ord($new)+20);
	$loginid="undefned";
	$host="localhost";
	$user="root";
	$pw="";
	$db="students";
	$login=0;
	$conn=mysqli_connect($host,$user,$pw,$db) or die ("connection failed");
			
	$query= "SELECT * FROM user_detail WHERE Employee_no=$empno";
	$result=mysqli_query($conn,$query);
	$udata=mysqli_fetch_array($result ,MYSQLI_ASSOC);
	$login=($udata["Employee_no"]== $empno && $udata["Password"]== $enc);
	mysqli_close($conn);
	?>';
	
	fwrite($fh,$text) or die ("could write to the file");
	fclose($fh);
	include 'Login_valid.php';
?>
	
	<title> Login - validation </title>
	<script type="text/javascript">
         <!--
            function Redirect() {
               window.location="<?php if($login) echo "http://localhost/Project/home.php"; else	echo "http://localhost/Project/Login_signup.php";?>";
            }			
         setTimeout('Redirect()', 3000);
         //-->
    </script>
</head>
	<body bgcolor =#006400>
                <font color = white size= 5>	
                <h1><u><center> Student database management system</u></h1>
		<hr>
	<?php if($login) 
			{
				echo"login is successfull...You will redirected to the main home page <br>";
				echo '<a href="http://localhost/Project/home.php"> click here to go the home page </a>';
			}
			else
			{
				echo "Try again....You will be redirected to the main log-in page<br>";
				echo '<a href="http://localhost/Project/Login_signup.php"> click here to try again</a>';
			}
	?>
	</center>
	</body>
</html>