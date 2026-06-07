<?php ob_start(); ?>

<!-- Hero Section -->
<div class="glass-card" style="margin-bottom: 3rem; text-align: center; padding: 4rem 2rem; background: linear-gradient(135deg, rgba(30, 41, 59, 0.8), rgba(15, 23, 42, 0.9)); border-top: 4px solid var(--accent-primary);">
    <i class="ti ti-flame" style="font-size: 4rem; color: var(--accent-primary); margin-bottom: 1rem;"></i>
    <h1 style="font-size: 3rem; font-weight: 800; letter-spacing: -0.025em; margin-bottom: 1rem;">ECHOES OF ETERNITY</h1>
    <p style="font-size: 1.25rem; color: var(--text-secondary); max-width: 600px; margin: 0 auto;">Official portal for the latest news, updates, and world tour schedules.</p>
</div>

<!-- Tour Dates Section (Call to action) -->
<h2 class="section-title"><i class="ti ti-ticket"></i> Upcoming World Tour</h2>
<div class="glass-card" style="margin-bottom: 3rem; text-align: center; padding: 4rem 2rem;">
    <i class="ti ti-lock" style="font-size: 3rem; color: var(--text-secondary); margin-bottom: 1rem;"></i>
    <h3 style="font-size: 1.5rem; margin-bottom: 1rem;">Exclusive Content</h3>
    <p style="color: var(--text-secondary); margin-bottom: 2rem; max-width: 500px; margin-left: auto; margin-right: auto;">Join the inner circle to view our full world tour schedule, get early access to tickets, and view exclusive behind-the-scenes content.</p>
    <a href="index.php?page=login" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem;"><i class="ti ti-user"></i> Login to View Tour Dates</a>
    <div style="margin-top: 1rem;">
        <span style="color: var(--text-secondary);">Not a member? </span>
        <a href="index.php?page=register" style="color: var(--accent-primary); text-decoration: none;">Register Now</a>
    </div>
</div>

<!-- Latest News Section -->
<h2 class="section-title"><i class="ti ti-news"></i> Latest Transmissions</h2>
<div class="grid grid-3">
    <?php if (empty($news)): ?>
        <p style="grid-column: 1 / -1; color: var(--text-secondary);">No transmissions found.</p>
    <?php else: ?>
        <?php foreach($news as $item): ?>
            <div class="news-card">
                <?php if (!empty($item['image_url'])): ?>
                    <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="News Cover" class="news-img">
                <?php endif; ?>
                <div class="news-content">
                    <div class="news-date"><?= date('M d, Y', strtotime($item['created_at'])) ?></div>
                    <h3 class="news-title"><?= htmlspecialchars($item['title']) ?></h3>
                    <p class="news-desc"><?= nl2br(htmlspecialchars(substr($item['content'], 0, 150))) ?><?= strlen($item['content']) > 150 ? '...' : '' ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php 
$content = ob_get_clean(); 
require_once __DIR__ . '/layout.php';
?>
