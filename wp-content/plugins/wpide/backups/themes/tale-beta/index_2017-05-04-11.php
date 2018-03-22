<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "086e40c079f2aef21438e1ed7121a6693e2a653b80"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/wp-content/themes/tale-beta/index.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/wp-content/plugins/wpide/backups/themes/tale-beta/index_2017-05-04-11.php") )  ) ){
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

						<a href="#" class="button">Submit by email</a>

					</div>
					

				</div>

				<div class="submission-box">

					<div class="container maincontain">


						<h3 class="taler">#talemag</h3>
						
						
						<?php if ( !function_exists('dynamic_sidebar')
            					|| !dynamic_sidebar('Sidebar') ) : ?>
            			<?php endif; ?> 


						<form>

							<select> 
								<option value="unknown">Select Your Genre</option>
								<option value="litfiction">Literary Fiction</option>
								<option value="scifiction">Science Fiction</option>
							</select>

							<div class="trese">

								<input type="text" placeholder="Your Name" />
								<input type="email" placeholder="Your Email" />
								<input type="text" placeholder="Instagram Username" />

							</div>


							<input class="bigtitle" type="text" placeholder="Type Your Title Here" />

							<textarea placeholder="Paste your work in, or start typing here.... in the meantime, here is a little inspiration ““In a very real way, one writes a story to find out what happens in it. Before it is written it sits in the mind like a piece of overheard gossip or a bit of intriguing tattle. The story process is like taking up such a piece of gossip, hunting down the people actually involved, questioning them, finding out what really occurred, and visiting pertinent locations. As with gossip, you can't be too surprised if important things turn up that were left out of the first-heard version entirely; or if points initially made much of turn out to have been distorted, or simply not to have happened at all.” ― Samuel R. Delany, The Jewel-Hinged Jaw: Notes on the Language of Science Fiction"></textarea>

							<input type="submit" name="" style="display: none;">

						</form>

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
            						<p>Perfect! Just enter that number when signing up for an account on our app or online and you will get all the rewards from that order automatically added to your account. After that, simply log in when ordering online or identify yourself at our locations and all your rewards will be automatically added.</p>
            				    </div>
            				</li>
            				
            				<li>
            					<h3>Do I get paid for my work?<span> </span></h3>
            				
            					<div class="panel">
            						<p>Not necessarily! Please sign up for a loyalty account above, and then you will be able to start earning points and other rewards when you order online or visit a Mama Fu's location. As a member, you'll get emails if you like, but the two lists can be separate.</p>
            				    </div>
            				</li>
            				
            				<li>
            					<h3>How many stories can I submit?<span> </span></h3>
            				
            					<div class="panel">
            						<p>Your free appetizer will be added to your account as soon as you sign up.</p>
            				    </div>
            				</li>
            				
            				<li>
            					<h3>If this is Tale Beta, what is the final version?<span> </span></h3>
            				
            					<div class="panel">
            						<p>Make sure to update your app in the App store. The old app will no longer work.</p>

                                    <p>You will receive an email on 5/1/17. You can click on the link in that email to activate your account on the new FUnatic Rewards program. In doing so your existing rewards will transfer over to your new account.</p>

<p>If you do not receive the email, or have any issues seeing your old rewards transfer over to your new account, <a href="mailto:funatic@mamafus.com">contact us here.</a></p>
            				    </div>
            				</li>
            				
            				<li>
            					<h3>Can I recommend someone to submit?<span> </span></h3>
            				
            					<div class="panel">
            						<p>Your reward points are updated within 24 hours of your purchase and you will be sent a confirmation email. To view your rewards or point balance, login to your account above. Your rewards will also be visible through our app.</p>
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