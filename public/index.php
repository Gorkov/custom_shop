<?php

require_once __DIR__ . '/../config/init.php';
require_once LIBS . '/functions.php';

new \gshop\App();

throw new Exception('Page not found', 404);