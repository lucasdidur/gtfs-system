<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Fusioncharts\src\Model\Fusioncharts;
use Fusioncharts\src\Model\FusionchartsTable;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\AgencyTable::class        => function ($container) {
                    $tableGateway = $container->get('Model\AgencyTableGateway');
                    return new Model\AgencyTable($tableGateway);
                },
                'Model\AgencyTableGateway' => function ($container) {
                    $dbAdapter          = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Agency());
                    return new TableGateway('agency', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\AgencyController::class => function ($container) {
                    return new Controller\AgencyController(
                        $container->get(Model\AgencyTable::class)
                    );
                },
            ],
        ];
    }
}

?>