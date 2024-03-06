<?php 
include("includes/header.php"); 
include("includes/classes/VideoUploadData.php"); 
include("includes/classes/VideoProcessor.php"); 

if(!isset($_POST['uploadButton'])){
    echo "No file sent to page.";
    exit();
}


// 1) create file to upload data 
$videoUploadDate = new VideoUploadData(
                                        $_FILES['fileInput'], 
                                        $_POST['titleInput'], 
                                        $_POST['descriptionInput'], 
                                        $_POST['privacyInput'], 
                                        $_POST['categoryInput'], 
                                        "REPLACE-THIS"
                                    );

// 2) press video data (upload)
$videoProcessor = new VideoProcessor($con);
$wasSuccessfuly = $videoProcessor->upload($videoUploadDate);

// 3) check if upolad was successful 

?>
