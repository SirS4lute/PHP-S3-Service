<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controllers\S3ExampleController;

// Load environment variables from .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Instantiate the controller and handle file operations
$controller = new S3ExampleController();
$controller->handleFileOperations();
