<?php
	/**
	 * ProHealth Footer full Widget
	 *
	 *
	 * @author 		LaraLink
	 * @category 	Widgets
	 * @package 	ProHealth/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'Arkdin_contact_info_Widget');
	function Arkdin_contact_info_Widget() {
		register_widget('Arkdin_contact_info_Widget');
	}


	class Arkdin_contact_info_Widget  extends WP_Widget{

		public function __construct(){
			parent::__construct('Arkdin_contact_info_Widget',esc_html__('Footer Contact Info Two','tscore'),array(
				'description' => esc_html__('Footer Contact Info Widget','tscore'),
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


              <div class="cs_footer_widget">
                <div class="cs_text_widget">
                	<?php if( !empty($image_box_image) ): ?>
                  <img src="<?php print $image_box_image; ?>" alt="<?php echo esc_attr__('Logo','tscore') ?>">
                  <?php endif; ?>
                  <?php if( !empty($description) ): ?>
                  <p><?php print $description; ?></p>
                  <?php endif; ?>
                </div>
                <div class="cs_social_btns cs_style_1">
                 <?php if( !empty($linkedin) ): ?>
                  <a target="_blank" href="<?php print esc_url($linkedin); ?>" class="cs_social_btn cs_center">
                    <i class="fa-brands fa-linkedin-in"></i>
                  </a>
                  <?php endif; ?>
                  <?php if( !empty($twitter) ): ?>
                  <a target="_blank" href="<?php print esc_url($twitter); ?>" class="cs_social_btn cs_center">
                    <i class="fa-brands fa-twitter"></i>
                  </a>
                  <?php endif; ?>
                  <?php if( !empty($instagram) ): ?>
                  <a target="_blank" href="<?php print esc_url($instagram); ?>" class="cs_social_btn cs_center">
                    <i class="fa-brands fa-youtube"></i>
                  </a>
                  <?php endif; ?>
                  <?php if( !empty($facebook) ): ?>
                  <a target="_blank" href="<?php print esc_url($facebook); ?>" class="cs_social_btn cs_center">
                    <i class="fa-brands fa-facebook-f"></i>
                  </a>
                  <?php endif; ?>
                </div>
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
			$description  = isset($instance['description'])? $instance['description']:'';
			$author_img  = isset($instance['image_box_image'])? $instance['image_box_image']:'';

			$linkedin  = isset($instance['linkedin'])? $instance['linkedin']:'';
			$twitter  = isset($instance['twitter'])? $instance['twitter']:'';
			$facebook  = isset($instance['facebook'])? $instance['facebook']:'';
			$instagram  = isset($instance['instagram'])? $instance['instagram']:'';


			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','tscore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<input type="button" class="button button-secondary js_custom_upload_media" id="<?= $this->id ?>" value="Upload Media"></input>
				<input type="hidden" class="img <?= $this->id ?>_url" name="<?php print esc_attr($this->get_field_name('image_box_image')); ?>" class="image_er_link" value="<?php print $author_img ; ?>">
				<div class="author-image-show">
					<img class="<?= $this->id ?>_img" src="<?php print $author_img ; ?>" alt="" width="150" height="auto">
				</div>
                <script>
                    jQuery(document).ready(function ($) {
                        function media_upload(button_selector) {
                            var _custom_media = true,
                                _orig_send_attachment = wp.media.editor.send.attachment;
                            $('body').on('click', button_selector, function () {
                                var button_id = $(this).attr('id');
                                wp.media.editor.send.attachment = function (props, attachment) {
                                    if (_custom_media) {
                                        $('.' + button_id + '_img').attr('src', attachment.url);
                                        $('.' + button_id + '_url').val(attachment.url);
                                    } else {
                                        return _orig_send_attachment.apply($('#' + button_id), [props, attachment]);
                                    }
                                }
                                wp.media.editor.open($('#' + button_id));

                                $($(this).parents()[4]).addClass('widget-dirty');
                                $('#widget-<?= $this->id ?>-savewidget').removeAttr('disabled');
                                return false;
                            });
                        }
                        media_upload('.js_custom_upload_media');
                    });
                </script>
			</p>

			<p>
				<label for="title"><?php esc_html_e('Short Description:','tscore'); ?></label>
			</p>

			<textarea class="widefat" rows="7" cols="15" id="<?php print esc_attr($this->get_field_id('description')); ?>" value="<?php print esc_attr($description); ?>" name="<?php print esc_attr($this->get_field_name('description')); ?>"><?php print esc_attr($description); ?></textarea>

			<p>
				<label for="title"><?php esc_html_e('Linkedin:','tscore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('linkedin')); ?>"  name="<?php print esc_attr($this->get_field_name('linkedin')); ?>" value="<?php print esc_attr($linkedin); ?>">

			<p>
				<label for="title"><?php esc_html_e('Facebook:','tscore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('facebook')); ?>"  name="<?php print esc_attr($this->get_field_name('facebook')); ?>" value="<?php print esc_attr($facebook); ?>">

			<p>
				<label for="title"><?php esc_html_e('Twitter:','tscore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('twitter')); ?>"  name="<?php print esc_attr($this->get_field_name('twitter')); ?>" value="<?php print esc_attr($twitter); ?>">

			<p>
				<label for="title"><?php esc_html_e('Youtube:','tscore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('instagram')); ?>"  name="<?php print esc_attr($this->get_field_name('instagram')); ?>" value="<?php print esc_attr($instagram); ?>">

			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';

			$instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
			$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
			$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
			$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';

			$instance['image_box_image'] = ( ! empty( $new_instance['image_box_image'] ) ) ? strip_tags( $new_instance['image_box_image'] ) : '';

			return $instance;
		}
	}