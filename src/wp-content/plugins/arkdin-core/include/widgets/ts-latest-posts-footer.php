<?php 
Class Latest_posts_footer_Widget extends WP_Widget{

	public function __construct(){
		parent::__construct('arkdin-latest-posts-footer', 'Arkdin Footer Posts', array(
			'description'	=> 'Latest Post Widget by Arkdin'
		));
	}

	public function widget($args, $instance){
			extract($args);
			extract($instance);

	 	echo $before_widget; 
	 		if($instance['title']):
     		echo $before_title; ?> 
     			<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
     		<?php echo $after_title; ?>
     	<?php endif; ?>


			<ul class="cs_recent_post_widget footer_post_widget1">
			    <?php 
				$q = new WP_Query( array(
				    'post_type'     => 'post',
				    'posts_per_page'=> ($instance['count']) ? $instance['count'] : '3',
				    'order'			=> ($instance['posts_order']) ? $instance['posts_order'] : 'DESC',
				    'orderby' => 'comment_count'
				));

							if( $q->have_posts() ):
							while( $q->have_posts() ):$q->the_post();
							?>
                  <li>
                    <div class="cs_recent_post">
					          <?php if ( has_post_thumbnail() ) : ?>
                      <a href="<?php the_permalink(); ?>" class="cs_recent_post_thumb">
                        <?php the_post_thumbnail('thumbnail'); ?>
                      </a>
                      <?php endif; ?>
                      <div class="cs_recent_post_right">
                        <p class="cs_recent_posted_by cs_fs_14">
                          <i class="fa-solid fa-calendar-alt"></i>                         
                          <?php the_time('F d, Y'); ?>
                        </p>
                        <h3 class="cs_white_color cs_fs_18 cs_medium mb-0">
                          <a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 7, ''); ?></a>
                        </h3>
                      </div>
                    </div>
                  </li>
								<?php endwhile;            
							 endif; ?> 
                </ul>

		        <?php echo $after_widget; ?>

		<?php
	}



	public function form($instance){
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( '3', 'tocores' );
		$posts_order = ! empty( $instance['posts_order'] ) ? $instance['posts_order'] : esc_html__( 'DESC', 'tocores' );
		$choose_style = ! empty( $instance['choose_style'] ) ? $instance['choose_style'] : esc_html__( 'style_1', 'tocores' );
	?>	
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>">How many posts you want to show ?</label>
			<input type="number" name="<?php echo $this->get_field_name('count'); ?>" id="<?php echo $this->get_field_id('count'); ?>" value="<?php echo esc_attr( $count ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('posts_order'); ?>">Posts Order</label>
			<select name="<?php echo $this->get_field_name('posts_order'); ?>" id="<?php echo $this->get_field_id('posts_order'); ?>" class="widefat">
				<option value="" disabled="disabled">Select Post Order</option>
				<option value="ASC" <?php if($posts_order === 'ASC'){ echo 'selected="selected"'; } ?>>ASC</option>
				<option value="DESC" <?php if($posts_order === 'DESC'){ echo 'selected="selected"'; } ?>>DESC</option>
			</select>
		</p>

	<?php }


}




add_action('widgets_init', function(){
	register_widget('Latest_posts_footer_Widget');
});