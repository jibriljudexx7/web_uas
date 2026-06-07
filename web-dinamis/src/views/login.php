<?php ob_start(); ?>

<div style="display: flex; align-items: center; justify-content: center; min-height: 70vh;">
    <div class="glass-card" style="width: 100%; max-width: 400px;">
        
        <div style="text-align: center; margin-bottom: 2rem;">
            <i class="ti ti-shield-lock" style="font-size: 3rem; color: var(--accent-primary);"></i>
            <h2 style="font-family: 'Inter', sans-serif; color: #fff; margin-top: 1rem;">SECURE ACCESS</h2>
            <p style="color: var(--text-secondary); font-size: 0.875rem;">Authorized personnel only</p>
        </div>

        <?php if (!empty($errorMsg)): ?>
            <div class="alert alert-error">
                <i class="ti ti-alert-triangle"></i> <?= htmlspecialchars($errorMsg) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=login">
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required placeholder="Enter username..." autocomplete="username">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="Enter password..." autocomplete="current-password">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;"><i class="ti ti-login"></i> LOGIN</button>
        </form>
    </div>
</div>

<?php 
$content = ob_get_clean();
$pageTitle = 'Login - Echoes of Eternity';
require_once __DIR__ . '/layout.php';
?>
