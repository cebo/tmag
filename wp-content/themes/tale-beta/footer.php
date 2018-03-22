<?php
/**
 * The template for displaying the footer.
 *
**/
?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/instafeed.min.js"></script>
<script type="text/javascript">
// create two separate instances of Instafeed
var playTagFeed = new Instafeed({
    target: 'instafeed',
	get: 'user',
    resolution: 'standard_resolution',
    userId: 4124709774,
    limit: 18,
    template: '<a class="instable" href="{{link}}"><img src="{{image}}" alt="Tale Magazine" /></a>',
    accessToken: '4124709774.1677ed0.7397bf7d645d4fafbfd808f20ebd9575'
});

// run both feeds
playTagFeed.run();
</script>
<script>window.jQuery || document.write('<script src="../libs/jquery/dist/jquery.min.js"><\/script>')</script>
<script src="<?php bloginfo ('template_url'); ?>/js/jquery.vide.js"></script>
<script>
 // $(document).ready(function () {
 //   $(document.body).vide('video/ocean'); // Non declarative initialization
 //
 //   var instance = $(document.body).data('vide'); // Get the instance
 //   var video = instance.getVideoObject(); // Get the video object
 //   instance.destroy(); // Destroy instance
 // });
</script>
<script src="<?php bloginfo ('template_url'); ?>/js/view.js"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/lightbox.min.js"></script>  
<script src="<?php bloginfo ('template_url'); ?>/js/parallax.js"></script>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/execute.js"></script>

</body>
</html>	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-99031032-2', 'auto');
  ga('send', 'pageview');

</script>

<?php wp_footer(); ?>
