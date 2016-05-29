<html>
<head>
	<title> Display – Student database management system </title>
	
	<?php 
		$login=0;
		include_once 'Login_valid.php';
	if(!$login)
	{?>
	<script type="text/javascript">
         <!--
            function Redirect() {
               window.location="http://localhost/Project/Login_signup.php";
            }			
         setTimeout('Redirect()', 3000);
         //-->
    </script>
	<?php }
	?>
	<link rel="Stylesheet" type="text/css" href="css.css">
</head>

<body>
 <div id=grad1 >      
	<font color = white size= 5>	
		<font size='10'><u><center> Student database management system </center></u></h1></font>
		<?php if(!$login) echo "<center><font style=background-color:red;> Please login to continue... </font></center>";?>
        
		<hr>
	
<?php 
	if($login)
	{	
		$roll=$_POST['roll'];
		$conn=mysqli_connect($host,$user,$pw,$db) or die ("connection failed");
		$query ="SELECT * FROM students_per WHERE Roll_no = $roll";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC)
		?>
		<center>
		<div class="dropdown">
		  <button class="dropbtn">Insert</button>
		  <div class="dropdown-content">
			<a href="http://localhost/Project/ins_per_info.php">Personal info</a>
			<a href="http://localhost/Project/ins_aca_info.php">Acadamic info</a>
		  </div>
		</div>
		
		
		<div class="dropdown">
		  <button class="dropbtn">Search</button>
		  <div class="dropdown-content">
			<a href="http://localhost/Project/search.php">Search</a>
		  </div>
		</div>
		
		<div class="dropdown">
		  <button class="dropbtn">Update</button>
		  <div class="dropdown-content">
			<a href="http://localhost/Project/search.php">Students records</a>
		  </div>
		</div>
		
		<div class="dropdown">
		  <button class="dropbtn">Delete</button>
		  <div class="dropdown-content">
			<a href="http://localhost/Project/delete.php">Single record</a>
			<a href="http://localhost/Project/deleteall.php">All records</a>
		  </div>
		</div>
		
		<div class="dropdown">
		  <button class="dropbtn">Display</button>
		  <div class="dropdown-content">
			<a href="http://localhost/Project/search.php">Search</a>
			<a href="http://localhost/Project/displayall.php">All </a>
		  </div>
		</div>
		
		<div class="dropdown">
		  <button class="dropbtn"><?php echo $udata['User_name'];?></button>
		  <div class="dropdown-content">
			<a href="http://localhost/Project/staff_update.php">Update</a>
			<a href="http://localhost/Project/logout.php">Logout</a>
		  </div>
		</div>
		
		<hr>
		Welcome to student database management system 
		</font>
		</center>
		
		<div style='float:right'>
			<form method ="POST" class='userinfo' name='form1' >
				Hello how are u guys this is the user info section where user can read and navigate between the pages.
			</form>
		</div>
		
		<form name=delete  class=after method=POST action="http://localhost/Project/delete2.php">
			<u><font size=7 color=green><center>Details of  <?php echo "$row[First_name]"; ?></center></font></u><br>
			<div style=float:right id=img>
			<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"height=150px width=150px/>'; ?>
			</div>
		
		
  First Name	 <br> <input type=text name=First_name value='<?php echo "$row[First_name]"; ?>' readonly="readonly"><br>
  Last Name   	 <br> <input type=text name=Last_name value='<?php echo "$row[Last_name]"; ?>' readonly="readonly"  ><br>
  Age		 <br> <input type=text name=First_name value='<?php echo "$row[Age]"; ?>' readonly="readonly"><br>
  Date of birth  <br><input type=text name=DOB value='<?php echo "$row[DOB]"; ?>' readonly="readonly"  ><br>
  Father's Name  <br> <input type=text name=Father value='<?php echo "$row[Father]"; ?>' readonly="readonly"  ><br>
  Mother's Name  <br> <input type=text name=Mother value='<?php echo "$row[Mother]"; ?>' readonly="readonly"  ><br>
  Address        <br> <textarea name=Address readonly="readonly"> '<?php echo "$row[Address]"; ?>'  </textarea><br>
  Phone number   <br> <input type=text  name=Phone value='<?php echo "$row[Phone]"; ?>' readonly="readonly"><br>
  Roll number    <br> <input type=text  name=Roll_no value='<?php echo "$row[Roll_no]"; ?>' readonly="readonly"><br>
  Degree/branch  <br> <input type=text name=Deg value='<?php echo "$row[Age]"; ?>' readonly="readonly"  ><br>

			<input type = submit value=delete name=delete  >
		</form>
		<?php 
		}
?>
</body>
</html>