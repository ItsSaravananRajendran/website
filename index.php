<!DOCTYPE html>
<html>
<head>
    <title>Insert Image</title>
</head>
<body>
<?php
$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
	$i=12;
    $image = $_FILES['image1']['tmp_name'];
    $img = file_get_contents($image);
    $con = mysqli_connect('localhost','root','','test') or die('Unable To connect');
    $sql = "insert into ts (image,id) values(?,?)";

    $stmt = mysqli_prepare($con,$sql);

    mysqli_stmt_bind_param($stmt, "si",$img,$i);
    mysqli_stmt_execute($stmt);

    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = 'Successfullly UPloaded';
    }else{
        $msg = 'Could not upload';
    }
	 mysqli_close($con);
}
?>
<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image1" />
    <button>Upload</button>
</form>
<?php
    echo $msg;
?>
</body>
</html>