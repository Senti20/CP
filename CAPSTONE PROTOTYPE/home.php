<?php

global $site_data;
$data = $site_data;

// If data is still null, try loading it directly
if ($data === null) {
    $data = loadData();
}

// Get data with fallbacks
$slides = isset($data['slides']) ? $data['slides'] : [];
$announcements = isset($data['announcements']) ? $data['announcements'] : [];
?>

<!-- Hero Slider Section -->
<section class="hero-slider">
    <div class="slider-container">
        <?php if (empty($slides)): ?>
            <div class="slide" style="display: block;">
                <div class="slide-background" style="background: linear-gradient(135deg, #003366 0%, #004488 100%);">
                    <div class="slide-content">
                        <h2>Welcome to Bontoc</h2>
                        <h3>The Capital Town of Mountain Province</h3>
                        <p class="slide-description">Welcome to the official website of LGU Bontoc</p>
                        <a href="#" class="btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($slides as $index => $slide): ?>
                <div class="slide" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>;">
                    <div class="slide-background" style="background: linear-gradient(135deg, #003366 0%, #004488 100%);">
                        <div class="slide-content">
                            <h2><?php echo htmlspecialchars($slide['title'] ?? 'Welcome to Bontoc'); ?></h2>
                            <h3><?php echo htmlspecialchars($slide['subtitle'] ?? 'The Capital Town of Mountain Province'); ?></h3>
                            <p class="slide-description">Welcome to the official website of LGU Bontoc</p>
                            <a href="#" class="btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="slider-dots">
        <?php $slideCount = max(1, count($slides)); ?>
        <?php for ($i = 0; $i < $slideCount; $i++): ?>
            <span class="dot <?php echo $i === 0 ? 'active' : ''; ?>"></span>
        <?php endfor; ?>
    </div>
</section>

<!-- Welcome Section -->
<section class="welcome-section">
    <div class="welcome-content">
        <h2>Welcome to Bontoc</h2>
        <h3>The Capital Town of Mountain Province</h3>
        <p>Bontoc, the capital town of Mountain Province, is a vibrant municipality known for its rich cultural heritage and natural beauty. The LGU Bontoc is committed to providing efficient public service and fostering sustainable development.</p>
        <div class="stat-cards">
            <div class="stat-card">
                <span class="stat-number">12</span>
                <span class="stat-label">Barangays</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">24,000+</span>
                <span class="stat-label">Population</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">100%</span>
                <span class="stat-label">Service Coverage</span>
            </div>
        </div>
    </div>
</section>

<!-- Latest Announcements -->
<section class="announcements-section">
    <h2>📢 Latest News & Announcements</h2>
    <div class="announcements-grid">
        <?php if (empty($announcements)): ?>
            <p style="text-align: center; color: #666; grid-column: 1 / -1;">No announcements available.</p>
        <?php else: ?>
            <?php
            $displayAnnouncements = array_slice($announcements, 0, 3);
            foreach ($displayAnnouncements as $announcement):
            ?>
                <div class="announcement-card">
                    <div class="announcement-date"><?php echo date('M d, Y', strtotime($announcement['date'] ?? date('Y-m-d'))); ?></div>
                    <h3><?php echo htmlspecialchars($announcement['title'] ?? 'Untitled Announcement'); ?></h3>
                    <p><?php echo htmlspecialchars(substr($announcement['excerpt'] ?? '', 0, 150)) . '...'; ?></p>
                    <a href="#" class="read-more">Read More →</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="text-center">
        <a href="?action=announcements" class="btn-secondary">View All Announcements</a>
    </div>
</section>

<!-- Quick Services -->
<section class="quick-services">
    <h2>Online Services</h2>
    <div class="services-grid">
        <div class="service-card">
            <div class="service-icon">📋</div>
            <h3>Business Permit</h3>
            <p>Online registration and application for business permits</p>
            <a href="#" class="btn-service">Apply Now</a>
        </div>
        <div class="service-card">
            <div class="service-icon">📄</div>
            <h3>Certificates</h3>
            <p>Request for various government certificates</p>
            <a href="#" class="btn-service">Request Now</a>
        </div>
        <div class="service-card">
            <div class="service-icon">💡</div>
            <h3>Report Issue</h3>
            <p>Report community issues and concerns online</p>
            <a href="#" class="btn-service">Report Now</a>
        </div>
    </div>
</section>