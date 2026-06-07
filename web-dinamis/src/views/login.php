<?php ob_start(); ?>

<?php if ($errorMsg): ?>
    <div class="alert"><i class="ti ti-alert-triangle"></i> <?= $errorMsg ?></div>
<?php endif; ?>

<div class="panel login-panel">
    <div class="rivet tl"></div><div class="rivet tr"></div><div class="rivet bl"></div><div class="rivet br"></div>
    
    <div class="login-header">
        <i class="ti ti-shield-lock" style="font-size: 3rem; color: var(--accent-red);"></i>
        <h2 style="font-family: 'Orbitron', sans-serif; color: #fff; margin-top: 1rem;">AUTHENTICATION</h2>
        <p style="color: var(--silver-dark); letter-spacing: 1px;">Enter credentials to access the system</p>
    </div>

    <form method="POST" action="index.php?page=login">
        <div class="form-group">
            <label for="username"><i class="ti ti-user"></i> Username</label>
            <input type="text" id="username" name="username" class="form-control" required placeholder="Enter username..." autocomplete="username">
        </div>
        <div class="form-group">
            <label for="password"><i class="ti ti-lock"></i> Password</label>
            <input type="password" id="password" name="password" class="form-control" required placeholder="Enter password..." autocomplete="current-password">
        </div>
        <button type="submit" class="btn-metal" style="width: 100%;"><i class="ti ti-login"></i> ACCESS SYSTEM</button>
    </form>
</div>

<?php 
$content = ob_get_clean();
$pageTitle = 'Login - System Access';
require_once __DIR__ . '/layout.php';
?>
