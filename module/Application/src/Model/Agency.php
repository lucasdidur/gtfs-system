<?php

namespace Application\Model;

/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 10/05/2017
 * Time: 14:27
 */
class Agency
{
    public $_id;
    public $id;
    public $name;
    public $url;
    public $timezone;
    public $lang;
    public $phone;
    public $fare_url;

    public function exchangeArray(array $data)
    {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->_id = (!empty($data['_id'])) ? $data['_id'] : null;
        $this->name = (!empty($data['name'])) ? $data['name'] : null;
        $this->url = (!empty($data['url'])) ? $data['url'] : null;
        $this->timezone = (!empty($data['timezone'])) ? $data['timezone'] : null;
        $this->lang = (!empty($data['lang'])) ? $data['lang'] : null;
        $this->phone = (!empty($data['phone'])) ? $data['phone'] : null;
        $this->fare_url = (!empty($data['fare_url'])) ? $data['fare_url'] : null;
    }

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            '_id' => $this->_id,
            'name' => $this->name,
            'url' => $this->url,
            'timezone' => $this->timezone,
            'lang' => $this->lang,
            'phone' => $this->phone,
            'fare_url' => $this->fare_url,
        ];
    }
}