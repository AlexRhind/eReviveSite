<?php session_start();
ob_start();

require('includes/dbconx.php');
include('includes/errors.php');
require('includes/upload.php');


//load into DB - uses a URL string for image file not IMAGE upload

if (isset($_POST['submit'])){
        
	if(!empty($_POST['category']) && !empty($_POST['quality'])) {

				$username = $_SESSION["username"];
                $title = $_POST['title'];
				$category = $_POST['category'];
		
				uploadImages();
				$pathname = basename($_FILES["uploaded"]["name"]); //Add "img/". if a dir is required in the DB filename
				
				$quality = $_POST['quality'];
				$description = $_POST['description'];
				$price = $_POST['price'];
        
          if($stmt = $conn->prepare("INSERT INTO admin.sales 
                                    (username, title, category, image, quality, description, price) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?)")){

                                    $stmt->bind_param("sssssss", $username, $title, $category, $pathname, $quality, $description, $price);
                                    $stmt->execute(); 
                                    $stmt->close();
              
                                    header("location:userAdmin.php");
				
                                    }//check query is present 
        
          } else { //close check radio buttons

    //send to another page to start again
    echo ("<p>No data returned</p>");
        
    }

} //close isset

