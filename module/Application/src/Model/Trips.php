<?php

namespace Application\Model;
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 10/05/2017
 * Time: 14:34
 */
class Trips
{
    private $id;
    private $route_id;
    private $service_id;
    private $trip_id;
    private $trip_headsign;
    private $trip_short_name;
    private $direction_id;
    private $block_id;
    private $shape_id;
    private $wheelchair_accessible;

    public function exchangeArray(array $data)
    {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->route_id = (!empty($data['route_id'])) ? $data['route_id'] : null;
        $this->service_id = (!empty($data['service_id'])) ? $data['service_id'] : null;
        $this->trip_id = (!empty($data['trip_id'])) ? $data['trip_id'] : null;
        $this->trip_headsign = (!empty($data['trip_headsign'])) ? $data['trip_headsign'] : null;
        $this->trip_short_name = (!empty($data['trip_short_name'])) ? $data['trip_short_name'] : null;
        $this->direction_id = (!empty($data['direction_id'])) ? $data['direction_id'] : null;
        $this->block_id = (!empty($data['block_id'])) ? $data['block_id'] : null;
        $this->shape_id = (!empty($data['shape_id'])) ? $data['shape_id'] : null;
        $this->wheelchair_accessible = (!empty($data['wheelchair_accessible'])) ? $data['wheelchair_accessible'] : null;
    }

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'route_id' => $this->route_id,
            'service_id' => $this->service_id,
            'trip_id' => $this->trip_id,
            'trip_headsign' => $this->trip_headsign,
            'trip_short_name' => $this->trip_short_name,
            'direction_id' => $this->direction_id,
            'block_id' => $this->block_id,
            'wheelchair_accessible' => $this->wheelchair_accessible,
        ];
    }
}