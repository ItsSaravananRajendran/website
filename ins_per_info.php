<html>




<head>
	<title> Insert personal info - Student database management system </title>
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
  	<?php
        }
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
		$co=0;
		$First_name_msg=$Last_name_msg=$DOB_msg=$Father_msg=$Mother_msg=$Address_msg=$Phone_msg=$Roll_no_msg=$Deg_msg=$gender_msg=$Age_msg=$Semester_msg=$gender_msg='';
		$perinfo_First_name=$perinfo_Last_name=$perinfo_DOB=$perinfo_Father=$perinfo_Mother=$perinfo_Address=$perinfo_Phone=$perinfo_Roll_no=$perinfo_Deg=$perinfo_gender=$perinfo_Age=$perinfo_Semester='';
		
		if(isset($_POST['submit'])){
			
			$image = $_FILES['image']['tmp_name'];
			$img = addslashes(file_get_contents($image));
		
			$conn=mysqli_connect($host,$user,$pw,$db) or die ("connection failed");
			
			extract($_POST,EXTR_PREFIX_ALL, 'perinfo');
			$perinfo_First_name=ucfirst(strtolower($perinfo_First_name));
			$perinfo_Last_name=ucfirst(strtolower($perinfo_Last_name));
			$perinfo_Father=ucfirst(strtolower($perinfo_Father));
			$perinfo_Mother=ucfirst(strtolower($perinfo_Mother));
		
			$query_ins= "INSERT INTO students_per(First_name, Last_name, Age, DOB, Father,Mother, Address, Phone, Roll_no, Deg, Year, Semester,image,gender) VALUES ('$perinfo_First_name','$perinfo_Last_name','$perinfo_Age','$perinfo_DOB','$perinfo_Father','$perinfo_Mother','$perinfo_Address','$perinfo_Phone','$perinfo_Roll_no','$perinfo_Deg','$perinfo_Year','$perinfo_Semester','{$img}','$perinfo_gender')";
		
			
			$check=mysqli_query($conn,$query_ins) or die("Error in Query: " . mysqli_error($conn));
			if($check){
				$co=1;
				$msg = 'Successfullly Inserted';
			}else{
				$co=0;
				$msg = 'Could not be inserted';
			}

			mysqli_close($conn);
				
			
			
		}
		?>
		<center>
		<div class="dropdown">
		  <button class="dropbtn">Insert</button>
		  <div class="dropdown-content">
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
		
		<div>
		<form name=insert_per  class=after  method="POST" enctype="multipart/form-data">
		
		<font color=black>
    <u><font size=6 color=green><center>INSERT STUDENTS PERSONAL DETAILS </center></font></u>
<br>
  First Name	<br>	 <input type=text name=First_name value="<?php echo $perinfo_First_name; ?>"  ><span class="error">* <?php echo $First_name_msg;?></span><br>
  Last Name		<br> <input type=text name=Last_name value="<?php echo $perinfo_Last_name; ?>"  > <span class="error">* <?php echo $Last_name_msg;?></span> <br>
  Gender :<input type=radio value=Male name=gender <?php if($perinfo_gender=='Male') echo 'checked'; ?> >Male <input type=radio value=Female name=gender <?php if($perinfo_gender=='Female') echo 'checked'; ?>>Female <span class="error">* <?php echo $gender_msg;?></span> <br>
  Age			<br> <select name=Age class=input><option value="<?php if ($perinfo_Age=='') echo ''; else echo $perinfo_Age;?>"><?php if ($perinfo_Age=='') echo 'Select'; else echo $perinfo_Age;?></option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option></select><br>
  Date of birth		<br><input type=text name=DOB value="<?php echo $perinfo_DOB; ?>"  ><br>
  Father's Name	<br><input type=text name=Father value="<?php echo $perinfo_Father; ?>"  ><br>
  Mother's Name	<br><input type=text name=Mother value="<?php echo $perinfo_Mother; ?>"  ><br>
  Address			<br> <textarea name=Address><?php echo $perinfo_Address; ?> </textarea><br>
  Your image	<br> <input type=file name="image" ><br>
  Phone number<br><input type=text  name=Phone value="<?php echo $perinfo_Phone; ?>"><br>
  Roll number		<br> <input type=text  name=Roll_no value="<?php echo $perinfo_Roll_no; ?>"><br>
  Degree/branch	<br><select name="Deg" class=input>
  						<option value="<?php if ($perinfo_Deg=='') echo ''; else echo $perinfo_Deg;?>"><?php if ($perinfo_Deg=='') echo 'Select'; else echo $perinfo_Deg;?></option>
						<option  value="it">I.T.</option>
						<option  value="csc">C.Sc</option>
						<option  value="ece">E.C.E</option>				
					</select><br>
  Year			<br> <select name="Year" class=input >
  						<option value="<?php if ($perinfo_Deg=='') echo ''; else echo $perinfo_Deg;?>"><?php if ($perinfo_Deg=='') echo 'Select'; else echo $perinfo_Deg;?></option>
						<option  value="1">1 year</option>
						<option  value="2">2 year</option>
						<option  value="3">3 year</option>
						<option value=4>4 year </option>
					</select><br>
  Semester		<br> <select name="Semester" class=input>
  						<option value="<?php if ($perinfo_Semester=='') echo ''; else echo $perinfo_Semester;?>"><?php if ($perinfo_Semester=='') echo 'Select'; else echo $perinfo_Semester;?></option>
						<option  value="1">1 Semester </option>
						<option  value="2">2 Semester</option>
						<option  value="3">3 Semester</option>
						<option value=4>4 Semester </option>
						<option value=5>5 Semester </option>
						<option value=6>6 Semester </option>
						<option value=7> 7 Semester </option>
						<option value=8>8 Semester </option>
					</select><br>					
	<center><input type=submit value=Clear name=Clear formaction="<?php echo $_SERVER['PHP_SELF']; ?>">  <input type=submit value=Submit name=submit formaction="<?php echo $_SERVER['PHP_SELF']; ?>">
	
	<script>
		<?php if($co) echo 'alert("Insertion is successfull");'; ?>
	</script>
	</center>
		</form>
		</div>
		<?php 
		}
?>
</body>
</html>
