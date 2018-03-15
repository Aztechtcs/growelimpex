<?php
/**
 * @package Pavothemer for Opencart 3.x
 * @version 1.0
 * @author http://www.pavothemes.com
 * @copyright	Copyright (C) Feb 2017 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
 */

class PA_Widgets extends Controller {

	public $header = false;

	public static $instance = null;
	private $widgets = array();

	public static function instance( $registry ) {
		if ( ! self::$instance ) {
			self::$instance = new self( $registry );
		}
		return self::$instance;
	}

	public function __construct( $registry ) {
		parent::__construct( $registry );
	}

	/**
	 * load all widgets
	 */
	public function registerWidgets() {
		if ( $this->widgets ) return $this->widgets;
		$files = glob( dirname( DIR_SYSTEM ) . '/catalog/controller/extension/module/pavobuilder/inc/widgets/*.php' );
		foreach ( $files as $file ) {
			$file_name = basename( $file, '.php' );
			if ( strpos( $file_name, 'pa_' ) == 0 && is_file($file) ) {
				require_once $file;
				$name = implode( '_', array_map( 'ucfirst', explode( '_', $file_name ) ) );
				$class_name = 'PA_Widget_' . $name;
				if( class_exists($class_name) ){
					$widget = str_replace( 'widget_', '', strtolower( $class_name ) );
					$this->widgets[ $widget ] = new $class_name( $this->registry );
				}
			}
		}
		return $this;
	}

	/**
	 * get widgets
	 *
	 * @return array
	 */
	public function getWidgets() {
		if ( ! $this->widgets ) {
			$this->registerWidgets();
		}

		$widgets = array();
		$this->load->language( 'extension/module/pavobuilder' );
		foreach ( $this->widgets as $key => $widget ) {
			$widgets[$key] = array(
					'type' 		=> 'widget',
					'widget' 	=> str_replace( 'widget_', '', strtolower( get_class( $widget ) ) ),
					'group'		=> strip_tags( $this->language->get( 'heading_title' ) ),
					'group_slug'=> 'pa-widgets-list',
					'icon'		=> '',
					'label'		=> '',
					'header'	=> $widget->header
				);
		}
		return $widgets;
	}

	/**
	 * get width
	 *
	 * @param $widget
	 */
	public function getWidget( $widget = '' ) {
		if ( ! $this->widgets ) {
			$this->registerWidgets();
		}

		return ! empty( $this->widgets[$widget] ) ? $this->widgets[$widget] : null;
	}

	/**
	 * render widget
	 */
	public function renderWidget( $widget_code = '', $settings = array(), $content = '' ) {
		$language_id = $this->config->get('config_language_id');
		$this->load->model( 'localisation/language' );
		$language = $this->model_localisation_language->getLanguage( $language_id );
		$code = ! empty( $language['code'] ) ? $language['code'] : $this->config->get('config_language');

		$widget = $this->getWidget( $widget_code );
		foreach ( $settings as $key => $setting ) {
			if ( $key === $code ) {
				foreach ( $setting as $name => $value ) {
					$settings[$name] = $value;
				}
			}
		}
		return $widget ? $widget->render( $settings, $content ) : '';
	}

	public function getImageLink( $image, $dimension ) {
		$server = $this->request->server['HTTPS'] ? HTTPS_SERVER : HTTP_SERVER;

		$this->load->model( 'tool/image' );
		$sizes = explode( 'x', $dimension );
		if (  count($sizes) == 2 && ! empty( $sizes[0] ) && ! empty( $sizes[1] ) && !empty($dimension) ) {
			return $this->model_tool_image->resize( $image, $sizes[0], $sizes[1] );
		}

		return $server . 'image/' . $image;
	}

}