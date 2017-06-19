<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 10/05/2017
 * Time: 14:16
 */

namespace Application\Controller;


use Application\Model\FusionchartsTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class StopController extends AbstractActionController
{
    private $table;

    public function __construct(FusionchartsTable $table)
    {
        $this->table = $table;
    }

    //Used to the index action which will render index.phtml that has a chart with static data
    // link -> __ServerName__/fusioncharts/index or __ServerName__/fusioncharts/index
    public function indexAction()
    {

    }

    //Used to the index action which will render index.phtml that has a chart with data returned from the database
    //link -> __ServerName__/fusioncharts/db/
    public function dbAction()
    {
        return new ViewModel([
            'albums' => $this->table->fetchAll(),
        ]);
    }
}
