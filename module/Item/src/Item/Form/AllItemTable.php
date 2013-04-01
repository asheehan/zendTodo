<?php

namespace Item\Form;

use Zend\Form\Form;

class AllItemTable extends Form
{

	public function init()
	{
		$this->setOptions(array(
			'elements' => array(
				'submit' => array(
					'type' => 'submit',
					)
				),
			));

		$this->addPrefixPath('ZFExt_Form_Decorator', 'ZFExt/Form/Decorator/', 'Decorator');
		$this->setDecorators(array(
			'FormElements', array(
				'SimpleTable', array(
					'columns' => array('Delete', 'TODO', 'Modify')
					)
				),
			'Form'
			)
		);

		$this->addRow();
		$this->addRow();
		$this->addRow();
		
		$this->getElement('submit')->setDecorators(array(
			'ViewHelper', array(
				array('td'=>'HtmlTag'),
				array('tag'=>'td', 'colspan'=>3)
				),
			array(array('tr'=>'HtmlTag'),
				array('tag'=>'tr')
				)
			)
		);
		$this->getElement('submit')->setOrder(100);
	}

	public function addRow()
	{
		$row_form = new Zend_Form(array(
			'elements' => array(
				'one' => array(
					'type' => 'checkbox'
					),
				'two' => array(
					'type' => 'text'
					),
				'three' => array(
					'type' => 'text'
					),
				),
			'decorators' => array('FormElements', array('HtmlTag', array('tag'=>'tr'))),
			'elementDecorators' => array('ViewHelper', array('HtmlTag', array('tag'=>'td')))
			));

		$new_form_index = count($this->_subForms)+1;
		$row_form->setElementsBelongTo($new_form_index);
		$this->addSubform($row_form, $new_form_index);

		return $row_form;
	}

}
