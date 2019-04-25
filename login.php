<?php
	  include ('includes/header.php');
?>	




<h5>Sign into your account</h5>
	
<form action="loginProcess.php" method="post">
<p><input type="text" name="username" required placeholder="Enter username"/></p>
<p><input type="password" name="password" required placeholder="Enter password"/></p>
<input class="button" type="submit" name="submit" value="Log in" />
</form>
	



</div>

<?php
	  include ('includes/scriptsClosingTags.php');
?>
