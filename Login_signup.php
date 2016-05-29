<html>
	<head>	
		<link rel="Stylesheet" type="text/css" href="css2.css">
		<title>Login - Student database management system </title>
	</head>
	
	<?php
	$f1empok=$f1passok=$emp_ok=$Password_ok=$conpass_ok=$User_name_ok=$email_ok=$gender_ok=0;
	$f1passErr= $f1empnoerr =$emperr=$passerr=$conpasserr=$usererr=$emailerr=$gendererr= "";
	$f1empno=$f1Password=$conpass=$User_name=$gender=$email=$empno=$Password="";
	?>
	
	
	<body bgcolor = #006400>
                <font  color = white size= 5>	
                <h1><u><center> Student database management system </center></u></h1>
		<hr>
			<div style='float:left'>
						<form method ="post" class=signup name=form2 >
			
			
			<?php
			if(isset($_POST['signup']))
			{
				$User_name=$_POST['User_name'];
				$Password=$_POST['Password'];
				$conpass=$_POST['conpass'];
				$email=$_POST['email'];
				if(isset($_POST['gender']))
					$gender=$_POST['gender'];
				$empno=$_POST['empno'];
				
				if(isset($_POST['email'])){
					if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$emailerr="Invalid email id";
					}				
					else
						$email_ok=1;
				}
				else
					$email_ok=1;
				
				
				if(empty($empno))
				{	
					$emperr="REQUIRED";
					$emp_ok=0;
				}
				else
				{
					$emp_ok=1;
				}
				if(empty($Password))
				{
					$passerr="REQUIRED";
					$pass_ok=0;
				}
				else
					$pass_ok=1;
				if(empty($conpass))
				{
					$conpasserr="REQUIRED";
					$conpass_ok=0;
				}
				else{
						if($conpass===$Password)
						{						
							$conpass_ok=1;
						}
						else
							{
							$conpass_ok=0;
							$conpasserr="Password does not match";
						}
				}
				if(empty($User_name))
				{
					$usererr="REQUIRED";
					$User_name_ok=0;
				}
				else
					$User_name_ok=1;
				if(empty($gender))
				{
					$gendererr="REQUIRED";
					$gender_ok=0;
				}
				else
					$gender_ok=1;
			}
			?>
			<pre>
			
			<u>Sign up for new user's </u><br>
			
		Username		:  <input type ="text" name="User_name" value="<?php echo $User_name; ?>"><span class="error">* <?php echo $usererr;?></span>
		Password			:  <input type ="password" name="Password" value="<?php echo $Password; ?>"><span class="error">* <?php echo $passerr;?></span>
		Confirm Password	:  <input type ="password" name="conpass" value="<?php echo $conpass; ?>"><span class="error">* <?php echo $conpasserr;?></span>
		Email ID			:  <input type ="text" name="email" value="<?php echo $email; ?>"><span class="error"><?php echo $emailerr;?></span>
		Gender			:  <input type ="radio" name="gender" value="male" <?php if($gender==='male') echo "checked";?> > Male  <input type ="radio" name="gender" value="female" <?php if($gender==='female') echo "checked";?>> Female<span class="error">* <?php echo $gendererr?></span>		
		Employee No		:  <input type ="text" name="empno" value="<?php echo $empno; ?>"><span class="error">* <?php echo $emperr;?></span><br>
					<input type ="submit" name="signup" value="Signup" formaction="<?php if($emp_ok && $pass_ok && $conpass_ok && $User_name_ok && $email_ok && $gender_ok) echo "http://localhost/Project/signup.php"; else echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
			</pre>

			</div>
			
			<div>
		<form method ="POST" name=form1 >
			
			
			<?php
			if(isset($_POST['Login']))
			{
				$f1empno=$_POST['f1empno'];
				$f1Password=$_POST['f1Password'];
				if(empty($f1empno))
				{	
					$f1empnoerr="REQUIRED";
					$f1empok=0;
				}
				else
				{
					$f1empok=1;
				}
				if(empty($f1Password))
				{
					$f1passErr="REQUIRED";
					$f1passok=0;
				}
				else
					$f1passok=1;
				
	
			}
			?>
			
			
			
			<pre>
			
		
				<u>Login</u><br>
				
	   Employee No	:  <input type ="text" name="f1empno" value="<?php echo $f1empno;?>" ><span class="error">* <?php echo $f1empnoerr;?></span>
	   Password		:  <input type ="password" name="f1Password" value="<?php echo $f1Password;?>"><span class="error">* <?php echo $f1passErr;?></span><br>
			<input type ="submit" name="Login" value="Login" formaction= "<?php if($f1empok && $f1passok ) echo "Login.php"; else echo htmlspecialchars($_SERVER["PHP_SELF"])?>">	 
			</pre>
			</form>

			</form>
			</div>
			<marquee> Welcome to the student Database management system </marquee>
		<hr>
<u><h2> About us </h2></u>	
	<font size = 4 > 
		<p>The Student Database Management System helps you keep records of the information of students with ease. It was created by Saravanan R and Raja Katnal. Sign up to get started!</p>	
		</body>
</html>
	 

