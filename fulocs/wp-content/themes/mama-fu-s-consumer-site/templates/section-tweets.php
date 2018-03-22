<?php  
$t_username = get_option('twitter_uname');
$tweets = TwitterHelper::get_tweets( $t_username, 4 );
if (empty($tweets)) {
	return; //no tweets, or error while retrieving
}

$twitter_link = 'https://twitter.com/' . $t_username;
?>
<h4>Tweets from Mama Fu’s</h4>
<?php 


 foreach ($tweets as $tweet): ?>
	<div class="tweet-post">
		<p><a target="_blank" href="<?php echo $twitter_link ?>">@<?php echo $t_username ?></a> <?php echo $tweet->tweet_text ?></p>
		<ul class="tweet-options">
			<li><a href="<?php echo $twitter_link ?>"><?php echo $tweet->time_distance ?></a></li>
			<li><a href="<?php echo $twitter_link ?>">reply</a></li>
			<li><a href="<?php echo $twitter_link ?>">retweet</a></li>
		</ul>
	</div><!-- /.tweet-post -->
<?php endforeach ?>