<?php

const DATA_FILE = 'data.json';

function loadData()
{
    // Check if file exists
    if (!file_exists(DATA_FILE)) {
        return createDefaultData();
    }

    // Try to read the file
    $content = file_get_contents(DATA_FILE);
    if ($content === false) {
        // If file can't be read, recreate it
        return createDefaultData();
    }

    // Try to decode JSON
    $data = json_decode($content, true);
    if ($data === null) {
        // If JSON is invalid, recreate the file
        return createDefaultData();
    }

    // Validate that required keys exist
    $requiredKeys = ['municipal_officials', 'announcements', 'mayors_message', 'slides'];
    foreach ($requiredKeys as $key) {
        if (!isset($data[$key])) {
            // If any key is missing, recreate the file
            return createDefaultData();
        }
    }

    return $data;
}

/**
 * Create default data structure and save to file
 */
function createDefaultData()
{
    $defaultData = [
        'municipal_officials' => [
            ['title' => 'Municipal Mayor', 'name' => 'HON. FRANKLIN C. ODSEY', 'image' => 'mayor.jpg'],
            ['title' => 'Municipal Vice Mayor', 'name' => 'HON. ALSANNYSTER F. PATINGAN', 'image' => 'vice-mayor.jpg'],
            ['title' => 'Councilor', 'name' => 'HON. GLENN D. BACALA', 'image' => 'councilor1.jpg'],
            ['title' => 'Councilor', 'name' => 'HON. SEICHI E. OFO-OB', 'image' => 'councilor2.jpg'],
            ['title' => 'Councilor', 'name' => 'HON. JUPITER JULE K. KALANGEG', 'image' => 'councilor3.jpg'],
            ['title' => 'Councilor', 'name' => 'HON. DAN EVERT C. SOKOKEN', 'image' => 'councilor4.jpg'],
            ['title' => 'Councilor', 'name' => 'HON. TIMOTHY N. PONGAD, JR.', 'image' => 'councilor5.jpg'],
            ['title' => 'Councilor', 'name' => 'HON. JIMMY K. CHERWAKEN', 'image' => 'councilor6.jpg'],
            ['title' => 'Councilor', 'name' => 'HON. BRYAN BYRD B. BELLANG', 'image' => 'councilor7.jpg'],
            ['title' => 'Councilor', 'name' => 'HON. MILAGROS N. FANG-ASAN', 'image' => 'councilor8.jpg'],
        ],
        'announcements' => [
            [
                'title' => 'MHO calls for vigilance against Dengue, HFMD, and Heat-Related illnesses',
                'date' => '2026-05-01',
                'excerpt' => 'Bontoc, Mountain Province – The Municipal Health Office (MHO) headed by Municipal Health Officer Dr. Diga Kay Gomez reminded the public on prevention of Dengue and Hand, Foot & Mouth disease...'
            ],
            [
                'title' => 'Bontoc Police urge road discipline for safer streets',
                'date' => '2026-04-25',
                'excerpt' => 'Bontoc, Mountain Province – A total of 397 traffic violations were recorded by the Bontoc Municipal Police Station (MPS) from February 19 to April 21, 2026...'
            ],
            [
                'title' => 'State University Athletes gather in Bontoc for CARASUC 2026',
                'date' => '2026-04-20',
                'excerpt' => 'Bontoc, Mountain Province – Thousands of athletes, coaches, and officials from the seven state universities and colleges in the Cordillera Administrative Region came together...'
            ]
        ],
        'mayors_message' => "In today's world that runs on modern technology, especially in the field of facilitating communication, it is imperative for everyone – both in the private and the public sector – to adopt Information Communication Technology (ICT) development to improve our line of services.\n\nThis is through building on the aspiration that we will maximize the use of ICT of which I am pleased to welcome everyone to the website of the Bontoc Local Government Unit.\n\nThe establishment of the town's official website is a major leverage for the municipal government to apprise our people of what is going on in our municipality. The website will be a source of information and news updates on services, programs, projects, and activities (PPAs) of the Bontoc LGU, what is currently happening within our municipality, and how the taxes the public is paying are being spent.",
        'slides' => [
            ['title' => 'Welcome to Bontoc', 'subtitle' => 'The Capital Town of Mountain Province', 'image' => 'slide1.jpg'],
            ['title' => 'Build & Design', 'subtitle' => 'Modernizing Local Governance', 'image' => 'slide2.jpg']
        ]
    ];

    // Save default data to file
    file_put_contents(DATA_FILE, json_encode($defaultData, JSON_PRETTY_PRINT));
    return $defaultData;
}

/**
 * Save data to JSON file
 */
function saveData($data)
{
    file_put_contents(DATA_FILE, json_encode($data, JSON_PRETTY_PRINT));
}

/**
 * Get current action from URL
 */
function getAction()
{
    return isset($_GET['action']) ? $_GET['action'] : 'home';
}

/**
 * Display flash message
 */
function displayMessage()
{
    if (isset($_GET['message'])) {
        $message = htmlspecialchars($_GET['message']);
        return "<div class='message success'>{$message}</div>";
    }
    if (isset($_GET['error'])) {
        $error = htmlspecialchars($_GET['error']);
        return "<div class='message error'>{$error}</div>";
    }
    return '';
}

// Load data once and make it globally available
// Check if data is already loaded to prevent multiple loads
if (!isset($GLOBALS['site_data']) || $GLOBALS['site_data'] === null) {
    $GLOBALS['site_data'] = loadData();
}

// Also provide a function to get data safely
function getSiteData()
{
    if (!isset($GLOBALS['site_data']) || $GLOBALS['site_data'] === null) {
        $GLOBALS['site_data'] = loadData();
    }
    return $GLOBALS['site_data'];
}

// Ensure data file exists and is valid
if (!file_exists(DATA_FILE)) {
    createDefaultData();
}
