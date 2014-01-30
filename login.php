<?php
   
    if(isset($_POST['submit'])) {
        $userName = $_POST['userName'];
        $userFile = fopen("/home/TianqiFor330/user.txt","r") or die("can't open file");
        while(!feof($userFile)) {
            $name = trim(fgets($userFile));
            //check if your username is existed,if it is, the page will jump to "fileList.php"
                if($name == $userName) {
                    session_start();
                    $_SESSION['userName'] = $userName;
                    header("Location: fileList.php");
                    fclose($userFile);
                    exit();
                }    
        }
         
    }
    
    
    ?>