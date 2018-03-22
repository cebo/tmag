<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "c7e546ef1c90f2ef8c113890cec1b982ea35bd327c"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/wp-content/themes/tale-beta/footer.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/wp-content/plugins/wpide/backups/themes/tale-beta/footer_2017-05-29-14.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
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


<?php wp_footer(); ?>
