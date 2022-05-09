<?php
namespace owpElementor\Modules\Newsletter\Widgets;

// Elementor Classes
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Newsletter extends Widget_Base {

	public function get_name() {
		return 'oew-newsletter';
	}

	public function get_title() {
		return __( 'Newsletter Form', 'ocean-elementor-widgets' );
	}

	public function get_icon() {
		return 'oew-icon eicon-favorite';
	}

	public function get_categories() {
		return array( 'oceanwp-elements' );
	}

	public function get_keywords() {
		return array(
			'form',
			'newsletter',
			'email',
			'owp',
		);
	}

	public function get_script_depends() {
		return array( 'oew-newsletter' );
	}

	public function get_style_depends() {
		return array( 'oew-newsletter' );
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_form',
			array(
				'label' => __( 'Form', 'ocean-elementor-widgets' ),
			)
		);

		// If no API KEy and List ID
		if ( ! get_option( 'owp_mailchimp_api_key' )
			|| ! get_option( 'owp_mailchimp_list_id' ) ) {
			$this->add_control(
				'set_key',
				array(
					'type' => Controls_Manager::RAW_HTML,
					'raw'  => sprintf(
						__( 'You need to set your Api Key & List Id on the %1$ssettings page%2$s', 'ocean-elementor-widgets' ),
						'<a href="' . add_query_arg( array( 'page' => 'oceanwp-panel&tab=integrations#mailchimp' ), esc_url( admin_url( 'admin.php' ) ) ) . '" target="_blank">',
						'</a>'
					),
				)
			);
		}

		$this->add_control(
			'placeholder_text',
			array(
				'label'       => __( 'Placeholder Text', 'ocean-elementor-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Enter your email address', 'ocean-elementor-widgets' ),
				'label_block' => true,
				'dynamic'     => array( 'active' => true ),
			)
		);

		$this->add_control(
			'submit_text',
			array(
				'label'       => __( 'Submit Button Text', 'ocean-elementor-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Go', 'ocean-elementor-widgets' ),
				'label_block' => true,
				'dynamic'     => array( 'active' => true ),
			)
		);

		$this->add_responsive_control(
			'input_width',
			array(
				'label'      => __( 'Width', 'ocean-elementor-widgets' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'default'    => array(
					'unit' => 'px',
					'size' => 400,
				),
				'range'      => array(
					'px' => array(
						'min' => 0,
						'max' => 1000,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .oew-newsletter-form-wrap' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'input_height',
			array(
				'label'      => __( 'Height', 'ocean-elementor-widgets' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'default'    => array(
					'unit' => 'px',
					'size' => 50,
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 300,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .oew-newsletter-form-wrap input[type="email"]' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'gdpr_label',
			array(
				'label'       => __( 'GDPR Checkbox Label', 'ocean-elementor-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Accept GDPR Terms', 'ocean-elementor-widgets' ),
				'label_block' => true,
				'dynamic'     => array( 'active' => true ),
			)
		);

		$this->add_responsive_control(
			'align',
			array(
				'label'        => __( 'Alignment', 'ocean-elementor-widgets' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => array(
					'left'   => array(
						'title' => __( 'Left', 'ocean-elementor-widgets' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'ocean-elementor-widgets' ),
						'icon'  => 'fa fa-align-center',
					),
					'right'  => array(
						'title' => __( 'Right', 'ocean-elementor-widgets' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'prefix_class' => 'elementor%s-align-',
				'default'      => '',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title',
			array(
				'label' => __( 'Input', 'ocean-elementor-widgets' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->start_controls_tabs( 'tabs_input_style' );

		$this->start_controls_tab(
			'tab_input_normal',
			array(
				'label' => __( 'Normal', 'ocean-elementor-widgets' ),
			)
		);

		$this->add_control(
			'input_bg',
			array(
				'label'     => __( 'Background', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .oew-newsletter-form-wrap input[type="email"]' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'input_color',
			array(
				'label'     => __( 'Color', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .oew-newsletter-form-wrap input[type="email"]' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_input_hover',
			array(
				'label' => __( 'Hover', 'ocean-elementor-widgets' ),
			)
		);

		$this->add_control(
			'input_bg_hover',
			array(
				'label'     => __( 'Background', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .oew-newsletter-form-wrap input[type="email"]:hover' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'input_color_hover',
			array(
				'label'     => __( 'Color', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .oew-newsletter-form-wrap input[type="email"]:hover' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'input_border_color_hover',
			array(
				'label'     => __( 'Border Color', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .oew-newsletter-form-wrap input[type="email"]:hover' => 'border-color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_input_focus',
			array(
				'label' => __( 'Focus', 'ocean-elementor-widgets' ),
			)
		);

		$this->add_control(
			'input_bg_focus',
			array(
				'label'     => __( 'Background', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .oew-newsletter-form-wrap input[type="email"]:focus' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'input_color_focus',
			array(
				'label'     => __( 'Color', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .oew-newsletter-form-wrap input[type="email"]:focus' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'input_border_color_focus',
			array(
				'label'     => __( 'Border Color', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .oew-newsletter-form-wrap input[type="email"]:focus' => 'border-color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'input_border',
				'label'       => __( 'Border', 'ocean-elementor-widgets' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .oew-newsletter-form-wrap input[type="email"]',
			)
		);

		$this->add_control(
			'input_border_radius',
			array(
				'label'      => __( 'Border Radius', 'ocean-elementor-widgets' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .oew-newsletter-form-wrap input[type="email"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'newsletter_input',
				'selector' => '{{WRAPPER}} .oew-newsletter-form-wrap input[type="email"]',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_btn',
			array(
				'label' => __( 'Button', 'ocean-elementor-widgets' ),
				'type'  => Controls_Manager::SECTION,
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'btn_border_radius',
			array(
				'label'      => __( 'Border Radius', 'ocean-elementor-widgets' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .oew-newsletter-form-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'newsletter_btn',
				'selector' => '{{WRAPPER}} .oew-newsletter-form-button',
			)
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			array(
				'label' => __( 'Normal', 'ocean-elementor-widgets' ),
			)
		);

		$this->add_control(
			'btn_bg',
			array(
				'label'     => __( 'Background', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .oew-newsletter-form-button' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'btn_color',
			array(
				'label'     => __( 'Color', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .oew-newsletter-form-button' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			array(
				'label' => __( 'Hover', 'ocean-elementor-widgets' ),
			)
		);

		$this->add_control(
			'btn_hover_bg',
			array(
				'label'     => __( 'Background', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .oew-newsletter-form-button:hover' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'btn_co_hoverlor',
			array(
				'label'     => __( 'Color', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .oew-newsletter-form-button:hover' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_checkbox',
			array(
				'label' => __( 'GDPR Checkbox', 'ocean-elementor-widgets' ),
				'type'  => Controls_Manager::SECTION,
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'gdpr_label_typo',
				'selector' => '{{WRAPPER}} .gdpr-wrap label',
			)
		);

		$this->add_control(
			'gdpr_label_color',
			array(
				'label'     => __( 'Label Color', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .gdpr-wrap label' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'gdpr_checkbox_bg',
			array(
				'label'     => __( 'Checkbox Background Color', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .gdpr-wrap input[type="checkbox"]' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'gdpr_checkbox_color',
			array(
				'label'     => __( 'Checkbox Color', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .gdpr-wrap input[type="checkbox"]:checked:before' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'gdpr_checkbox_border_color',
			array(
				'label'     => __( 'Checkbox Border Color', 'ocean-elementor-widgets' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .gdpr-wrap input[type="checkbox"]' => 'border-color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display(); ?>

		<div class="oew-newsletter-form clr">

			<div id="mc_embed_signup" class="oew-newsletter-form-wrap">

				<form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate>

					<div class="email-wrap elem-wrap">
						<input type="email" value="<?php echo $settings['placeholder_text']; ?>" onfocus="if (this.value == this.defaultValue)this.value = '';" onblur="if (this.value == '')this.value = this.defaultValue;" name="EMAIL" class="required email">

						<?php if ( $settings['submit_text'] ) { ?>
							<button type="submit" value="" name="subscribe" class="oew-newsletter-form-button button">
								<?php echo $settings['submit_text']; ?>
							</button>
						<?php } ?>
					</div>
					<span class="email-err err-msg req" style="display:none;"><?php _e( 'Email is required.', 'ocean-elementor-widgets' ); ?></span>
					<span class="email-err err-msg not-valid" style="display:none;"><?php _e( 'Email not valid.', 'ocean-elementor-widgets' ); ?></span>

					<?php if ( $settings['gdpr_label'] ) { ?>
						<div class="gdpr-wrap elem-wrap">
							<label><input type="checkbox" name="GDPR" value="1" class="gdpr required"><?php echo $settings['gdpr_label']; ?></label>
							<span class="gdpr-err err-msg" style="display:none;"><?php _e( 'This field is required', 'ocean-elementor-widgets' ); ?></span>
						</div>
					<?php } ?>

					<div class="success res-msg" style="display:none;"><?php _e( 'Thanks for your subscription.', 'ocean-elementor-widgets' ); ?></div>
					<div class="failed  res-msg" style="display:none;"><?php _e( 'Failed to subscribe, please contact admin.', 'ocean-elementor-widgets' ); ?></div>
				</form>

			</div><!--.oew-newsletter-form-wrap-->

		</div><!-- .oew-newsletter-form -->

		<?php
	}

	protected function content_template() {
		?>
		<div class="oew-newsletter-form clr">

			<div id="mc_embed_signup" class="oew-newsletter-form-wrap">

				<form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate>

					<div class="email-wrap elem-wrap">
						<input type="email" value="{{ settings.placeholder_text }}" name="EMAIL" class="required email">

						<# if ( settings.submit_text ) { #>
							<button type="submit" value="" name="subscribe" class="oew-newsletter-form-button button">
								{{{ settings.submit_text }}}
							</button>
						<# } #>
					</div>
					<span class="email-err err-msg req" style="display:none;"><?php _e( 'Email is required.', 'ocean-elementor-widgets' ); ?></span>
					<span class="email-err err-msg not-valid" style="display:none;"><?php _e( 'Email not valid.', 'ocean-elementor-widgets' ); ?></span>

					<# if ( settings.gdpr_label ) { #>
						<div class="gdpr-wrap elem-wrap">
							<label><input type="checkbox" name="GDPR" value="1" class="gdpr required">{{{ settings.gdpr_label }}}</label>
							<span class="gdpr-err err-msg" style="display:none;"><?php _e( 'This field is required', 'ocean-elementor-widgets' ); ?></span>
						</div>
					<# } #>

					<div class="success res-msg" style="display:none;"><?php _e( 'Thanks for your subscription.', 'ocean-elementor-widgets' ); ?></div>
					<div class="failed  res-msg" style="display:none;"><?php _e( 'Failed to subscribe, please contact admin.', 'ocean-elementor-widgets' ); ?></div>
				</form>

			</div><!--.oew-newsletter-form-wrap-->

		</div><!-- .oew-newsletter-form -->
		<?php
	}

}
