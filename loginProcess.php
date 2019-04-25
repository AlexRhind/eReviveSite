<?php 
session_start();
ob_start();

include('includes/dbconx.php');
include('includes/errors.php');

    if(isset($_POST['submit'])){
        
       if(!empty($_POST['username']) && !empty($_POST['password'])) {

           $username = $_POST['username'];
           $Userpassword = $_POST['password'];

      if($stmt = $conn->prepare("SELECT username, password from admin.users where username = ?")){

            $stmt->bind_param("s", $username);

            $stmt->bind_result($username, $password);
            $stmt->execute(); 
            $stmt->fetch();
          
                        if(password_verify($Userpassword,$password)){

                            $_SESSION["username"] = $username;
                            header('location:userAdmin.php');
                            } // end  if

                        else{
							
                            header('location:login.php');
							
                        } // end of else password hash check

                } 
                else {
	
            header('location:login.php');
	       }// end of stmt check
           
  }// end of !empty tests
} // end of isset //
ob_end_clean();