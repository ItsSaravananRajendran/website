<html>
		<title> Signup page</title>
		<script type="text/javascript">
         <!--
            function Redirect() {
               window.location="http://localhost/Project/Login_signup.php";
            }			
         setTimeout('Redirect()', 5000);
         //-->
    </script>
	</head>
	<?php

	$host='localhost';
	$user='root';
	$pw='';
	$db="students";
	$conn=mysqli_connect($host,$user,$pw,$db) or die ("connection failed");
 	
	extract($_POST,EXTR_PREFIX_ALL, 'from_signup');
	if(!isset($from_signup_email))
		$from_signup_email='';
	$enc='';
	$temp=str_split($from_signup_Password);
	foreach ($temp as $new)
		$enc=$enc.(ord($new)+20);
	echo $enc;
	$query_up ="UPDATE user_detail SET User_name = '$from_signup_User_name', Password='$enc', Email = '$from_signup_email' , Gender = '$from_signup_gender' WHERE Employee_no = $from_signup_empno";
	if(mysqli_query($conn,$query_up)) 
	 echo "signup if successful...You will be redirected to login page...Please login";
	else 
	 echo "signup has failed...You will be redirected to login page...Please try again";
	mysqli_close($conn);
	?>
	<body bgcolor =#006400>
                <font color = white size= 5>	
                <h1><u><center> Student database management system</u></h1>
		<hr>
		</center>
	</body>
</html>
	 

