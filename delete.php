	<html>
<head>
	<title> Delete – Student database management system </title>
	
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
		$conn=mysqli_connect($host,$user,$pw,$db) or die ("connection failed");
		$query ="SELECT * FROM students_per order by Roll_no";
		$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
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
		
		<form name=delete  class=after method=POST action="http://localhost/Project/delete1.php">
			<center> Select the roll number to be delete <br>
		<select name=roll>
		
				<?php 
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))

				{?> 
			<option  value= "<?php echo $row['Roll_no'];?>" > <?php echo $row["Roll_no"]; ?> </option>

				<?php }?>
		</select>
		<br>
				<br>
				<input type =submit value=submit name=submit  >
		
			</center>
		</form>
		<?php 
		}
?>
</body>
</html>