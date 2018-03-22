<?php
/*
Template Name: Template Menu New
*/

get_header(); the_post() ?>

<style>
.item{
	width:30%;
	float: left;
    margin: 5% 0 0 5%;
    padding: 10px;
    box-sizing: border-box;
}
.item:first-child{
margin: 5% 0 0;
}
.cols3 .item:nth-child(3n+1), .cols3 .socialStreamGroup:nth-child(3n+1) {
    clear: both;
    margin-left: 0;
}
.item img{
	max-width: 100%;
}
.main .contentTitle {
    color: #666;
    font-size: 18px;
    padding-bottom: 0;
    border: 0px;
    font-family: proximanovabold,Arial,Verdana,sans-serif;
    font-style: normal;
    font-weight: 700;
    /* font-weight: bold; */
    line-height: 1.5;
    margin: 0px;
}
.blockContent {
	padding-left: 4%;
    padding-right: 4%;
}
.itemContent{
	    font-size: 15px;
    line-height: 20px;
}
.main .itemContent ul{
    margin: 10px 0 0px 20px;
    list-style: initial;
}
.main .itemContent li{
    background: none;
    padding: 0 0 7px;
}
.itemImg {
    text-align: center;
    padding-bottom: 1em;
}
.page .white-section.last-section span.grey-line{
	display: none !important
}
.page-id-4{
	min-width: 0px;
}
.section{
	max-width: 1104px;
	margin: 0 auto;
}
@media (max-width: 600px){
	.item{
		width: 100% !important;
		margin: 0 0 5% 0 !important;
		float: none;
	}
	.tabs-nav ul{
		width: 100% !important
	}
}
</style>


	<div class="main">
		
		<?php  
		// loads front slider, available only for pages
		get_template_part( 'templates/section-front-slider' );
		?>

		<div class="section white-section">
			<div class="">
				<?php the_content(); ?>
			</div>
		</div>

		<?php 
		// loads content modules
		//get_template_part( 'templates/section-content-modules' )
		?>
		
	</div><!-- /.main -->
<?php get_footer(); ?>