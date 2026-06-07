<?php ob_start(); ?>

<div class="glass-card" style="margin-bottom: 3rem; text-align: center; padding: 3rem 2rem; border-top: 4px solid var(--accent-primary);">
    <h2 style="font-size: 2.5rem; margin-bottom: 0.5rem; font-family: 'Cinzel', serif;">Inner Circle Access</h2>
    <p style="color: var(--text-secondary); max-width: 600px; margin: 0 auto;">Welcome, <?= htmlspecialchars($_SESSION['full_name'] ?? $_SESSION['username']) ?>. Here is the exclusive world tour schedule for our devoted legion.</p>
</div>

<!-- Tour Dates Section -->
<h2 class="section-title"><i class="ti ti-ticket"></i> Upcoming World Tour</h2>
<div class="glass-card" style="margin-bottom: 3rem; padding: 0;">
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>City</th>
                    <th>Venue</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($tours)): ?>
                    <tr><td colspan="4" style="text-align: center; padding: 2rem;">No tour dates announced yet.</td></tr>
                <?php else: ?>
                    <?php foreach($tours as $tour): ?>
                        <tr>
                            <td style="font-weight: 500;"><?= date('M d, Y', strtotime($tour['tour_date'])) ?></td>
                            <td style="color: white;"><?= htmlspecialchars($tour['city']) ?></td>
                            <td><i class="ti ti-map-pin" style="font-size: 0.875rem; color: var(--text-secondary);"></i> <?= htmlspecialchars($tour['venue']) ?></td>
                            <td>
                                <?php
                                    $badgeClass = 'badge-upcoming';
                                    if ($tour['status'] == 'Sold Out') $badgeClass = 'badge-soldout';
                                    if ($tour['status'] == 'Completed') $badgeClass = 'badge-completed';
                                ?>
                                <span class="badge <?= $badgeClass ?>"><?= htmlspecialchars($tour['status']) ?></span>
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
?>
