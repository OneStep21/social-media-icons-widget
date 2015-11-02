<?php
class woss_social_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	 
	function __construct() {
		parent::__construct(
			'woss_social_widget',
			__( 'Social Icons', 'woss_social_widget' ),
			array( 'classname' => 'follow-widget widget-space', 'description' => __( 'A widget that displays your social icons', 'woss_social_widget' ) )
		);
	}
	
	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$facebook = th_theme_data('facebook_url');
		$twitter = th_theme_data('twitter_url');
		$googleplus = th_theme_data('google_url');
		$instagram = th_theme_data('instagram_url');
		$bloglovin = th_theme_data('bloglovin_url');
		$youtube = th_theme_data('youtube_url');
		$tumblr = th_theme_data('tumblr_url');
		$pinterest = th_theme_data('pinterest_url');
		$rss = th_theme_data('rss_url');
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
		
			<div class="follow-content text-center">
				<?php if($facebook) : ?><a href="http://facebook.com/<?php echo strip_tags($facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
				<?php if($twitter) : ?><a href="http://twitter.com/<?php echo strip_tags($twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
				<?php if($instagram) : ?><a href="http://instagram.com/<?php echo strip_tags($instagram); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
				<?php if($pinterest) : ?><a href="http://pinterest.com/<?php echo strip_tags($pinterest); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
				<?php if($bloglovin) : ?><a href="http://bloglovin.com/<?php echo strip_tags($bloglovin); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
				<?php if($googleplus) : ?><a href="http://plus.google.com/<?php echo strip_tags($googleplus); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
				<?php if($tumblr) : ?><a href="http://<?php echo strip_tags($tumblr); ?>.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
				<?php if($youtube) : ?><a href="http://youtube.com/<?php echo strip_tags($youtube); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
				<?php if($rss) : ?><a href="<?php echo strip_tags($rss); ?>" target="_blank"><i class="fa fa-rss"></i></a><?php endif; ?>
			</div>
			
			
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Subscribe & Follow', );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>
		
		<p>Note: Set your social links in the Theme Options Page</p>

	<?php
	}
}