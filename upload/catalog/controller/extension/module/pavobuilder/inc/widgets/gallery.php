<?php
/**
 * @package Pavothemer for Opencart 3.x
 * @version 1.0
 * @author http://www.pavothemes.com
 * @copyright	Copyright (C) Feb 2017 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
 */

class PA_Widget_Gallery extends PA_Widgets {

	public function fields() {
		return array(
			'mask'		=> array(
				'icon'	=> 'fa fa-picture-o',
				'label'	=> $this->language->get( 'entry_gallery_text' )
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
							'default' => '',
							'desc'	=> $this->language->get( 'entry_extra_class_desc_text' )
						),
						array(
							'type'	=> 'text',
							'name'	=> 'image_size',
							'label'	=> $this->language->get( 'entry_image_size_text' ),
							'desc'	=> $this->language->get( 'entry_image_size_desc' ),
							'default'		=> 'full',
							'placeholder'	=> '200x400'
						),
						array(
							'type'	=> 'select',
							'name'	=> 'display_type',
							'label'	=> $this->language->get( 'entry_display_type' ),
							'default' => 'grid',
							'options'	=> array(
								array(
									'value'	=> 'grid',
									'label'	=> 'Grid'
								),
								array(
									'value'	=> 'slide',
									'label'	=> 'Slide'
								)
							),
						),
						array(
							'type'		=> 'rangeslider',
							'name'		=> 'columns',
							'label'		=> $this->language->get( 'text_columns_images' ),
							'min'		=> 1,
							'max'		=> 10,
							'double'	=> false,
							'grid'		=> true,
							'default'	=> 6,
							'mask'		=> true
						),
						array(
							'type'		=> 'rangeslider',
							'name'		=> 'rows',
							'label'		=> $this->language->get( 'text_rows_images' ),
							'min'		=> 1,
							'max'		=> 10,
							'double'	=> false,
							'grid'		=> true,
							'default'	=> 6,
							'mask'		=> true
						),
						array(
							'type'	=> 'group',
							'name'	=> 'items',
							'label'	=> $this->language->get( 'entry_item' ),
							'fields'	=> array(
								array(
									'type'	=> 'image',
									'name'	=> 'src',
									'label'	=> $this->language->get( 'entry_image_text' )
								),
								array(
									'type'	=> 'text',
									'name'	=> 'text_image',
									'label'	=> $this->language->get( 'entry_text_image' ),
									'default'	=> '',
									'language'	=> true
								),
								array(
									'type'	=> 'text',
									'name'	=> 'link',
									'label'	=> $this->language->get( 'entry_link_text' ),
									'default'		=> '',
									'desc'	=> $this->language->get( 'entry_link_desc_text' )
								),
								array(
									'type'	=> 'text',
									'name'	=> 'alt',
									'label'	=> $this->language->get( 'entry_alt_text' ),
									'default' => '',
									'desc'	=> $this->language->get( 'entry_alt_desc_text' )
								),
							)
						)
					)
				)
			)
		);
	}

	public function render( $settings = array(), $content = '' ) {
		
		$this->document->addScript('catalog/view/javascript/jquery/swiper/js/swiper.min.js');
		$this->load->model( 'localisation/language' );
		$language = $this->model_localisation_language->getLanguage( $this->config->get('config_language_id') );
		$settings['language_code'] = $language['code'];
		$default = array(
			'image_size'  => '',
			'extra_class' => '',
			'columns'	  => 6,
			'items'		  => array()
		);
		$settings['get_item'] = array();
		$settings = array_merge( $default, $settings );
		if ( ! empty( $settings['items'] ) ) {
			foreach ( $settings['items'] as $k => $item ) {
				if ( empty( $item['src'] ) ) {
					$item['src'] = 'http://via.placeholder.com/290x430';
				} else {
					$item['src'] = $this->getImageLink( $item['src'], $settings['image_size'] );
				}
				$item['alt'] = ! empty( $item['alt'] ) ? html_entity_decode( htmlspecialchars_decode( $item['alt'] ), ENT_QUOTES, 'UTF-8' ) : '';
				$settings['get_item'][] = $item;
			}
		}

		return $this->load->view( 'extension/module/pavobuilder/pa_gallery/pa_gallery', array( 'settings' => $settings ) );
	}

}