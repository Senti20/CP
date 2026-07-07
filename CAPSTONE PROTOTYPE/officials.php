<?php

global $site_data;
$data = $site_data;

if ($data === null) {
    $data = loadData();
}

$officials = isset($data['municipal_officials']) ? $data['municipal_officials'] : [];
?>

<section class="officials-page">
    <div class="page-header">
        <h1>👥 Sangguniang Bayan Officials</h1>
        <p>Municipal Officials of Bontoc, Mountain Province</p>
    </div>

    <!-- Mayor & Vice Mayor Section -->
    <div class="top-officials">
        <?php if (isset($officials[0])): ?>
            <div class="official-card top-official">
                <div class="official-image">
                    <img src="https://via.placeholder.com/150x150/003366/FFFFFF?text=Mayor" alt="Mayor">
                </div>
                <div class="official-info">
                    <h3><?php echo htmlspecialchars($officials[0]['title'] ?? 'Mayor'); ?></h3>
                    <h2><?php echo htmlspecialchars($officials[0]['name'] ?? ''); ?></h2>
                    <span class="official-badge">Head of Local Government</span>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($officials[1])): ?>
            <div class="official-card top-official">
                <div class="official-image">
                    <img src="https://via.placeholder.com/150x150/004488/FFFFFF?text=Vice" alt="Vice Mayor">
                </div>
                <div class="official-info">
                    <h3><?php echo htmlspecialchars($officials[1]['title'] ?? 'Vice Mayor'); ?></h3>
                    <h2><?php echo htmlspecialchars($officials[1]['name'] ?? ''); ?></h2>
                    <span class="official-badge">Presiding Officer</span>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Councilors Section -->
    <?php if (count($officials) > 2): ?>
        <div class="councilors-section">
            <h2>Municipal Councilors</h2>
            <div class="councilors-grid">
                <?php for ($i = 2; $i < count($officials); $i++): ?>
                    <div class="official-card councilor-card">
                        <div class="official-image small">
                            <img src="https://via.placeholder.com/100x100/005599/FFFFFF?text=C" alt="Councilor">
                        </div>
                        <div class="official-info">
                            <h3><?php echo htmlspecialchars($officials[$i]['title'] ?? 'Councilor'); ?></h3>
                            <h4><?php echo htmlspecialchars($officials[$i]['name'] ?? ''); ?></h4>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Ex-Officio Members -->
    <div class="ex-officio-section">
        <h2>Ex-Officio Members</h2>
        <div class="ex-officio-grid">
            <div class="official-card ex-officio">
                <h3>Municipal IPMR</h3>
                <p>Representative of Indigenous Peoples</p>
            </div>
            <div class="official-card ex-officio">
                <h3>LnB President</h3>
                <p>League of Barangays President</p>
            </div>
            <div class="official-card ex-officio">
                <h3>SK Federation President</h3>
                <p>Sangguniang Kabataan Federation President</p>
            </div>
        </div>
    </div>
</section>