<?php 
    include("includes/header.php");
?>

<h5>Create your account</h5>
	
<form action="createAccountProcess.php" method="post">

		<input class="#" type="text" id="username" name="username" placeholder="User name" required/><br>

		<input class="#" type="text" id="nickname" name="nickname" placeholder="Nickname (Displayed on site)" required/><br>

		<input type="password" class="#" id="password" name="password" required placeholder="Enter password"/><br>

		<input type="password" class="#" id="repeatPassword" name="repeatPassword" required placeholder="Re-enter password"/><br><br>

	    <label for="retailer">
        <input type="checkbox" class="filled-in light-green-text" name="retailer" id="retailer" value="yes" ><span>I am a retailer (fee payable)</span></label> <br>

    <!--pattern="[A-Za-z0-9]{8}"-->
	<br>
	<input class="button" type="submit" name="submit" value="Register with us" />
	
</form>
	
	<br>
    <a href="login.php">Already registered? Go to login</a>

</div> <!--end wrapper header-->

<?php 
    include("includes/scriptsClosingTags.php");
?>
