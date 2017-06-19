<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Model\AgencyTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AgencyController extends AbstractActionController
{
    private $table;
    public function __construct(AgencyTable $table) {
        $this->table = $table;
    }

    public function indexAction()
    {
        $view = new ViewModel([
            'data' => $this->table->fetchAll(),
            'count' => $this->table->fetchAll()->count()
        ]);
        return $view;
    }

    public function addAction()
    {
    }

    public function editAction()
    {
        return new ViewModel();
    }

    public function deleteAction()
    {
        return new ViewModel();
    }
}
