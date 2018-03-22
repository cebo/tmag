<?php
/*
Template Name: Template Locations - Specific
*/
if(!empty($_REQUEST['lid'])) {
  $lid = $_REQUEST['lid'];
  $lid = preg_replace("#[^\d]#", "", $lid);
}
if(empty($lid)) $lid = 0;


get_header(); the_post() ?>
<?php
if(!empty($_SESSION['my_location'])){
  $yy = $_SESSION['my_location'];
  $lat = $yy['lat'];
  $lng = $yy['lng'];
}
?>
<script>
<?php if(!empty($lat) && !empty($lng)):?>
my_latitude = <?php echo $lat; ?> +0;
my_longitude = <?php echo $lng; ?> +0;
<?php endif;?>
specific_location = <?php echo $lid;?> +0;
</script>

	<div class="main">
		<div id="location2-map-specific"></div><!-- /#wide-map -->
		<div class="shell">
  <p><a href="<?php echo site_url(); ?>/locations/">&laquo; Back to list</a></p>
			<div class="lists">
<?php format_location_one($lid);?>
<div style="height:1px;clear:both"></div>
			</div><!-- /.lists -->
<?php if(!in_array($lid, array(0,1,2,3,5,6))): ?>                                                                                                                            
<div style="text-align:center;color:#fa482b;margin:20px 0;font-weight:bold;">
Any delivery fee is not a tip paid to your driver. Please reward your driver for excellent service.                                                                          
</div>                                                             
<?php endif; ?> 
		</div><!-- /.shell -->
	</div><!-- /.main -->	
<?php get_footer(); ?>