<?php ob_start(); ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Admin Dashboard</h1>
        <p style="color: var(--text-secondary);">Welcome back, <strong style="color: white;"><?= htmlspecialchars($_SESSION['full_name'] ?? 'Admin') ?></strong>. Manage the band's operations.</p>
    </div>
    <div>
        <a href="index.php" class="btn btn-nav" style="display: inline-flex;"><i class="ti ti-external-link"></i> View Public Site</a>
    </div>
</div>

<div class="grid grid-2">
    <!-- Manage Tours -->
    <div class="glass-card">
        <h2 class="section-title"><i class="ti ti-ticket"></i> Add Tour Date</h2>
        <form method="POST" action="index.php?page=dashboard">
            <input type="hidden" name="action" value="add_tour">
            <div class="form-group">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" required placeholder="e.g. Jakarta, ID">
            </div>
            <div class="form-group">
                <label class="form-label">Venue</label>
                <input type="text" name="venue" class="form-control" required placeholder="e.g. Gelora Bung Karno">
            </div>
            <div class="grid grid-2" style="gap: 1rem;">
                <div class="form-group">
                    <label class="form-label">Date</label>
                    <input type="date" name="tour_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Upcoming">Upcoming</option>
                        <option value="Sold Out">Sold Out</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="ti ti-plus"></i> Add Tour</button>
        </form>
    </div>

    <!-- Manage News -->
    <div class="glass-card">
        <h2 class="section-title"><i class="ti ti-news"></i> Post News</h2>
        <form method="POST" action="index.php?page=dashboard">
            <input type="hidden" name="action" value="add_news">
            <div class="form-group">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required placeholder="Article title">
            </div>
            <div class="form-group">
                <label class="form-label">Cover Image URL</label>
                <input type="url" name="image_url" class="form-control" placeholder="https://...">
            </div>
            <div class="form-group">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="4" required placeholder="Write the news content here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="ti ti-send"></i> Publish News</button>
        </form>
    </div>
</div>

<!-- Tour List -->
<h2 class="section-title" style="margin-top: 3rem;"><i class="ti ti-list"></i> Tour Schedule Management</h2>
<div class="glass-card" style="padding: 0;">
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>City</th>
                    <th>Venue</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($tours)): ?>
                    <tr><td colspan="5" style="text-align: center; padding: 2rem;">No data found.</td></tr>
                <?php else: ?>
                    <?php foreach($tours as $tour): ?>
                        <tr>
                            <td><?= date('Y-m-d', strtotime($tour['tour_date'])) ?></td>
                            <td style="color: white;"><?= htmlspecialchars($tour['city']) ?></td>
                            <td><?= htmlspecialchars($tour['venue']) ?></td>
                            <td><?= htmlspecialchars($tour['status']) ?></td>
                            <td>
                                <form method="POST" action="index.php?page=dashboard" style="display:inline;">
                                    <input type="hidden" name="action" value="delete_tour">
                                    <input type="hidden" name="id" value="<?= $tour['id'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this tour?')"><i class="ti ti-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- News List -->
<h2 class="section-title" style="margin-top: 3rem;"><i class="ti ti-list"></i> News Management</h2>
<div class="glass-card" style="padding: 0;">
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($news)): ?>
                    <tr><td colspan="3" style="text-align: center; padding: 2rem;">No news found.</td></tr>
                <?php else: ?>
                    <?php foreach($news as $item): ?>
                        <tr>
                            <td style="white-space: nowrap;"><?= date('Y-m-d', strtotime($item['created_at'])) ?></td>
                            <td style="color: white; width: 100%;"><?= htmlspecialchars($item['title']) ?></td>
                            <td>
                                <form method="POST" action="index.php?page=dashboard" style="display:inline;">
                                    <input type="hidden" name="action" value="delete_news">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this news?')"><i class="ti ti-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
$content = ob_get_clean();
require_once __DIR__ . '/layout.php';
?>
