<?php
session_start();
ob_start();

require('includes/dbconx.php');
include('includes/errors.php');
include("includes/header.php");
?>

<h5>Edit your listing</h5>
        
    <h6>You are currently logged on as:&nbsp; <?php echo $_SESSION["username"];?></h6>
    <br>
    <a href="logout.php">Log out</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="addListing.php">Create a new listing</a><br>

    
           <?php
                require('includes/dbconx.php');
                require('includes/errors.php');

                if(isset($_GET['id'])) {

                        $id = $_GET['id']; //get the value of the id of the listing to update
                        $_SESSION["id"] = $id; //create a session from $id


                              if($stmt = $conn->prepare("SELECT salesID, title, category, image, quality, description, price  
                                                        FROM admin.sales
                                                        WHERE sales.salesID = ?")){

                                                $stmt->bind_param("i", $id); //Bind $id from input

                                                $stmt->bind_result($id, $title, $category, $image, $quality, $description, $price);
                                                $stmt->execute(); 
                                                $stmt->fetch(); 
                                                }

                                //Close the connx and the statement // 
                                $stmt->close();
                                $conn->close();

                }
                ?>

        
    <form action="updateListingProcessTWO.php" method="post" enctype="multipart/form-data">
                
        <!--title input-->
    <p class="left-align sub-3">Enter main title (max 50ch)</p>
    <input name="title" required type="text" value="<?php echo $title; ?>"/><br>
    
    <!--category input-->
    <p class="left-align sub-3">Select a category</p>
    <p class="left-align">
      <label>
        <input type="radio" name="category" value="soundVision" class="with-gap" <?php if(isset($category) && $category == 'soundVision') echo "checked"; ?> >
        <span>Sound &amp; vision&nbsp;&nbsp;&nbsp;</span>
      </label>
        
      <label>
        <input type="radio" name="category" value="smartphones" class="with-gap" <?php if(isset($category) && $category == 'smartphones') echo "checked"; ?> >
        <span>Smartphones&nbsp;&nbsp;&nbsp;</span>
      </label>
        
      <label>
        <input type="radio" name="category" value="computing" class="with-gap" <?php if(isset($category) && $category == 'computing') echo "checked"; ?> >
        <span>Computing&nbsp;&nbsp;&nbsp;</span>
      </label>
        
      <label>
        <input type="radio" name="category" value="allTheRest" class="with-gap" <?php if(isset($category) && $category == 'allTheRest') echo "checked"; ?> >
        <span>All the rest</span>
      </label>
    </p>

    <!--fileUpToUpload input - change from file-->
    <p class="left-align sub-3">Upload an image (jpeg or png. Max file size 500KB)</p>
	<input name="uploaded" type="file" value="<?php echo $image; ?>" class="uploadBtn left-align"/> 
    
    <!--quality input-->
    <p class="left-align sub-3">Condition</p>
    
    <p class="left-align">
      <label>
        <input type="radio" name="quality" value="excellent" class="with-gap light-green" <?php if(isset($quality) && $quality == 'excellent') echo "checked"; ?> >
        <span>Excellent&nbsp;&nbsp;&nbsp;</span>
      </label>
        
      <label>
        <input type="radio" name="quality" value="good" class="with-gap light-green" <?php if(isset($quality) && $quality == 'good') echo "checked"; ?> >
        <span>Good&nbsp;&nbsp;&nbsp;</span>
      </label>
        
      <label>
        <input type="radio" name="quality" value="fair" class="with-gap light-green" <?php if(isset($quality) && $quality == 'fair') echo "checked"; ?> >
        <span>Fair&nbsp;&nbsp;&nbsp;</span>
      </label>
    </p>
    
    <!--description input-->
    <p class="left-align sub-3">Description (max 300ch)</p>
    <textarea name="description" required><?php echo $description; ?></textarea><br>
    
    <!--price input-->
    <p class="left-align sub-3">Price asked (£)</p>
    <input name="price" required type="text"  value="<?php echo $price; ?>" placeholder="Price asked (£)"/><br><br>
    
    <!--submitMain input-->
    <input class="button" type="submit" name="submit" value="Update your listing" />   
        
</form>

<?php		
include("includes/scriptsClosingTags.php");
?>