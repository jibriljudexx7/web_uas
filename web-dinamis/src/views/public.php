<?php ob_start(); ?>

<style>
    /* Hero Section */
    .hero {
        height: 80vh;
        background-image: linear-gradient(to bottom, rgba(15, 23, 42, 0.4) 0%, var(--bg-dark) 100%), url('/assets/hero.png');
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        margin-top: -2rem; /* Pull up under navbar */
        margin-bottom: 4rem;
        border-radius: 0 0 20px 20px;
        border-bottom: 2px solid var(--border-light);
    }

    .band-logo {
        font-size: 5rem;
        font-weight: 900;
        letter-spacing: 0.1em;
        color: #fff;
        text-shadow: 0 0 20px rgba(59, 130, 246, 0.5); /* Blue glow instead of red to match dynamic theme */
        margin-bottom: 1rem;
        z-index: 10;
        font-family: 'Cinzel', serif;
        text-transform: uppercase;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        color: var(--text-secondary);
        letter-spacing: 0.2em;
        margin-bottom: 2rem;
        z-index: 10;
        text-transform: uppercase;
    }

    /* About Section */
    .about-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 4rem;
        align-items: center;
        margin-bottom: 5rem;
    }

    @media (min-width: 768px) {
        .about-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    .about-img {
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 0 30px rgba(59, 130, 246, 0.15);
        filter: grayscale(80%) contrast(120%);
        transition: filter 0.5s;
    }

    .about-img:hover {
        filter: grayscale(0%) contrast(100%);
    }

    .about-text p {
        font-size: 1.1rem;
        color: var(--text-secondary);
        margin-bottom: 1.5rem;
        line-height: 1.8;
    }

    /* Album Section */
    .album-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 3rem;
        align-items: center;
        margin-bottom: 5rem;
    }

    @media (min-width: 768px) {
        .album-grid {
            grid-template-columns: 1fr 2fr;
        }
    }

    .album-cover {
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        border: 1px solid var(--border-light);
    }

    .tracklist {
        list-style: none;
        margin-top: 2rem;
    }

    .tracklist li {
        padding: 1rem 0;
        border-bottom: 1px solid var(--border-light);
        display: flex;
        justify-content: space-between;
        color: var(--text-secondary);
    }

    .tracklist li span.track-name {
        color: var(--text-primary);
        font-weight: 500;
    }

    .portal-banner {
        text-align: center;
        padding: 4rem 2rem;
        background: var(--bg-card);
        border: 1px solid var(--border-light);
        border-radius: 12px;
        margin-bottom: 4rem;
    }
</style>

</main> <!-- Break out of layout container for full-width hero -->

<!-- Hero Section -->
<header class="hero">
    <h1 class="band-logo">Echoes of Eternity</h1>
    <p class="hero-subtitle">Heavy Metal from the Abyss</p>
    <a href="#music" class="btn btn-primary" style="padding: 1rem 2.5rem; font-size: 1.1rem; border-radius: 999px;">Listen Now</a>
</header>

<main class="container"> <!-- Re-open container for content -->

<!-- About Section -->
<section class="about-grid">
    <div>
        <!-- Notice we use absolute path /assets to fetch from the Nginx static server (Port 80) -->
        <img src="/assets/band.png" alt="Echoes of Eternity Band Members" class="about-img">
    </div>
    <div class="about-text">
        <h2 class="section-title" style="text-align: left; margin-bottom: 2rem;">The Genesis</h2>
        <p>Formed in the depths of the underground metal scene, Echoes of Eternity combines blistering guitar riffs, thunderous blast beats, and haunting symphonic elements to create a soundscape that is both brutal and beautiful.</p>
        <p>With three critically acclaimed studio albums and a reputation for explosive, high-energy live performances, we have established ourselves as one of the premier extreme metal acts of this decade. Join our legion.</p>
    </div>
</section>

