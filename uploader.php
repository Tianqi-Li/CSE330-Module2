<?php

session_start();



$userName = $_SESSION['userName'];
if( !preg_match('/^[\w_\-]+$/', $userName) ){
	echo "Invalid username";
	exit();
}

$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
	exit();
}

$full_path = sprintf("/home/TianqiFor330/fileShared/%s/%s", $userName, $filename);



 
if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
     echo "Here Sucess";
     header("Location: fileList.php");
     exit();
}else{
    echo "here failure";
    header("Location: index.html");
    exit();
     
}
 


?>