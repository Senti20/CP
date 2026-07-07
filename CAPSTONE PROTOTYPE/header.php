<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LGU Bontoc - <?php echo ucfirst(getAction()); ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <span class="date-display"><?php echo date('l, F d, Y'); ?></span>
                <div class="top-links">
                    <a href="?action=home">Home</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Government</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <div class="logo-section">
                    <img src="https://via.placeholder.com/80x80/003366/FFFFFF?text=LGU" alt="LGU Logo" class="logo">
                    <div class="header-text">
                        <h1>Province of Mountain Province</h1>
                        <h2>Municipality of Bontoc</h2>
                        <p class="motto">"Ili Ay Kalalaychan"</p>
                    </div>
                </div>
                <div class="header-search">
                    <input type="text" placeholder="Search..." class="search-input">
                    <button class="search-btn">🔍</button>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="main-nav">
        <div class="container">
            <ul class="nav-menu">
                <li><a href="?action=home" class="<?php echo getAction() == 'home' ? 'active' : ''; ?>">🏠 Home</a></li>
                <li><a href="?action=officials" class="<?php echo getAction() == 'officials' ? 'active' : ''; ?>">👥 Officials</a></li>
                <li><a href="?action=mayor-message" class="<?php echo getAction() == 'mayor-message' ? 'active' : ''; ?>">📜 Mayor's Message</a></li>
                <li><a href="?action=announcements" class="<?php echo getAction() == 'announcements' ? 'active' : ''; ?>">📢 Announcements</a></li>
                <li><a href="#">📋 Services</a></li>
                <li><a href="#">📞 Contact</a></li>
            </ul>
        </div>
    </nav>

    <main class="main-content">
        <div class="container">
            <?php echo displayMessage(); ?>