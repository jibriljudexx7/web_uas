CREATE DATABASE IF NOT EXISTS uas_db;
USE uas_db;

CREATE TABLE IF NOT EXISTS guestbook (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Seed data awal
INSERT INTO guestbook (name, message) VALUES 
('Mohamad Firdaus, M.Kom.', 'Selamat datang di Aplikasi Web Dinamis! Aplikasi ini terhubung dengan MariaDB.'),
('Jibril Judex Facti Aliyudin', 'Ini adalah tes pesan pertama dari sistem.');
