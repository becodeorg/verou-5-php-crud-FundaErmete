<?php

// Require the correct variable type to be used (no auto-converting)
declare (strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();


$cardRepository = new CardRepository($databaseManager);
$cards = $cardRepository->get();

// Get the current action to execute
// $action = $_GET['action'] ?? null;
$page = $_SERVER["REQUEST_URI"];
$BASE_PATH = "localhost/BeCode/PHP-CRUD/";

// Load the relevant action

switch ($page) {
    case $BASE_PATH:
        overview($databaseManager);
        break;
    case $BASE_PATH . 'create':
        create($databaseManager);
        break;
    case $BASE_PATH . 'edit':
        echo "Editing ...";
        break;
    default:
        overview();
        break;
}

function overview()
{
    // Load your view
   
    require 'overview.php';
}

function create($databaseManager)
{
    if(isset($_POST['submit'])) {
            $cardRepository = new CardRepository($databaseManager);
            $cardRepository->create();
    }
    require 'createView.php';
    // TODO: provide the create logic
}