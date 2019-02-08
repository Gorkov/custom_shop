<?php
/**
 * Created by PhpStorm.
 * User: Gorkov Anatolii
 * Date: 09.02.19
 * Time: 2:45
 */

namespace gshop;

class Registry
{
    use TSingleton;

    protected static $properties = [];

    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }

    public function getProperty($name)
    {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }
        return null;
    }

    public function getProperties()
    {
        return self::$properties;
    }
}