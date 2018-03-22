<?php  
if (!isset($new_wp_query)) {
	global $wp_query;
	$new_wp_query = $wp_query;
}

$current_page = (isset($current_page) && is_numeric($current_page)) ? $current_page : max(1, get_query_var('paged'));
$max_pages = (isset($max_pages) && is_numeric($max_pages)) ? $max_pages : $new_wp_query->max_num_pages;

if ( $max_pages > 1 ) : ?>
	<!-- pagination begin -->
	<div class="pagination">
		<?php  
		if ($current_page>1) {
			echo '<div class="alignleft"><a href="' . get_pagenum_link($current_page-1) . '">&laquo; Previous</a></div><!-- /.alignleft -->';
		}

		if ($current_page < $max_pages) {
			echo '<div class="alignright"><a href="' . get_pagenum_link($current_page+1) . '">Next &raquo;</a></div><!-- /.alignleft -->';
		}

		for ($i=4; $i >= 1; $i--) { 
			if ( ($current_page-$i)>0 ) {
				echo '<a href="' . get_pagenum_link($current_page-$i) . '">' . ($current_page-$i) . '</a>';
			}	
		}

		echo '<a class="current-menu-item">' . $current_page . '</a>';

		for ($i=1; $i <= 4; $i++) { 
			if ( ($current_page+$i)<=$max_pages ) {
				echo '<a href="' . get_pagenum_link($current_page+$i) . '">' . ($current_page+$i) . '</a>';
			}	
		}

		?>
	</div>
	<!-- /.pagination -->
<?php endif; ?>