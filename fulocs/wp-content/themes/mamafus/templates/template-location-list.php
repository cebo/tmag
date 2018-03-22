





<?php
/*
Template Name: Template Locations - List
*/

$state = "";
if(!empty($_REQUEST['state'])) {
  $state = $_REQUEST['state'];
  $state = preg_replace("#[^\w]#", "", $state);
}

get_header(); the_post(); 

$states = sort_locations_by_state();

//pre($mamafu_locations[0]);

$toshow = $states;
if($state) { 
if($state == "NorthCarolina")  $state = "North Carolina"; 
$toshow = array($state => $states[$state]);
} 

?>
	<div class="main">
		<div class="big-holder">
			<div id="big-map"></div><!-- /#big-map -->
		</div><!-- /.big-holder -->
		
		<div class="container">
		<div class="shell">
			<div class="states">
				<select class="states-select">
<?php
echo '<option value="">All States</option>';
foreach ($states as $k => $v) {
  echo '<option value="' . $k . '">' . $k . '</option>';
}
?>
				</select>
			</div><!-- /.states -->
<?php if(! $state): ?> 
			<h3 class="entry-title">All Locations</h3><!-- /.entry-title -->
<?php endif; ?>
			<div class="posts-section locations-section">
<?php  list_states($toshow) ;?>

			</div><!-- /.posts-section -->
		</div><!-- /.shell -->
		</div>
	</div><!-- /.main -->	

<?php get_footer(); ?>