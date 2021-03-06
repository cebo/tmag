<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "086e40c079f2aef21438e1ed7121a6693e2a653b80"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/wp-content/themes/tale-beta/index.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/wp-content/plugins/wpide/backups/themes/tale-beta/index_2017-05-04-12.php") )  ) ){
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

						<p>Story is one of the most influential and inspirational forces in our lives. A good story has the power to change the way we see our world and stirs our imaginations to create new ones. Tale exists because we believe the best stories are told and retold in different ways, on different canvases, and by different voices.</p>

						<p>Tale Magazine is a quarterly independent magazine of fictional shorts, rich in character and place, that inspire and challenge readers across multiple genres. The stories we curate will be those aimed at the part of the human experience that feels collective. These stories can be inspired by searchable images or photographers can read and shoot their own inspired imagery, providing not just a unique visual expression for that story, but an artistic direction for our filmmakers to produce a short film.</p>

						<p>Tale’s newest edition is now open for Short Story and photography submissions to be printed and distributed internationally. So, if you have stories you’ve written or want to write. Or if you have shots worth seeing or looking for shooting inspiration. Our curators at Tale, will read it, share it, print it, produce it into a film."</p>

						<a href="#" class="button">Preorder Tale Volume 001</a>


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

								<p>way, one writes a story to find out what happens in it. Before it is written it sits in the mind like a piece of overheard gossip or a bit of intriguing tattle. The story process is like taking up such a piece of gossip, hunting down the people actually involved, questioning them</p>


							</div>


							<div class="hello">


								<h3>Questions? D.M. or Email</h3>

								<a href="#"><i class="ion-social-instagram"></i></a>
								<a href="#"><i class="ion-social-twitter"></i></a>
								<a href="#"><i class="ion-social-facebook"></i></a>
								<a href="#"><i class="ion-email"></i></a>


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
										

							<form class="signup">

								<input type="email" class="signemail" placeholder="Get our newsletter" />

								<input type="submit" class="button submitter" placeholder="Submit">

							<div class="clear"></div>

							</form>



							<br>
							<br>

							<p class="talemags">#talemag</p>


							<div id="instafeed"></div>

						</div>


						<p style="text-align: center"><a href="#" class="button">Preorder Tale Volume 001</a></p>

					</div>






				</div>

			</section>

			<footer>

				<p>Brought to you by the <a href="#">Maker's Union of Austin, Texas</a></p>


			</footer>




		</div>
		
		
<?php get_footer(); ?>