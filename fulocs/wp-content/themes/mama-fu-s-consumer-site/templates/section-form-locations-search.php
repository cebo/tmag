<?php
$zip_placeholder = "Zip Code";
$czip="";
if(!empty($_REQUEST['zipcode'])) {
  $zip_placeholder = $_REQUEST['zipcode'];
  $zip_placeholder = preg_replace("#\<|\>#", "", $zip_placeholder);
  $czip = $zip_placeholder;
}
?>
<div class="location-search">
	<form id="searchbyzip" action="<?php echo site_url();?>/zipsearch" method='post'>
		<label for="search"></label>
		<input type="text" class="field" value='<?php echo $czip;?>' id="zipcode" name="zipcode" placeholder="<?php echo $zip_placeholder;?>" />
		<input type="submit" value='submit' class="submit-button" />
	</form>
	<div class="search-info">
		<h6>Nearest Location</h6>
		<p>Searching <span class="dots">...</span></p>
	</div><!-- /.search-info -->
</div><!-- /.location-search -->
