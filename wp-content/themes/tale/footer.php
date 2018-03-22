<?php
/**
 * The template for displaying the footer.
 *
**/
?>


<footer>

	<div class="socialites"><a href="https://www.facebook.com/talemagazine/" target="_blank"><i class="ion-social-facebook"></i></a><a href="https://www.instagram.com/tale.magazine/" target="_blank"><i class="ion-social-instagram"></i></a></div>
	<p>Brought to you by The Makers Union</p>

</footer>


<div class="signup-pop">

<i class="ion-ios-close-empty"></i>

	<div class="container narrowed">

		<div class="signupbox">

		<i class="ion-social-instagram"></i>
			<a href="#" class="button instabutt">Sign up via instagram</a>

			<p class="sinab">Signing up via instagram connects your photo and profile</p>


			<div class="emailsignup">

				<form>

					<input type="email" placeholder="Your Email" />
					<input type="password" placeholder="password" />
					<input type="submit" placeholder="Sign In" />

				</form>

				 <?php 
            global $user_login;
            // In case of a login error.
            if ( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) : ?>
    	            <div class="aa_error">
    		            <p><?php _e( 'FAILED: Try again!', 'AA' ); ?></p>
    	            </div>
            <?php 
                endif;
            // If user is already logged in.
            if ( is_user_logged_in() ) : ?>

                <div class="aa_logout"> 
                    
                    <?php 
                        _e( 'Hello', 'AA' ); 
                        echo $user_login; 
                    ?>
                    
                    </br>
                    
                    <?php _e( 'You are already logged in.', 'AA' ); ?>

                </div>

                <a id="wp-submit" href="<?php echo wp_logout_url(); ?>" title="Logout">
                    <?php _e( 'Logout', 'AA' ); ?>
                </a>

            <?php 
                // If user is not logged in.
                else: 
                
                    // Login form arguments.
                    $args = array(
                        'echo'           => true,
                        'redirect'       => home_url( '/dashboard/' ), 
                        'form_id'        => 'loginform',
                        'label_username' => __( 'Username' ),
                        'label_password' => __( 'Password' ),
                        'label_remember' => __( 'Remember Me' ),
                        'label_log_in'   => __( 'Log In' ),
                        'id_username'    => 'user_login',
                        'id_password'    => 'user_pass',
                        'id_remember'    => 'rememberme',
                        'id_submit'      => 'wp-submit',
                        'remember'       => true,
                        'value_username' => NULL,
                        'value_remember' => true
                    ); 
                    
                    // Calling the login form.
                    wp_login_form( $args );
                endif;
        ?> 


			</div>

		</div>

		<div class="contentbox">

			<a href="#" class="button widow">Learn more about how tale works</a>

			<div class="clear"></div>

			<div class="lefty">

				<h3>Submitting Writers</h3>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

			</div>


			<div class="righty">

				<h3>Submitting Photographers</h3>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

			</div>

			<div class="clear"></div>

		</div>

	</div>

	<a href="#" class="closeherout dropanchor"></a>

</div>



  <script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
  <?php if(is_page(10001)) { ?>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/instafeed.min.js"></script>
<script type="text/javascript">
// create two separate instances of Instafeed
var playTagFeed = new Instafeed({
    target: 'instafeed',
	get: 'user',
    resolution: 'standard_resolution',
    userId: 5532366,
    limit: 18,
    template: '<a class="instable" href="{{link}}"><img src="{{image}}" alt="Tale Magazine" /></a>',
    accessToken: '5532366.1677ed0.4db1b92bef264a3896d5de9b1a1523f6'
    // rest of settings

    //4124709774.1677ed0.7397bf7d645d4fafbfd808f20ebd957 
});

// run both feeds
playTagFeed.run();

</script>

<?php } ?>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/view.js"></script>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/jquery.sticky-kit.min.js"></script>
<script type="text/javascript">


-->
</script>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/execute.js"></script>

<?php wp_footer(); ?>
</body>
</html>