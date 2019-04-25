<?php
	  include ('includes/header.php');
?>	

<h5>Recycled top brand smartphones, laptops, music, games consoles (and lots more)</h5>
        
<form action="indexSearchResults.php" method="get">
    <input name="computing" class="indexButtons" style="background-image:url('img/IndexComputing.png');" type="submit" value="">
    <input name="soundVision" class="indexButtons"  style="background-image:url('img/IndexSoundVision.png');" type="submit" value="">  
    <input name="smartphones" class="indexButtons"  style="background-image:url('img/IndexSmartphone.png');" type="submit" value="">  
    <input name="allTheRest" class="indexButtons"  style="background-image:url('img/IndexAllTheRest.png');" type="submit" value="">  
    <br><br>
    <input type="text" name="searchAllDatabase" placeholder="Search for a great deal"/>
    <button class="light-green btn-large waves-effect waves-light-green" type="submit" name="submit"><i class="large material-icons white-text">search</i></button>
</form>

</div>

<?php
	  include ('includes/scriptsClosingTags.php');
?>


  <!--<i class="material-icons">chevron right</i>-->