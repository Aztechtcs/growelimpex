<?php
/**
 * @package Pavothemer for Opencart 3.x
 * @version 1.0
 * @author http://www.pavothemes.com
 * @copyright	Copyright (C) Feb 2017 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
 */

class PA_Widget_Text extends PA_Widgets {

	public $header = true;

	public function fields(){
		return array(
			'mask'		=> array(
				'icon'	=> 'fa fa-file-text',
				'label'	=> $this->language->get( 'entry_text_block' ),
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
							'mask'	=> true
						),
						array(
							'type'		=> 'editor',
							'name'		=> 'content',
							'label'		=> $this->language->get( 'entry_content_text' ),
							'default'	=> '',
							'language'	=> true
						),
						// test
						// array(
						// 	'type'		=> 'imageselect',
						// 	'name'		=> 'layout',
						// 	'label'		=> $this->language->get( 'xxx' ),
						// 	'default'	=> '',
						// 	'options'	=> array(
						// 		array(
						// 			'value'		=> 'layout-1',
						// 			// 200x200
						// 			'src'		=> 'layout-1.png' // => http://localhost/test/opencart87/upload/catalog/view/theme/default/image
						// 		),
						// 		array(
						// 			'value'		=> 'layout-2',
						// 			'src'		=> 'layout-2.png'
						// 		),
						// 		array(
						// 			'value'		=> 'layout-3',
						// 			'src'		=> 'layout-3.png'
						// 		)
						// 	)
						// )
						// , array(
						// 	'type'		=> 'datetimepicker',
						// 	'name'		=> 'xxxxxsadas',
						// 	'label'		=> $this->language->get( 'xxx' ),
						// 	'default'	=> ''
						// )
						// , array(
						// 	'type'		=> 'datepicker',
						// 	'name'		=> 'date',
						// 	'label'		=> $this->language->get( 'zzz' ),
						// 	'default'	=> ''
						// )
						// ,
						// array(
						// 	'type'		=> 'iconpicker',
						// 	'name'		=> 'icon',
						// 	'label'		=> $this->language->get( 'xxx' ),
						// 	'format'	=> 'mm/dd/yyyy',
						// 	'default'	=> ''
						// )
						// end test

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
		$settings['content'] = ! empty( $settings ) && ! empty( $settings['content'] ) ? html_entity_decode( htmlspecialchars_decode( $settings['content'] ), ENT_QUOTES, 'UTF-8' ) : '';
		return $this->load->view( 'extension/module/pavobuilder/pa_text/pa_text', array( 'settings' => $settings, 'content' => $content ) );
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