<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2025 Elicus Technologies Private Limited
 * @version   1.0.1
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Control_Media;
use Elementor\Icons_Manager;
use Elementor\Plugin;

if ( ! class_exists( 'WPMOZO_AE_Image_Stack' ) ) {
	class WPMOZO_AE_Image_Stack extends Widget_Base {




		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_image_stack';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Image Stack', 'wpmozo-addons-for-elementor' );
		}

		/**
		 * Get widget keyword list.
		 *
		 * Retrieve widget keywords.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return array Widget keywords.
		 */
		public function get_keywords() {
			return array( 'wpmz image stack', 'wpmozo image stack' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-image-stack wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return array Widget categories.
		 */
		public function get_categories() {
			return array( 'wpmozo' );
		}

		/**
		 * Define Dependencies.
		 *
		 * Define the CSS files required to run the widget.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-image-stack-style', plugins_url( 'assets/css/style.min.css?test=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-image-stack-style' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {

			wp_register_script( 'wpmozo-ae-image-stack-script', plugins_url( 'assets/js/script.min.js?test=' . wp_rand(), __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_FOR_ELEMENTOR_VERSION, false );

			return array( 'wpmozo-ae-image-stack-script', 'wpmozo-ae-popper', 'wpmozo-ae-tippy', 'tippy' );
		}

				/**
				 * Register widget controls.
				 *
				 * Adds different input fields to allow the user to change and customize the widget settings.
				 *
				 * @since 1.0.0
				 * @access protected
				 */
		protected function register_controls() {

			// Separate file containing all the code for registering controls.
			require_once plugin_dir_path( __DIR__ ) . 'image-stack/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function render() {
			$settings                 = $this->get_settings_for_display();
			$widget_id                = $this->get_id();
			$marker_list              = $settings['marker_list'];
			$show_tooltip_on          = $settings['show_tooltip_on'];
			$show_speech_bubble       = $settings['show_speech_bubble'];
			$make_interactive_tooltip = $settings['make_interactive_tooltip'];
			$use_pulse_animation      = $settings['use_pulse_animation'];
			$animation_duration       = $settings['tooltip_animation_duration']['size'];

			$animation_name = '';
			if ( isset( $settings['tooltip_animation_type'] ) ) {
				if ( isset( $settings['animation_type_toward'] ) ) {
					$animation_name = $settings['animation_type_toward'];
				} elseif ( isset( $settings['animation_type_scale'] ) ) {
					$animation_name = $settings['animation_type_scale'];
				} elseif ( isset( $settings['animation_type_perspective'] ) ) {
					$animation_name = $settings['animation_type_perspective'];
				} elseif ( isset( $settings['animation_type_away'] ) ) {
					$animation_name = $settings['animation_type_away'];
				}
			}

			$pulse_animation_class = '';
			if ( 'yes' === $use_pulse_animation ) {
				$pulse_animation_class = 'pulse-start';
			}

			?>

			<div class="wpmozo-image-hotspot-wrapper <?php echo esc_attr( $pulse_animation_class ); ?>  elementor-<?php echo esc_attr( $widget_id ); ?>" id="wpmozo-<?php echo esc_attr( $widget_id ); ?>" data-speech-bubble= "<?php echo esc_attr( $show_speech_bubble ); ?>" data-interactive="<?php echo esc_attr( $make_interactive_tooltip ); ?>"  data-animation-type="<?php echo esc_attr( $settings['tooltip_animation_type'] ); ?>" data-animation-duration="<?php echo esc_attr( $animation_duration ); ?>" data-animation-name="<?php echo esc_attr( $animation_name ); ?>" data-tooltip-id="elementor-<?php echo esc_attr( $widget_id ); ?>" data-trigger="<?php echo esc_attr( $show_tooltip_on ); ?>">

				<?php
				foreach ( $marker_list as $index => $single_item ) {
					$marker_type = esc_attr( $single_item['marker_type'] );
					?>
							<div class="wpmozo-image-hotspot-single-item  elementor-repeater-item-<?php echo esc_attr( $single_item['_id'] ); ?>" data-repeater-id="elementor-repeater-item-<?php echo esc_attr( $single_item['_id'] ); ?>" data-template="tooltip-content-<?php echo esc_attr( $widget_id ); ?>-<?php echo esc_attr( $index ); ?>">
								<span class="wpmozo-marker-wrapper marker-type-<?php echo esc_attr( $marker_type ); ?>">								 
								<?php if ( 'text' === $marker_type ) : ?>
										<?php echo esc_attr( $single_item['marker_text'] ); ?>
									<?php endif; ?>
								<?php if ( 'icon' === $marker_type ) : ?>
										<?php
										Icons_Manager::render_icon(
											$single_item['marker_icon'],
											array(
												'aria-hidden' => 'true',
												'class' => 'wpmozo_ae_marker_icon',
											)
										);
										?>
									<?php endif; ?>
								<?php if ( 'image' === $marker_type ) : ?>									
										<img src="<?php echo esc_attr( $single_item['marker_image']['url'] ); ?>">
									<?php endif; ?>
								</span>
							</div>
							<!-- tooltip content -->
							<div id="tooltip-content-<?php echo esc_attr( $widget_id ); ?>-<?php echo esc_attr( $index ); ?>"  class="wpmozo-image-hotspot-tooltip-content" >
								<?php

								if ( '' !== $single_item['tooltip_text'] ) {
									echo wp_kses_post( $single_item['tooltip_text'] );
								}

								?>
							</div>						
						<?php
				}
				?>
			</div>		
			<?php

			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
				?>
					<script type="text/javascript">
						var dynamicVariables = {};              
						document.querySelectorAll( ".wpmozo-image-hotspot-wrapper" ).forEach( function ( element ) {
						var singleId          = element.getAttribute( "data-tooltip-id" ).replace( 'elementor-','' );
						var dataTrigger       = element.getAttribute( "data-trigger" );
						var speechBubble      = element.getAttribute( "data-speech-bubble" );
						var dataInteractive   = element.getAttribute( "data-interactive" );
						var dataAnimationName = element.getAttribute( 'data-animation-name' );  
						var animationDuration = element.getAttribute( 'data-animation-duration' );             
				
						dynamicVariables[ 'tippyOptions_'+singleId ] = {
							allowHTML: true,
							placement: 'top',
							theme: 'light',                                            
							interactive: true,                                                                   
							content: function ( reference ) {                            
								var id = reference.getAttribute( 'data-template' );
								var template = document.getElementById( id );
								return template.innerHTML;
							},
						};
						if ( dataTrigger === 'click' ) {
							dynamicVariables[ 'tippyOptions_'+singleId ].trigger = 'click';
						}
						if ( '' === speechBubble ) {
							dynamicVariables[ 'tippyOptions_'+singleId ].arrow = false;
						}
						if ( '' === animationDuration ) {
							dynamicVariables[ 'tippyOptions_'+singleId ].arrow = false;
						}
						
						// if ( 'yes' === dataInteractive ) {
						//     dynamicVariables[ 'tippyOptions_'+singleId ].interactive = true;
						// }
						if ( '' !== dataAnimationName ) {
							dynamicVariables[ 'tippyOptions_'+singleId ].duration = animationDuration;
						}
						tippy( '.elementor-' + singleId + ' .wpmozo-image-hotspot-single-item', dynamicVariables[ 'tippyOptions_'+singleId ] );
					} ); 
					</script>
				<?php
			}
		}
	}
}