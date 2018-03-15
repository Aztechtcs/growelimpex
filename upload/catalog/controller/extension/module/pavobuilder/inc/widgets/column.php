<?php
/**
 * @package Pavothemer for Opencart 3.x
 * @version 1.0
 * @author http://www.pavothemes.com
 * @copyright	Copyright (C) Feb 2017 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
 */

class PA_Widget_Column extends PA_Widgets {

	public function fields(){
		$effect_duration_options = array();
		$effect_duration_options[] = array(
				'label'	=> $this->language->get( 'text_default' ),
				'value'	=> ''
			);
		for ( $i = 1; $i <= 10; $i++ ) {
			$effect_duration_options[] = array(
					'label'	=> $i . 's',
					'value'	=> $i . 's'
				);
		}
		return array(
			'mask'		=> array(
				'icon'	=> 'fa fa-columns',
				'label'	=> $this->language->get( 'entry_text_block' )
			),
			'tabs'		=> array(
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
							'desc'	=> $this->language->get( 'entry_extra_class_desc_text' )
						),
						array(
							'type'	=> 'text',
							'name'	=> 'extra_class_outer',
							'label'	=> $this->language->get( 'entry_extra_class_outer_text' ),
							'desc'	=> $this->language->get( 'entry_extra_class_desc_text' )
						),
						array(
							'type'	=> 'text',
							'name'	=> 'background_video',
							'label'	=> $this->language->get( 'entry_video_url_text' )
						),
						array(
							'type'	=> 'checkbox',
							'name'	=> 'parallax',
							'label'	=> $this->language->get( 'entry_parallax_text' )
						),
						array(
							'type'	=> 'select-animate',
							'name'	=> 'effect',
							'id'	=> 'animate-select',
							'group'	=> true,
							'label'	=> $this->language->get( 'entry_effect_text' )
						),
						array(
							'type'	=> 'select',
							'name'	=> 'effect_duration',
							'label'	=> $this->language->get( 'effect_duration_text' ),
							'options'	=> $effect_duration_options
						)
					)
				),
				'background'		=> array(
					'label'			=> $this->language->get( 'entry_background_text' ),
					'fields'		=> array(
						array(
							'type'	=> 'colorpicker',
							'name'	=> 'background_color',
							'label'	=> $this->language->get( 'entry_background_color_text' ),
							'css_attr'	=> 'background-color'
						),
						array(
							'type'	=> 'image',
							'name'	=> 'background_image',
							'label'	=> $this->language->get( 'entry_background_image_text' ),
							'css_attr'	=> 'background-image'
						),
						array(
							'type'	=> 'select',
							'name'	=> 'background_position',
							'label'	=> $this->language->get( 'entry_background_position' ),
							'options'	=> array(
								array(
									'label'		=> 'None',
									'value'		=> ''
								),
								array(
									'label'		=> 'Inherit',
									'value'		=> 'inherit'
								),
								array(
									'label'		=> 'Top Left',
									'value'		=> 'top left'
								),
								array(
									'label'		=> 'Top Right',
									'value'		=> 'top right'
								),
								array(
									'label'		=> 'Bottom Left',
									'value'		=> 'bottom left'
								),
								array(
									'label'		=> 'Bottom Right',
									'value'		=> 'bottom right'
								),
								array(
									'label'		=> 'Center Center',
									'value'		=> 'center center'
								)
							),
							'css_attr'	=> 'background-position'
						),
						array(
							'type'	=> 'select',
							'name'	=> 'background_repeat',
							'label'	=> $this->language->get( 'entry_background_repeat_text' ),
							'options'	=> array(
								array(
									'label'		=> 'None',
									'value'		=> ''
								),
								array(
									'label'	=> 'No Repeat',
									'value'	=> 'no-repeat'
								),
								array(
									'label'	=> 'Repeat x',
									'value'	=> 'repeat-x'
								),
								array(
									'label'	=> 'Repeat y',
									'value'	=> 'repeat-y'
								)
							),
							'css_attr'	=> 'background-repeat'
						)
					)
				),
				'style'				=> array(
					'label'			=> $this->language->get( 'entry_styles_text' ),
					'fields'		=> array(
						array(
							'type'	=> 'layout-onion',
							'name'	=> 'styles',
							'label'	=> $this->language->get( 'entry_box_text' )
						)
					)
				),
				'custom'			=> array(
					'label'			=> $this->language->get( 'entry_custom_text' ),
					'fields'		=> array(
						array(
							'type'	=> 'colorpicker',
							'name'	=> 'inner_background_color',
							'label'	=> $this->language->get( 'entry_inner_background_color_text' ),
							'selector' => '.pa-column-inner',
							'css_attr'	=> 'background-color'
						)
					)
				)
				// ,
				// 'responsive'		=> array(
				// 	'label'			=> $this->language->get( 'entry_responsive_text' ),
				// 	'fields'		=> array(
				// 		array(
				// 			'type'	=> 'responsive',
				// 			'name'	=> 'responsive'
				// 		)
				// 	)
				// )
			)
		);
	}

	public function render( $settings = array(), $content = '' ) {
		$class = $bootstrap_class = $data = array();
		if ( ! empty( $settings['extra_class'] ) ) {
			$class[] = $settings['extra_class'];
		}
		if ( ! empty( $settings['parallax'] ) ) {
			$class[] = $settings['parallax'];
		}
		if ( ! empty( $settings['effect'] ) ) {
			$class[] = 'animated';
			$data['animate'] = $settings['effect'];
		}
		if ( $settings['responsive'] ) {
			foreach ( $settings['responsive'] as $type => $opt ) {
				if ( ! empty( $opt['cols'] ) ) {
					$bootstrap_class[] = 'col-' . $type . '-' . $opt['cols'];
				}
			}
		}
		$settings['class'] = implode( ' ', $class );
		$settings['bootstrap_class'] = implode( ' ', $bootstrap_class );
		$settings['id'] = ! empty( $settings['uniqid_id'] ) ? $settings['uniqid_id'] : '';

		return $this->load->view( 'extension/module/pavobuilder/pa_column/pa_column', array( 'settings' => $settings, 'data' => $data, 'content' => $content ) );
	}

}