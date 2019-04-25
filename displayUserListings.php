<?php session_start();

require('includes/dbconx.php');
include('includes/errors.php');
include("includes/header.php");
?>

<h5> Your listings</h5>
        
    <h6>You are currently logged on as:&nbsp; <?php echo $_SESSION["username"];?></h6>
    <br>
    <a href="logout.php">Log out</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="addListing.php">Create a new listing</a><br>

	
<?php 
    
    if(isset($_REQUEST['selectAll'])){
		
		      $username = $_SESSION["username"];

              if($stmt = $conn->prepare("SELECT salesID, title, category, image, quality, description, price  
                                 		FROM admin.sales
										WHERE username = ?")){

                                $stmt->bind_param("s", $username); //Bind $username from input

                                $stmt->bind_result($id, $title, $category, $image, $quality, $description, $price);
                                $stmt->execute(); 
				  
				  				$_SESSION["id"] = $id; //Bind the id to a global session if needed on following pages
                     
                                //Loop through the results and fetch values to create <td> row(s)
                  				echo("<table><tr><th>Title</th><th>Description</th><th class='price'>Price</th><th>Image</th><th>Action</th></tr>");	        
				  
				  				while ($stmt->fetch()){

									echo "<tr>";
									echo "<td>" . $title . "</td>";
									echo "<td>" . $description . "</td>";
									echo "<td class='price'>&pound;" . $price . "</td>";
									echo "<td><img  class='imgListing' src='img/" . $image . "'></td>";
									echo "<td><button><a href='deleteProcess.php?id=" . $id . "'>Delete record</a></button><br><br>";
									echo "<button><a href='updateListingProcessONE.php?id=" . $id . "'>Edit record</a></button>";
									echo "</tr>";
									}
                                echo "</table>";
                  
                  } else { //if ($stmt == "") 
              
                                echo "There are no listings to display";
                                echo "<a href='addListing.php'> Add a listing, " . $_SESSION["username"] . " </a>";

				   }
        
				//Close the table and the statement // 
                $stmt->close();
                $conn->close();
				
				} else {

				   //send to another page to start again
				   echo ("<p>No data returned</p>");
    }//isset
		
include("includes/scriptsClosingTags.php");
?>