<?php

namespace Application\Model;
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 10/05/2017
 * Time: 14:34
 */
class TripsTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }


}