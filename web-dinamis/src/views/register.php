<?php ob_start(); ?>

<div class="auth-container" style="display: flex; justify-content: center; align-items: center; min-height: 70vh;">
    <div class="glass-card" style="width: 100%; max-width: 450px;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <i class="ti ti-user-plus" style="font-size: 3rem; color: var(--accent-primary);"></i>
            <h2 style="margin-top: 1rem; font-family: 'Cinzel', serif; letter-spacing: 2px;">Join The Legion</h2>
            <p style="color: var(--text-secondary); margin-top: 0.5rem;">Register to access exclusive tour dates.</p>
        </div>

        <?php if (!empty($errorMsg)): ?>
            <div class="alert alert-error">
                <i class="ti ti-alert-circle"></i>
                <?= htmlspecialchars($errorMsg) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=register">
            <div class="form-group">
                <label class="form-label" for="full_name">Full Name</label>
                <div style="position: relative;">
                    <i class="ti ti-id" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--text-secondary);"></i>
                    <input type="text" id="full_name" name="full_name" class="form-control" style="padding-left: 2.8rem;" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <div style="position: relative;">
                    <i class="ti ti-user" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--text-secondary);"></i>
                    <input type="text" id="username" name="username" class="form-control" style="padding-left: 2.8rem;" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <div style="position: relative;">
                    <i class="ti ti-lock" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--text-secondary);"></i>
                    <input type="password" id="password" name="password" class="form-control" style="padding-left: 2.8rem;" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem; padding: 0.8rem;">
                <i class="ti ti-user-plus"></i> Register
            </button>
        </form>

        <div style="text-align: center; margin-top: 2rem; border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
            <p style="color: var(--text-secondary);">Already in the legion? <a href="index.php?page=login" style="color: var(--accent-primary); text-decoration: none; font-weight: 600;">Sign In</a></p>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require_once __DIR__ . '/layout.php';
?>
