<?php

namespace Item\Form;

use Zend\Form\Form;

class ItemForm extends Form
{

	public function __construct($name = null)
	{
		parent::__construct('item');
		$this->setAttribute('method', 'post');
		$this->add(array(
			'name' => 'id',
			'attributes' => array(
				'type' => 'hidden',
				),
			));

		$this->add(array(
			'name' => 'content',
			'attributes' => array(
				'type' => 'text',
				),
			'options' => array(
				'label' => 'Content'
				),
			));

		$this->add(array(
			'name' => 'submit',
			'attributes' => array(
				'type' => 'submit',
				'value' => 'Go',
				'id' => 'submitbutton',
				),
			));
	}
}