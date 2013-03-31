<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Item\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Item\Model\Item;
use Item\Form\ItemForm;

class ItemController extends AbstractActionController
{

	protected $itemTable;

    public function indexAction()
    {
        return new ViewModel(array(
        	'items' => $this->getItemTable()->fetchAll(),
        	));
    }

    // add a new item via our form
    public function addAction()
    {
    	// create ItemForm
    	$form = new ItemForm();
    	$form->get('submit')->setValue('Add');

    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$item = new Item();
    		$form->setInputFilter($item->getInputFilter());
    		$form->setData($request->getPost());

    		if ($form->isValid()) {	// if valid, save item
    			$item->exchangeArray($form->getData());
    			$this->getItemTable()->saveItem($item);

                // Redirect to list of items
    			return $this->redirect()->toRoute('item');
    		}
    	}
    	return array('form' => $form);
    }

    public function editAction()
    {
    	$id = (int) $this->params()->fromRoute('id', 0);
    	if (!$id) {	// if don't have an id, just add item
    		return $this->redirect()->toRoute('item', array(
    			'action' => 'add'
    			));
    	}
    	$item = $this->getItemTable()->getItem($id);

    	// populate our form with our data
    	$form  = new ItemForm();
    	$form->bind($item);
    	$form->get('submit')->setAttribute('value', 'Edit');

    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$form->setInputFilter($item->getInputFilter());
    		$form->setData($request->getPost());

    		if ($form->isValid()) {	// if valid, save item
    			$this->getItemTable()->saveItem($form->getData());

                // Redirect to list of items
    			return $this->redirect()->toRoute('item');
    		}
    	}

    	return array(
    		'id' => $id,
    		'form' => $form,
    		);
    }

    public function deleteAction()
    {
    	$id = (int) $this->params()->fromRoute('id', 0);
    	if (!$id) {
    		return $this->redirect()->toRoute('item');
    	}

    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$del = $request->getPost('del', 'No');

    		// check post for confirmation of deletion
    		if ($del == 'Yes') {
    			$id = (int) $request->getPost('id');
    			$this->getItemTable()->deleteItem($id);
    		}

            // Redirect to list of albums
    		return $this->redirect()->toRoute('item');
    	}

    	return array(
    		'id'    => $id,
    		'item' => $this->getItemTable()->getItem($id)
    		);
    }

    // retrieve our itemTable
    public function getItemTable()
    {
    	if (!$this->itemTable) {
    		$sm = $this->getServiceLocator();
    		$this->itemTable = $sm->get('Item\Model\ItemTable');
    	}
    	return $this->itemTable;
    }

}
