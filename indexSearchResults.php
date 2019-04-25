<?php
	  include ('includes/header.php');
?>	

<h5>Here&rsquo;s what we found for you....</h5>

<?php

require('includes/dbconx.php');
require('includes/errors.php');

if(isset($_GET['soundVision'])) {
		
        //test the value of id
        $soundVision = "soundVision";
	
        // Select everything from the DB with the category eg, $smartphones
        if($stmt = $conn->prepare("SELECT title, category, image, quality, description, price  
                                 FROM admin.sales 
                                 WHERE category = ? ")){

                                $stmt->bind_param("s", $soundVision); //Bind $soundVision from input

                                $stmt->bind_result($title, $category, $image, $quality, $description, $price);
                                $stmt->execute(); 
          
                                //Loop through the results and fetch values to create <td> row(s)
                  				echo("<table><tr><th>Title</th><th>Description</th><th class='price'>Price</th><th>Image</th></tr>");	        
				  				while ($stmt->fetch()){

									echo "<tr>";
									echo "<td>" . $title . "</td>";
									echo "<td>" . $description . "</td>";
									echo "<td class='price'>&pound;" . $price . "</td>";
									echo "<td><img class='imgListing' src='img/" . $image . "'></td>";
									echo "</tr>";
									}
                                echo "</table>";
						  }
						//Close the table and the statement // 
						$stmt->close();
                        $conn->close();
}
    
else if (isset($_GET['smartphones'])) {
		
        //test the value of id
        $smartphones = "smartphones";
	
        // Select everything from the DB with the category eg, $smartphones
        if($stmt = $conn->prepare("SELECT title, category, image, quality, description, price  
                                 FROM admin.sales 
                                 WHERE category = ? ")){

                                $stmt->bind_param("s", $smartphones); //Bind smartphones from input

                                $stmt->bind_result($title, $category, $image, $quality, $description, $price);
                                $stmt->execute(); 
          
                                //Loop through the results and fetch values to create <td> row(s)
                  				echo("<table><tr><th>Title</th><th>Description</th><th class='price'>Price</th><th>Image</th></tr>");	        
				  				while ($stmt->fetch()){

									echo "<tr>";
									echo "<td>" . $title . "</td>";
									echo "<td>" . $description . "</td>";
									echo "<td class='price'>&pound;" . $price . "</td>";
									echo "<td> <img class='imgListing'  src='img/" . $image . "'></td>";
									echo "</tr>";
									}
                                echo "</table>";
						  }
						//Close the table and the statement // 
						$stmt->close();
                        $conn->close();
				
}
        
else if (isset($_GET['computing'])) {
		
        //test the value of id
        $computing = "computing";
	
        // Select everything from the DB with the category eg, $smartphones
        if($stmt = $conn->prepare("SELECT title, category, image, quality, description, price  
                                 FROM admin.sales 
                                 WHERE category = ? ")){

                                $stmt->bind_param("s", $computing); //Bind smartphones from input

                                $stmt->bind_result($title, $category, $image, $quality, $description, $price);
                                $stmt->execute(); 
          
                                //Loop through the results and fetch values to create <td> row(s)
                  				echo("<table><tr><th>Title</th><th>Description</th><th class='price'>Price</th><th>Image</th></tr>");	        
				  				while ($stmt->fetch()){

									echo "<tr>";
									echo "<td>" . $title . "</td>";
									echo "<td>" . $description . "</td>";
									echo "<td class='price'>&pound;" . $price . "</td>";
									echo "<td> <img class='imgListing'  src='img/" . $image . "'></td>";
									echo "</tr>";
									}
                                echo "</table>";
						  }
						//Close the table and the statement // 
						$stmt->close();
                        $conn->close();
				
}

else if (isset($_GET['allTheRest'])) {
		
        //test the value of id
        $allTheRest = "allTheRest";
	
        // Select everything from the DB with the category eg, $smartphones
        if($stmt = $conn->prepare("SELECT title, category, image, quality, description, price  
                                 FROM admin.sales 
                                 WHERE category = ? ")){

                                $stmt->bind_param("s", $allTheRest); //Bind allTheRest from input

                                $stmt->bind_result($title, $category, $image, $quality, $description, $price);
                                $stmt->execute(); 
          
                                //Loop through the results and fetch values to create <td> row(s)
                  				echo("<table><tr><th>Title</th><th>Description</th><th class='price'>Price</th><th>Image</th></tr>");	        
				  				while ($stmt->fetch()){

									echo "<tr>";
									echo "<td>" . $title . "</td>";
									echo "<td>" . $description . "</td>";
									echo "<td class='price'>&pound;" . $price . "</td>";
									echo "<td> <img class='imgListing'  src='img/" . $image . "'></td>";
									echo "</tr>";
									}
                                echo "</table>";
						  }
						//Close the table and the statement // 
						$stmt->close();
                        $conn->close();
}
				
else if (isset($_GET['submit'])){
        
     if(!empty($_GET['searchAllDatabase'])) {

     $searchq = "%{$_GET['searchAllDatabase']}%"; // bind the output of $_POST to variable $searchq

          if($stmt = $conn->prepare("SELECT title, category, image, quality, description, price
                                     FROM admin.sales 
                                     WHERE title LIKE ? 
                                     OR description LIKE ? 
                                     OR category LIKE ? ")){ //var is parsing as %$searchq% x3

                                    $stmt->bind_param("sss", $searchq, $searchq, $searchq); //Bind $searchq from input

                                    $stmt->bind_result($title, $category, $image, $quality, $description, $price);
                                    $stmt->execute(); 

                                    //Loop through the results and fetch values to create <td> row(s)
                                    echo("<table><tr><th>Title</th><th>Description</th><th class='price'>Price</th><th>Image</th></tr>");	        
                                    while ($stmt->fetch()){

                                        echo "<tr>";
                                        echo "<td>" . $title . "</td>";
                                        echo "<td>" . $description . "</td>";
                                        echo "<td class='price'>&pound;" . $price . "</td>";
                                        echo "<td> <img class='imgListing'  src='img/" . $image . "'></td>";
									echo "</tr>";
									}
                                echo "</table>";
              
            } else { //if ($stmt == "") 
              
                                echo "There are no listings to display";
                                echo "<a href='index.php'> Search again</a>";
              
                        }
         
                    //Close the table and the statement // 
                    $stmt->close();
                    $conn->close();
				
            }//check query is present
    
}//close submit
    
else {

       //send to another page to start again
       echo ("<p>No data returned</p>");
}

	  include ('includes/scriptsClosingTags.php');
?>