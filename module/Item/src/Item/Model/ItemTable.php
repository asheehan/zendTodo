<?php

namespace Item\Model;

use Zend\Db\TableGateway\TableGateway;

class ItemTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		// setup our tableGateway for DB modifications
		$this->tableGateway = $tableGateway;
	}

	// return all items
	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

	// get a particular item
	public function getItem($id)
	{
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {	// if no results
			throw new \Exception("Could not find item $id");
		}
		return $row;
	}

	public function saveItem(Item $item)
	{
		// create a local copy of $item
		$data = array(
			'content' => $item->content,
			);

		$id = (int)$item->id;
		if ($id == 0 ) {	// if new item
			$this->tableGateway->insert($data);
		} else {	// edit an existing item
			if ($this->getItem($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {	// could not find our existing item!
				throw new \Exception('Form id does not exist');
			}
		}
	}

	public function deleteItem($id)
	{
		$this->tableGateway->delete(array('id' => $id));
	}

	public function deleteItems($ids)
	{
		foreach ($ids as $id) {
			$this->tableGateway->delete(array('id' => $id));
		}
	}

}