<?php 
ob_start();

require('includes/dbconx.php');
include('includes/errors.php');

if(isset($_POST['submit'])){

	if(!empty($_POST['username']) && !empty($_POST['nickname']) && !empty($_POST['password'])) {
        
        if($_POST['password'] == $_POST['repeatPassword']){
			
			    // Test $username against the DB for exisiting username
				$username = $_POST['username'];
			
				$result = $conn->prepare("SELECT username FROM admin.users WHERE username = ?");
				$result->bind_param("s", $username);
				$result->execute();

				$found = $result->fetch();

				$result->close();
			
				//if the DB has found a match (it's not NULL)
				if ($found){   

					//message needed here to tell the user to try another username
					header("location: createAccount.php");

				} else {
					
				$retailer = $_POST['retailer'];
	
				if(isset($retailer) && $retailer == "yes") {
							$retailer = 1;
						} else { 
							$retailer = 0;
						};
					
				//username is not already registered and both passwords match - enter details into the DB
			   $nickname = $_POST['nickname'];
			   $password = $_POST['password'];
				
				//Send a hashed password into the DB (bind the hashed pwd)	
	           $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                    
            	if($stmt = $conn->prepare("INSERT INTO admin.users (username, nickname, password, retailer) VALUES (?, ?, ?, ?)")){
                $stmt->bind_param("sssi", $username, $nickname, $hashPassword, $retailer);
                $stmt->execute();
                $stmt->close();

					//redirect user to a confirmation page after DB data entry
					header("location: login.php");

						}else{

							echo "Something went wrong.";

						}
					
					$conn->close();
					
				}//end run details into DB
			
			 } else {

					//message needed here to tell the user to re-enter passwords again - the check is working but nae message with ec
					header("location: createAccount.php");

		}//passwords reenter
		
   }//check values are entered into form fields
	
}//submit button isset 

