<?php

require_once 'config.php';

// Force creation of data file if it doesn't exist
if (!file_exists(DATA_FILE)) {
    loadData();
}

$action = getAction();

// Load the appropriate page
include 'header.php';

switch ($action) {
    case 'home':
        include 'home.php';
        break;
    case 'officials':
        include 'officials.php';
        break;
    case 'mayor-message':
        include 'mayor-message.php';
        break;
    case 'announcements':
        include 'announcements.php';
        break;
    default:
        include 'home.php';
        break;
}

include 'footer.php';