<!-- Latest Album Section -->
<section id="music">
    <h2 class="section-title">Latest Release</h2>
    <p style="text-align: center; color: var(--text-secondary); margin-top: -2rem; margin-bottom: 3rem;">Symphony of Destruction (2026)</p>
    
    <div class="album-grid glass-card" style="padding: 3rem;">
        <div>
            <img src="/assets/album.png" alt="Symphony of Destruction Album Cover" class="album-cover">
        </div>
        <div>
            <h3 style="font-size: 1.8rem; margin-bottom: 1rem; color: #fff;">Tracklist</h3>
            <ul class="tracklist">
                <li><span>01.</span> <span class="track-name">Prelude to Chaos</span> <span>1:45</span></li>
                <li><span>02.</span> <span class="track-name">Symphony of Destruction</span> <span>5:12</span></li>
                <li><span>03.</span> <span class="track-name">Blood and Gears</span> <span>4:38</span></li>
                <li><span>04.</span> <span class="track-name">The Crimson Rune</span> <span>6:05</span></li>
                <li><span>05.</span> <span class="track-name">Echoes in the Abyss</span> <span>7:20</span></li>
                <li><span>06.</span> <span class="track-name">Final Stand</span> <span>4:55</span></li>
            </ul>
            <div style="margin-top: 2rem; display: flex; gap: 1rem;">
                <a href="#" class="btn btn-primary"><i class="ti ti-brand-spotify"></i> Stream</a>
                <a href="#" class="btn btn-nav" style="border: 1px solid var(--border-light);"><i class="ti ti-shopping-cart"></i> Buy Vinyl</a>
            </div>
        </div>
    </div>
</section>

<!-- News Section from Dynamic DB -->
<h2 class="section-title"><i class="ti ti-news"></i> Latest Transmissions</h2>
<div class="grid grid-3" style="margin-bottom: 4rem;">
    <?php if (empty($news)): ?>
        <p style="grid-column: 1 / -1; color: var(--text-secondary); text-align: center;">No transmissions found.</p>
    <?php else: ?>
        <?php foreach($news as $item): ?>
            <div class="news-card">
                <?php if (!empty($item['image_url'])): ?>
                    <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="News Cover" class="news-img" style="width: 100%; height: 200px; object-fit: cover;">
                <?php endif; ?>
                <div class="news-content" style="padding: 1.5rem; background: var(--bg-card);">
                    <div class="news-date" style="font-size: 0.85rem; color: var(--accent-primary); margin-bottom: 0.5rem;"><?= date('M d, Y', strtotime($item['created_at'])) ?></div>
                    <h3 class="news-title" style="color: #fff; margin-bottom: 1rem;"><?= htmlspecialchars($item['title']) ?></h3>
                    <p class="news-desc" style="color: var(--text-secondary); font-size: 0.95rem;"><?= nl2br(htmlspecialchars(substr($item['content'], 0, 150))) ?><?= strlen($item['content']) > 150 ? '...' : '' ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- Tour Dates Access Banner -->
<section class="portal-banner">
    <i class="ti ti-lock" style="font-size: 3rem; color: var(--text-secondary); margin-bottom: 1rem;"></i>
    <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: #fff; font-family: 'Cinzel', serif;">Exclusive Tour Dates</h2>
    <p style="color: var(--text-secondary); margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">Join the inner circle to view our full world tour schedule, get early access to tickets, and view exclusive behind-the-scenes content.</p>
    <a href="index.php?page=login" class="btn btn-primary" style="padding: 1.2rem 3rem; font-size: 1.1rem; border-radius: 999px;">
        <i class="ti ti-user"></i> Login to View Tour Dates
    </a>
    <div style="margin-top: 1.5rem;">
        <span style="color: var(--text-secondary);">Not a member? </span>
        <a href="index.php?page=register" style="color: var(--accent-primary); text-decoration: none; font-weight: 600;">Register Now</a>
    </div>
</section>

<?php 
$content = ob_get_clean(); 
require_once __DIR__ . '/layout.php';
?>
