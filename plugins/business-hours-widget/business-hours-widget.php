<?php
/**
 * Business Hours Widget
 *
 * The RED Widget Boilerplate is an organized, maintainable boilerplate for building widgets using WordPress best practices.
 *
 * Lightly forked from the WordPress Widget Boilerplate by @tommcfarlin.
 *
 * @package   Vatjss_Biz_Hours
 * @author   	Ayesha Kanani 		<https://github.com/isha21>
 *						Bobby Soetarto	  <https://github.com/bsoetarto7>
 * 						Camden Shaw 			<https://github.com/CamdenShaw>
 * 						Chinatsu Kusuhara <https://github.com/ChinatsuKusuhara>  
 *
 * @license   GPL-2.0+
 * @link      https://github.com/redacademy/vatjss-summer-2017
 * @copyright 2017 RED
 *
 * @wordpress-plugin
 * Plugin Name:       Business Hours Widget
 * Plugin URI:        https://github.com/redacademy/vatjss-summer-2017
 * Description:       The Red Widget Boilerplate
 * Version:           1.0.0
 * Author:            Ayeshsa Kanani, Bobby Soetarto, Camden Shaw, Chinatsu Kusuhara
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

// TODO: change 'Widget_Name' to the name of your plugin
class Vatjss_Biz_Hours extends WP_Widget {

    /**
     * @TODO - Rename "widget-name" to the name your your widget
     *
     * Unique identifier for your widget.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $widget_slug = 'vatjss-biz-hours';

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * Specifies the classname and description, and instantiates the widget.
	 */
	public function __construct() {

		parent::__construct(
			$this->get_widget_slug(),
			'VATJSS Hours & Location',
			array(
				'classname'  => $this->get_widget_slug().'-class',
				'description' => 'Add business hours.'
			)
		);

	} // end constructor

    /**
     * Return the widget slug.
     *
     * @since    1.0.0
     *
     * @return    Plugin slug variable.
     */
    public function get_widget_slug() {
        return $this->widget_slug;
    }

	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/

	/**
	 * Outputs the content of the widget.
	 *
	 * @param array $args     The array of form elements
	 * @param array $instance The current instance of the widget
	 */
	public function widget( $args, $instance ) {

		if ( ! isset ( $args['widget_id'] ) ) {
         $args['widget_id'] = $this->id;
      }

		// go on with your widget logic, put everything into a string and …

		extract( $args, EXTR_SKIP );

		$widget_string = $before_widget;

		// Manipulate the widget's values based on their input fields
		$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		$monday = empty( $instance['monday'] ) ? '' : apply_filters( 'widget_title', $instance['monday'] );			
		$tuesday_friday = empty( $instance['tuesday_friday'] ) ? '' : apply_filters( 'widget_title', $instance['tuesday_friday'] );
		$wednesday = empty( $instance['wednesday'] ) ? '' : apply_filters( 'widget_title', $instance['wednesday'] );	
		$saturday_sunday = empty( $instance['saturday_sunday'] ) ? '' : apply_filters( 'widget_title', $instance['saturday_sunday'] );
		$address = empty( $instance['address'] ) ? '' : apply_filters( 'widget_title', $instance['address'] );
		

		ob_start();

		if ( $title ){
			$widget_string .= $before_title;
			$widget_string .= $title;
			$widget_string .= $after_title;
		}

		include( plugin_dir_path( __FILE__ ) . 'views/widget.php' );
		$widget_string .= ob_get_clean();
		$widget_string .= $after_widget;

		print $widget_string;

	} // end widget

	/**
	 * Processes the widget's options to be saved.
	 *
	 * @param array $new_instance The new instance of values to be generated via the update.
	 * @param array $old_instance The previous instance of values before the update.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['monday'] = strip_tags( $new_instance['monday'] );
		$instance['tuesday_friday'] = strip_tags( $new_instance['tuesday_friday'] );
		$instance['wednesday'] = strip_tags( $new_instance['wednesday'] );
		$instance['saturday_sunday'] = strip_tags( $new_instance['saturday_sunday'] );
		$instance['address'] = strip_tags( $new_instance['address'] );
		
		
		return $instance;

	} // end widget

	/**
	 * Generates the administration form for the widget.
	 *
	 * @param array $instance The array of keys and values for the widget.
	 */
	public function form( $instance ) {

		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' 						=> 'Business Hours',
				'monday' 						=> '',
				'tuesday_friday'		=> '',
				'wednesday'					=> '',
				'saturday_sunday'		=> '',
				'address'						=> '',
			)
		);

		$title = strip_tags( $instance['title'] );
		$monday = strip_tags( $instance['monday'] );
		$tuesday_friday = strip_tags( $instance['tuesday_friday'] );
		$wednesday = strip_tags( $instance['wednesday'] );
		$saturday_sunday = strip_tags( $instance['saturday_sunday'] );
		$address = strip_tags( $instance['address'] );
		
		
		// Display the admin form
		include( plugin_dir_path( __FILE__ ) . 'views/admin.php' );

	} // end form

} // end class

// TODO: Remember to change 'Widget_Name' to match the class name definition
add_action( 'widgets_init', function(){
     register_widget( 'Vatjss_Biz_Hours' );
});
