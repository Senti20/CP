<?php

global $site_data;
$data = $site_data;

if ($data === null) {
    $data = loadData();
}

$message = isset($data['mayors_message']) ? $data['mayors_message'] : 'No mayor\'s message available.';
?>

<section class="mayor-message-page">
    <div class="page-header">
        <h1>📜 Mayor's Message</h1>
        <p>A message from our Municipal Mayor</p>
    </div>

    <div class="message-container">
        <div class="mayor-profile">
            <div class="mayor-image">
                <img src="https://via.placeholder.com/200x200/003366/FFFFFF?text=Mayor" alt="Mayor Franklin C. Odsey">
            </div>
            <div class="mayor-info">
                <h2>HON. FRANKLIN C. ODSEY</h2>
                <p class="mayor-title">Municipal Mayor</p>
                <div class="mayor-social">
                    <a href="#" class="social-icon">📧</a>
                    <a href="#" class="social-icon">📱</a>
                </div>
            </div>
        </div>

        <div class="message-content">
            <?php
            $paragraphs = explode("\n\n", $message);
            foreach ($paragraphs as $paragraph):
            ?>
                <p><?php echo nl2br(htmlspecialchars($paragraph)); ?></p>
            <?php endforeach; ?>
        </div>

        <div class="message-signature">
            <p>Let me thank you most for having visited us. I do hope you would visit us again and it is with high hopes that thru this site, we will hear from you suggestions and proposals to enhance our local plans and to both share at a vantage position all possibilities and potentials to fully advance the socioeconomic needs of our beloved Ili Ay Kalalaychan!</p>
            <div class="signature-block">
                <p><strong>HON. FRANKLIN C. ODSEY (SGD.)</strong></p>
                <p class="signature-title">Municipal Mayor</p>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="message-links">
        <h3>Related Links</h3>
        <div class="link-grid">
            <a href="#" class="link-card">📋 Executive Orders</a>
            <a href="#" class="link-card">📄 Municipal Resolutions</a>
            <a href="#" class="link-card">📊 Annual Reports</a>
            <a href="#" class="link-card">📝 Contact the Mayor</a>
        </div>
    </div>
</section>