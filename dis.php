<?php

$db = mysqli_connect("localhost","root","","test"); //keep your db name
$sql = "SELECT * FROM ts WHERE id = 12";
$sth = mysqli_query($db,$sql);
$result=mysqli_fetch_array($sth);
echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
?>