<?php
session_start();
ob_start();

require('includes/dbconx.php');
require('includes/errors.php');

if(isset($_GET['id'])) {
	
//run a message about wanting to kill this entry
	
$id = $_GET['id'];
	
            if($stmt = $conn->prepare("DELETE FROM admin.sales WHERE sales.salesID = ?")){
                $stmt->bind_param("s", $id);
                $stmt->execute();
                $stmt->close();

                //redirect user to a confirmation page
                header("location: userAdmin.php");

            }else{

                echo "Something went wrong.";

            }
	
}

//ob_end_flush();