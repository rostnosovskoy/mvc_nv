<?php
/**
 * Created by PhpStorm.
 * User: Ростислав
 * Date: 11.03.2018
 * Time: 22:53
 */

namespace lib;


class lang
{
    private $langs = [];
    private $lang;

    public function load($lang)
    {
        $this->lang = $lang;
        $this->langs = include "../lang/lang.php";
    }

    public function translate($phrase, $default = '')
    {
        $result = $this->langs["{$this->lang}.$phrase"];
        if (!$result)
        {
            return $default;
        }
        return $result;
    }

}