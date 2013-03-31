<?php

namespace Item\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class Item implements InputFilterAwareInterface
{
	public $id;
	public $content;
	protected $inputFilter;

	// Copy data from passed array into our Item
	// needed for working with zend\db\tablegatewy
	public function exchangeArray($data)
	{
		$this->id = (isset($data['id'])) ? $data['id'] : null;
		$this->content = (isset($data['content'])) ? $data['content'] : null;
	}

	// needed for ArraySerializable and using bind() in itemController
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}

	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used");
	}

	public function getInputFilter()
	{
		if (!$this->inputFilter) {
			$inputFilter = new InputFilter();
			$factory     = new InputFactory();

			// filter for only integers
			$inputFilter->add($factory->createInput(array(
				'name'     => 'id',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
					),
				)));

			// filter for length and remove html tags
			$inputFilter->add($factory->createInput(array(
				'name'     => 'content',
				'required' => true,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
					),
				'validators' => array(
					array(
						'name'    => 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min'      => 1,
							'max'      => 300,
							),
						),
					),
				)));

			$this->inputFilter = $inputFilter;
		}

		return $this->inputFilter;
	}
}