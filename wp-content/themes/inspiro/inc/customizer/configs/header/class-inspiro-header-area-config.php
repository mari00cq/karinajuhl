<?php
/**
 * Inspiro Lite: Adds settings, sections, controls to Customizer
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PHP Class for Registering Customizer Confugration
 *
 * @since 1.3.0
 */
class Inspiro_Header_Area_Config {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_configuration' ), 10 );
	}

	/**
	 * Register configurations
	 *
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 * @return void
	 */
	public function register_configuration( $wp_customize ) {

		// Create sections
		$wp_customize->add_section( 
			'header-area', 
			array(
				'title'    => esc_html__( 'Header', 'inspiro' ),
				'priority' => 70,
			) 
		);

		$wp_customize->add_setting(
			'header-menu-style',
			array(
				'default'           => 'wpz_menu_normal',
				'sanitize_callback' => 'sanitize_key'
			)
		);
		$wp_customize->add_control(
			new Inspiro_Customize_Image_Select_Control(
				$wp_customize,
				'header-menu-style',
				array(
					'label'           => esc_html__( 'Header Layout', 'inspiro' ),
					'description'     => esc_html__( 'Select the header layout. The hamburger icon appears on the desktop if the Sidebar has at least one widget. On mobile devices, the main menu is displayed in the sidebar.', 'inspiro' ),
					'section'         => 'header-area',
					'choices'     => array(
						'wpz_menu_normal' => array(
							'label' => esc_html__( 'Default Style', 'inspiro' ),
							'url'   => '%sheader-default.png'
						),
						'wpz_menu_left'    => array(
							'label' => esc_html__( 'Menu on left side', 'inspiro' ),
							'url'   => '%sheader-left-menu.png'
						),
						'wpz_menu_center'    => array(
							'label' => esc_html__( 'Menu on center', 'inspiro' ),
							'url'   => '%sheader-center-menu.png'
						),
						'wpz_menu_hamburger'    => array(
							'label' => esc_html__( 'Hidden menu', 'inspiro' ),
							'url'   => '%sheader-hidden-menu.png'
						),
					)
				)
			)
		);

		$wp_customize->add_setting(
			'header-menu-pro-style',
			array(
				'default' => null,
				'sanitize_callback' => 'sanitize_key'
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Promo_Pro_Control(
				$wp_customize,
				'header-menu-pro-style',
				array(
					'label'           => esc_html__( 'PRO', 'inspiro' ),
					'section'         => 'header-area',
					'choices'     => array(
						'wpz_menu_left_logo_center'    => array(
							'label' => esc_html__( 'Left menu with Logo Center', 'inspiro' ),
							'url'   => '%sheader-pro.png',
						),
						'wpz_menu_center_logo_center'    => array(
							'label' => esc_html__( 'Center menu with Logo Center', 'inspiro' ),
							'url'   => '%sheader-pro-2.png',
						),
					)
				)
			)
		);

		$wp_customize->add_setting(
			'header-layout-type',
			array(
				'sanitize_callback' => 'sanitize_key',
				'default'           => 'wpz_layout_narrow'
			)
		);

		$wp_customize->add_control(
			'header-layout-type',
			array(
				'label'   => esc_html__( 'Header Menu Width', 'inspiro' ),
				'type'    => 'radio',
				'section' => 'header-area',
				'choices' => array(
					'wpz_layout_narrow' => esc_html__( 'Narrow', 'inspiro' ),
					'wpz_layout_full'   => esc_html__( 'Full-width', 'inspiro' )
				),
			)
		);

		$wp_customize->add_setting(
			'header_title_subsection',
			array(
				'default' => null,
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			new Inspiro_Customize_Title_Control(
				$wp_customize,
				'header_title_subsection',
				array(
					'label'   => esc_html__( 'Elements', 'inspiro' ),
					'section' => 'header-area',
				)
			)
		);


		$wp_customize->add_setting(
			'header_search_show',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => true,
				'sanitize_callback' => 'inspiro_sanitize_checkbox',
			)
		);
		$wp_customize->add_control(
			'header_search_show',
			array(
				'type'    => 'checkbox',
				'section' => 'header-area',
				'label'   => esc_html__( 'Show Seach Icon', 'inspiro' ),
				'description' => esc_html__( 'Show search icon and search form in the header', 'inspiro' ),
			)
		);
	}

}
new Inspiro_Header_Area_Config();