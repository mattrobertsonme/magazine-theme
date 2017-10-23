<div class="author-box">
    <div class="avatar"><img alt="" src="<?php wp_get_current_user();?>" srcset="http://2.gravatar.com/avatar/294180c61f46e63b9f64fe0c1d3f4d39?s=1024&amp;d=mm&amp;r=g 2x" class="avatar avatar-512 photo" height="512" width="512"></div>
    
    <ul class="text">
     <li> <a href="" title="Posts by Matt Robertson" rel="author"><?php _e( '', 'magazine_theme_v1' ); ?> <?php the_author_posts_link(); ?></a></li>
    	<li><p><?php echo nl2br(get_the_author_meta('description')); ?></p>
    </li>
                        <ul class="social">
                            
                            
                            
                       <?php 
                            
                            $user_url = get_the_author_meta( 'user_url' );
		if ( $user_url && $user_url != '' ) {
			echo '<li><a href="' . esc_url($user_url) . '"><i class="fa fa-globe" aria-hidden="true" style="background-color: #2B2D32"></i></a></li>';
		}
                            
		$rss_url = get_the_author_meta( 'rss_url' );
		if ( $rss_url && $rss_url != '' ) {
			echo '<li><a href="' . esc_url($rss_url) . '"><i class="fa fa-rss rss" aria-hidden="true"></i></a></li>';
		}
						
		$google_profile = get_the_author_meta( 'google_profile' );
		if ( $google_profile && $google_profile != '' ) {
			echo '<li><a href="' . esc_url($google_profile) . '" rel="author"><i class="fa fa-google-plus google-plus" aria-hidden="true"></i></a></li>';
		}
						
		$twitter_profile = get_the_author_meta( 'twitter_profile' );
		if ( $twitter_profile && $twitter_profile != '' ) {
			echo '<li><a href="' . esc_url($twitter_profile) . '"><i class="fa fa-twitter twitter" aria-hidden="true"></i></a></li>';
		}
						
		$facebook_profile = get_the_author_meta( 'facebook_profile' );
		if ( $facebook_profile && $facebook_profile != '' ) {
			echo '<li><a href="' . esc_url($facebook_profile) . '"><i class="fa fa-facebook facebook" aria-hidden="true"></i></a></li>';
		}
						
		$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
		if ( $linkedin_profile && $linkedin_profile != '' ) {
		       echo '<li><a href="' . esc_url($linkedin_profile) . '"><i class="fa fa-linkedin linked-in" aria-hidden="true"></i></a></li>';
		}
	?>
                        </ul>
        </ul>
     </div>