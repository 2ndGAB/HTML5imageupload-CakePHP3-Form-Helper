# HTML5imageupload-CakePHP3-Form-Helper
This plugin provides a Form input Helper for HTML5imageupload javascript module

CakePHP 3.0 Helper to generate HTML input for the HTML5ImageUpload javascript <http://codecanyon.net/item/html-5-upload-image-ratio-with-drag-and-drop/8712634>

This plugin is designed to work with the Bootstrap3 Form Helper <https://github.com/Holt59/cakephp3-bootstrap3-helpers>

<Do not hesitate to...
 - **Post a github issue** if you find a bug or want a new feature.
 - **Send me a message** if you have troubles installing or using the plugin.


Installation
============

Run
`composer require cabb/html5imageupload-helper:dev-master`
or add the following into your composer.json and run `composer update`.
```json
"require": {
  "cabb/html5imageupload-helper": "dev-master"
}
```

Don't forget to load the plugin in your `/config/bootstrap.php` file:
```php
Plugin::load('Html5imageupload');
```

If you do not use `composer`, simply clone the repository into your `plugins/Html5imageupload` folder, and add `'autoload' => true` when loading the plugin:

```php
Plugin::load('Html5imageupload', ['autoload' => true]);
```


How to use?
===========

Just add Helper files into your View/Helpers directory and load the helpers in you controller:  
I recommend to declare the helper as FormH as you can use it mixed with normal inputs.
As this plugins inherit from Bootstrap3 Form Helper, you also should load it.
As for my plugin I prefer to name it FormB. Do like you want.

```php

	public $helpers = [
		'HtmlB' => [
				'className' => 'Bootstrap3.BootstrapHtml'
		],
		'FormB' => [
				'className' => 'Bootstrap3.BootstrapForm'
		],
		'PaginatorB' => [
				'className' => 'Bootstrap3.BootstrapPaginator'
		],
		'ModalB' => [
				'className' => 'Bootstrap3.BootstrapModal'
		],
		'FormH' => [
		    'className' => 'Html5imageupload.Html5imageuploadForm'
		],
	];
```


Available options
====

'data-width'  
'data-height'  
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

Form
====

Standard CakePHP code working with this helper!

```php

	echo $this->FormH->input('imgfile', [  
	   'type' => 'html5imageupload',  
		'dropOptions' => [  
			'data-image' => $myEntity->imgpathname . "?v=" . Date("Y.m.d.G.i.s",  
	      'data-ajax' => "false",  
		   'data-ghost' => "false",  
		   'data-originalsize' => "false",  
	 	   	'data-canvas' => "true",  
	 	   	'data-width' => "500",  
	 	   	'data-height' => "500",  
			'style' => "width: 100%;", // Helper takes care to replace % by %%  
		],  
	    'label' => false,  
	]);
	
```

Will output:

```html

	<div class="dropzone" 
		data-image="/myImgPath/img_0.png?v=2015.03.06.9.09.06" 
		data-ajax="false" 
		data-ghost="false" 
		data-originalsize="false" 
		data-canvas="true" 
		data-width="500" 
		data-height="500" 
		style="width: 100%;" >
		<input type="file" name="imgfile" id="imgfile">
	</div>
	
```

**Important!**
To prevent any problem of context and make everything working, pay attention to be consistent in the Form? you use:

* If you want to use the default cakePHP Helper, do something like that:

	echo $this->Form->create(...):
	echo $this->Form->input(...);
	
	echo $this->Form->button(...);
	echo $this->Form->end(...);

* If you want to use Bootstrap3 Form Helper: 

	echo $this->FormB->create(...):
	echo $this->FormB->input(...);
	
	echo $this->FormB->button(...);
	echo $this->FormB->end(...);

* and if you want to use Html5imageupload Form Helper: 

	echo $this->FormH->create(...):
	echo $this->FormH->input(...);
	
	echo $this->FormH->button(...);
	echo $this->FormH->end(...);


Copyright and license
=====================

Public Domain.



