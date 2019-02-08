<?php
/**
 * Created by PhpStorm.
 * User: Gorkov Anatolii
 * Date: 09.02.19
 * Time: 2:46
 */

namespace gshop;

trait TSingleton
{
    private static $instance;

    public function instance()
    {
        if(self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}