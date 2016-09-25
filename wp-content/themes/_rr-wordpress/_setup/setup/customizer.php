<?php
/**
 * @package brandco
 */

add_action( 'customize_register', 'brandco_customizer' );
function brandco_customizer( $wp_customize ) {

	$wp_customize->add_setting( 'CompanyLogo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'CompanyLogo', array(
		'label' => __( 'Logo', 'brandco' ),
		'section' => 'title_tagline',
		'settings' => 'CompanyLogo'
	)));

	$wp_customize->add_setting( 'CompanyLogoAlt' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'CompanyLogoAlt', array(
		'label' => __( 'Alternate Logo', 'brandco' ),
		'section' => 'title_tagline',
		'settings' => 'CompanyLogoAlt'
	)));

	/**
	 * Options
	 */

	$wp_customize->add_section( 'Section__WebsiteOptions' , array(
		'title' => __( 'Contact Info', 'brandco' ),
		'priority' => 30
	));

	// $wp_customize->add_setting( 'AgentImage' );
	// $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'AgentImage', array(
	// 	'label' => __( 'Agent Image', 'brandco' ),
	// 	'section' => 'Section__WebsiteOptions',
	// 	'settings' => 'AgentImage'
	// )));

	// $wp_customize->add_setting( 'AboutPageID' );
	// $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'AboutPageID', array(
	// 	'label' => __( 'About You Page', 'brandco' ),
	// 	'section' => 'Section__WebsiteOptions',
	// 	'type' => 'dropdown-pages',
	// 	'settings' => 'AboutPageID'
	// )));

	// $wp_customize->add_setting( 'ContactPageID' );
	// $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ContactPageID', array(
	// 	'label' => __( 'Contact Page', 'brandco' ),
	// 	'section' => 'Section__WebsiteOptions',
	// 	'type' => 'dropdown-pages',
	// 	'settings' => 'ContactPageID'
	// )));

	$wp_customize->add_setting( 'CompanyPhone' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'CompanyPhone', array(
		'label' => __( 'Phone', 'brandco' ),
		'section' => 'Section__WebsiteOptions',
		'settings' => 'CompanyPhone'
	)));

	$wp_customize->add_setting( 'CellPhone' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'CellPhone', array(
		'label' => __( 'Cell Phone', 'brandco' ),
		'section' => 'Section__WebsiteOptions',
		'settings' => 'CellPhone'
	)));

	$wp_customize->add_setting( 'CompanyEmail' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'CompanyEmail', array(
		'label' => __( 'Email', 'brandco' ),
		'section' => 'Section__WebsiteOptions',
		'settings' => 'CompanyEmail'
	)));

	/**
	 * Social Media
	 */

	$wp_customize->add_section( 'Section__SocialMedia' , array(
		'title' => __( 'Social Media', 'brandco' ),
		'priority' => 30,
		'description' => __( '<div class="error" style="padding:8px;"><strong>Important!</strong> Must use "http://" before links.</div>', 'brandco' )
	));

	$wp_customize->add_setting( 'SocialMedia__Facebook' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'SocialMedia__Facebook', array(
		'label' => __( 'Facebook URL', 'brandco' ),
		'section' => 'Section__SocialMedia',
		'settings' => 'SocialMedia__Facebook'
	)));

	$wp_customize->add_setting( 'SocialMedia__Twitter' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'SocialMedia__Twitter', array(
		'label' => __( 'Twitter URL', 'brandco' ),
		'section' => 'Section__SocialMedia',
		'settings' => 'SocialMedia__Twitter'
	)));

	$wp_customize->add_setting( 'SocialMedia__GooglePlus' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'SocialMedia__GooglePlus', array(
		'label' => __( 'Google Plus URL', 'brandco' ),
		'section' => 'Section__SocialMedia',
		'settings' => 'SocialMedia__GooglePlus'
	)));

	$wp_customize->add_setting( 'SocialMedia__Linkedin' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'SocialMedia__Linkedin', array(
		'label' => __( 'LinkedIn URL', 'brandco' ),
		'section' => 'Section__SocialMedia',
		'settings' => 'SocialMedia__Linkedin'
	)));

	$wp_customize->add_setting( 'SocialMedia__Pinterest' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'SocialMedia__Pinterest', array(
		'label' => __( 'Pinterest URL', 'brandco' ),
		'section' => 'Section__SocialMedia',
		'settings' => 'SocialMedia__Pinterest'
	)));

	$wp_customize->add_setting( 'SocialMedia__Instagram' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'SocialMedia__Instagram', array(
		'label' => __( 'Instagram URL', 'brandco' ),
		'section' => 'Section__SocialMedia',
		'settings' => 'SocialMedia__Instagram'
	)));

	$wp_customize->add_setting( 'SocialMedia__Youtube' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'SocialMedia__Youtube', array(
		'label' => __( 'Youtube URL', 'brandco' ),
		'section' => 'Section__SocialMedia',
		'settings' => 'SocialMedia__Youtube'
	)));

	$wp_customize->add_setting( 'SocialMedia__Yelp' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'SocialMedia__Yelp', array(
		'label' => __( 'Yelp URL', 'brandco' ),
		'section' => 'Section__SocialMedia',
		'settings' => 'SocialMedia__Yelp'
	)));

	$wp_customize->add_setting( 'SocialMedia__Email' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'SocialMedia__Email', array(
		'label' => __( 'Email', 'brandco' ),
		'section' => 'Section__SocialMedia',
		'settings' => 'SocialMedia__Email'
	)));
	$wp_customize->add_setting( 'SocialMedia__Blog' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'SocialMedia__Blog', array(
		'label' => __( 'Blog', 'brandco' ),
		'section' => 'Section__SocialMedia',
		'settings' => 'SocialMedia__Blog'
	)));

}
