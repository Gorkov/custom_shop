<?php
/**
 * Created by PhpStorm.
 * User: Gorkov Anatolii
 * Date: 12.02.19
 * Time: 2:30
 */

namespace gshop;

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler(\Exception $e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError($e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logErrors($message = '', $file = '', $line = '')
    {
        error_log(
            '[' . date('Y-m-d H:i:s') . "]\nError message: {$message}\nFile: {$file}\nLine: {$line}\n ===========\n",
            3,
            ROOT . '/tmp/errors.log'
        );
    }

    protected function displayError($errString, $errFile, $errLine, $response = 404)
    {
        http_response_code($response);
        if ($response === 404 && !DEBUG) {
            require_once WWW . '/errors/404.php';
            die;
        }

        if (DEBUG) {
            require_once WWW . '/errors/develop.php';
        } else {
            require_once WWW . '/errors/prod.php';
        }
    }
}