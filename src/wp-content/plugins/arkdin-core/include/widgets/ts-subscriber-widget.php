<?php
	/**
	 * ProHealth Widget
	 *
	 *
	 * @author 		Laralink
	 * @category 	Widgets
	 * @package 	ProHealth/Widgets
	 * @version 	1.0.1
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'Solutek_subscriber_widget');
	function Solutek_subscriber_widget() {
		register_widget('Solutek_subscriber_widget');
	}
	
	class Solutek_subscriber_widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('Solutek_subscriber_widget',esc_html__('Footer Subscriber','tscore'),array(
				'description' => esc_html__('Subscriber Widget','tscore'),
			));
		}
		
		public function widget($args,$instance){
			extract($args);
			extract($instance);
		 	print $before_widget; 
           if ( ! empty( $title ) ) {
				print $before_title . apply_filters( 'widget_title', $title ) . $after_title;
			}
		?>

        <div class="cs_footer_newsletter">
        	 <?php if( !empty($mailchimp_text) ): ?>
          <p class="cs_mb_20"><?php print wp_kses_post($mailchimp_text); ?></p>
           <?php endif; ?>
           <?php if( !empty($mailchimp_shortcode) ): ?>
            	<?php print do_shortcode($mailchimp_shortcode); ?>	
          <?php endif; ?>
        </div>


	    	<?php print $after_widget; ?>  

		<?php
		}
		

		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $instance
		 * @return void
		 */
		public function form($instance){
			$title  = isset($instance['title'])? $instance['title']:'';
			$mailchimp_shortcode  = isset($instance['mailchimp_shortcode'])? $instance['mailchimp_shortcode']:'';

			$mailchimp_text  = isset($instance['mailchimp_text'])? $instance['mailchimp_text']:'';

			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','tscore'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  class="widefat" name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<label for="title"><?php esc_html_e('Text','tscore'); ?></label>
			</p>
			<textarea class="widefat" rows="5" cols="15" id="<?php print esc_attr($this->get_field_id('mailchimp_text')); ?>" value="<?php print esc_attr($mailchimp_text); ?>" name="<?php print esc_attr($this->get_field_name('mailchimp_text')); ?>"><?php print esc_attr($mailchimp_text); ?></textarea>

			<p>
				<label for="title"><?php esc_html_e('Shortcode:','tscore'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('mailchimp_shortcode')); ?>" class="widefat" name="<?php print esc_attr($this->get_field_name('mailchimp_shortcode')); ?>" value="<?php print esc_attr($mailchimp_shortcode); ?>">

		
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['subscribe_style'] = ( ! empty( $new_instance['subscribe_style'] ) ) ? strip_tags( $new_instance['subscribe_style'] ) : '';
			$instance['mailchimp_shortcode'] = ( ! empty( $new_instance['mailchimp_shortcode'] ) ) ? strip_tags( $new_instance['mailchimp_shortcode'] ) : '';
			$instance['mailchimp_text'] = ( ! empty( $new_instance['mailchimp_text'] ) ) ? strip_tags( $new_instance['mailchimp_text'] ) : '';

			return $instance;
		}
	}