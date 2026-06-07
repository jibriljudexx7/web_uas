DROP DATABASE IF EXISTS uas_db;
CREATE DATABASE uas_db;
USE uas_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'fan') DEFAULT 'fan',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    content TEXT NOT NULL,
    image_url MEDIUMTEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS tours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    city VARCHAR(100) NOT NULL,
    venue VARCHAR(150) NOT NULL,
    tour_date DATE NOT NULL,
    status ENUM('Upcoming', 'Sold Out', 'Completed') DEFAULT 'Upcoming',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Seed users (password: password)
INSERT INTO users (username, password, full_name, role) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin'),
('jibril', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Jibril Judex Facti Aliyudin', 'fan');

-- Seed news
INSERT INTO news (title, content, image_url) VALUES 
('Album Baru "Symphony of Destruction" Akan Segera Rilis!', 'Kami sedang menyelesaikan tahap akhir mixing untuk album studio ke-5 kami. Nantikan ledakan distorsi dan harmoni yang belum pernah kalian dengar sebelumnya!', '/assets/album.png'),
('Pengumuman Tur Dunia 2026', 'Persiapkan diri kalian! Kami akan mengguncang 5 benua dalam tur dunia terbesar kami tahun ini. Tiket pre-sale akan mulai dijual minggu depan. Lihat foto eksklusif latihan kami di bawah ini!', '/assets/band.png');

-- Seed tours
INSERT INTO tours (city, venue, tour_date, status) VALUES 
('Jakarta, ID', 'Gelora Bung Karno', '2026-08-15', 'Upcoming'),
('Tokyo, JP', 'Tokyo Dome', '2026-09-02', 'Sold Out'),
('Berlin, DE', 'Olympiastadion', '2026-09-20', 'Upcoming'),
('London, UK', 'Wembley Stadium', '2026-10-05', 'Upcoming');
