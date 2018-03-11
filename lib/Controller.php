<?php
/**
 * Created by PhpStorm.
 * User: Ростислав
 * Date: 11.03.2018
 * Time: 21:39
 */

namespace lib;


class Controller
{
    protected $data = [];

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

}