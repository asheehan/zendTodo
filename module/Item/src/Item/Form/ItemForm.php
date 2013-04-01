<?php

namespace Item\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class ItemForm extends Form
{

	public function __construct($name = null)
	{
		parent::__construct('item');
		$this->setAttribute('method', 'post');

		// id element, hidden from users
		$this->add(array(
			'name' => 'id',
			'attributes' => array(
				'type' => 'hidden',
				),
			));

		// content element, displayed prominently
		$this->add(array(
			'name' => 'content',
			'attributes' => array(
				'type' => 'text',
				),
			'options' => array(
				'label' => 'Content: '
				),
			));

		// submit button
		$this->add(array(
			'name' => 'submit',
			'attributes' => array(
				'type' => 'submit',
				'value' => 'Save',
				'id' => 'submitbutton',
				),
			));
	}
}