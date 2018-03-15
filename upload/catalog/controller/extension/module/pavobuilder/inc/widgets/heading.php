<?php 
/**
 * @package Pavothemer for Opencart 3.x
 * @version 1.0
 * @author http://www.pavothemes.com
 * @copyright	Copyright (C) Feb 2017 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
 */

class PA_Widget_Heading extends PA_Widgets {

	public function fields(){
		return array(
			'mask'		=> array(
				'icon'	=> 'fa fa-file-text',
				'label'	=> $this->language->get( 'entry_heading_block' )
			),
			'tabs'	=> array(
				'general'		=> array(
					'label'		=> $this->language->get( 'entry_general_text' ),
					'fields'	=> array(
						array(
							'type'	=> 'hidden',
							'name'	=> 'uniqid_id',
							'label'	=> $this->language->get( 'entry_row_id_text' ),
							'desc'	=> $this->language->get( 'entry_column_desc_text' )
						),
						array(
							'type'	=> 'text',
							'name'	=> 'extra_class',
							'label'	=> $this->language->get( 'entry_extra_class_text' ),
							'desc'	=> $this->language->get( 'entry_extra_class_desc_text' ),
							'mask'	=> true,
						),
						array(
							'type'	=> 'select',
							'name'	=> 'tag',
							'label'	=> $this->language->get( 'entry_layout_text' ),
							'default' => 'h3',
							'mask'	=> true,
							'options'	=> array(
								array(
									'value'	=> 'h1',
									'label'	=> 'H1'
								),
								array(
									'value'	=> 'h2',
									'label'	=> 'H2'
								),
								array(
									'value'	=> 'h3',
									'label'	=> 'H3'
								),
								array(
									'value'	=> 'h4',
									'label'	=> 'H4'
								),
								array(
									'value'	=> 'h5',
									'label'	=> 'H5'
								)
							)
						),
						array(
							'type'	=> 'select',
							'name'	=> 'style',
							'label'	=> $this->language->get( 'entry_layout_text' ),
							'default' => 'nostyle',
							'options'	=> array(
								array(
									'value'	=> 'nostyle',
									'label'	=> 'No Style'
								),
								array(
									'value'	=> 'style-left',
									'label'	=> 'Style Left'
								),
								array(
									'value'	=> 'style-center',
									'label'	=> 'Style Center'
								),
								array(
									'value'	=> 'style-light-center',
									'label'	=> 'Style Light Center'
								),
								array(
									'value'	=> 'style-light-left',
									'label'	=> 'Style Light Left'
								)
							),
							'mask'	=> true
						),
						array(
							'type'		=> 'text',
							'name'		=> 'heading',
							'label'		=> $this->language->get( 'entry_heading_block' ),
							'default'	=> '',
							'language'	=> true
						),
						array(
							'type'		=> 'text',
							'name'		=> 'subheading',
							'label'		=> $this->language->get( 'entry_subtitle_text' ),
							'default'	=> '',
							'language'	=> true
						)
					)
				),
				'style'				=> array(
					'label'			=> $this->language->get( 'entry_styles_text' ),
					'fields'		=> array(
						array(
							'type'	=> 'layout-onion',
							'name'	=> 'layout_onion',
							'label'	=> 'entry_box_text'
						)
					)
				)
			)
		);
	}

	public function render( $settings = array(), $content = '' ) {
		
		$settings = array_merge(  array(
			 'heading'	   => 'your heading here',
			 'subheading'  => '',
			 'tag' 		   => 'h3',
			 'extra_class' => '',
			 'style'	   => '',
		), $settings );  

	 	$settings['heading'] =  html_entity_decode( htmlspecialchars_decode( $settings['heading'] ), ENT_QUOTES, 'UTF-8' ) ; 
	 	$settings['subheading'] =  html_entity_decode( htmlspecialchars_decode( $settings['subheading'] ), ENT_QUOTES, 'UTF-8' ) ; 
	 	
		return $this->load->view( 'extension/module/pavobuilder/pav_heading/pav_heading', array( 'settings' => $settings ) );
	}

	/**
	 * s fields
	 */
	public function validate( $settings = array() ) {
		$language_id = $this->config->get('config_language_id');
		$this->load->model( 'localisation/language' );
		$language = $this->model_localisation_language->getLanguage( $language_id );
		$code = ! empty( $language['code'] ) ? $language['code'] : $this->config->get('config_language');

		if ( ! empty( $settings[$code] ) && ! empty( $settings[$code]['content'] ) ) {
			$settings[$code]['content'] = html_entity_decode( $settings[$code]['content'], ENT_QUOTES, 'UTF-8' );
		}
		return $settings;
	}

}