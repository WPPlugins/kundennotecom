<?php


class Kundennote_Widget extends WP_Widget {

        /**
          * Sets up the widgets name etc
          *
          */
          public function __construct() {
            $widget_ops = array( 
            'classname' => 'Kundennote_Widget',
            'description' => 'Platzieren Sie Ihr kundennote.com Bewertungssiegel in Ihrer Website.',
            );
            parent::__construct( 'Kundennote_Widget', 'kundennote.com Widget', $widget_ops );
          }

          /**
            * Outputs the content of the widget
            * 
            * @param array $args
            * @param array $instance                    
            */
          public function widget( $args, $instance ) {
				// outputs the content of the widget
				$title = apply_filters( 'widget_title', $instance['title'] );

				// before and after widget arguments are defined by themes
				echo $args['before_widget'];
					
				if ( ! empty( $title ) )
				echo $args['before_title'] . $title . $args['after_title'];
							
					$options = get_option( 'kundennote_settings' );
	
					echo getKnWidget("https://kundennote.com/app/widget/"
					.$options['kundennote_text_field_id']
					.".php");
				
				echo $args['after_widget'];
          }
        
        
        /**
          * Outputs the options form on admin
          *
          * @param array $instance The widget options
          */
          public function form( $instance ) {
            // outputs the options form on admin
			echo '<p>Dieses Widget zeigt das Bewertungssiegel auf Ihrer Website an.<p>';
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			}else {
				$title = __( 'Bewertungen', 'wpb_widget_domain' );
			}
			
			// Widget admin form
			?>
			
			<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<?php
          }
        
        /**
          * Processing widget options on save
          *
          * @param array $new_instance The new options
          * @param array $old_instance The previous options
          */
          public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			return $instance;
          }
}





function register_kundennote_widget() {
        register_widget( 'Kundennote_Widget' );
}

add_action( 'widgets_init', 'register_kundennote_widget' );

?>
