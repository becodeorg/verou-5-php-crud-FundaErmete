<?php

declare(strict_types=1);

require_once 'config.php';
require_once 'Classes/DatabaseManager.php';
require_once 'Classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$cardRepository = new CardRepository($databaseManager);
