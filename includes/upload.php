<?php

function uploadImages(){
//set folder to upload images to
$target_dir = "img/";
//sets and returns the pathname for image upload
$target_file = $target_dir . basename($_FILES["uploaded"]["name"]);
//prepare variable to use for error checking. A value of 1 means that the image can be uploaded.
$uploadOk = 1;

// Check if image file is a actual image. This scripts checks mime type and file extension
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    $check = getimagesize($_FILES["uploaded"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists - unnecessary. move_uploaded_file overwrites it it exists
//if (file_exists($target_file)) {
   // echo "File already exists.";
   // $uploadOk = 0;
//}
    
// Check file size - set this to a reasonable upper limit
if ($_FILES["uploaded"]["size"] > 500000) {
    echo "The file exceeds 500Kb. Please upload a smaller filesize.";
    $uploadOk = 0;
}
    
// Allow only certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
    
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo " <p>Your file was not uploaded.</p>";
// if everything is ok, try to upload file
    
} else { //move_uploaded_file overwrites an existing file of the same name - 
    if (move_uploaded_file($_FILES["uploaded"]["tmp_name"], $target_file)) {
		
        echo "The file ". basename( $_FILES["uploaded"]["name"]). " has been uploaded.";
        //header('location:userAdmin.php');
		
    } else {
		
        echo "There was an error uploading your file.";
    }
}
echo 'img/'.basename( $_FILES["uploaded"]["name"]);

}

?>