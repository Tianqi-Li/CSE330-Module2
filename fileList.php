<!DOCTYPE html>
<?php
session_start();
$userName = $_SESSION['userName'];
?>
<html>
<head>
    <title>Users page</title>
    
    <style>
        body {
            background-color: #222930;
     }
        h3 {
            font-size: 50px;
            margin-left: 20px;
            font-weight: bold;
            color: #4EB1BA;
        }
        span {
            font-size: 25px;
            color: #E9E9E9;
            margin-left: 10px;
            
        }
        a {
            font-size: 15px;
            color: #E9E9E9;
        }
        a:hover {
            color: #4EB1BA;
        }
        label {
            font-size: 20px;
            color: #E9E9E9;
        }
        .upload {
            font-size: 15px;
            color: #E9E9E9;
        }
        
       
   </style>
</head>

<body>
    
    <h3>
    <?php
    echo "Welcome, ". $userName;
    ?><span><a href="logout.php">Logout</a></span>
    </h3>
    
    
<?php
    

    $myFiles = sprintf("/home/TianqiFor330/fileShared/%s", $userName);
    $files=scandir($myFiles);
    //use the for loop to record the names of all the files
    for ($i=0;$i<count($files);$i++) {
        if($files[$i]!="." && $files[$i]!=".."){
            //creat the "Delete" and "View" for every file
            //if you click on these 2 Buttons, will jump to "view.php"
            echo sprintf('<form action="view.php" method="POST">
                         <input type="hidden" value=%s name="downloadedfile" />
                         <label for="download_file"> %s</label>
                         <input id="download_file" type="submit" name="view123" value="View" />
                         <input type="submit" name="delete123" value="Delete"/>
                         </form>', htmlentities($files[$i]), htmlentities($files[$i]));
            
            
            
        }
    }
    
    
?>    

<form  enctype="multipart/form-data" action="uploader.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="100000000" /><br />
<label id="upload">Choose a file to upload:</label><input name="uploadedfile" type="file" /><br />
<input type="submit" value="Upload File" /><br />

</form>




</body>
</html>