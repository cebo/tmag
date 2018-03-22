<?php  
$posts = get_posts( array(
		'posts_per_page'	=> 3
	) );
if (empty($posts)) {
	return;
}


?>
<div class="posts-section">
	<h4>Latest News</h4>
	<?php foreach ($posts as $entry): 
		$link = get_permalink( $entry->ID );
		$date = '<span>'. get_the_time( 'F d, Y', $entry ) .'</span> - ';
		$content = $date . crb_shortalize( $entry->post_content, 46, '' ) . ' <a href="'.$link.'">more &raquo;</a>';
	?>
		<div class="post">
			<h5><a href="<?php echo $link; ?>"><?php echo $entry->post_title ?></a></h5>
			<?php echo wpautop( $content ) ?>
		</div><!-- /.post -->
	<?php endforeach ?>
</div><!-- /.posts-section -->