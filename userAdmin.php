<?php session_start();
	include('includes/errors.php');
	include ('includes/header.php');
?>	

<h5>Manage your account</h5>
<h6>You are currently logged on as:&nbsp; <?php echo $_SESSION["username"];?></h6>
<br>
<form action="displayUserListings.php" method="get">
		
<input class="button" type="submit" name="selectAll" value="See All Your Listings" />

</form>
<br>

<a href="logout.php">Log out</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="addListing.php">Create a new listing</a>

</div>


<?php
	include ('includes/scriptsClosingTags.php');
?>


