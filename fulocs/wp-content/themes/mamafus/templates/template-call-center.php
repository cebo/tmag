<?php
/*
Template Name: Template Call Center
*/
get_header(); the_post() ?>
<?php

?>
<script>
var is_call_center = 1;
var call_center_lat=  30.39836906196559;
var call_center_lng= -97.74930027808108;
</script>
	<div class="main call-center">
		<div class="shellx">
                    <input type="text" name="geoaddr" id="geoaddr" size="50" class="geo-addr">
		</div><!-- /.shellx -->
		<div id="call-center-map"></div>
	</div>	
<?php get_footer(); ?>