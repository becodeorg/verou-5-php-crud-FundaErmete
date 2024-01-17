<?php

declare(strict_types=1);

require_once 'config.php';
require_once 'Classes/DatabaseManager.php';
require_once 'Classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$cardRepository = new CardRepository($databaseManager);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $databaseManager->sanitize($_POST['name']);
    $description = $databaseManager->sanitize($_POST['description']);

    // Create a card
    $cardRepository->create(['name' => $name, 'description' => $description]);

    // Redirect to the overview page
    header("Location: overview.php");
    exit();
}

    // Display the form (HTML form code)
    require 'createView.php';
?> 