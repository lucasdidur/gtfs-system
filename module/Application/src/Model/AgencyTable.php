<?php

namespace Application\Model;

use RuntimeException;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 10/05/2017
 * Time: 14:27
 */
class AgencyTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($paginated = false)
    {
        if ($paginated) {
            return $this->fetchPaginatedResults();
        }
        return $this->tableGateway->select();
    }

    private function fetchPaginatedResults()
    {
        // Create a new Select object for the table:
        $select = new Select($this->tableGateway->getTable());
        // Create a new result set based on the Album entity:
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Agency());
        // Create a new pagination adapter object:
        $paginatorAdapter = new DbSelect(
        // our configured select object:
            $select,
            // the adapter to run it against:
            $this->tableGateway->getAdapter(),
            // the result set to hydrate:
            $resultSetPrototype
        );

        $paginator = new Paginator($paginatorAdapter);
        return $paginator;
    }

    public function getAgency($id)
    {
        $id = (int)$id;
        $rowset = $this->tableGateway->select(['_id' => $id]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }
        return $row;
    }

    public function saveAgency(Album $album)
    {
        $data = [
            'artist' => $album->artist,
            'title' => $album->title,
        ];
        $id = (int)$album->id;
        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        if (!$this->getAlbum($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }
        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteAgency($id)
    {
        $this->tableGateway->delete(['id' => (int)$id]);
    }
}