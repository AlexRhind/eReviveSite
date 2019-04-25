<?php session_start();

	  include ('includes/header.php');
?>

	<h5>Something to sell?</h5>
        
    <h6>You are currently logged on as:&nbsp; <?php echo $_SESSION["username"];?></h6>
        
<form action="addListingProcess.php" method="post" enctype="multipart/form-data">
    
    <!--title input-->
    <p class="left-align sub-3">Enter main title</p>
    <input name="title" required type="text" placeholder="Max 50ch"/><br>
    
    <!--category input-->
    <p class="left-align sub-3">Select a category</p>
    <p class="left-align">
      <label>
        <input type="radio" name="category" value="soundVision" class="with-gap">
        <span>Sound &amp; vision&nbsp;&nbsp;&nbsp;</span>
      </label>
        
      <label>
        <input type="radio" name="category" value="smartphones" class="with-gap">
        <span>Smartphones&nbsp;&nbsp;&nbsp;</span>
      </label>
        
      <label>
        <input type="radio" name="category" value="computing" class="with-gap">
        <span>Computing&nbsp;&nbsp;&nbsp;</span>
      </label>
        
      <label>
        <input type="radio" name="category" value="allTheRest" class="with-gap">
        <span>All the rest</span>
      </label>
    </p>

    <!--fileUpToUpload input - change from file-->
    <p class="left-align sub-3">Upload an image (jpeg or png. Max file size 500KB)</p>
	<input name="uploaded" type="file" class="uploadBtn left-align"/>
    
    <!--quality input-->
    <p class="left-align sub-3">Condition</p>
    
    <p class="left-align">
      <label>
        <input type="radio" name="quality" value="excellent" class="with-gap light-green">
        <span>Excellent&nbsp;&nbsp;&nbsp;</span>
      </label>
        
      <label>
        <input type="radio" name="quality" value="good" class="with-gap light-green">
        <span>Good&nbsp;&nbsp;&nbsp;</span>
      </label>
        
      <label>
        <input type="radio" name="quality" value="fair" class="with-gap light-green">
        <span>Fair&nbsp;&nbsp;&nbsp;</span>
      </label>
    </p>
            
    
    <!--description input-->
    <p class="left-align sub-3">Description</p>
    <textarea name="description" value="Max 300ch" required placeholder="Max 300ch"></textarea><br>
    
    <!--price input-->
    <p class="left-align sub-3">Price asked</p>
    <input name="price" required type="text" placeholder="Price asked (£)"/><br><br>
    
    <!--submitMain input-->
    <input class="button" type="submit" name="submit" value="Sell your stuff" />
    
</form>

<?php
	  include ('includes/scriptsClosingTags.php');
?>
