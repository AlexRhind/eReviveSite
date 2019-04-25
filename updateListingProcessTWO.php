<?php session_start();
ob_start();

require('includes/dbconx.php');
include('includes/errors.php');
require('includes/upload.php');


//load into DB - uses a URL string for image file not IMAGE upload

if (isset($_POST['submit'])){
        
	if(!empty($_POST['category']) && !empty($_POST['quality'])) {

                $id = $_SESSION["id"];//load session from updateListingProcessONE
        
                $username = $_SESSION["username"];
                $title = $_POST['title'];
				$category = $_POST['category'];
		
				uploadImages();
				$pathname = basename($_FILES["uploaded"]["name"]); //Set = "img/". basename[...] if a dir/ is required in the DB filename
				
				$quality = $_POST['quality'];
				$description = $_POST['description'];
				$price = $_POST['price'];
        
        
           if($stmt = $conn->prepare("UPDATE admin.sales SET 
                                    title = ?, category = ?, image = ?, quality = ?, description = ?, price = ? 
                                    WHERE salesID = ?")){

                                    $stmt->bind_param("sssssdi", $title, $category, $pathname, $quality, $description, $price, $id);
                                    $stmt->execute(); 
                                    $stmt->close();
               
                                    $conn->close();
              
                                    header("location:userAdmin.php");
				
                                    }//check query is present 
        
          } else { //close check radio buttons

       //send to another page to start again
       echo ("<p>No data returned</p>");
        
    }

} //close isset

//ob_end_flush();

