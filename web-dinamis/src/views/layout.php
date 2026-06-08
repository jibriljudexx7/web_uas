<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Echoes of Eternity Muhammad Jibril 2388010051') ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        :root {
            --bg-dark: #0f172a;
            --bg-card: rgba(30, 41, 59, 0.7);
            --border-light: rgba(255, 255, 255, 0.1);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --accent-primary: #3b82f6;
            --accent-hover: #2563eb;
            --accent-danger: #ef4444;
            --accent-danger-hover: #dc2626;
            --success: #10b981;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-dark);
            background-image: 
                radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(139, 92, 246, 0.15) 0px, transparent 50%);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-light);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .navbar-brand {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-nav {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .nav-link:hover {
            color: var(--text-primary);
        }

        .btn-nav {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--border-light);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-nav:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Main Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            flex-grow: 1;
            width: 100%;
        }

        /* Glass Card */
        .glass-card {
            background: var(--bg-card);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border-light);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        /* Typography */
        h1, h2, h3 {
            color: var(--text-primary);
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .btn-primary {
            background: var(--accent-primary);
            color: white;
            box-shadow: 0 4px 14px 0 rgba(59, 130, 246, 0.39);
        }

        .btn-primary:hover {
            background: var(--accent-hover);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.23);
        }

        .btn-danger {
            background: transparent;
            color: var(--accent-danger);
            border: 1px solid var(--accent-danger);
        }

        .btn-danger:hover {
            background: var(--accent-danger);
            color: white;
        }
        
        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.75rem;
        }

        /* Forms */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-secondary);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid var(--border-light);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            color: var(--text-primary);
            font-family: inherit;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
        }
        
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2394a3b8'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2rem;
            padding-right: 2.5rem;
        }

        /* Alerts */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }
        
        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #fca5a5;
        }

        /* Footer */
        .footer {
            border-top: 1px solid var(--border-light);
            padding: 2rem;
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-top: auto;
        }

        /* Grid System */
        .grid {
            display: grid;
            gap: 1.5rem;
        }
        
        .grid-2 { grid-template-columns: repeat(1, 1fr); }
        .grid-3 { grid-template-columns: repeat(1, 1fr); }
        
        @media (min-width: 768px) {
            .grid-2 { grid-template-columns: repeat(2, 1fr); }
            .grid-3 { grid-template-columns: repeat(2, 1fr); }
        }
        
        @media (min-width: 1024px) {
            .grid-3 { grid-template-columns: repeat(3, 1fr); }
        }

        /* News Cards */
        .news-card {
            border: 1px solid var(--border-light);
            border-radius: 12px;
            overflow: hidden;
            background: rgba(15, 23, 42, 0.4);
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .news-card:hover {
            transform: translateY(-5px);
            background: rgba(15, 23, 42, 0.6);
        }

        .news-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .news-content {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .news-date {
            color: var(--accent-primary);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }

        .news-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .news-desc {
            color: var(--text-secondary);
            font-size: 0.875rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        /* Tables */
        .table-container {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table th, .table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-light);
            text-align: left;
        }

        .table th {
            color: var(--text-secondary);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .table td {
            font-size: 0.875rem;
        }
        
        .table tbody tr {
            transition: background 0.2s;
        }
        
        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        .badge {
            display: inline-flex;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-upcoming { background: rgba(59, 130, 246, 0.1); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.2); }
        .badge-soldout { background: rgba(239, 68, 68, 0.1); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.2); }
        .badge-completed { background: rgba(16, 185, 129, 0.1); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.2); }

    </style>
</head>
<body>

    <nav class="navbar">
        <a href="index.php" class="navbar-brand">
            <i class="ti ti-flame" style="color: var(--accent-primary);"></i>
            Echoes of Eternity Muhammad Jibril 2388010051
        </a>
        <div class="navbar-nav">
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <a href="index.php?page=dashboard" class="nav-link"><i class="ti ti-layout-dashboard"></i> Dashboard</a>
                <?php else: ?>
                    <a href="index.php?page=schedule" class="nav-link"><i class="ti ti-ticket"></i> Schedule</a>
                <?php endif; ?>
                <a href="index.php?page=logout" class="btn-nav"><i class="ti ti-logout"></i> Logout</a>
            <?php else: ?>
                <a href="index.php?page=login" class="btn-nav"><i class="ti ti-login"></i> Sign In</a>
            <?php endif; ?>
        </div>
    </nav>

    <main class="container">
        <?= $content ?>
    </main>

    <footer class="footer">
        <p>&copy; <?= date('Y') ?> Echoes of Eternity Official. Crafted with <i class="ti ti-heart-filled" style="color: var(--accent-danger); font-size: 0.875rem;"></i> for the fans.</p>
    </footer>

</body>
</html>
