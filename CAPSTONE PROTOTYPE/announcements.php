<?php

global $site_data;
$data = $site_data;

if ($data === null) {
    $data = loadData();
}

$announcements = isset($data['announcements']) ? $data['announcements'] : [];
$message = '';
$error = '';

// Handle Add Announcement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_announcement'])) {
    $title = trim($_POST['title'] ?? '');
    $date = trim($_POST['date'] ?? '');
    $excerpt = trim($_POST['excerpt'] ?? '');

    if (empty($title) || empty($date)) {
        $error = 'Title and Date are required!';
    } else {
        $data['announcements'][] = [
            'title' => $title,
            'date' => $date,
            'excerpt' => $excerpt ?: 'No excerpt provided.'
        ];
        saveData($data);
        $message = 'Announcement added successfully!';
        header('Location: ?action=announcements&message=' . urlencode($message));
        exit;
    }
}

// Handle Delete Announcement
if (isset($_GET['delete'])) {
    $index = (int)$_GET['delete'];
    if (isset($data['announcements'][$index])) {
        $deleted = $data['announcements'][$index]['title'];
        array_splice($data['announcements'], $index, 1);
        saveData($data);
        $message = "Deleted: $deleted";
        header('Location: ?action=announcements&message=' . urlencode($message));
        exit;
    }
}

// Get messages from URL
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
}
if (isset($_GET['error'])) {
    $error = htmlspecialchars($_GET['error']);
}
?>

<section class="announcements-page">
    <div class="page-header">
        <h1>📢 Announcements</h1>
        <p>Latest news and updates from LGU Bontoc</p>
    </div>

    <?php if ($message): ?>
        <div class="message success"><?php echo $message; ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="message error"><?php echo $error; ?></div>
    <?php endif; ?>

    <!-- Add Announcement Form -->
    <div class="add-announcement-form">
        <h3>➕ Add New Announcement</h3>
        <form method="POST" action="?action=announcements">
            <div class="form-group">
                <label for="title">Title *</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="date">Date *</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <textarea id="excerpt" name="excerpt" rows="3" placeholder="Brief description of the announcement"></textarea>
            </div>
            <button type="submit" name="add_announcement" class="btn-primary">Add Announcement</button>
        </form>
    </div>

    <!-- Announcements List -->
    <div class="announcements-list">
        <h3>All Announcements (<?php echo count($announcements); ?>)</h3>
        <?php if (empty($announcements)): ?>
            <p class="no-announcements">No announcements available.</p>
        <?php else: ?>
            <?php foreach ($announcements as $index => $announcement): ?>
                <div class="announcement-item">
                    <div class="announcement-header">
                        <span class="announcement-date"><?php echo date('F d, Y', strtotime($announcement['date'] ?? date('Y-m-d'))); ?></span>
                        <a href="?action=announcements&delete=<?php echo $index; ?>"
                            class="delete-btn"
                            onclick="return confirm('Are you sure you want to delete this announcement?');">🗑️ Delete</a>
                    </div>
                    <h4><?php echo htmlspecialchars($announcement['title'] ?? 'Untitled'); ?></h4>
                    <p><?php echo htmlspecialchars($announcement['excerpt'] ?? 'No excerpt available.'); ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>