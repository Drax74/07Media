<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Database\DB;

$config = require 'config.php';
$db = new DB($config['database']);
