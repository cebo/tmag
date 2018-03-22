<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "c7e546ef1c90f2ef8c113890cec1b982e902e8672a"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/wp-content/themes/tale-beta/index.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/wp-content/plugins/wpide/backups/themes/tale-beta/index_2017-05-19-04.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php get_header(); ?>


			<section class="primary">


				<div class="book-contain">


					<div class="copy">


						<img src="<?php bloginfo ('template_url'); ?>/images/leftbook.jpg" alt="talemag" class="talemaga" />

						<h1>Tale Magazine</h1>

						<h2>Storytellers inspiring Storytelling</h2>

						<p>Story is one of the most influential and inspirational forces in our lives. A good story changes the way we see our world and stirs our imaginations to create new ones. Tale exists because we believe the best stories are told and retold in different ways, on different canvases, and by different voices. And each new Tale inspires the next.</p>

						<p>Tale Magazine is a quarterly  printed magazine of fictional shorts, rich in character and place, that inspire and challenge readers across multiple genres. Each story will inspire or be inspired by photography sourced from Instagram and direct submissions, providing not just a unique visual expression for that story, but an artistic direction for our filmmakers to produce a short film. </p>

						<p>Tale’s newest edition is now open for short story and photography submissions to be printed and distributed internationally. So, if you have stories you’ve written or want to write, or if you have photos just waiting to inspire someone, submit your work today.</p>

						<a href="<?php bloginfo('url'); ?>/product/tale-magazine-vol-001/" class="button">Preorder Tale Volume 001</a>


					</div>


				</div>


			</section>


			<section class="submissions" id="subs">

				<div class="parallax-window" data-parallax="scroll" data-image-src="<?php bloginfo ('template_url'); ?>/images/sub-bg.jpg">

					<div class="wid-dd">

						<h1>Tale Submissions</h1>

						<h4>Photography submissions can use <span>#talemag</span> on instagram or email direct</h4>

						<a href="mailto:sarah@themakersunion.co" class="button">Submit by email</a>

					</div>
					

				</div>

				<div class="submission-box">

					<div class="container maincontain">


						<h3 class="taler">#talemag</h3>
						
						
						<?php if ( !function_exists('dynamic_sidebar')
            					|| !dynamic_sidebar('Sidebar') ) : ?>
            			<?php endif; ?> 


					</div>


					<div class="publish narrower">

						<div class="container">

							<p>By publishing, you are acknowledging ownership of all submitted materials. <a class="button" href="#">Submit</a></p>

							<div class="clear"></div>

						</div>

					</div>


					<div class="wider-contain">

						<div class="container">

							<div class="sidebox">

								<h3>What Happens Now? How (Beta) Tale Works</h3>

								<p>If you've submitted writing, it will hit the editor's desk and every beta submission will be read and reviewed and the author will be contacted. If your story is selected to be printed in our next edition, we will pair your story with a curated photographer who will shoot art direct a shoot inspired by your work. Your story and it's inspired photos will live on our website until our final selections for the printed version. All printed authors and photographers will be compensated for their work. If you are submitting photography, all images go directly to our Art Director to be reviewed and paired with writers who can write whatever your work inspires. And we're the lucky ones who get to watch all the magic happen.</p>


							</div>


							<div class="hello">


								<h3>Questions? D.M. or Email</h3>

								<a href="https://www.instagram.com/tale.magazine/"><i class="ion-social-instagram"></i></a>
								<a href="#"><i class="ion-social-twitter"></i></a>
								<a href="#"><i class="ion-social-facebook"></i></a>
								<a href="mailto:sarah@themakersunion.co"><i class="ion-email"></i></a>


							</div>

							<div class="clear"></div>

							<h3 class="faqs">FAQs</h3>


							 <ul id="toggle-view" class="" style="padding-bottom: 40px;">
            				<li>
            					<h3>Why Instagram?<span> </span></h3>
            				
            					<div class="panel">
            						<p>Because we all know Instagram is the jam these days. It is the largest and easiest platform used to share creative work in the form of photos. It's a breeze to connect and just as easy to search for exactly what you wish to find. In connecting Tale with Instagram, we are simply broadening the horizon of creative sharing and making it easier for people to see your work and for you to be inspired by the work of others.</p>
            				    </div>
            				</li>
            				
            				<li>
            					<h3>Do I get paid for my work?<span> </span></h3>
            				
            					<div class="panel">
            						<p>There will be multiple opportunities to be paid. If your work is chosen to be used in print or galleries you will be compensated. Even if your work is not immediately chosen, it will stay in the database, along with the rest of your pieces and has the ability to be selected for use, at a later time. We want every artist to be fairly, compensated for their work that we use.</p>
            					</div>
            				</li>
            				
            				<li>
            					<h3>How many stories can I submit?<span> </span></h3>
            				
            					<div class="panel">
            						<p>An infinite amount! The more, the better. Part of creating Tale, was in hope to increase inspiration and creative flow. We want you to submit any story you wish to tell. </p>
            				    </div>
            				</li>
            				
            				<li>
            					<h3>If this is Tale Beta, what is the final version?<span> </span></h3>
            				
            					<div class="panel">
            						<p>The final version of Tale will offer a vast ability to share your work and browse that of others. While this version is simply a way to submit your work. The final version will have full integration with Instagram, viewable submissions, and social sharing.</p>
            				    </div>
            				</li>
            				
            				<li>
            					<h3>Can I recommend someone to submit?<span> </span></h3>
            				
            					<div class="panel">
            						<p>Yes! We want everyone to submit and share their work. If you have a friend whose work inspires you, share them with us! We love finding new artists and making friends :)</p>
            				    </div>
            				</li>
            				
            			
            				
			            </ul>




						</div>



					</div>


					<div class="publish">

						<div class="container">
										
                            <!-- Begin MailChimp Signup Form -->
                                
                                <form action="//writejuice.us4.list-manage.com/subscribe/post?u=e3a77e4144455d1946c16db48&amp;id=a9bbd99d8f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate signup" target="_blank" novalidate>
                                   
                                	<input type="email" value="" name="EMAIL" class="required email signemail" id="mce-EMAIL"  placeholder="Get our newsletter">
                                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button submitter">
                                	<div id="mce-responses" class="clear">
                                		<div class="response" id="mce-error-response" style="display:none"></div>
                                		<div class="response" id="mce-success-response" style="display:none"></div>
                                	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_e3a77e4144455d1946c16db48_a9bbd99d8f" tabindex="-1" value=""></div>
                                    
                                </form>
                                


							<br>
							<br>

							<p class="talemags">#talemag</p>


							<div id="instafeed"></div>

						</div>


						<p style="text-align: center"><a href="<?php bloginfo('url'); ?>/product/tale-magazine-vol-001/" class="button">Preorder Tale Volume 001</a></p>

					</div>






				</div>

			</section>

			<footer>

				<p>Brought to you by the <a href="http://themakersunion.co">Maker's Union of Austin, Texas</a></p>


			</footer>




		</div>
		
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-99031032-2', 'auto');
  ga('send', 'pageview');

</script>	
<?php get_footer(); ?>