<?php
/**
 * Html5uploadimage Form Helper
 *
 * PHP 5
 *
 * @copyright Copyright (c) Alain Bonnefoy
 * @link http://cabb-online.com
 * @package app.View.Helper
 * @since Apache v2
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

namespace Html5uploadimage\View\Helper;

use Cake\View\Helper\FormHelper;
use Bootstrap3\View\Helper\BootstrapFormHelper;


class Html5uploadimageFormHelper extends BootstrapFormHelper {

	private $availableOptions =
	[
        'data-width',
        'data-height',
		'data-url',
	    'data-ajax',
        'data-canvas',
        'data-originalsize',
		'data-ghost',
		'data-image',
		'data-removeurl',
		'data-dimensionsonly',
		'data-editstart',
		'data-save-original',
		'data-resize',
		'data-download',
		'data-save',
		'style',
	];

	/**
	 *
	 * Create & return an input block (Html5uploadimage Like).
	 *
	 *
	 **/
	public function input($fieldName, array $options = array()) {

		if ($this->_extractOption('type', $options, false) === 'html5uploadimage') {

			$oldTemplates = [
				'inputContainer' => $this->templates('inputContainer'),
				'inputContainerError' => $this->templates('inputContainerError')
			] ;

			// The input type must be set to file to let CakePHP to place thi input type.
			$options['type'] = 'file';

			$options = $this->_parseOptions($fieldName, $options);

			foreach($options as $k => $v) {
				if ($k === 'dropOptions') {

					$dropOptions = $options['dropOptions'];

					$inputOptions = '';

					foreach($dropOptions as $k => $v) {

						if (in_array($k, $this->availableOptions)) {
							$inputOptions = $inputOptions . $k . '="' . $v .'" ';
						}
					}

					$inputOptions = preg_replace("/%/" , "%%", $inputOptions);

					unset($options['dropOptions']);

					$this->templates(
						[
							'inputContainer' => '<div class="dropzone form-group {{required}}" ' . $inputOptions . '>{{content}}</div>',
							'inputContainerError' => '<div class="dropzone form-group has-error {{required}}" ' . $inputOptions . '>{{content}}{{error}}</div>',
						]);
					break;
				}
			}

			$res = parent::input($fieldName, $options) ;

			$this->templates($oldTemplates) ;

			return $res ;
		}

		// Utilisation du BootstrapFormHelper pour les autres types d'input
		return parent::input($fieldName, $options);
	}
}