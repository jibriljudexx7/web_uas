<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook - Metal MVC</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        :root {
            --bg-base: #0f1011;
            --bg-panel: #1a1c1e;
            --border-metal: #383c42;
            --accent-red: #d80000;
            --accent-glow: rgba(216, 0, 0, 0.4);
            --silver-light: #dce1e6;
            --silver-dark: #8c9399;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Rajdhani', sans-serif;
            background-color: var(--bg-base);
            color: var(--silver-light);
            background-image: 
                radial-gradient(circle at 50% 0%, #1a1c1e 0%, transparent 70%),
                repeating-linear-gradient(45deg, transparent, transparent 2px, rgba(255,255,255,0.015) 2px, rgba(255,255,255,0.015) 4px);
            min-height: 100vh;
            padding: 2rem 1rem;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--accent-red);
            position: relative;
        }
        .header::after {
            content: ''; position: absolute; bottom: -6px; left: 50%; transform: translateX(-50%);
            width: 50px; height: 10px; background: var(--accent-red); box-shadow: 0 0 10px var(--accent-glow);
        }
        .header h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #fff;
            text-shadow: 2px 2px 0 #000;
        }
        .panel {
            background: linear-gradient(135deg, var(--bg-panel), #131416);
            border: 1px solid var(--border-metal);
            border-radius: 4px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.8), inset 0 1px 1px rgba(255,255,255,0.05);
            position: relative;
        }
        /* Rivets */
        .rivet {
            position: absolute; width: 10px; height: 10px; background: #666; border-radius: 50%; box-shadow: inset 0 1px 2px rgba(255,255,255,0.5), 0 1px 2px #000;
        }
        .panel .tl { top: 10px; left: 10px; }
        .panel .tr { top: 10px; right: 10px; }
        .panel .bl { bottom: 10px; left: 10px; }
        .panel .br { bottom: 10px; right: 10px; }

        .form-group { margin-bottom: 1.5rem; }
        .form-group label {
            display: block; font-family: 'Orbitron', sans-serif; font-size: 0.8rem; color: var(--silver-dark);
            text-transform: uppercase; margin-bottom: 0.5rem; letter-spacing: 1px;
        }
        .form-control {
            width: 100%; background: #000; border: 1px solid var(--border-metal); color: var(--silver-light);
            padding: 10px 15px; font-family: 'Rajdhani', sans-serif; font-size: 1.1rem; border-radius: 2px;
            transition: all 0.3s;
        }
        .form-control:focus {
            outline: none; border-color: var(--accent-red); box-shadow: 0 0 10px var(--accent-glow);
        }
        .btn-metal {
            background: linear-gradient(to bottom, #383c42, #1a1c1e);
            border: 1px solid var(--border-metal);
            color: #fff;
            padding: 10px 20px;
            font-family: 'Orbitron', sans-serif;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.5);
            border-radius: 2px;
        }
        .btn-metal:hover {
            border-color: var(--accent-red);
            color: var(--accent-red);
            box-shadow: 0 0 15px var(--accent-glow);
        }
        .alert {
            padding: 1rem; margin-bottom: 1.5rem; border-left: 4px solid var(--accent-red);
            background: rgba(216, 0, 0, 0.1); font-weight: bold;
        }
        .alert-success { border-color: #00ffaa; background: rgba(0, 255, 170, 0.1); color: #00ffaa; }
        
        .entry {
            background: rgba(0,0,0,0.4); border: 1px solid var(--border-metal);
            padding: 1.5rem; margin-bottom: 1rem; position: relative; border-left: 3px solid var(--silver-dark);
        }
        .entry:hover { border-left-color: var(--accent-red); }
        .entry-header { display: flex; justify-content: space-between; margin-bottom: 0.5rem; }
        .entry-name { font-family: 'Orbitron', sans-serif; font-weight: 700; color: #fff; }
        .entry-date { font-size: 0.9rem; color: var(--silver-dark); }
        .entry-message { font-size: 1.1rem; line-height: 1.5; color: var(--silver-light); }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1><i class="ti ti-server-cog"></i> SYSTEM LOG</h1>
            <p style="font-size: 1.2rem; letter-spacing: 1px; color: var(--silver-dark);">SECURE GUESTBOOK TERMINAL</p>
        </header>

        <?= $content ?>

    </div>
</body>
</html>
