<?php ob_start(); ?>

<?php if ($successMsg): ?>
    <div class="alert alert-success"><i class="ti ti-check"></i> <?= $successMsg ?></div>
<?php endif; ?>
<?php if ($errorMsg): ?>
    <div class="alert"><i class="ti ti-alert-triangle"></i> <?= $errorMsg ?></div>
<?php endif; ?>

<div class="user-bar">
    <span><i class="ti ti-user-check"></i> Logged in as: <strong><?= htmlspecialchars($loggedUser) ?></strong></span>
    <a href="index.php?page=logout" class="btn-logout"><i class="ti ti-logout"></i> Logout</a>
</div>

<div class="panel">
    <div class="rivet tl"></div><div class="rivet tr"></div><div class="rivet bl"></div><div class="rivet br"></div>
    <form method="POST" action="index.php">
        <div class="form-group">
            <label for="name">Operator Name</label>
            <input type="text" id="name" name="name" class="form-control" required placeholder="Enter your designation...">
        </div>
        <div class="form-group">
            <label for="message">Transmission Data</label>
            <textarea id="message" name="message" class="form-control" rows="4" required placeholder="Transmit your message..."></textarea>
        </div>
        <button type="submit" class="btn-metal"><i class="ti ti-send"></i> Transmit Data</button>
    </form>
</div>

<h2 style="font-family: 'Orbitron', sans-serif; color: #fff; margin-bottom: 1rem; border-bottom: 1px solid var(--border-metal); padding-bottom: 0.5rem;"><i class="ti ti-database"></i> ENCRYPTED LOGS</h2>

<div class="entries">
    <?php if (empty($entries)): ?>
        <p>No records found in the database matrix.</p>
    <?php else: ?>
        <?php foreach($entries as $entry): ?>
            <div class="entry">
                <div class="entry-header">
                    <span class="entry-name"><i class="ti ti-user"></i> <?= htmlspecialchars($entry['name']) ?></span>
                    <span class="entry-date"><?= date('d M Y - H:i:s', strtotime($entry['created_at'])) ?></span>
                </div>
                <div class="entry-message">
                    <?= nl2br(htmlspecialchars($entry['message'])) ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php 
$content = ob_get_clean();
$pageTitle = 'Guestbook - System Log';
require_once __DIR__ . '/layout.php';
?>
