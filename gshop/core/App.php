<?php
/**
 * Created by PhpStorm.
 * User: Gorkov Anatolii
 * Date: 09.02.19
 * Time: 2:27
 */

namespace gshop;

class App
{
    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        session_start();
        self::$app = Registry::instance();
        $this->getParams();
        new ErrorHandler();
    }

    protected function getParams()
    {
        $params = require CONF . '/params.php';
        if(!empty($params)) {
            foreach ($params as $key => $param) {
                self::$app->setProperty($key, $param);
            }
        }
    }
}