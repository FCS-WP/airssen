<?php
	/**
	 * Arkdin Footer full Widget
	 *
	 *
	 * @author 		LaraLink
	 * @category 	Widgets
	 * @package 	Arkdin/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'Arkdin_contact_info_Widget2');
	function Arkdin_contact_info_Widget2() {
		register_widget('Arkdin_contact_info_Widget2');
	}


	class Arkdin_contact_info_Widget2  extends WP_Widget{

		public function __construct(){
			parent::__construct('Arkdin_contact_info_Widget2',esc_html__('Footer Time Info','tscore'),array(
				'description' => esc_html__('Footer Time Info Widget','tscore'),
			));
		}

		public function widget($args, $instance){
			extract($args);
			extract($instance);

			print $before_widget;

			if ( ! empty( $title ) ) {
				print $before_title . apply_filters( 'widget_title', $title ) . $after_title;
			}
		?>
                <ul class="cs_working_hours footer_working_hours">
                  <li>
                  	<?php if( !empty($description) ): ?>
                    <span><?php print wp_kses_post($description); ?></span>
                    <?php endif; ?>
                    <?php if( !empty($facebook) ): ?>
                    <span><?php print esc_html($facebook); ?></span>
                    <?php endif; ?>
                  </li>
                  <li>
                  	<?php if( !empty($twitter) ): ?>
                    <span><?php print esc_html($twitter); ?></span>
                    <?php endif; ?>
                    <?php if( !empty($instagram) ): ?>
                    <span><?php print esc_html($instagram); ?></span>
                    <?php endif; ?>
                  </li>
                  <li>
                  	<?php if( !empty($description2) ): ?>
                    <span><?php print wp_kses_post($description2); ?></span>
                    <?php endif; ?>
                    <?php if( !empty($facebook2) ): ?>
                    <span><?php print esc_html($facebook2); ?></span>
                    <?php endif; ?>
                  </li>
                  <li>
               	<?php if( !empty($twitter2) ): ?>
                    <span><?php print esc_html($twitter2); ?></span>
                    <?php endif; ?>
                    <?php if( !empty($instagram2) ): ?>
                    <span><?php print esc_html($instagram2); ?></span>
                    <?php endif; ?>
                  </li>
                </ul>

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
			$description  = isset($instance['description'])? $instance['description']:'';
			$twitter  = isset($instance['twitter'])? $instance['twitter']:'';
			$facebook  = isset($instance['facebook'])? $instance['facebook']:'';
			$instagram  = isset($instance['instagram'])? $instance['instagram']:'';
			$description2  = isset($instance['description2'])? $instance['description2']:'';
			$twitter2  = isset($instance['twitter2'])? $instance['twitter2']:'';
			$facebook2  = isset($instance['facebook2'])? $instance['facebook2']:'';
			$instagram2  = isset($instance['instagram2'])? $instance['instagram2']:'';

			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','tscore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<label for="title"><?php esc_html_e('Day:','tscore'); ?></label>
			</p>
           <input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('description')); ?>"  name="<?php print esc_attr($this->get_field_name('description')); ?>" value="<?php print esc_attr($description); ?>">

			<p>
				<label for="title"><?php esc_html_e('Time:','tscore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('facebook')); ?>"  name="<?php print esc_attr($this->get_field_name('facebook')); ?>" value="<?php print esc_attr($facebook); ?>">


			<p>
				<label for="title"><?php esc_html_e('Day:','tscore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('twitter')); ?>"  name="<?php print esc_attr($this->get_field_name('twitter')); ?>" value="<?php print esc_attr($twitter); ?>">

			<p>
				<label for="title"><?php esc_html_e('Time:','tscore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('instagram')); ?>"  name="<?php print esc_attr($this->get_field_name('instagram')); ?>" value="<?php print esc_attr($instagram); ?>">

				<label for="title"><?php esc_html_e('Day:','tscore'); ?></label>
			</p>
           <input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('description2')); ?>"  name="<?php print esc_attr($this->get_field_name('description2')); ?>" value="<?php print esc_attr($description2); ?>">

			<p>
				<label for="title"><?php esc_html_e('Time:','tscore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('facebook2')); ?>"  name="<?php print esc_attr($this->get_field_name('facebook2')); ?>" value="<?php print esc_attr($facebook2); ?>">


			<p>
				<label for="title"><?php esc_html_e('Day:','tscore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('twitter2')); ?>"  name="<?php print esc_attr($this->get_field_name('twitter2')); ?>" value="<?php print esc_attr($twitter2); ?>">

			<p>
				<label for="title"><?php esc_html_e('Time:','tscore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('instagram2')); ?>"  name="<?php print esc_attr($this->get_field_name('instagram2')); ?>" value="<?php print esc_attr($instagram2); ?>">

			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
			$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
			$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
			$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';

			$instance['description2'] = ( ! empty( $new_instance['description2'] ) ) ? strip_tags( $new_instance['description2'] ) : '';
			$instance['facebook2'] = ( ! empty( $new_instance['facebook2'] ) ) ? strip_tags( $new_instance['facebook2'] ) : '';
			$instance['twitter2'] = ( ! empty( $new_instance['twitter2'] ) ) ? strip_tags( $new_instance['twitter2'] ) : '';
			$instance['instagram2'] = ( ! empty( $new_instance['instagram2'] ) ) ? strip_tags( $new_instance['instagram2'] ) : '';			

			return $instance;
		}
	}