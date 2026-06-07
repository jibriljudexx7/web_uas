CREATE DATABASE IF NOT EXISTS uas_db;
USE uas_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS guestbook (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Seed users (password: password)
INSERT INTO users (username, password, full_name) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator'),
('jibril', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Jibril Judex Facti Aliyudin');

-- Seed guestbook
INSERT INTO guestbook (name, message) VALUES 
('Mohamad Firdaus, M.Kom.', 'Selamat datang di Aplikasi Web Dinamis! Aplikasi ini terhubung dengan MariaDB.'),
('Jibril Judex Facti Aliyudin', 'Ini adalah tes pesan pertama dari sistem.');
