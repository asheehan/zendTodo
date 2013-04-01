<?php

namespace Item;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Item\Model\Item;
use Item\Model\ItemTable;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        // return an array of factories for the ModuleManager
        return array(
            'factories' => array(
                'Item\Model\ItemTable' => function($sm) {   // create a factory for ItemTable
                    $tableGateway = $sm->get('ItemTableGateway');
                    $table = new itemTable($tableGateway);
                    return $table;
                },
                'ItemTableGateway' => function($sm) {   //create our TableGateway object
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Item());
                    return new TableGateway('item', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}
